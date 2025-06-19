<?php
namespace App\Models;
use CodeIgniter\Model;

class Usuario_model extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = ['nombre', 'apellido', 'usuario', 'email', 'pass', 'baja', 'id_perfil'];
    protected $returnType = 'array';
}

