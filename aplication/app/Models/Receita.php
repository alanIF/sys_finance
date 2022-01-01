<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    use HasFactory;
    protected $table= "receita";
    protected $fillable= ['descricao','valor','data_receita', 'user_id'];
}
