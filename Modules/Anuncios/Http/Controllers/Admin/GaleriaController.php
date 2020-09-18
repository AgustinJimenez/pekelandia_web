<?php namespace Modules\Anuncios\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Anuncios\Entities\Galeria;
use Modules\Anuncios\Repositories\GaleriaRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Anuncios\Http\Requests\GaleriaRequest;
use Modules\Media\Repositories\FileRepository;
use Modules\Anuncios\Events\GaleriaWasCreated;

class GaleriaController extends AdminBaseController
{
    /**
     * @var GaleriaRepository
     */
    private $galeria;

    public function __construct(GaleriaRepository $galeria)
    {
        parent::__construct();

        $this->galeria = $galeria;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $galerias = Galeria::orderBy('id','asc')->orderBy('orden','asc')->get();

        return view('anuncios::admin.galerias.index', compact('galerias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('anuncios::admin.galerias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $galeria = $this->galeria->create($request->all());

        event(new GaleriaWasCreated($galeria, $request->all()));

        flash()->success(trans('Galería creada correctamente.', ['name' => trans('anuncios::galerias.title.galerias')]));

        return redirect()->route('admin.anuncios.galeria.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Galeria $galeria
     * @return Response
     */
    public function edit(Galeria $galeria, FileRepository $FileRepository)
    {
        $imagen = $FileRepository->findFileByZoneForEntity('imagen', $galeria);

        return view('anuncios::admin.galerias.edit', compact('galeria','imagen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Galeria $galeria
     * @param  Request $request
     * @return Response
     */
    public function update(Galeria $galeria, Request $request)
    {
        $this->galeria->update($galeria, $request->all());

        flash()->success(trans('Galería modificada correctamente.', ['name' => trans('anuncios::galerias.title.galerias')]));

        return redirect()->route('admin.anuncios.galeria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Galeria $galeria
     * @return Response
     */
    public function destroy(Galeria $galeria)
    {
        $this->galeria->destroy($galeria);

        flash()->success(trans('Galería eliminada satisfactoriamente.', ['name' => trans('anuncios::galerias.title.galerias')]));

        return redirect()->route('admin.anuncios.galeria.index');
    }
}
