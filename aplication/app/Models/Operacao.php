<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operacao extends Model
{
    use HasFactory;
    protected $table= "operacao";
    protected $fillable= ['descricao','valor','tipo', 'user_id'];
}
