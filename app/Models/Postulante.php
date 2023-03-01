<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    use HasFactory;

    public function tipo_documento(){
        return $this->belongsTo(TipoDocumento::class, 'tipo_documento_id','id');
    }

}
