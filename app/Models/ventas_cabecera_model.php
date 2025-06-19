<?php

namespace App\Models;

use CodeIgniter\Model;

class ventas_cabecera_model extends Model
{
    protected $table = 'ventas_cabecera';
    protected $primaryKey = 'venta_id';

    protected $allowedFields = [
        'id_usuario',
        'fecha',
        'total_venta'
    ];

    public function insertarCabecera($id_usuario, $total)
    {
        $data = [
            'id_usuario' => $id_usuario,
            'fecha'      => date('Y-m-d h:i:s'),
            'total_venta'      => $total
        ];

        $this->insert($data);
        return $this->getInsertID();
    }
}
