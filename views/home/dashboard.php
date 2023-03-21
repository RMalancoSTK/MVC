<div class="container-fluid mt-3">
  <!-- titulo del lado derecho -->
  <div class="row">
    <div class="col-12">
      <h1 class="text-center">Dashboard</h1>
      <hr>
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-md-3 mb-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Total de clientes</h5>
          <p class="card-text">
          <h1 class="text-center">10</h1>
          </p>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-3 mb-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Total de proveedores</h5>
          <p class="card-text">
          <h1 class="text-center">10</h1>
          </p>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-3 mb-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Total de ventas</h5>
          <p class="card-text">
          <h1 class="text-center">$ 10.000</h1>
          </p>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-3 mb-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Total de compras</h5>
          <p class="card-text">
          <h1 class="text-center">$ 10.000</h1>
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 mb-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Tabla de últimas ventas</h5>
          <div class="table-responsive">
            <table class="table table-striped table-sm" aria-label="Tabla de últimos usuarios registrados">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Cliente</th>
                  <th>Fecha</th>
                  <th>Total</th>
                  <th>Estado</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
          <a href="#" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i> Ver todas las ventas</a>
        </div>
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Gráfico de ventas</h5>
          <canvas id="totalVentas" height="150" style="height: 150px;"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>