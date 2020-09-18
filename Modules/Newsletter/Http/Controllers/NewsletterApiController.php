<?php namespace Modules\Newsletter\Http\Controllers;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Newsletter\Entities\Emails;
use Modules\Newsletter\Repositories\EmailsRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Newsletter\Entities\Grupos;
use Illuminate\Support\Facades\Log;
use Validator;
use Input;

class NewsletterApiController extends AdminBaseController
{
	public function newsletterSubmit(Request $request)
    {
		//we check if it's really an AJAX request
		if($request->isMethod('post')) {

		$validation = Validator::make(Input::all(), array(
		  //email field should be required, should be in an email//format, and should be unique
		  'email' => 'required|email',
		  'nombre' => 'required'
		));

		if($validation->fails()) {
		  return redirect()->back()->with('Error',
		  	'<div class="nicdark_alerts nicdark_bg_red nicdark_radius nicdark_shadow" style="margin-top:10px;">
    		<p class="white nicdark_size_medium">
    		<i class="icon-cancel-circled-outline iconclose"></i>&nbsp;&nbsp;&nbsp;
    		<strong>Hubo un error en el guardado, revise que todos los campos estén completos.</strong></p>
    		<i class="icon-cancel-outline nicdark_iconbg right medium red"></i>
			</div>');
		} else {

		  $create = Emails::create([
		    'email' => Input::get('email'),
		    'nombre' => Input::get('nombre'),
		    'grupo_id' => Input::get('grupo_id')
		  ]);

		  //If successful, we will be returning the '1' so the form//understands it's successful
		  //or if we encountered an unsuccessful creation attempt,return its info
		  return redirect()->back()->with('Mensaje',
		  	'<div class="nicdark_alerts nicdark_bg_green nicdark_radius nicdark_shadow" style="margin-top:10px;">
    		<p class="white nicdark_size_medium">
    		<i class="icon-cancel-circled-outline iconclose"></i>&nbsp;&nbsp;&nbsp;
    		<strong>Te has suscrito correctamente a nuestro boletín.</strong></p>
    		<i class="icon-ok-outline nicdark_iconbg right medium green"></i>
			</div>');

		}

		}

    }
}