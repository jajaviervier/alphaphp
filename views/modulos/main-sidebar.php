<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="https://cdn.icon-icons.com/icons2/827/PNG/512/user_icon-icons.com_66546.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION["nombre"];?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menú</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="home"><i class="fa fa-link"></i><span>Resumen Diario <?php echo $_SESSION["avatar"]; ?></span></a></li>
        <li><a href="funcionarios"><i class="fas fa-users"></i> <span>Funcionarios</span></a></li>
        <li><a href="armas"><i class="fas fa-users"></i> <span>Armas</span></a></li>
        <li><a href="cascos"><i class="fas fa-users"></i> <span>Cascos</span></a></li>
        <li><a href="escudos"><i class="fas fa-users"></i> <span>Escudos</span></a></li>

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>