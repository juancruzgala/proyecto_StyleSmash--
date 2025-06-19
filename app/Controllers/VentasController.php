<?php
namespace App\Controllers;

use App\Models\ventas_cabecera_model;
use App\Models\ventas_detalle_model;
use CodeIgniter\Controller;

class VentasController extends Controller
{
    public function __construct()
    {
        helper(['form', 'url']);
        session();
    }

    // Listado general de ventas
    public function index()
    {
        $cabeceraModel = new ventas_cabecera_model();
        $db = \Config\Database::connect();
        $builder = $db->table('ventas_cabecera');
        $builder->select('ventas_cabecera.*, usuario.nombre, usuario.apellido');
        $builder->join('usuario', 'usuario.id_usuario = ventas_cabecera.id_usuario');
        $query = $builder->get();

        $data['ventas'] = $query->getResultArray();
        $data['titulo'] = 'Listado de Ventas | StyleSmash';

        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('back/ventas/ventas', $data);
        echo view('front/footer_view');
    }

    // Detalle de una venta específica
    public function detalle($venta_id)
    {
        $detalleModel = new ventas_detalle_model();
        $db = \Config\Database::connect();

        $builder = $db->table('ventas_detalle');
        $builder->select('ventas_detalle.*, productos.nombre_prod as producto_nombre');
        $builder->join('productos', 'productos.id = ventas_detalle.producto_id');
        $builder->where('venta_id', $venta_id);
        $query = $builder->get();

        $data['detalles'] = $query->getResultArray();
        $data['titulo'] = 'Detalle de Venta | StyleSmash';
        $data['venta_id'] = $venta_id;

        echo view('front/head_view', $data);
        echo view('front/nav_view'); 
        echo view('back/ventas/detalle_venta', $data);
        echo view('front/footer_view');
    }

    public function registrarVenta()
{
    $cabeceraModel = new ventas_cabecera_model();
    $detalleModel = new ventas_detalle_model();

    $productos = $this->request->getPost('productos'); // array de productos

    $total = 0.0;
    foreach ($productos as $prod) {
        $subtotal = $prod['precio'] * $prod['cantidad'];
        $total += $subtotal;
    }

    // Usamos TU MÉTODO del modelo para insertar la cabecera con el total
    $id_usuario = session()->get('id_usuario');
    $venta_id = $cabeceraModel->insertarCabecera($id_usuario, $total);

    // Ahora insertamos los detalles
    foreach ($productos as $prod) {
        $detalleModel->insert([
            'venta_id' => $venta_id,
            'producto_id' => $prod['producto_id'],
            'cantidad' => $prod['cantidad'],
            'precio' => $prod['precio']
        ]);
    }

    session()->setFlashdata('success', 'Venta registrada con éxito.');
    return redirect()->to('/ventas');
}

}
