<?php

namespace App\Services;

class PermisosService
{
    /**
    * Obtiene permisos de acuerdo a el servicio.
    *
    * @param int $idTrabaja
    * @param int $idAplicacion
    * @param int $idServicio
    * @return \Illuminate\Http\Response
    */
    public function getPermisosxServicio($idTrabaja, $idAplicacion, $idServicio)
    {
        $url = config('auth-pkg.permisos_servicios')."$idTrabaja/$idAplicacion/$idServicio";
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url
        ]);
        $perSer = json_decode(curl_exec($curl), true); // Execute
        curl_close($curl); // Close cURL handle
        return $perSer;
    }

    /**
    * Obtiene permisos de acuerdo a la funcion y por servicio.
    *
    * @param int $idTrabaja
    * @param int $idFuncion
    * @param int $idServicio
    * @return \Illuminate\Http\Response
    */
    public function getPermisoxFuncxSer($idTrabaja, $idFuncion, $idServicio)
    {
        $idApp = env('APP_ID');
        $perxSer = $this->getPermisosxServicio($idTrabaja, $idApp, $idServicio);
        return $perxSer[$idFuncion];
    }

    /**
    * Obtiene permisos de acuerdo a la funcion.
    *
    * @param int $idTrabaja
    * @param int $idFuncion
    * @return \Illuminate\Http\Response
    */
    public function getPermisosxFuncion($idTrabaja, $idFuncion)
    {
        $url = config('auth-pkg.permisos_funcion')."$idTrabaja/$idFuncion";
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url
        ]);
        $perFunc = json_decode(curl_exec($curl), true); // Execute
        curl_close($curl); // Close cURL handle
        return $perFunc;
    }
}
