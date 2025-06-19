<?php
namespace App\Models;
use CodeIgniter\Model;

class producto_model extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre_prod', 'imagen', 'categoria_id', 'precio', 'precio_vta', 'stock', 'stock_min', 'eliminado'];

    // Obtener todos los productos no eliminados
    public function getProductoAll()
    {
        return $this->where('eliminado', 'NO')->findAll();
    }

    // Obtener productos eliminados
    public function getProductoAllEliminados()
    {
        return $this->where('eliminado', 'SI')->findAll();
    }

    // Obtener un solo producto por ID
    public function getProductoById($id)
    {
        return $this->where('id', $id)->first();
    }

    public function obtenerProductosConCategoria()
    {
        return $this->select('productos.*, categorias.descripcion AS nombre_categoria')
                ->join('categorias', 'categorias.id = productos.categoria_id')
                ->where('productos.eliminado', 'NO')
                ->findAll();
    }

}
