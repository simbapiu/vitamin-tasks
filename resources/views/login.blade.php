<?php
    
?>
<!DOCTYPE html>
<html class="h-100" lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" />
    <title>Lista de tareas</title>
</head>

<body class="d-flex flex-column h-100">
  <main class="flex-shrink-0">
    <section class="vh-100" style="background-color: #9A616D;">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
              <div class="row g-0">
                <div class="col-md-6 col-lg-5 d-none d-md-block">
                  <img src="https://unimex.edu.mx/soyunimex/wp-content/uploads/2019/11/146.jpg"
                    alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height: 100%;" />
                </div>
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                  <div class="card-body p-4 p-lg-5 text-black">

                    <form>
                      @csrf
                      <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Iniciar sesión</h3>

                      <div class="form-outline mb-4">
                        <input type="email" id="email" name="email" id="email" class="form-control form-control-lg" />
                        <label class="form-label" for="email">Correo</label>
                      </div>

                      <div class="form-outline mb-4">
                        <input type="password" id="password" name="password" id="password" class="form-control form-control-lg" />
                        <label class="form-label" for="password">Contraseña</label>
                      </div>

                      <div class="pt-1 mb-4">
                        <button class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" id="login" type="button">Login</button>
                      </div>

                      <a class="small text-muted" href="#">¿Olvidaste la contreseña?</a>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- End of Main Content -->
  <script type="text/javascript" src="{{ asset('/js/jquery-3.6.0.js') }}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script>
        var tasks_url = <?php echo json_encode(route('taskslist')) ?>;
        var task = <?php echo json_encode(route('task')) ?>;
    </script>
  <script src="{{ asset('/js/requests/ajax.js') }}"></script>
</body>

</html>