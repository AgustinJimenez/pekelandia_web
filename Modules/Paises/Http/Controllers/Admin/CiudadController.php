<?php namespace Modules\Paises\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Paises\Entities\Ciudad;
use Modules\Paises\Repositories\CiudadRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Paises\Entities\Pais;
use Modules\Paises\Http\Requests\CiudadRequest;

class CiudadController extends AdminBaseController
{
    /**
     * @var CiudadRepository
     */
    private $ciudad;

    public function __construct(CiudadRepository $ciudad)
    {
        parent::__construct();

        $this->ciudad = $ciudad;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$ciudads = $this->ciudad->all();
        $ciudads = Ciudad::orderBy('id','asc')->orderBy('nombre')->get();

        return view('paises::admin.ciudads.index', compact('ciudads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $paises=Pais::orderBy('nombre')->lists('nombre','id')->all();

        return view('paises::admin.ciudads.create',compact('paises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(CiudadRequest $request)
    {
        $ciudad = $this->ciudad->create($request->all());

        flash()->success(trans('Ciudad creada correctamente.', ['name' => trans('paises::ciudads.title.ciudads')]));

        return redirect()->route('admin.paises.ciudad.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Ciudad $ciudad
     * @return Response
     */
    public function edit(Ciudad $ciudad)
    {
        $paises=Pais::orderBy('nombre')->lists('nombre','id')->all();

        return view('paises::admin.ciudads.edit', compact('ciudad','paises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Ciudad $ciudad
     * @param  Request $request
     * @return Response
     */
    public function update(Ciudad $ciudad, CiudadRequest $request)
    {
        $this->ciudad->update($ciudad, $request->all());

        flash()->success(trans('Ciudad actualizada correctamente.', ['name' => trans('paises::ciudads.title.ciudads')]));

        return redirect()->route('admin.paises.ciudad.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Ciudad $ciudad
     * @return Response
     */
    public function destroy(Ciudad $ciudad)
    {
        $this->ciudad->destroy($ciudad);

        flash()->success(trans('Ciudad eliminada satisfactoriamente.', ['name' => trans('paises::ciudads.title.ciudads')]));

        return redirect()->route('admin.paises.ciudad.index');
    }
}
