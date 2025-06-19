<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Ventas_cabecera_model;
use App\Models\Ventas_detalle_model;
use App\Models\producto_model;


class carrito_controller extends BaseController
{
    protected $cart;
    protected $session;

    public function __construct()
{
    helper(['form', 'url']);

    // Carga el carrito usando el servicio compartido de CodeIgniter
    $this->cart = \Config\Services::cart(); 

    $this->session = session();
}


    // Mostrar carrito
    public function index()
    {
        $carrito = $this->cart->contents();  // así se llama desde la librería
        $total = $this->cart->total();
       $total_items = $this ->cart->totalItems();
        $data = [
        'carrito' => $carrito,
        'total'   => $total,
        'titulo'  => 'Mi Carrito | StyleSmash',
        'total_items' => $total_items
        ];

        echo view('front/head_view', $data);
        echo view('front/nav_view',$data);
        echo view('Back/carrito_view', $data);
        echo view('front/footer_view');

    }

    // Agregar producto al carrito
   public function agregar($id = null)
{
    $productoModel = new producto_model();
    $producto = $productoModel->find($id);

    if (!$producto) {
        return redirect()->to(base_url('carrito'))->with('mensaje', 'Producto no encontrado');
    }

    // Armar array para insertar en carrito
    $item = [
        'id'      => $producto['id'],
        'qty'     => 1,
        'price'   => $producto['precio_vta'],
        'name'    => $producto['nombre_prod'],
        'imagen'  => $producto['imagen'] ?? 'default.png', // opcional
    ];

    // Insertar en el carrito
    $this->cart->insert($item);

    // Mostrar contenido del carrito para prueba (luego quitar)
    // dd($this->cart->contents());

    return redirect()->to(base_url('carrito'))->with('mensaje', 'Producto agregado al carrito');
}


    // Eliminar un item
    public function elimina($rowid)
    {
        $this->cart->remove($rowid);
        return redirect()->back();
    }

    // Vaciar todo el carrito
    public function borrar()
    {
        $this->cart->destroy();
        return redirect()->back();
    }

   public function comprar()
{
    $cartItems = $this->cart->contents();

    if (empty($cartItems)) {
        return redirect()->back()->with('mensaje', 'El carrito está vacío.');
    }

    $cabeceraModel = new Ventas_cabecera_model();
    $detalleModel  = new Ventas_detalle_model();

    $id_usuario = $this->session->get('id_usuario');
    $total      = $this->cart->total();

    
    $venta_id = $cabeceraModel->insertarCabecera($id_usuario, $total);

    
    foreach ($cartItems as $item) {
        if (!isset($item['id'])) {
            continue;
        }

        $detalleModel->insert([
            'venta_id'    => $venta_id,
            'producto_id' => $item['id'],
            'cantidad'    => $item['qty'],
            'precio'      => $item['price'],
        ]);
    }

    $this->cart->destroy();
    return redirect()->to(base_url('mis_compras'))->with('mensaje', 'Compra realizada con éxito');
}



     public function mis_compras()
    {

        $session = session();
        $id_usuario = $session->get('id_usuario');

        $ventasModel = new ventas_cabecera_model();
        $detallesModel = new ventas_detalle_model();
        $productoModel = new producto_model();

        // Trae todas las ventas del usuario
        $ventas = $ventasModel
            ->where('id_usuario', $id_usuario)
            ->orderBy('fecha', 'DESC')
            ->findAll();


        $compras = [];

        foreach ($ventas as $venta) {
            $items = [];

            $detalles = $detallesModel->where('venta_id', $venta['venta_id'])->findAll();

            foreach ($detalles as $detalle) {
                $producto = $productoModel->find($detalle['producto_id']);

                if ($producto) {
                    $items[] = [
                        'nombre_prod' => $producto['nombre_prod'],
                        'imagen' => $producto['imagen'],
                        'precio' => $detalle['precio'],
                        'cantidad' => $detalle['cantidad'],
                        'subtotal' => $detalle['precio'] * $detalle['cantidad']
                    ];
                }
            }

            $compras[] = [
                'fecha' => $venta['fecha'],
                'items' => $items
            ];

        }

        $data['titulo'] = 'Mis Compras | StyleSmash';
        
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('Back/mis_compras_view',  ['compras' => $compras]);
        echo view('front/footer_view');
    }


}


