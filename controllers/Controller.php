<?php

class Controller
{
    protected $jsScript;
    private $token;
    private $method;
    protected $request;

    public function __construct()
    {
        Utils::validateSession();
        $this->token = new Token(SECRET_KEY);
        $this->initData();
    }

    protected function initData()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->method ? $this->request = $_POST : $this->request = $_GET;
    }

    public function loadView($view)
    {
        require_once "views/includes/header.php";
        require_once "views/includes/menu.php";
        require_once "views/$view.php";
        require_once "views/includes/footer.php";
    }

    protected function generarToken($data)
    {
        return $this->token->generarToken($data);
    }

    protected function verificarToken($miToken)
    {
        return  $this->token->verificarToken($miToken);
    }

    public function setValidateToken()
    {
        // comprobar primero que token y data no estén vacíos
        if ($this->noHayData()) {
            $this->responderError('No token or data.');
        }

        // Recibir el token y el cifrado
        $token = $_SESSION['token'];
        $encryption = $this->request['data'];

        // Si el token es válido y coincide con el de la sesión
        if ($this->tokenEsValido($token) && $this->tokenCoincideConSesion($token)) {
            // Descifrar los datos y responder con éxito
            $decryption = Utils::decrypt($encryption);
            $arreglo = json_decode($decryption, true);
            $this->responderExitoToken('The token is valid.', $arreglo);
        } else {
            // Si no, responder con error
            $this->responderError('The token is invalid.');
        }
    }

    private function noHayData()
    {
        return empty($_POST['data']);
    }

    private function responderError($mensaje)
    {
        echo json_encode(array('status' => 'error', 'message' => $mensaje));
        die();
    }

    private function tokenEsValido($token)
    {
        return $this->verificarToken($token);
    }

    private function tokenCoincideConSesion($token)
    {
        return isset($_SESSION['token']) && $token == $_SESSION['token'];
    }

    private function responderExitoToken($mensaje, $data)
    {
        echo json_encode(array('status' => 'success', 'message' => $mensaje, 'data' => $data));
    }

    protected function responder($tipo, $mensaje)
    {
        echo json_encode(array('status' => $tipo, 'message' => $mensaje));
    }
}

class AuthenticationException extends Exception
{
    public function __construct($message, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
