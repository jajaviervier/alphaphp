<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gestor de Funcionarios
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <button class="btn btn-primary" data-toggle="modal" data-target="#modal-insertar-funcionarios">Registrar <i class="fas fa-plus"></i></button>
      <table class="table table-dark" id="tablaFuncionarios">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>    
            <th scope="col">Apellido</th>
            <th scope="col">Estado</th>

            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>

          <?php 
          
          $funcionarios = ControllerFuncionarios::listarFuncionariosCtr();

          foreach ($funcionarios as $key => $value) {
            if($value["estado"]=="libre"){
              $estado="libre";
            }else{
              $estado="en terreno";
            }
            echo '
              <tr>
                <th scope="row">'.$value["rutFuncionarios"].'</th>
                <td>'.$value["nombreFuncionarios"].'</td>
                <td>'.$value["cargoFuncionarios"].'</td>
                <td>' .$estado.'</td>
              
              
                <td width="100">
                  <button class="btn btn-sm btn-info"  data-toggle="modal" data-target="#modal-editar-funcionarios">
                    <i class="far fa-edit"></i>
                  </button>
                  <button class="btn btn-sm btn-danger btnEliminarFuncionarios" idFuncionarios="'.$value["idfuncionarios"].'" rutaImagen="'.$value["imagenFuncionarios"].'">
                    <i class="far fa-trash-alt"></i>
                  </button>
                </td>
              </tr>
            ';
          }
          echo " <script> $('#tablaFuncionarios').DataTable(); </script>";
          ?>
        </tbody>
      </table>

    </section>
    <!-- /.content -->
  </div>