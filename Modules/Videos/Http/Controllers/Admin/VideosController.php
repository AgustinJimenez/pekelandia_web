<?php namespace Modules\Videos\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Videos\Entities\Videos;
use Modules\Videos\Repositories\VideosRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Videos\Http\Requests\VideosRequest;

class VideosController extends AdminBaseController
{
    /**
     * @var VideosRepository
     */
    private $videos;

    public function __construct(VideosRepository $videos)
    {
        parent::__construct();

        $this->videos = $videos;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $videos = Videos::orderBy('id','asc')->orderBy('created_at','asc')->get();

        return view('videos::admin.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('videos::admin.videos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(VideosRequest $request)
    {
        $videos = $this->videos->create($request->all());

        flash()->success(trans('Video creado correctamente.', ['name' => trans('videos::videos.title.videos')]));

        return redirect()->route('admin.videos.videos.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Videos $videos
     * @return Response
     */
    public function edit(Videos $videos)
    {
        return view('videos::admin.videos.edit', compact('videos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Videos $videos
     * @param  Request $request
     * @return Response
     */
    public function update(Videos $videos, VideosRequest $request)
    {
        $this->videos->update($videos, $request->all());

        flash()->success(trans('Video actualizado correctamente.', ['name' => trans('videos::videos.title.videos')]));

        return redirect()->route('admin.videos.videos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Videos $videos
     * @return Response
     */
    public function destroy(Videos $videos)
    {
        $this->videos->destroy($videos);

        flash()->success(trans('Video eliminado satisfactoriamente.', ['name' => trans('videos::videos.title.videos')]));

        return redirect()->route('admin.videos.videos.index');
    }
}
