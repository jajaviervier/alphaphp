<div class="login-box">
  <div class="login-logo">
    <a href="">Alpha</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Iniciar Sesión </p>

    <form method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="user" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" required >
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
    
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-success btn-block btn-flat center mx-auto">Ingresar</button>
        </div>
      </div>
      <?php 

        $iniciarSesion = new ControllerSesion();
        $iniciarSesion -> iniciarSesionCtr();

      ?>
     
    </form>
  </div>

</div>
