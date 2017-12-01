<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string nome
 * @property string email
 * @property enum sexo
 * @property timestamp created_at
 * @property timestamp update_at
 */

class Candidato extends Model
{
    protected $table    = 'candidatos';
    protected $guarded  = ['id', 'created_at', 'updated_at'];
    protected $fillable = ['name','email','sexo'];
    
}