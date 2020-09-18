<?php namespace Modules\Anuncios\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Anuncios\Entities\Suscriptores;
use Modules\Anuncios\Repositories\SuscriptoresRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Anuncios\Http\Requests\SuscriptoresRequest;

class SuscriptoresController extends AdminBaseController
{
    /**
     * @var SuscriptoresRepository
     */
    private $suscriptores;

    public function __construct(SuscriptoresRepository $suscriptores)
    {
        parent::__construct();

        $this->suscriptores = $suscriptores;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $suscriptores = Suscriptores::orderBy('id')->get();

        return view('anuncios::admin.suscriptores.index', compact('suscriptores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('anuncios::admin.suscriptores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(SuscriptoresRequest $request)
    {
        $suscriptores = $this->suscriptores->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('anuncios::suscriptores.title.suscriptores')]));

        return redirect()->route('admin.anuncios.suscriptores.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Suscriptores $suscriptores
     * @return Response
     */
    public function edit(Suscriptores $suscriptores)
    {
        return view('anuncios::admin.suscriptores.edit', compact('suscriptores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Suscriptores $suscriptores
     * @param  Request $request
     * @return Response
     */
    public function update(Suscriptores $suscriptores, SuscriptoresRequest $request)
    {
        $this->suscriptores->update($suscriptores, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('anuncios::suscriptores.title.suscriptores')]));

        return redirect()->route('admin.anuncios.suscriptores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Suscriptores $suscriptores
     * @return Response
     */
    public function destroy(Suscriptores $suscriptores)
    {
        $this->suscriptores->destroy($suscriptores);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('anuncios::suscriptores.title.suscriptores')]));

        return redirect()->route('admin.anuncios.suscriptores.index');
    }
}
