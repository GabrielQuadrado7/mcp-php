<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/login.css?>" rel="stylesheet">
    
  </head>
  <body class="text-center bg-dark">
    <main class="form-signin">
      <form method="POST">
        <img class="mb-4" src="../assets/icon.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 fw-normal font-weight-bold text-light">M C P</h1>
        <div class="form-floating text-light pb-2">
          <label for="floatingInput">Login</label>
          <input type="email" class="form-control" placeholder="login..." name=login required>
        </div>
        <div class="form-floating text-light">
          <label for="floatingInput">Senha</label>
          <input type="password" class="form-control" placeholder="senha..." name=senha required>
        </div>
        <br>
        <button class="w-100 btn btn-lg btn-primary" type=submit>Entrar</button>
        <p class="mt-5 mb-3 text-muted">&copy; mark</p>
      </form>
    </main>
  </body>

  <!-- para impedir o reenvio de formulario -->
  <script>
    if(window.history.replaceState){
      window.history.replaceState( null, null, window.location.href );
    }
  </script>

</html>