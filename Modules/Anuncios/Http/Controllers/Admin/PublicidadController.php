<?php namespace Modules\Anuncios\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Anuncios\Entities\Publicidad;
use Modules\Anuncios\Repositories\PublicidadRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Anuncios\Http\Requests\PublicidadRequest;

class PublicidadController extends AdminBaseController
{
    /**
     * @var PublicidadRepository
     */
    private $publicidad;

    public function __construct(PublicidadRepository $publicidad)
    {
        parent::__construct();

        $this->publicidad = $publicidad;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $publicidads = Publicidad::orderBy('id','asc')->orderBy('orden','asc')->get();

        return view('anuncios::admin.publicidads.index', compact('publicidads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('anuncios::admin.publicidads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(PublicidadRequest $request)
    {
        $publicidad = $this->publicidad->create($request->all());

        flash()->success(trans('Publicidad creada correctamente.', ['name' => trans('anuncios::publicidads.title.publicidads')]));

        return redirect()->route('admin.anuncios.publicidad.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Publicidad $publicidad
     * @return Response
     */
    public function edit(Publicidad $publicidad)
    {
        return view('anuncios::admin.publicidads.edit', compact('publicidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Publicidad $publicidad
     * @param  Request $request
     * @return Response
     */
    public function update(Publicidad $publicidad, PublicidadRequest $request)
    {
        $this->publicidad->update($publicidad, $request->all());

        flash()->success(trans('Publicidad modificada correctamente.', ['name' => trans('anuncios::publicidads.title.publicidads')]));

        return redirect()->route('admin.anuncios.publicidad.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Publicidad $publicidad
     * @return Response
     */
    public function destroy(Publicidad $publicidad)
    {
        $this->publicidad->destroy($publicidad);

        flash()->success(trans('Publicidad eliminada satisfactoriamente', ['name' => trans('anuncios::publicidads.title.publicidads')]));

        return redirect()->route('admin.anuncios.publicidad.index');
    }
}
