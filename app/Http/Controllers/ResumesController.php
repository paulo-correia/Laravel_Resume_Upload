<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ResumesController extends Controller
{

    public function index()
    {
        return view('incluir_curriculo');
    }

    public function getIp()
    {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key)
        {
            if (array_key_exists($key, $_SERVER) === true) 
            {
                foreach (explode(',', $_SERVER[$key]) as $ip)
                {
                    $ip = trim($ip); 
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false)
                    {
                        return $ip;
                    }
                }
            }
        }
    }

    public function store(Request $request)
    {

	     $this->validate($request, [
		   'name' => 'required|max:255',
           'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
           'phone' => 'required|min:6',
           'desired_job' => 'required',
           'education' => 'required',
           'comments' => 'nullable',
           'filename' => 'required|file|max:1024|mimes:doc,docx,pdf',
           ]);

        $name = $request->get('name');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $desired_job = $request->get('desired_job');
        $education = $request->get('education');
        $comments = $request->get('comments');
        $filename = $request->get('filename');
        $ip_address = $this->getIp() ?? request()->ip();
        $send_at = Carbon::now();

        if($file = $request->hasFile('filename')) {
            
            $file = $request->file('filename') ;
            
            $fileName = $send_at."-".str_replace (" ", "_", $name)."-".$file->getClientOriginalName() ;
            $destinationPath = public_path().'/curriculos/' ;
            $file->move($destinationPath,$fileName);
            $filename = $fileName ;
        }


        
        DB::table('resumes')->insert(
            ['name' => $name,
             'email' => $email,
             'phone' => $phone,
             'desired_job' => $desired_job,
             'education' => $education,
             'comments' => $comments,
             'filename' => $filename,
             'ip_address' => $ip_address,
             'send_at' => $send_at
             ]
        );

        $message = "Nome: ".$name."\r\n";
        $message .= "Email: ".$email."\r\n";
        $message .= "Telefone: ".$phone."\r\n";
        $message .= "Cargo Desejado: ".$desired_job."\r\n";
        $message .= "Escolaridade: ".$education."\r\n";
        $message .= "Observacoes: ".$comments."\r\n";
        $message .= "Arquivo: ".$filename."\r\n";
        $message .= "Enviado pelo IP: ".$ip_address."\r\n";
        $message .= "Enviado em: ".$send_at;

        $from = env('MAIL_FROM_ADDRESS');

        mail( $from, "Envio de Curriculo", $message);

        return view('incluir_curriculo')->with('success', 'Curriculo Enviado com sucesso');
     }



}