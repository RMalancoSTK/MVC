<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Muhamad Nauval Azhar">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="This is a login page template based on Bootstrap 5">
    <title>Inicio de Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>

<body>
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center my-5">
                        <img src="https://4.bp.blogspot.com/_5BW9uKyBKY0/S-NU4nrEMVI/AAAAAAAAHj0/PS4_vN3GtRs/s320/Fondo+STK+transparente.png" alt="logo" width="100">
                    </div>
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold mb-4">Inicio de Sesión</h1>
                            <form method="POST" class="needs-validation" novalidate="" autocomplete="off" action="">
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="email">Correo Electrónico</label>
                                    <input id="email" type="email" class="form-control" name="email" value="" required autofocus placeholder="Ingrese su correo electrónico">
                                    <div class="invalid-feedback">
                                        Correo Electrónico es requerido
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="mb-2 w-100">
                                        <label class="text-muted" for="password">Contraseña</label>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" placeholder="Ingrese su contraseña">
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>

                                <div class="mb-3" id="mensajeError">
                                </div>

                                <div class="d-flex align-items-center">
                                    <button type="button" class="btn btn-primary ms-auto" onclick="ingresar(event)">Ingresar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="text-center mt-5 text-muted" id="mensajeBienvenida">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <?php Utils::jsScript($this->jsScript); ?>
</body>

</html>