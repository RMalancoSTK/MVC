<div class="container-fluid mt-3">
  <h1 class="text-center">Lista de clientes</h1>
  <div class="row mt-3">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title d-flex justify-content-between align-items-center mb-3">
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalCliente" id="btnNuevoCliente"><i class=" bi bi-plus-circle"></i> Nuevo cliente</button>
          </h5>
          <div class="table-responsive">
            <table id="tablaClientes" class="table table-sm mt-2" aria-describedby="tablaClientes_info">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Email</th>
                  <th scope="col">Teléfono</th>
                  <th scope="col">Dirección</th>
                  <th scope="col">RFC</th>
                  <th scope="col">Fecha de Registro</th>
                  <th scope="col">Status</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalCliente">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="tituloModal">Nuevo cliente</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formCliente" method="POST">
          <input type="hidden" id="id_cliente" name="id_cliente">
          <div class="form-group row">
            <div class="col-md-6 mb-3">
              <input id="cliente" class="form-control" type="text" name="cliente" placeholder="Nombre del cliente" required>
            </div>
            <div class="col-md-6 mb-3">
              <input id="razon_social" class="form-control" type="text" name="razon_social" placeholder="Razón social" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-6 mb-3">
              <input id="contacto" class="form-control" type="text" name="contacto" placeholder="Nombre del contacto" required>
            </div>
            <div class="col-md-6 mb-3">
              <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Teléfono" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-6 mb-3">
              <input id="email" class="form-control" type="email" name="email" placeholder="Email" required>
            </div>
            <div class="col-md-6 mb-3">
              <input id="rfc" class="form-control" type="text" name="rfc" placeholder="RFC" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-12 mb-3">
              <input id="direccion" class="form-control" type="text" name="direccion" placeholder="Dirección" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="">
              <!-- botones de acción -->
              <button class="btn btn-primary btn-sm" id="btnGuardar" onclick="guardarNuevoCliente(event)"><i class="bi bi-save"></i> Guardar</button>
              <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Cancelar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>