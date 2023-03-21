<?php
class LoginModel
{
    private $con;
    public function __construct()
    {
        $con = new Database();
        $this->con = $con->connect();
    }

    public function validar($datos)
    {
        $query = 'SELECT * FROM usuarios WHERE email = "' . $datos['usuario'] . '" AND password = "' . $datos['contrasena'] . '" AND status = 1';

        $respuesta = mysqli_query($this->con, $query);

        if (mysqli_num_rows($respuesta) > 0) {
            while ($row = mysqli_fetch_assoc($respuesta)) {
                $data['id_usuario'] = $row['id_usuario'];
                $data['nombre_usuario'] = $row['nombre'];
            }
        } else {
            $data['error_usuario'] = "El usuario no existe";
        }
        return $data;
    }

    public function getUser($email)
    {
        $query = "SELECT * FROM usuarios WHERE email = '$email'";
        $result = mysqli_query($this->con, $query);
        if (mysqli_num_rows($result) > 0) {
            foreach ($result as $row) {
                $data['id_usuario'] = $row['id_usuario'];
                $data['usuario'] = $row['usuario'];
                $data['nombre'] = $row['nombre'];
                $data['apellido'] = $row['apellido'];
                $data['email'] = $row['email'];
                $data['password'] = $row['password'];
                $data['status'] = $row['status'];
                $data['id_role'] = $row['id_role'];
            }
        } else {
            return false;
        }
        return $data;
    }
}
