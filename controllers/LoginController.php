<?php

require_once "models/LoginModel.php";

class LoginController extends Controller
{
    private $loginModel;
    private $email;
    private $password;
    private $token;

    public function __construct()
    {
        $this->loginModel = new LoginModel();
        $this->token = new Token(SECRET_KEY);
        Utils::setJsScript($this->jsScript, '../assets/js/login.js', true);
        $this->initData();
    }

    public function ingresar()
    {
        Utils::validateAuth();
        require_once "views/login/ingresar.php";
    }

    public function login()
    {
        try {
            $this->email = Utils::clearData($this->request['email']);
            $this->password = Utils::clearData($this->request['password']);
            $this->validateRequestMethod();
            $this->validateFields($this->email, $this->password);
            $this->authenticateUser($this->email, $this->password);
        } catch (AuthenticationException $e) {
            echo Utils::getMessageJson('error', $e->getMessage());
        }
    }

    private function validateRequestMethod()
    {
        if (!$_SERVER['REQUEST_METHOD'] == 'POST') {
            throw new AuthenticationException('Método de envío no permitido');
        }
    }

    private function authenticateUser($email, $password)
    {
        $user = $this->loginModel->getUser($email);

        if (!$user) {
            throw new AuthenticationException('El usuario no existe');
        }

        $verify = password_verify($password, $user['password']);

        if (!$verify) {
            throw new AuthenticationException('La contraseña es incorrecta');
        }

        if ($user['status'] == ESTADO_INACTIVO) {
            throw new AuthenticationException('El usuario no está activo');
        }

        $token = $this->token->generarToken(Utils::encrypt($user['id_usuario']));

        $data = [
            'autenticado' => AUTHENTICATED,
            'id_usuario' => Utils::encrypt($user['id_usuario']),
            'usuario' => Utils::encrypt($user['usuario']),
            'nombre_completo' => Utils::encrypt($user['nombre'] . ' ' . $user['apellido']),
            'id_role' => Utils::encrypt($user['id_role']),
            'token' => $token
        ];

        Utils::createSession($data);
        echo  Utils::getMessageJson('success', 'Usuario autenticado correctamente');
    }

    private function validateFields($email, $password)
    {
        if (empty($email) || empty($password)) {
            throw new AuthenticationException('Todos los campos son obligatorios');
        }
    }

    public function logout()
    {
        session_destroy();
        header(LOCATION_LOGIN);
    }
}
