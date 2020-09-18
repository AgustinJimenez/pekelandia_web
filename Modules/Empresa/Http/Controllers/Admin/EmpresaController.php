<?php namespace Modules\Empresa\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Empresa\Entities\Empresa;
use Modules\Empresa\Repositories\EmpresaRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Categoria\Entities\Categoria;
use Modules\Categoria\Entities\Subcategoria;
use Modules\Categoria\Entities\Subsubcategoria;
use Modules\Empresa\Http\Requests\EmpresaRequest;
use Modules\Media\Repositories\FileRepository;
use Modules\Empresa\Events\EmpresaWasCreated;
use Modules\Paises\Entities\Ciudad;
use Modules\Paises\Entities\Pais;

class EmpresaController extends AdminBaseController
{
    /**
     * @var EmpresaRepository
     */
    private $empresa;

    public function __construct(EmpresaRepository $empresa)
    {
        parent::__construct();

        $this->empresa = $empresa;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$empresas = $this->empresa->all();
        $empresas = Empresa::orderBy('id','asc')->orderBy('nombre')->get();

        return view('empresa::admin.empresas.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categorias = Categoria::orderBy('nombre')->get();
        //$subcategorias=Subcategoria::orderBy('nombre')->lists('nombre','id')->all();
        $subcategorias=Subcategoria::orderBy('nombre')->get();
        //$subsubcategorias=Subsubcategoria::orderBy('nombre')->lists('nombre','id')->all();
        $subsubcategorias=Subsubcategoria::orderBy('nombre')->get();
        $ciudades=Ciudad::orderBy('nombre')->get();
        $paises=Pais::orderBy('nombre')->get();

        return view('empresa::admin.empresas.create',compact('categorias','subcategorias','subsubcategorias','ciudades','paises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(EmpresaRequest $request)
    {

        //dd($request->all());
        //dd($request->except(['categoria_id']));

        try {
            // $empresa = $this->empresa->create($request->all());
            $empresa = $this->empresa->create($request->except(['categoria_id']));

            flash()->success(trans('Empresa creada correctamente.', ['name' => trans('empresa::empresas.title.empresas')]));

            return redirect()->route('admin.empresa.empresa.index');

        } catch (\Illuminate\Database\QueryException $e) {

            //23000 sql code for integrity constraint violation
            if($e->getCode() == "23000"){

                flash()->error('Error al crear la empresa, debe elegir una subsubcategoria.', ['name' => trans('empresa::empresas.title.empresas')]);
                    //MENSAJE DE ERROR
                
                return redirect()->back();
            }

        }

        event(new EmpresaWasCreated($empresa, $request->all()));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Empresa $empresa
     * @return Response
     */
    public function edit(Empresa $empresa, FileRepository $FileRepository)
    {
        $categorias = Categoria::orderBy('nombre')->get();
        //$subcategorias=Subcategoria::orderBy('nombre')->lists('nombre','id')->all();
        //$subsubcategorias=Subsubcategoria::orderBy('nombre')->lists('nombre','id')->all();
        $subcategorias=Subcategoria::orderBy('nombre')->get();
        $subsubcategorias=Subsubcategoria::orderBy('nombre')->get();
        $ciudades=Ciudad::orderBy('nombre')->get();
        $paises=Pais::orderBy('nombre')->get();

        $imagen = $FileRepository->findFileByZoneForEntity('imagen', $empresa);

        return view('empresa::admin.empresas.edit', compact('empresa','categorias','subcategorias','subsubcategorias','imagen','ciudades','paises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Empresa $empresa
     * @param  Request $request
     * @return Response
     */
    public function update(Empresa $empresa, EmpresaRequest $request)
    {
        try {
            $this->empresa->update($empresa, $request->except(['categoria_id']));

            flash()->success(trans('Empresa actualizada correctamente.', ['name' => trans('empresa::empresas.title.empresas')]));

            return redirect()->route('admin.empresa.empresa.index');

        } catch (\Illuminate\Database\QueryException $e) {

            //23000 sql code for integrity constraint violation
            if($e->getCode() == "23000"){

            flash()->error('Error al actualizar la empresa, debe elegir una subsubcategoria.', ['name' => trans('empresa::empresas.title.empresas')]);
                //MENSAJE DE ERROR
            return redirect()->back();

            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Empresa $empresa
     * @return Response
     */
    public function destroy(Empresa $empresa)
    {
        $this->empresa->destroy($empresa);

        flash()->success(trans('Empresa eliminada satisfactoriamente.', ['name' => trans('empresa::empresas.title.empresas')]));

        return redirect()->route('admin.empresa.empresa.index');
    }
}
