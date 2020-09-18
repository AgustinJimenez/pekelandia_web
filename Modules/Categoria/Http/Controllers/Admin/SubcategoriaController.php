<?php namespace Modules\Categoria\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Categoria\Entities\Subcategoria;
use Modules\Categoria\Repositories\SubcategoriaRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Categoria\Entities\Categoria;
use Modules\Categoria\Http\Requests\SubcategoriaRequest;

class SubcategoriaController extends AdminBaseController
{
    /**
     * @var SubcategoriaRepository
     */
    private $subcategoria;

    public function __construct(SubcategoriaRepository $subcategoria)
    {
        parent::__construct();

        $this->subcategoria = $subcategoria;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$subcategorias = $this->subcategoria->all();
        $subcategorias = Subcategoria::orderBy('id','asc')->get();

        return view('categoria::admin.subcategorias.index', compact('subcategorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categorias=Categoria::orderBy('nombre')->lists('nombre','id')->all();

        return view('categoria::admin.subcategorias.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(SubcategoriaRequest $request)
    {
        $subcategoria = $this->subcategoria->create($request->all());

        flash()->success(trans('Subcategoria creada correctamente.', ['name' => trans('categoria::subcategorias.title.subcategorias')]));

        return redirect()->route('admin.categoria.subcategoria.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Subcategoria $subcategoria
     * @return Response
     */
    public function edit(Subcategoria $subcategoria)
    {
        $categorias=Categoria::orderBy('nombre')->get();

        return view('categoria::admin.subcategorias.edit', compact('subcategoria','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Subcategoria $subcategoria
     * @param  Request $request
     * @return Response
     */
    public function update(Subcategoria $subcategoria, SubcategoriaRequest $request)
    {
        $this->subcategoria->update($subcategoria, $request->all());

        flash()->success(trans('Subcategoria actualizada correctamente.', ['name' => trans('categoria::subcategorias.title.subcategorias')]));

        return redirect()->route('admin.categoria.subcategoria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Subcategoria $subcategoria
     * @return Response
     */
    public function destroy(Subcategoria $subcategoria)
    {

        try {
            $this->subcategoria->destroy($subcategoria);
            flash()->success(trans('Subcategoria eliminada satisfactoriamente.', ['name' => trans('categoria::subcategorias.title.subcategorias')]));
            return redirect()->route('admin.categoria.subcategoria.index');
        } 
        catch (\Illuminate\Database\QueryException $e) {

            //23000 sql code for integrity constraint violation
            if($e->getCode() == "23000"){

                flash()->error('Error al eliminar, la subcategoria tiene hijos.', ['name' => trans('categoria::subcategorias.title.subcategorias')]);
                    //MENSAJE DE ERROR
                    
                return redirect()->back();

            }
        }

        /*if ($subcategoria->tiene_hijos == 0) {

            $this->subcategoria->destroy($subcategoria);
            flash()->success(trans('Subcategoria eliminada satisfactoriamente.', ['name' => trans('categoria::subcategorias.title.subcategorias')]));
            return redirect()->route('admin.categoria.subcategoria.index');

        } else {

            flash()->error('Error al eliminar, la subcategoria tiene hijos.', ['name' => trans('categoria::subcategorias.title.subcategorias')]);
            return redirect()->route('admin.categoria.subcategoria.index');
        }*/
        
    }
}
