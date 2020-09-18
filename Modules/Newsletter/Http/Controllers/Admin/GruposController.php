<?php namespace Modules\Newsletter\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Newsletter\Entities\Grupos;
use Modules\Newsletter\Repositories\GruposRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Newsletter\Http\Requests\GruposRequest;

class GruposController extends AdminBaseController
{
    /**
     * @var GruposRepository
     */
    private $grupos;

    public function __construct(GruposRepository $grupos)
    {
        parent::__construct();

        $this->grupos = $grupos;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $grupos = Grupos::orderBy('id','asc')->orderBy('nombre','desc')->get();

        return view('newsletter::admin.grupos.index', compact('grupos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('newsletter::admin.grupos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(GruposRequest $request)
    {
        $grupos = $this->grupos->create($request->all());

        flash()->success(trans('Grupo creado correctamente.', ['name' => trans('newsletter::grupos.title.grupos')]));

        return redirect()->route('admin.newsletter.grupos.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Grupos $grupos
     * @return Response
     */
    public function edit(Grupos $grupos)
    {
        return view('newsletter::admin.grupos.edit', compact('grupos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Grupos $grupos
     * @param  Request $request
     * @return Response
     */
    public function update(Grupos $grupos, GruposRequest $request)
    {
        $this->grupos->update($grupos, $request->all());

        flash()->success(trans('Grupo actualizado correctamente.', ['name' => trans('newsletter::grupos.title.grupos')]));

        return redirect()->route('admin.newsletter.grupos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Grupos $grupos
     * @return Response
     */
    public function destroy(Grupos $grupos)
    {
        $this->grupos->destroy($grupos);

        flash()->success(trans('Grupo eliminado satisfactoriamente.', ['name' => trans('newsletter::grupos.title.grupos')]));

        return redirect()->route('admin.newsletter.grupos.index');
    }
}
