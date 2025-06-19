<?php

namespace App\Controllers;
use App\Models\Consulta_model;

class Consultas_controller extends BaseController
{
    public function listar()
    {
        $modelo = new Consulta_model();
        $data['consultas'] = $modelo->findAll();
        
        $data['titulo'] = 'Consultas Recibidas | StyleSmash';
        
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('Back/consultas_view', $data);
        echo view('front/footer_view');

    }

    public function guardar()
    {
        $modelo = new Consulta_model();

       $data = [
            'nombre'   => $this->request->getPost('nombre') . ' ' . $this->request->getPost('apellido'),
            'email'    => $this->request->getPost('email'),
            'mensaje'  => $this->request->getPost('mensaje'),
        ];


        $modelo->insert($data);
        return redirect()->to(base_url('contacto'))->with('mensaje', 'Consulta enviada correctamente.');
    }

    public function responder($id)
    {
        $modelo = new Consulta_model();
        $modelo->update($id, ['respondido' => 'SI']);
        return redirect()->to(base_url('consulta/listar'));
    }

    public function eliminar($id)
    {
        $modelo = new Consulta_model();
        $modelo->delete($id);
        return redirect()->to(base_url('consulta/listar'));
    }
}

