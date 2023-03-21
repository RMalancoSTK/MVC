<?php

require_once "models/ClientesModel.php";

class ClientesController extends Controller
{
  private $clientesModel;

  public function __construct()
  {
    parent::__construct();
    $this->clientesModel = new ClientesModel();
    Utils::setJsScript($this->jsScript, '../assets/js/clientes.js', true);
  }

  // Vistas de clientes

  public function listar()
  {
    $this->loadView("clientes/listar");
  }

  // Métodos de clientes

  public function getClients()
  {
    $query = $this->clientesModel->getClients();
    $data = $query->fetch_all(MYSQLI_ASSOC);
    $clientes = array();
    foreach ($data as $cliente) {
      $clientes[] = [
        'id_cliente' => Utils::encrypt($cliente['id_cliente']),
        'cliente' => $cliente['cliente'],
        'razon_social' => $cliente['razon_social'],
        'contacto' => $cliente['contacto'],
        'email' => $cliente['email'],
        'telefono' => $cliente['telefono'],
        'direccion' => $cliente['direccion'],
        'rfc' => $cliente['rfc'],
        'fecha_registro' => $cliente['fecha_registro'],
        'fecha_actualizacion' => $cliente['fecha_actualizacion'],
        'status' => $cliente['status'],
        'usuario' => $cliente['usuario']
      ];
    }
    $encryption = Utils::encrypt(json_encode($clientes));
    $response = array(
      'data' => $encryption
    );
    echo json_encode($response);
    die();
  }

  public function getClient()
  {
    $query = $this->clientesModel->getClient(Utils::decrypt($_POST['id_cliente']));
    $data = $query->fetch_object();
    $clientes = [
      'id_cliente' => Utils::encrypt($data->id_cliente),
      'cliente' => $data->cliente,
      'razon_social' => $data->razon_social,
      'contacto' => $data->contacto,
      'email' => $data->email,
      'telefono' => $data->telefono,
      'direccion' => $data->direccion,
      'rfc' => $data->rfc,
      'fecha_registro' => $data->fecha_registro,
      'fecha_actualizacion' => $data->fecha_actualizacion,
      'status' => $data->status,
      'usuario' => $data->usuario
    ];
    $encryption = Utils::encrypt(json_encode($clientes));
    $response = array(
      'data' => $encryption
    );
    echo json_encode($response);
    die();
  }

  public function saveClient()
  {
    $query = $this->clientesModel->saveClient($_POST);
    $query ? $this->responder('success', 'Cliente guardado correctamente.') : $this->responder('error', 'No se pudo guardar el cliente.');
  }

  public function updateClient()
  {
    $query = $this->clientesModel->updateClient(Utils::decrypt($_POST['id_cliente']), $_POST);
    $query ? $this->responder('success', 'Cliente actualizado correctamente.') : $this->responder('error', 'No se pudo actualizar el cliente.');
  }

  public function deactivateClient()
  {
    $query = $this->clientesModel->changeStatusClient(Utils::decrypt($_POST['id_cliente']), ESTADO_INACTIVO);
    $query ? $this->responder('success', 'Cliente desactivado correctamente.') : $this->responder('error', 'No se pudo desactivar el cliente.');
  }

  public function activateClient()
  {
    $query = $this->clientesModel->changeStatusClient(Utils::decrypt($_POST['id_cliente']), ESTADO_ACTIVO);
    $query ? $this->responder('success', 'Cliente activado correctamente.') : $this->responder('error', 'No se pudo activar el cliente.');
  }
}
