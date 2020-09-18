<?php namespace Modules\Anuncios\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Anuncios\Entities\Anuncios;
use Modules\Anuncios\Repositories\AnunciosRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Anuncios\Http\Requests\AnunciosRequest;
use Modules\Media\Repositories\FileRepository;
use Modules\Anuncios\Events\AnunciosWasCreated;

class AnunciosController extends AdminBaseController
{
    /**
     * @var AnunciosRepository
     */
    private $anuncios;

    public function __construct(AnunciosRepository $anuncios)
    {
        parent::__construct();

        $this->anuncios = $anuncios;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $anuncios = Anuncios::orderBy('id','asc')->orderBy('vista','asc')->orderBy('orden','ASC')->get();

        return view('anuncios::admin.anuncios.index', compact('anuncios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('anuncios::admin.anuncios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(AnunciosRequest $request)
    {
        $anuncios = $this->anuncios->create($request->all());

        event(new AnunciosWasCreated($anuncios, $request->all()));

        flash()->success(trans('Anuncio creado correctamente.', ['name' => trans('anuncios::anuncios.title.anuncios')]));

        return redirect()->route('admin.anuncios.anuncios.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Anuncios $anuncios
     * @return Response
     */
    public function edit(Anuncios $anuncios, FileRepository $FileRepository)
    {
        $imagen = $FileRepository->findFileByZoneForEntity('imagen', $anuncios);

        return view('anuncios::admin.anuncios.edit', compact('anuncios','imagen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Anuncios $anuncios
     * @param  Request $request
     * @return Response
     */
    public function update(Anuncios $anuncios, AnunciosRequest $request)
    {
        $this->anuncios->update($anuncios, $request->all());

        flash()->success(trans('Anuncio modificado correctamente.', ['name' => trans('anuncios::anuncios.title.anuncios')]));

        return redirect()->route('admin.anuncios.anuncios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Anuncios $anuncios
     * @return Response
     */
    public function destroy(Anuncios $anuncios)
    {
        $this->anuncios->destroy($anuncios);

        flash()->success(trans('Anuncio eliminado satisfactoriamente.', ['name' => trans('anuncios::anuncios.title.anuncios')]));

        return redirect()->route('admin.anuncios.anuncios.index');
    }
}
