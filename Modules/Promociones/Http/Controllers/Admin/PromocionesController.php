<?php namespace Modules\Promociones\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Promociones\Entities\Promociones;
use Modules\Promociones\Repositories\PromocionesRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Promociones\Http\Requests\PromocionesRequest;
use Modules\Media\Repositories\FileRepository;
use Modules\Promociones\Events\PromocionesWasCreated;

class PromocionesController extends AdminBaseController
{
    /**
     * @var PromocionesRepository
     */
    private $promociones;

    public function __construct(PromocionesRepository $promociones)
    {
        parent::__construct();

        $this->promociones = $promociones;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $promociones = Promociones::orderBy('id','asc')->orderBy('created_at','asc')->get();

        return view('promociones::admin.promociones.index', compact('promociones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('promociones::admin.promociones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(PromocionesRequest $request)
    {
        $promociones = $this->promociones->create($request->all());

        event(new PromocionesWasCreated($promociones, $request->all()));

        flash()->success(trans('Promoción creada correctamente.', ['name' => trans('promociones::promociones.title.promociones')]));

        return redirect()->route('admin.promociones.promociones.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Promociones $promociones
     * @return Response
     */
    public function edit(Promociones $promociones, FileRepository $FileRepository)
    {
        $imagen = $FileRepository->findFileByZoneForEntity('imagen', $promociones);

        return view('promociones::admin.promociones.edit', compact('promociones','imagen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Promociones $promociones
     * @param  Request $request
     * @return Response
     */
    public function update(Promociones $promociones, PromocionesRequest $request)
    {
        $this->promociones->update($promociones, $request->all());

        flash()->success(trans('Promoción modificada correctamente.', ['name' => trans('promociones::promociones.title.promociones')]));

        return redirect()->route('admin.promociones.promociones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Promociones $promociones
     * @return Response
     */
    public function destroy(Promociones $promociones)
    {
        $this->promociones->destroy($promociones);

        flash()->success(trans('Promoción eliminada satisfactoriamente.', ['name' => trans('promociones::promociones.title.promociones')]));

        return redirect()->route('admin.promociones.promociones.index');
    }
}
