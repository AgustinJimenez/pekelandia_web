<?php namespace Modules\Paises\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Paises\Entities\Pais;
use Modules\Paises\Repositories\PaisRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Paises\Http\Requests\PaisRequest;

class PaisController extends AdminBaseController
{
    /**
     * @var PaisRepository
     */
    private $pais;

    public function __construct(PaisRepository $pais)
    {
        parent::__construct();

        $this->pais = $pais;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$pais = $this->pais->all();
        $pais = Pais::orderBy('id','asc')->orderBy('nombre')->get();

        return view('paises::admin.pais.index', compact('pais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('paises::admin.pais.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(PaisRequest $request)
    {
        $pais = $this->pais->create($request->all());

        flash()->success(trans('País creado correctamente.', ['name' => trans('paises::pais.title.pais')]));

        return redirect()->route('admin.paises.pais.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Pais $pais
     * @return Response
     */
    public function edit(Pais $pais)
    {
        return view('paises::admin.pais.edit', compact('pais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Pais $pais
     * @param  Request $request
     * @return Response
     */
    public function update(Pais $pais, PaisRequest $request)
    {
        $this->pais->update($pais, $request->all());

        flash()->success(trans('País actualizado correctamente', ['name' => trans('paises::pais.title.pais')]));

        return redirect()->route('admin.paises.pais.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Pais $pais
     * @return Response
     */
    public function destroy(Pais $pais)
    {
        $this->pais->destroy($pais);

        flash()->success(trans('País eliminado satisfactoriamente.', ['name' => trans('paises::pais.title.pais')]));

        return redirect()->route('admin.paises.pais.index');
    }

    public function indexPaises()
    {
        return view('paises::admin.pais.indexPaises', compact(''));
    }
}
