<?php namespace Modules\Categoria\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Categoria\Entities\Subsubcategoria;
use Modules\Categoria\Repositories\SubsubcategoriaRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Categoria\Entities\Subcategoria;
use Modules\Categoria\Http\Requests\SubsubcategoriaRequest;

class SubsubcategoriaController extends AdminBaseController
{
    /**
     * @var SubsubcategoriaRepository
     */
    private $subsubcategoria;

    public function __construct(SubsubcategoriaRepository $subsubcategoria)
    {
        parent::__construct();

        $this->subsubcategoria = $subsubcategoria;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$subsubcategorias = $this->subsubcategoria->all();
        $subsubcategorias = Subsubcategoria::orderBy('id','asc')->get();

        return view('categoria::admin.subsubcategorias.index', compact('subsubcategorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //$subcategorias=Subcategoria::orderBy('nombre')->lists('nombre','id')->all();
        $subcategorias=Subcategoria::where('tiene_hijos',1)->lists('nombre','id')->all();

        //dd($subcategorias);
        return view('categoria::admin.subsubcategorias.create',compact('subcategorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(SubsubcategoriaRequest $request)
    {
        $this->subsubcategoria->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('categoria::subsubcategorias.title.subsubcategorias')]));

        return redirect()->route('admin.categoria.subsubcategoria.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Subsubcategoria $subsubcategoria
     * @return Response
     */
    public function edit(Subsubcategoria $subsubcategoria)
    {
        $subcategorias=Subcategoria::where('tiene_hijos',1)->get();

        return view('categoria::admin.subsubcategorias.edit', compact('subsubcategoria', 'subcategorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Subsubcategoria $subsubcategoria
     * @param  Request $request
     * @return Response
     */
    public function update(Subsubcategoria $subsubcategoria, SubsubcategoriaRequest $request)
    {
        $this->subsubcategoria->update($subsubcategoria, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('categoria::subsubcategorias.title.subsubcategorias')]));

        return redirect()->route('admin.categoria.subsubcategoria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Subsubcategoria $subsubcategoria
     * @return Response
     */
    public function destroy(Subsubcategoria $subsubcategoria)
    {
              
        try {
            $this->subsubcategoria->destroy($subsubcategoria);
            flash()->success(trans('Subsubcategoria eliminada satisfactoriamente', ['name' => trans('categoria::subsubcategorias.title.subsubcategorias')]));
        } 
        catch (\Illuminate\Database\QueryException $e) {

            //23000 sql code for integrity constraint violation
            if($e->getCode() == "23000"){

                flash()->error('Error al eliminar, la categoria esta asociada a una empresa.', ['name' => trans('categoria::subcategorias.title.subcategorias')]);
                //MENSAJE DE ERROR
                
                return redirect()->back();
            }
        }

        //$this->subsubcategoria->destroy($subsubcategoria);

        return redirect()->route('admin.categoria.subsubcategoria.index');
    }
}
