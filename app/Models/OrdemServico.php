<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdemServico extends Model
{
    // Define explicitamente o nome da tabela em português
    protected $table = 'ordens_servico';

    protected $fillable = ['placa', 'descricao', 'valor', 'status'];
}
