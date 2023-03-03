<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormularioPostulacion extends Model
{
    use HasFactory;

    protected $table = 'formularios';

    public function tipo_servicio(){
        return $this->belongsTo(TipoServicio::class, 'remoto_id', 'id');
    }

    public function tipo_documento(){
        return $this->belongsTo(Postulante::class, 'documento_id','tipo_documento_id');
    }

    public function postulantes(){
        return $this->belongsTo(Postulante::class, 'postulante_id','id');
    }

    public function tipo_estado(){
        return $this->belongsTo(TipoEstado::class, 'estado_id','id');
    }

}
