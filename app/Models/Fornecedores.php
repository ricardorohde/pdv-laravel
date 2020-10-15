<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedores extends Model
{
    use HasFactory;
    protected $fillable = ['fornecedor','cnpj','telefone'];
    protected $guarded = ['id'];
    protected $table = 'fornecedors';
}
