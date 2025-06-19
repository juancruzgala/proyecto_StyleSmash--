<?php
namespace App\Models;
use CodeIgniter\Model;

class categorias_model extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'id';
    protected $allowedFields = ['descripcion', 'activo'];

    // Devuelve todas las categorías activas
    public function getCategorias()
    {
        return $this->where('activo', '1' )->findAll();
    }
}
