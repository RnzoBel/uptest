<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SSFichaSocial extends Model
{
   
    use HasFactory;
    protected $table = 'SSFichaSocial2';
    protected $connection = 'inter3';
    protected $primaryKey = "IdFiSoc";
    public $timestamps = false;
    //protected $fillable = [ 'title', 'body'];

    public function establecimiento()
	{
		return $this->belongsTo(Establecimiento::class, 'FiSocIdEst', 'EstablecimientoId');
    }
    
    public function profesional()
	{
		return $this->belongsTo(Profesional::class, 'FiSocIdUsu', 'IdPersona');
    }
    public function localidad()  
    {
        return $this->belongsTo(Localidad::class, 'FiSocIdLocBen', 'IdLoc');
    }
    public function locSolicitante()  
    {
        return $this->belongsTo(Localidad::class, 'FiSocSolIdLoc', 'IdLoc');
    }
    public function estadoCiv()  
    {
        return $this->belongsTo(EstadoCivil::class, 'FiSocIdEstCivBen', 'IdEstCiv');
    }
    public function estCivSol()  
    {
        return $this->belongsTo(EstadoCivil::class, 'IdEstCivSol', 'IdEstCiv');
    }
    public function nivelInstruccion()  
    {
        return $this->belongsTo(NivelInstruccion::class, 'FiSocIdNivInstBen', 'IdNivInt');
    }
    public function vinculo()  
    {
        return $this->belongsTo(Parentezco::class, 'FiSocIdVinculo', 'IdPar');
    }
    public function viviendaN()  
    {
        return $this->belongsTo(ViviendaN::class, 'IdFiSoc', 'IdFiSocFK');
    }
    public function setnia()  
    {
        return $this->belongsTo(Etnia::class, 'FiSocIdSocEtniaBen', 'IdFiSocEtnia');
    }


}
