<?php
class ClientesModel
{
    private $con;

    public function __construct()
    {
        $con = new Database();
        $this->con = $con->connect();
    }

    public function getClients()
    {
        return $this->con->query("SELECT
        c.id_cliente,
        c.cliente,
        c.razon_social,
        c.contacto,
        c.email,
        c.telefono,
        c.direccion,
        c.rfc,
        c.fecha_registro,
        c.fecha_actualizacion,
        c.status,
        u.usuario
      FROM clientes c
      INNER JOIN usuarios u ON c.id_usuario = u.id_usuario;");
    }

    public function getClient($idCliente)
    {
        return $this->con->query("SELECT
            c.id_cliente,
            c.cliente,
            c.razon_social,
            c.contacto,
            c.email,
            c.telefono,
            c.direccion,
            c.rfc,
            c.fecha_registro,
            c.fecha_actualizacion,
            c.status,
            u.usuario
            FROM clientes c
            INNER JOIN usuarios u ON c.id_usuario = u.id_usuario
            WHERE c.id_cliente = $idCliente;");
    }

    public function saveClient($datos)
    {
        if (empty($datos['cliente']) || empty($datos['razon_social']) || empty($datos['contacto']) || empty($datos['email']) || empty($datos['telefono']) || empty($datos['direccion']) || empty($datos['rfc'])) {
            return false;
        }

        $fecha = date('Y-m-d H:i:s');
        $idUsuario = Utils::decrypt($_SESSION['id_usuario']);
        return $this->con->query("INSERT INTO
        clientes (
          id_usuario,
          id_usuario_actualizacion,
          cliente,
          razon_social,
          contacto,
          email,
          telefono,
          direccion,
          rfc,
          fecha_registro,
          fecha_actualizacion,
          status
        )
      values
        (
          $idUsuario,
          $idUsuario,
          '$datos[cliente]',
          '$datos[razon_social]',
          '$datos[contacto]',
          '$datos[email]',
          '$datos[telefono]',
          '$datos[direccion]',
          '$datos[rfc]',
          '$fecha',
          '$fecha',
          1
        );");
    }

    public function updateClient($idCliente, $datos)
    {
        if (empty($datos['cliente']) || empty($datos['razon_social']) || empty($datos['contacto']) || empty($datos['email']) || empty($datos['telefono']) || empty($datos['direccion']) || empty($datos['rfc'])) {
            return false;
        }

        $fecha = date('Y-m-d H:i:s');
        $idUsuario = Utils::decrypt($_SESSION['id_usuario']);
        return $this->con->query("UPDATE clientes SET
        id_usuario_actualizacion = $idUsuario,
        cliente = '$datos[cliente]',
        razon_social = '$datos[razon_social]',
        contacto = '$datos[contacto]',
        email = '$datos[email]',
        telefono = '$datos[telefono]',
        direccion = '$datos[direccion]',
        rfc = '$datos[rfc]',
        fecha_actualizacion = '$fecha'
        WHERE id_cliente = $idCliente;");
    }

    public function changeStatusClient($idCliente, $status)
    {
        $fecha = date('Y-m-d H:i:s');
        $idUsuario = Utils::decrypt($_SESSION['id_usuario']);
        return $this->con->query("UPDATE clientes SET
        id_usuario_actualizacion = $idUsuario,
        fecha_actualizacion = '$fecha',
        status = $status
        WHERE id_cliente = $idCliente;");
    }
}
