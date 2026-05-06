<?php

namespace App\Models;

use CodeIgniter\Model;

class RoupaModel extends Model
{
    protected $table = 'roupas';
    protected $primaryKey = 'id';

    protected $allowedFields = [
    'tipo',
    'cor',
    'quantidade',
    'bairro',
    'ponto_doacao',
    'idDoador'
];
}