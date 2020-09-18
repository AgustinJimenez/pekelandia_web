<?php namespace Modules\Newsletter\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Newsletter\Entities\Emails;
use Modules\Newsletter\Repositories\EmailsRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Newsletter\Entities\Grupos;
use Modules\Newsletter\Entities\Enviados;
use Modules\Newsletter\Http\Requests\EmailsRequest;
use Modules\Newsletter\Http\Requests\EnviadosRequest;
use Mail;
use Session;
use Redirect;

class EmailsController extends AdminBaseController
{
    /**
     * @var EmailsRepository
     */
    private $emails;

    public function __construct(EmailsRepository $emails)
    {
        parent::__construct();

        $this->emails = $emails;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $emails = Emails::orderBy('id','asc')->orderBy('created_at','desc')->get();

        return view('newsletter::admin.emails.index', compact('emails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $grupos = Grupos::orderBy('nombre')->get();

        return view('newsletter::admin.emails.create',compact('grupos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(EmailsRequest $request)
    {
        $emails = $this->emails->create($request->all());

        flash()->success(trans('Correo agregado correctamente.', ['name' => trans('newsletter::emails.title.emails')]));

        return redirect()->route('admin.newsletter.emails.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Emails $emails
     * @return Response
     */
    public function edit(Emails $emails)
    {
        $grupos = Grupos::orderBy('nombre')->get();

        return view('newsletter::admin.emails.edit', compact('emails','grupos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Emails $emails
     * @param  Request $request
     * @return Response
     */
    public function update(Emails $emails, EmailsRequest $request)
    {
        $this->emails->update($emails, $request->all());

        flash()->success(trans('Correo actualizado correctamente.', ['name' => trans('newsletter::emails.title.emails')]));

        return redirect()->route('admin.newsletter.emails.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Emails $emails
     * @return Response
     */
    public function destroy(Emails $emails)
    {
        $this->emails->destroy($emails);

        flash()->success(trans('Correo eliminado satisfactoriamente.', ['name' => trans('newsletter::emails.title.emails')]));

        return redirect()->route('admin.newsletter.emails.index');
    }

    public function createEmail()
    {
        return view('newsletter::admin.emails.createEmail', compact(''));
    }

    public function createEmailGrupo()
    {
        $grupos = Grupos::orderBy('nombre','asc')->get();

        return view('newsletter::admin.emails.createEmailGrupo', compact('grupos'));
    }

    public function emailsEnviados()
    {
        $enviados = Enviados::orderBy('id','desc')->orderBy('created_at','asc')->get();

        return view('newsletter::admin.emails.emailsEnviados', compact('enviados'));
    }

    public function detalleEmail($enviado)
    {

        $email = Enviados::where('id',$enviado)->first();

        if ($email->grupo_id != null) {
        
            if ($email->grupo->nombre != 'Todos') {

                $listemails = Emails::where('grupo_id',$email->grupo->id)->orderBy('id','ASC')->get();

            } else {

                $listemails = Emails::orderBy('id','ASC')->get();

            }

            return view('newsletter::admin.emails.detalleEmail', compact('email','listemails'));

        } else {

            return view('newsletter::admin.emails.detalleEmail', compact('email'));

        }

    }

    public function eliminarEmail($enviado)
    {
        
        Enviados::where('id', $enviado)->delete();

        flash()->success(trans('E-mail eliminado satisfactoriamente.', ['name' => trans('newsletter::emails.title.emails')]));

        return redirect()->back();
    }

    public function sendEmail(Request $request)
    {

            if ($request->has('grupo') && $request->get('grupo') == 'Todos') {

                $asunto = $request->get('asunto');
                $grupo_nombre = $request->get('grupo');
                $grupo = Grupos::where('nombre',$grupo_nombre)->first();
                $mensaje = $request->get('mensaje');

                $emails = Emails::all();
                $d = $emails->toArray();

                $e = array();
                for ($i=0; $i < count($d); $i++) { 
                    array_push($e, $d[$i]['email']);
                }

                $contenido = ['asunto' => $request->get('asunto'), 'mensaje' => $request->get('mensaje')];

                Mail::queue('template',$contenido, function($msj) use ($asunto, $e){
                    $msj->subject($asunto);
                    $msj->to($e);
                });
                
                /*foreach ($emails as $email) {
                   Enviados::create([
                    'asunto' => $asunto,
                    'mensaje' => $mensaje,
                    'grupo_id' => $email->grupo_id
                    ]);
                }*/

               Enviados::create([
                'asunto' => $asunto,
                'mensaje' => $mensaje,
                'grupo_id' => $grupo->id,
                'email' => ''
                ]);
                
                return redirect()->route('admin.newsletter.emails.emailsEnviados')->with('status', 'Mensaje enviado!');;

            } elseif ($request->has('grupo') && $request->get('grupo') !== 'Todos') {

                $asunto = $request->get('asunto');
                $grupo = $request->get('grupo');
                $mensaje = $request->get('mensaje');

                $emails = Emails::where('grupo_id',$grupo)->get(['email','grupo_id']);

                $d = $emails->toArray();

                $e = array();
                for ($i=0; $i < count($d); $i++) { 
                    array_push($e, $d[$i]['email']);
                }

                $contenido = ['asunto' => $request->get('asunto'), 'mensaje' => $request->get('mensaje')];

                Mail::queue('template',$contenido, function($msj) use ($asunto, $e){
                    $msj->subject($asunto);
                    $msj->to($e);
                });

                /*foreach ($emails as $email) {
                   Enviados::create([
                    'asunto' => $asunto,
                    'mensaje' => $mensaje,
                    'grupo_id' => $email->grupo_id
                    ]);
                }*/

               Enviados::create([
                'asunto' => $asunto,
                'mensaje' => $mensaje,
                'grupo_id' => $grupo,
                'email' => ''
                ]);
                
                return redirect()->route('admin.newsletter.emails.emailsEnviados')->with('status', 'Mensaje enviado!');;

            } else {

                $asunto = $request->get('asunto');
                $email = $request->get('email');
                $mensaje = $request->get('mensaje');

                if (Emails::where('email', $email)->exists()) {

                    $emails = Emails::where('email', $email)->first();

                    $contenido = ['asunto' => $request->get('asunto'), 'mensaje' => $request->get('mensaje')];

                    Mail::send('template',$contenido, function($msj) use ($asunto, $email){
                        $msj->subject($asunto);
                        $msj->to($email);
                    });

                    Enviados::create([
                        'asunto' => $asunto,
                        'mensaje' => $mensaje,
                        'email' => $email,
                        'grupo_id' => $emails->grupo_id
                    ]);

                } else {

                    $contenido = ['asunto' => $request->get('asunto'), 'mensaje' => $request->get('mensaje')];

                    Mail::send('template',$contenido, function($msj) use ($asunto, $email){
                        $msj->subject($asunto);
                        $msj->to($email);
                    });

                    Enviados::create([
                        'asunto' => $asunto,
                        'mensaje' => $mensaje,
                        'email' => $email,
                        'grupo_id' => null
                    ]);

                }

                return redirect()->route('admin.newsletter.emails.emailsEnviados')->with('status', 'Mensaje enviado!');;

            }

    }

}