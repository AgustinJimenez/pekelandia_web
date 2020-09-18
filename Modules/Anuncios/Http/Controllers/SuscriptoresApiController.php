<?php namespace Modules\Anuncios\Http\Controllers;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Anuncios\Entities\Suscriptores;
use Modules\Anuncios\Repositories\SuscriptoresRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Illuminate\Support\Facades\Log;
use Validator;
use Input;
use Mail;
use Session;
use Redirect;

class SuscriptoresApiController extends AdminBaseController
{
	public function suscriptoresSubmit(Request $request)
    {
		//we check if it's really an AJAX request
		if($request->isMethod('post')) {

			$validation = Validator::make(Input::all(), array(
			  //email field should be required, should be in an email//format, and should be unique
			  'nombre' => 'required',
			  'telefono' => 'required',
			  'email' => 'required|email',
			  'imagen' => 'required'
			));

			if($validation->fails()) {
			  return redirect()->back()->with('Error',
			  	'<div class="nicdark_alerts nicdark_bg_red nicdark_radius nicdark_shadow" style="margin-top:10px;">
	    		<p class="white nicdark_size_medium">
	    		<i class="icon-cancel-circled-outline iconclose"></i>&nbsp;&nbsp;&nbsp;
	    		<strong>Hubo un error en la suscripción, revise que todos los campos estén completos.</strong></p>
	    		<i class="icon-cancel-outline nicdark_iconbg right medium red"></i>
				</div>');
			} else {

			  $nombre = Input::get('nombre');
			  $telefono = Input::get('telefono');
			  $email = Input::get('email');
			  $imagen = Input::file('imagen');
			  $plan = Input::get('plan');
			  $comentario = Input::get('comentario');
			  $secciones = Input::get('secciones');
			  $precio = Input::get('precio');

			  $create = Suscriptores::create([
			  	'nombre' => $nombre,
			  	'telefono' => $telefono,
			    'email' => $email
			  ]);

			//MENSAJE DE CONFIRMACIÓN AL CLIENTE
			$asunto = 'Suscripción para publicar tu anuncio en Pekelandia';
            $contenido = [
            'asunto' => $asunto,
            'nombre' => $nombre, 
            'telefono' => $telefono, 
            'email' => $email,
            'plan' => $plan,
            'comentario' => $comentario,
            'secciones' => $secciones,
            'precio' => $precio
            ];

            Mail::queue('registro',$contenido, function($msj) use ($asunto, $email, $imagen){
                $msj->subject($asunto);
                $msj->to($email)->cc('info@legabe.com');
                $msj->attach($imagen->getRealPath(), array(
			        'as' => 'imagen.' . $imagen->getClientOriginalExtension(), 
			        'mime' => $imagen->getMimeType()) 
                	);
            });

			  //If successful, we will be returning the '1' so the form//understands it's successful
			  //or if we encountered an unsuccessful creation attempt,return its info
			  return redirect()->back()->with('Mensaje',
			  	'<div class="nicdark_alerts nicdark_bg_green nicdark_radius nicdark_shadow" style="margin-top:10px;">
	    		<p class="white nicdark_size_medium">
	    		<i class="icon-cancel-circled-outline iconclose"></i>&nbsp;&nbsp;&nbsp;
	    		<strong>Se ha suscrito correctamente. Un mensaje de confirmación le llegará a su correo.</strong></p>
	    		<i class="icon-ok-outline nicdark_iconbg right medium green"></i>
				</div>');


			}

		}

    }
}