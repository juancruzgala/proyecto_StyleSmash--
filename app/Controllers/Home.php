<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['titulo']='Inicio | StyleSmash';
        echo view ('front/head_view', $data);
        echo view ('front/nav_view');
        echo view ('Original');
        echo view ('front/footer_view');
    } 

    public function contacto()
    {
        $data['titulo']='Contacto | StyleSmash';
        echo view ('front/head_view', $data);
        echo view ('front/nav_view');
        echo view ('front/contacto');
        echo view ('front/footer_view');
    } 

    public function acerca_de()
    {
        $data['titulo']='¿Quienes Somos? | StyleSmash';
        echo view ('front/head_view', $data);
        echo view ('front/nav_view');
        echo view ('front/acerca_de');
        echo view ('front/footer_view');
    } 

    public function tienda_view()
{   
    $productoModel = new \App\Models\producto_model();
    $data['titulo'] = 'Tienda | Style Smash';

    // Trae solo los productos NO eliminados
    $productos = $productoModel->where('eliminado', 'NO')->findAll();
    $productos = $productoModel->obtenerProductosConCategoria();

    // Agrupa productos por categoría
    $agrupados = [];

    foreach ($productos as $prod) {
        $categoria = $prod['nombre_categoria']; // Ahora sí, usamos el nombre
        $agrupados[$categoria][] = $prod;
    }

    $data['productos_por_categoria'] = $agrupados;


    echo view('front/head_view', $data);
    echo view('front/nav_view');
    echo view('front/tienda_view', $data);
    echo view('front/footer_view');
}



    public function terminos()
    {
        $data['titulo']='Terminos y Condiciones | StyleSmash';
        echo view ('front/head_view', $data);
        echo view ('front/nav_view');
        echo view ('front/terminos');
        echo view ('front/footer_view');
    } 

    public function comercializacion()
    {
        $data['titulo']='Comercializacion | StyleSmash';
        echo view ('front/head_view', $data);
        echo view ('front/nav_view');
        echo view ('front/comercializacion');
        echo view ('front/footer_view');
    } 

}
