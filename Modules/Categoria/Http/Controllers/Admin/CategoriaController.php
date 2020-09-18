<?php namespace Modules\Categoria\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Categoria\Entities\Categoria;
use Modules\Categoria\Repositories\CategoriaRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Categoria\Http\Requests\CategoriaRequest;

class CategoriaController extends AdminBaseController
{
    /**
     * @var CategoriaRepository
     */
    private $categoria;

    public function __construct(CategoriaRepository $categoria)
    {
        parent::__construct();

        $this->categoria = $categoria;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$categorias = $this->categoria->all();
        $categorias = Categoria::orderBy('id','ASC')->get();

        return view('categoria::admin.categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('categoria::admin.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(CategoriaRequest $request)
    {
        //$this->categoria->create($request->all());
        $categoria = $this->categoria->create($request->all());

        flash()->success(trans('Categoria creada correctamente.', ['name' => trans('categoria::categorias.title.categorias')]));

        return redirect()->route('admin.categoria.categoria.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Categoria $categoria
     * @return Response
     */
    public function edit(Categoria $categoria)
    {
        return view('categoria::admin.categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Categoria $categoria
     * @param  Request $request
     * @return Response
     */
    public function update(Categoria $categoria, CategoriaRequest $request)
    {
        $this->categoria->update($categoria, $request->all());

        flash()->success(trans('Categoria actualizada correctamente.', ['name' => trans('categoria::categorias.title.categorias')]));

        return redirect()->route('admin.categoria.categoria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Categoria $categoria
     * @return Response
     */
    public function destroy(Categoria $categoria)
    {

        try {
            $this->categoria->destroy($categoria);
            flash()->success(trans('Categoria eliminada satisfactoriamente.', ['name' => trans('categoria::subcategorias.title.subcategorias')]));
            return redirect()->route('admin.categoria.subcategoria.index');
        } 
        catch (\Illuminate\Database\QueryException $e) {

            //23000 sql code for integrity constraint violation
            if($e->getCode() == "23000"){

                flash()->error('Error al eliminar, la categoria tiene hijos.', ['name' => trans('categoria::subcategorias.title.subcategorias')]);
                    //MENSAJE DE ERROR
                    
                return redirect()->back();

            }
        }

        return redirect()->route('admin.categoria.categoria.index');
    }


    public function indexCategorias()
    {
        return view('categoria::admin.categorias.indexCategoria', compact(''));
    }

}
