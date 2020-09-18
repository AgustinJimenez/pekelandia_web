<?php namespace Modules\Eventos\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Eventos\Entities\Eventos;
use Modules\Eventos\Repositories\EventosRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Eventos\Http\Requests\EventosRequest;
use Modules\Media\Repositories\FileRepository;
use Modules\Eventos\Events\EventosWasCreated;

class EventosController extends AdminBaseController
{
    /**
     * @var EventosRepository
     */
    private $eventos;

    public function __construct(EventosRepository $eventos)
    {
        parent::__construct();

        $this->eventos = $eventos;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $eventos = Eventos::orderBy('id','asc')->orderBy('fecha','asc')->get();
        /*dd($eventos);*/

        return view('eventos::admin.eventos.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('eventos::admin.eventos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(EventosRequest $request)
    {
        $eventos = $this->eventos->create($request->all());

        event(new EventosWasCreated($eventos, $request->all()));

        flash()->success(trans('Evento creado correctamente.', ['name' => trans('eventos::eventos.title.eventos')]));

        return redirect()->route('admin.eventos.eventos.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Eventos $eventos
     * @return Response
     */
    public function edit(Eventos $eventos, FileRepository $FileRepository)
    {
        $imagen = $FileRepository->findFileByZoneForEntity('imagen', $eventos);

        return view('eventos::admin.eventos.edit', compact('eventos','imagen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Eventos $eventos
     * @param  Request $request
     * @return Response
     */
    public function update(Eventos $eventos, EventosRequest $request)
    {
        $this->eventos->update($eventos, $request->all());

        flash()->success(trans('Evento modificado correctamente.', ['name' => trans('eventos::eventos.title.eventos')]));

        return redirect()->route('admin.eventos.eventos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Eventos $eventos
     * @return Response
     */
    public function destroy(Eventos $eventos)
    {
        $this->eventos->destroy($eventos);

        flash()->success(trans('Evento eliminado satisfactoriamente.', ['name' => trans('eventos::eventos.title.eventos')]));

        return redirect()->route('admin.eventos.eventos.index');
    }
}
