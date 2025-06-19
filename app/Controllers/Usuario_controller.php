<?php
namespace App\Controllers;

use App\Models\Usuario_model;
use CodeIgniter\Controller;

class Usuario_controller extends Controller
{
    public function __construct()
    {
        helper(['form', 'url']);
        session();
    }

    // Vista de registro
    public function registrarse()
    {
        $data['titulo'] = 'Registro';
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('Back/registrarse'); // Asegurate que el archivo sea correcto
        echo view('front/footer_view');
    }

    // Validación del formulario de registro
    public function formValidation()
    {
        $input = $this->validate([
            'nombre'     => 'required|min_length[3]',
            'apellido'   => 'required|min_length[3]|max_length[25]',
            'usuario'    => 'required|min_length[3]',
            'email'      => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuario.email]',
            'pass'       => 'required|min_length[3]|max_length[10]',
            'password2'  => 'required|matches[pass]',
        ]);

        $formModel = new Usuario_model();

        if (!$input) {
            $data['titulo'] = 'Registrarme';
            echo view('front/head_view', $data);
            echo view('front/nav_view');
            echo view('Back/usuario/registro', ['validation' => $this->validator]);
            echo view('front/footer_view');
        } else {
            $formModel->save([
                'nombre'   => $this->request->getVar('nombre'),
                'apellido' => $this->request->getVar('apellido'),
                'usuario'  => $this->request->getVar('usuario'),
                'email'    => $this->request->getVar('email'),
                'pass'     => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
                'baja'     => 'NO',
                'id_perfil'=> 1 // Por defecto cliente
            ]);

            session()->setFlashdata('success', 'Usuario registrado con éxito');
            return redirect()->to('/login');
        }
    }

    // Listado de usuarios
    
        public function index()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('usuario');
        $builder->select('usuario.*, perfiles.descripcion AS perfil');
        $builder->join('perfiles', 'perfiles.id_perfil = usuario.id_perfil');
        $builder->where('usuario.baja', 'NO');
        $query = $builder->get();

        $data['usuarios'] = $query->getResultArray();
        $data['titulo'] = 'Listado de Usuarios | StyleSmash';

        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('back/listausuarios', $data);
        echo view('front/footer_view');
    }

    

    // Dar de baja (baja lógica)
    public function darBaja($id)
    {
        $usuarioModel = new Usuario_model();
        $usuarioModel->update($id, ['baja' => 'SI']);

        return redirect()->to('/usuarios')->with('success', 'Usuario dado de baja');
    }

    public function editar($id_usuario)
    {
        $usuarioModel = new \App\Models\Usuario_model();
        $perfilModel = new \App\Models\perfiles_model();

        $usuario = $usuarioModel->find($id_usuario);

        if (!$usuario) {
        throw \CodeIgniter\Exceptions\PageNotFoundException('Usuario no encontrado');
        }

        // Descripción del perfil actual del usuario
        $perfil = $perfilModel->find($usuario['id_perfil']);
        $usuario['perfil'] = $perfil['descripcion'];

        // Obtener todos los perfiles para el <select>
        $perfiles = $perfilModel->findAll();

        $data['usuario'] = $usuario;
        $data['perfiles'] = $perfiles;
        $data['titulo'] = 'Editar Usuario';

        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('back/editar_usuarios', $data);
        echo view('front/footer_view');
    }

    public function actualizar($id_usuario)
    {
        // Evita que el admin se edite a sí mismo
        if ($id_usuario == session()->get('id_usuario')) {
        return redirect()->to('/usuarios')->with('success', 'No puedes modificar tu propio perfil');
        }

        $usuarioModel = new \App\Models\Usuario_model();

        $data = [
        'id_perfil' => $this->request->getPost('id_perfil')
        ];

        $usuarioModel->update($id_usuario, $data);

        return redirect()->to('/usuarios')->with('success', 'Perfil actualizado correctamente');
    }

    //metodo de baja usuarios
    public function usuarios_baja()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('usuario');
        $builder->select('usuario.*, perfiles.descripcion AS perfil');
        $builder->join('perfiles', 'perfiles.id_perfil = usuario.id_perfil');
        $builder->where('usuario.baja', 'SI');
        $query = $builder->get();

        $data['usuarios'] = $query->getResultArray();
        $data['titulo'] = 'Usuarios Dados de Baja';

        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('back/usuarios_baja', $data); // vista que vas a crear
        echo view('front/footer_view');
    }


    //metodo de alta usuarios
    public function darAlta($id)
    {
        $usuarioModel = new \App\Models\Usuario_model();
        $usuarioModel->update($id, ['baja' => 'NO']);

        return redirect()->to('/usuarios_baja')->with('success', 'Usuario dado de alta correctamente');
    }

    //metodo agregar nuevo usuariocomo admin
    public function formNuevoUsuario()
    {
        $perfilModel = new \App\Models\perfiles_model();
        $data['perfiles'] = $perfilModel->findAll();
        $data['titulo'] = 'Agregar Usuario';

        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('back/agregar_usuario', $data);
        echo view('front/footer_view');
    }

    public function guardarUsuario()
    {
        $usuarioModel = new \App\Models\Usuario_model();

        $email     = $this->request->getPost('email');
        $usuario   = $this->request->getPost('usuario');

        // Verificar si el email ya existe
        if ($usuarioModel->where('email', $email)->first()) {
            return redirect()->back()
            ->withInput()
            ->with('error', 'El email ya está registrado');
        }

        // Verificar si el nombre de usuario ya existe
        if ($usuarioModel->where('usuario', $usuario)->first()) {
            return redirect()->back()
            ->withInput()
            ->with('error', 'El nombre de usuario ya está en uso');
        }

        // Insertar si pasó la validación
        $data = [
            'nombre'    => $this->request->getPost('nombre'),
            'apellido'  => $this->request->getPost('apellido'),
            'email'     => $email,
            'usuario'   => $usuario,
            'pass'      => password_hash($this->request->getPost('pass'), PASSWORD_DEFAULT),
            'id_perfil' => $this->request->getPost('id_perfil'),
            'baja'      => 'NO'
        ];

        $usuarioModel->insert($data);

        return redirect()->to('/usuarios')->with('success', 'Usuario agregado correctamente');
    }



}

    
