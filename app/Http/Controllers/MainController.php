<?php

namespace App\Http\Controllers;
use App\Services\PermisosService;
use Illuminate\Http\Request;


class MainController extends Controller
{
    private $permisosService;
    
    public function __construct(PermisosService $permisosService)
    {
        $this->permisosService = $permisosService;
    }
    
    public function index()
    {
        $value = Session('idUsu');
        $permisos = $this->permisosService->getPermisosxServicio(
            session()->get('idTrabaja'),
            session()->get('idApp'),
            session()->get('idServ')
        );

        session(['permisos' => $permisos]);
        
       return view('layouts.inicio');
        
        
    }
    /**
     * Cierra Sesión.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        session()->flush();
        return redirect(config('app.auth_url').'/logout');
        //return redirect(env('AUTENTICACION_URL') . '/logout');
    }
}
