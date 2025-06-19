<?php
namespace App\Models;

use CodeIgniter\Model;

class Ventas_detalle_model extends Model
{
    protected $table = 'ventas_detalle';
    protected $primaryKey = 'id';
    protected $allowedFields = ['venta_id', 'producto_id', 'cantidad', 'precio'];
    protected $returnType = 'array';

    /**
     * Inserta un nuevo detalle de venta
     * @param array $detalle
     * @return bool
     */
    public function insertarDetalle(array $detalle)
    {
        return $this->insert($detalle);
    }

    /**
     * Obtiene todos los detalles de una venta específica
     * @param int $id_venta
     * @return array
     */
    public function obtenerDetallesPorVenta(int $id_venta)
    {
        return $this->where('id', $id_venta)->findAll();
    }
}
