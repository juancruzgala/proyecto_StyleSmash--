<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Validar si hay sesión y si el usuario es ADMIN (perfil = 1)
        if (!$session->get('logueado') || $session->get('id_perfil') != 1) {
            return redirect()->to('/login'); // o a '/' si querés
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Nada necesario aquí
    }
}

