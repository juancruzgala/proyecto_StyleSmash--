<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Usuario_model;

class Login_controller extends BaseController
{
    public function index()
    {
        // Carga los helpers necesarios para formularios y URLs
        helper(['form', 'url']);

        return view('Back/login'); // Carga la vista del formulario login.php
    }

    

    public function auth()
    {
        $session = session();
        $model = new Usuario_model();

        // Captura los datos del formulario
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('pass');

        // Consulta el usuario por email
        $data = $model->where('email', $email)->first();

        if ($data) {
            $passHash = $data['pass'];
            $estado = $data['baja'];

            if ($estado === 'SI') {
                $session->setFlashdata('msg', 'Usuario dado de baja');
                return redirect()->to('/');
            }

            // Verifica la contraseña hasheada
            $verify_pass = password_verify($password, $passHash);

            if ($verify_pass) {
                // Datos de sesión
                $ses_data = [
                    'id_usuario' => $data['id_usuario'],
                    'nombre'     => $data['nombre'],
                    'apellido'   => $data['apellido'],
                    'email'      => $data['email'],
                    'usuario'    => $data['usuario'],
                    'id_perfil'  => $data['id_perfil'],
                    'logueado'  => true
                ];
                $session->set($ses_data);

                $session->setFlashdata('msg', '¡Bienvenido!' .$ses_data['nombre']. '!');
                return redirect()->to('/'); // Página protegida
            } else {
                $session->setFlashdata('msg', 'Contraseña incorrecta');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'El email no existe o es incorrecto');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
