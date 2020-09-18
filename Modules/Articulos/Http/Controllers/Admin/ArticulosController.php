<?php namespace Modules\Articulos\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Articulos\Entities\Articulos;
use Modules\Articulos\Repositories\ArticulosRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Articulos\Http\Requests\ArticulosRequest;
use Modules\Media\Repositories\FileRepository;
use Modules\Articulos\Events\ArticulosWasCreated;

class ArticulosController extends AdminBaseController
{
    /**
     * @var ArticulosRepository
     */
    private $articulos;

    public function __construct(ArticulosRepository $articulos)
    {
        parent::__construct();

        $this->articulos = $articulos;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //CAMBIO STASH

        $articulos = Articulos::orderBy('id','ASC')->get();

        return view('articulos::admin.articulos.index', compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('articulos::admin.articulos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(ArticulosRequest $request)
    {
        $articulos = $this->articulos->create($request->all());

        event(new ArticulosWasCreated($articulos, $request->all()));

        flash()->success(trans('Artículo creado correctamente.', ['name' => trans('articulos::articulos.title.articulos')]));

        return redirect()->route('admin.articulos.articulos.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Articulos $articulos
     * @return Response
     */
    public function edit(Articulos $articulos, FileRepository $FileRepository)
    {
        $imagen = $FileRepository->findFileByZoneForEntity('imagen', $articulos);

        return view('articulos::admin.articulos.edit', compact('articulos','imagen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Articulos $articulos
     * @param  Request $request
     * @return Response
     */
    public function update(Articulos $articulos, ArticulosRequest $request)
    {
        $this->articulos->update($articulos, $request->all());

        flash()->success(trans('Artículo modificado correctamente.', ['name' => trans('articulos::articulos.title.articulos')]));

        return redirect()->route('admin.articulos.articulos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Articulos $articulos
     * @return Response
     */
    public function destroy(Articulos $articulos)
    {
        $this->articulos->destroy($articulos);

        flash()->success(trans('Artículo eliminado satisfactoriamente.', ['name' => trans('articulos::articulos.title.articulos')]));

        return redirect()->route('admin.articulos.articulos.index');
    }
}
