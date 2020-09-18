<?php namespace Modules\Revistas\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Revistas\Entities\Revistas;
use Modules\Revistas\Repositories\RevistasRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Media\Repositories\FileRepository;
use Modules\Revistas\Http\Requests\RevistasRequest;
use Modules\Revistas\Events\RevistasWasCreated;

class RevistasController extends AdminBaseController
{
    /**
     * @var RevistasRepository
     */
    private $revistas;

    public function __construct(RevistasRepository $revistas)
    {
        parent::__construct();

        $this->revistas = $revistas;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $revistas = Revistas::orderBy('id','asc')->orderBy('titulo','asc')->get();

        return view('revistas::admin.revistas.index', compact('revistas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('revistas::admin.revistas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(RevistasRequest $request)
    {
        $revistas = $this->revistas->create($request->all());

        event(new RevistasWasCreated($revistas, $request->all()));

        flash()->success(trans('Revista creada correctamente.', ['name' => trans('revistas::revistas.title.revistas')]));

        return redirect()->route('admin.revistas.revistas.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Revistas $revistas
     * @return Response
     */
    public function edit(Revistas $revistas, FileRepository $FileRepository)
    {
        $imagen = $FileRepository->findFileByZoneForEntity('imagen', $revistas);

        return view('revistas::admin.revistas.edit', compact('revistas','imagen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Revistas $revistas
     * @param  Request $request
     * @return Response
     */
    public function update(Revistas $revistas, RevistasRequest $request)
    {
        $this->revistas->update($revistas, $request->all());

        flash()->success(trans('Revista actualizada correctamente.', ['name' => trans('revistas::revistas.title.revistas')]));

        return redirect()->route('admin.revistas.revistas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Revistas $revistas
     * @return Response
     */
    public function destroy(Revistas $revistas)
    {
        $this->revistas->destroy($revistas);

        flash()->success(trans('Revista eliminada satisfactoriamente.', ['name' => trans('revistas::revistas.title.revistas')]));

        return redirect()->route('admin.revistas.revistas.index');
    }
}
