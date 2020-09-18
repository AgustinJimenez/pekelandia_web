<?php namespace Modules\Page\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Page\Repositories\PageRepository;
use Modules\Categoria\Entities\Categoria;
use Modules\Categoria\Entities\Subcategoria;
use Modules\Categoria\Entities\Subsubcategoria;
use Modules\Empresa\Entities\Empresa;
use Modules\Revistas\Entities\Revistas;
use Modules\Eventos\Entities\Eventos;
use Modules\Promociones\Entities\Promociones;
use Modules\Articulos\Entities\Articulos;
use Modules\Paises\Entities\Ciudad;
use Modules\Paises\Entities\Pais;
use Modules\Videos\Entities\Videos;
use Modules\Newsletter\Entities\Emails;
use Modules\Newsletter\Entities\Grupos;
use Modules\Anuncios\Entities\Anuncios;
use Modules\Anuncios\Entities\Galeria;
use Modules\Anuncios\Entities\Publicidad;
use Modules\Anuncios\Entities\Suscriptores;
use Illuminate\Http\Request;
use Redirect;
use Input;
use Carbon\Carbon;
use Share;
use Session;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class PublicController extends BasePublicController
{
    /**
     * @var PageRepository
     */
    private $page;
    /**
     * @var Application
     */
    private $app;

    public function __construct(PageRepository $page, Application $app)
    {
        parent::__construct();
        $this->page = $page;
        $this->app = $app;
    }

    /**
     * @param $slug
     * @return \Illuminate\View\View
     */
    public function uri($slug)
    {
        $page = $this->page->findBySlugInLocale($slug, $this->locale);

        $this->throw404IfNotFound($page);

        $template = $this->getTemplateForPage($page);

        return view($template, compact('page'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function homepage()
    {
        $page = $this->page->findHomepage();

        $this->throw404IfNotFound($page);

        $template = $this->getTemplateForPage($page);

        $carbon=new \Carbon\Carbon();
        $now=$carbon->now('America/Asuncion')->subHours(12);

        $eventos = Eventos::where('destacado',1)->orderBy('fecha','asc')
                                                ->limit(3)
                                                ->get();

        $fechas=array();

        foreach ($eventos as $evento) 
        {
            setLocale(LC_ALL,'es_ES.utf8');

            $fechas[]=strftime("%b", $evento->fecha->getTimestamp());
        }

        $anuncios = Anuncios::where('vista','Inicio')->where('mostrar',1)->orderBy('orden','ASC')->limit(4)->get();

        $galerias = Galeria::where('mostrar',1)->where('mostrar',1)->orderBy('orden','ASC')->limit(6)->get();

        $articulos = Articulos::where('mostrar',1)->orderBy('created_at','desc')->limit(4)->get();

        return view($template, compact('page','eventos','fechas','articulos','anuncios','galerias'));
    }

    /**
     * Return the template for the given page
     * or the default template if none found
     * @param $page
     * @return string
     */


    public function empresas()
    {

        if ((Input::has("categoria_id")) == true) {
            
            $categoria_id = Input::get('categoria_id');

            $empresas = Empresa::whereHas('subcategoria', function ($query) 
                                        use ($categoria_id) {
                                        $query->where('categoria_id', $categoria_id);
                                        })->paginate(6);

            $categoria = Categoria::where('id',$categoria_id)->first();

            $sidebars = Subcategoria::where('categoria_id',$categoria_id)->orderBy('nombre')->get();

            $subsidebars = Subsubcategoria::whereHas('subcategoria', function ($query)
                                        use ($categoria_id) {
                                        $query->where('categoria_id', $categoria_id);
                                        })->orderBy('nombre')->get();

            $url_query_string = 'categoria_id';
            $id = $categoria_id;
        }
        elseif ((Input::has("subcategoria_id")) == true) {

            $subcategoria_id = Input::get('subcategoria_id');

            $empresas = Empresa::where('subcategoria_id',$subcategoria_id)->paginate(6);

            $subcategoriaId = Subcategoria::where('id',$subcategoria_id)->first();

            $sidebars = Subcategoria::where('categoria_id',$subcategoriaId->categoria_id)
                                    ->orderBy('nombre')->get();

            $categoria = Categoria::where('id',$subcategoriaId->categoria_id)->first();

            $subsidebars = Subsubcategoria::whereHas('subcategoria', function ($query)
                                        use ($subcategoriaId) {
                                        $query->where('categoria_id', $subcategoriaId->categoria_id);
                                        })->orderBy('nombre')->get();

            $url_query_string = 'subcategoria_id';
            $id = $subcategoria_id;
        }
        else {

            $subsubcategoria_id = Input::get('subsubcategoria_id');

            $empresas = Empresa::where('subsubcategoria_id',$subsubcategoria_id)->paginate(6);

            $subsubcategoriaId = Subsubcategoria::where('id',$subsubcategoria_id)->first();

            $subcategoriaId = Subcategoria::where('id',$subsubcategoriaId->subcategoria_id)->first();

            $sidebars = Subcategoria::where('categoria_id',$subcategoriaId->categoria_id)
                                    ->orderBy('nombre')->get();

            $categoria = Categoria::where('id',$subcategoriaId->categoria_id)->first();

            $subsidebars = Subsubcategoria::whereHas('subcategoria', function ($query)
                                        use ($subcategoriaId) {
                                        $query->where('categoria_id', $subcategoriaId->categoria_id);
                                        })->orderBy('nombre')->get();

            $url_query_string = 'subsubcategoria_id';
            $id = $subsubcategoria_id;
        }

        if ($categoria->orden == 1) {
            $color = '74cee4';
            $subcolor = '6fc4d9';
        } 
        elseif ($categoria->orden == 2) {
            $color = '6fc191';
            $subcolor = '6ab78a';
        }
        elseif ($categoria->orden == 3) {
            $color = 'c389ce';
            $subcolor = 'ac7ab5';
        }
        elseif ($categoria->orden == 4) {
            $color = 'e16c6c';
            $subcolor = 'c86969';
        }
        elseif ($categoria->orden == 5) {
            $color = 'edbf47';
            $subcolor = 'e0b84e';
        }
        elseif ($categoria->orden == 6) {
            $color = 'f6b3c1';
            $subcolor = 'E8A9B6';
        }
        elseif ($categoria->orden == 7) {
            $color = '93b7dc';
            $subcolor = '82A2C2';
        }
        elseif ($categoria->orden == 8) {
            $color = 'ec774b';
            $subcolor = 'df764e';
        }

        $ciudades = Ciudad::orderBy('nombre','asc')->get();
        $paises = Pais::orderBy('nombre','asc')->get();

        $anuncios = Anuncios::where('vista','Empresas')->where('mostrar',1)->orderBy('orden','ASC')->limit(6)->get();

        return view('empresas', compact('empresas','url_query_string','id','sidebars','categoria','subsidebars','ciudades','paises','anuncios','color','subcolor'));

    }

    public function revistas()
    {
        $revistas = Revistas::orderBy('year','desc')->paginate(10);

        $anuncios = Anuncios::where('vista','Revistas')->where('mostrar',1)->orderBy('orden','ASC')->limit(2)->get();

        return view('revistas', compact('revistas','anuncios'));

    }

    public function eventos()
    {

        $carbon=new \Carbon\Carbon();
        $now=$carbon->now('America/Asuncion')->subHours(12);

        $eventos = Eventos::orderBy('fecha','asc')->paginate(6);

        $fechas=array();

        foreach ($eventos as $evento) 
        {
            setLocale(LC_ALL,'es_ES.utf8');

            $fechas[]=strftime("%b", $evento->fecha->getTimestamp());
        }

        $anuncios = Anuncios::where('vista','Eventos')->where('mostrar',1)->orderBy('orden','ASC')->limit(4)->get();

        return view('eventos', compact('eventos','fechas','anuncios'));

    }

    public function promociones()
    {
        $promociones = Promociones::orderBy('created_at','desc')->paginate(6);

        $anuncios = Anuncios::where('vista','Promociones')->where('mostrar',1)->orderBy('orden','ASC')->limit(4)->get();

        return view('promociones', compact('promociones','anuncios'));

    }

    public function articulos()
    {
        $articulos = Articulos::orderBy('created_at','desc')->paginate(4);

        $anuncios = Anuncios::where('vista','Articulos')->where('mostrar',1)->orderBy('orden','ASC')->limit(4)->get();

        return view('articulos', compact('articulos','anuncios'));

    }

    public function videos()
    {
        $videos = Videos::orderBy('created_at','desc')->paginate(6);

        return view('videos', compact('videos'));

    }

    public function sumaTuNegocio()
    {
        $publicidades = Publicidad::orderBy('orden','ASC')->get();

        return view('sumatunegocio', compact('publicidades'));

    }

    public function formulario()
    {

        if ((Input::get("plan")) == '1') {

            $orden = (Input::get("plan"));
            $plan = Publicidad::where('orden',$orden)->first();

            Session::put('mensaje', 'Plan Básico: tamaño de imagen recomendada 255x230.');

        } elseif ((Input::get("plan")) == '2') {

            $orden = (Input::get("plan"));
            $plan = Publicidad::where('orden',$orden)->first();

            Session::put('mensaje', 'Plan Medio: tamaño de imagen recomendada 255x230.');
            
        } elseif ((Input::get("plan")) == '3') {

            $orden = (Input::get("plan"));
            $plan = Publicidad::where('orden',$orden)->first();

            Session::put('mensaje', 'Plan Premium: tamaño de imagen recomendada 1180x100.');
            
        } elseif ((Input::get("plan")) == '4') {

            $orden = (Input::get("plan"));
            $plan = Publicidad::where('orden',$orden)->first();

            Session::put('mensaje', 'Plan Revista: tamaño de imagen recomendada 180x335.');

        } else {

            $orden = (Input::get("plan"));
            $plan = Publicidad::where('orden',$orden)->first();

            Session::put('mensaje', 'Plan Empresa: tamaño de imagen recomendada 360x50.');
        }

        return view('formulario', compact('plan'));

    }

    public function singlepost(Request $request)
    {
        $anuncios = Anuncios::where('vista','Post')->where('mostrar',1)->orderBy('orden','ASC')->limit(4)->get();

        if ((Input::has("revista_id")) == true) {

            $revista_id = Input::get('revista_id');
            $url = $request->fullUrl();

            $singlepost_revista = Revistas::where('id',$revista_id)->first();

            return view('singlepost', compact('singlepost_revista','anuncios','url'));

        }
        elseif ((Input::has("evento_id")) == true) {

            $evento_id = Input::get('evento_id');

            $singlepost_evento = Eventos::where('id',$evento_id)->first();

            $url = $request->fullUrl();

            $titulo = preg_replace("/&#?[a-z0-9]+;/i"," ",(str_limit(strip_tags($singlepost_evento->titulo), 60)));

            $social = Share::load($request->fullUrl(), $titulo)->services('facebook', 'twitter', 'email');

            return view('singlepost', compact('singlepost_evento','social','url','anuncios'));

        }
        elseif ((Input::has("promocion_id")) == true) {

            $promocion_id = Input::get('promocion_id');

            $singlepost_promocion = Promociones::where('id',$promocion_id)->first();

            $url = $request->fullUrl();

            $titulo = preg_replace("/&#?[a-z0-9]+;/i"," ",(str_limit(strip_tags($singlepost_promocion->titulo), 60)));

            $social = Share::load($request->fullUrl(), $titulo)->services('facebook', 'twitter', 'email');

            return view('singlepost', compact('singlepost_promocion','social','url','anuncios'));

        }

        elseif ((Input::has("articulo_id")) == true) {

            $articulo_id = Input::get('articulo_id');

            $singlepost_articulo = Articulos::where('id',$articulo_id)->first();

            $grupos = Grupos::orderBy('nombre')->get();

            $url = $request->fullUrl();

            $titulo = preg_replace("/&#?[a-z0-9]+;/i"," ",(str_limit(strip_tags($singlepost_articulo->titulo), 60)));

            $social = Share::load("http://www.pekelandia.com.py/", $titulo)->services('facebook', 'twitter', 'email');

            //dd($social);

            return view('singlepost', compact('singlepost_articulo','social','grupos','url','anuncios'));

        }

        else {

            $grupos = Grupos::orderBy('nombre')->get();

            return view('singlepost', compact('grupos','anuncios'));
        }

    }

    private function getTemplateForPage($page)
    {
        return (view()->exists($page->template)) ? $page->template : 'default';
    }

    /**
     * Throw a 404 error page if the given page is not found
     * @param $page
     */
    private function throw404IfNotFound($page)
    {
        if (is_null($page)) {
            $this->app->abort('404');
        }
    }

    public function filtroEmpresas($categoria_id, $pais_id, $ciudad_id)
    {

        if ($pais_id!='all' && $ciudad_id != 'all') {

            $empresas = Empresa::whereHas('subcategoria', function ($query) 
                                        use ($categoria_id) {
                                        $query->where('categoria_id', $categoria_id);
                                        })->where('ciudad_id',$ciudad_id)->paginate(6);

        } elseif ($pais_id!='all' && $ciudad_id == 'all') {

            $empresas = Empresa::whereHas('subcategoria', function ($query) 
                                        use ($categoria_id) {
                                        $query->where('categoria_id', $categoria_id);
                                        })->where('pais_id',$pais_id)->paginate(6);

        } else {

             $empresas = Empresa::whereHas('subcategoria', function ($query) 
                                        use ($categoria_id) {
                                        $query->where('categoria_id', $categoria_id);
                                        })->paginate(6);
        }
        
        return view('filtro', compact('empresas'));
    }

    public function searchFilter(Request $request)
    {
        
        if ($request->get('inputSearch')) {

            if (trim(Input::get('inputSearch') !== ''));
            {
                $filterArticulos = Articulos::where('articulos__articulos.titulo', 'LIKE', trim('%' . Input::get('inputSearch')) . '%')->get();

                $filterEventos = Eventos::where('eventos__eventos.titulo', 'LIKE', trim('%' . Input::get('inputSearch')) . '%')->get();

                $filterPromociones = Promociones::where('promociones__promociones.titulo', 'LIKE', trim('%' . Input::get('inputSearch')) . '%')->get();

                $filterEmpresas = Empresa::where('empresa__empresas.nombre', 'LIKE', trim('%' . Input::get('inputSearch')) . '%')->get();

                $allItems = $filterArticulos->merge($filterEventos ?: collect())
                                            ->merge($filterPromociones ?: collect())
                                            ->merge($filterEmpresas ?: collect());

                $currentPage = \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage();
                $perPage = 10;
                $currentPageItems = $allItems->slice(($currentPage - 1) * $perPage, $perPage);

                $results = new LengthAwarePaginator(
                  $allItems->slice(($currentPage - 1) * $perPage, $perPage), 
                  $allItems->count(), 
                  $perPage, 
                  $currentPage, [
                    'path'  => $request->url(),
                    'query' => $request->query(),
                ]);

                return view('filtro', compact('results'));

            }
        }

    }

}
