<?php namespace Modules\Empresa\Http\Controllers;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Empresa\Entities\Empresa;
use Modules\Empresa\Repositories\EmpresaRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Categoria\Entities\Subcategoria;
use Modules\Categoria\Entities\Subsubcategoria;
use Modules\Empresa\Http\Requests\EmpresaRequest;
use Modules\Media\Repositories\FileRepository;
use Modules\Empresa\Events\EmpresaWasCreated;
use Illuminate\Support\Facades\Log;

class EmpresaApiController extends AdminBaseController
{
	public function tieneHijos(Request $request)
    {
    	//dd($request->get('subcategoria_id'));
        if($subcategorias=Subcategoria::where('id', $request->get('subcategoria_id'))->where('tiene_hijos', true)->exists())
        {
            return response()->json(['msg' => true]);
        }

        return response()->json(['msg' => false]);

    }
}