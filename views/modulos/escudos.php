<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gestor de Escudos
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <button class="btn btn-primary" data-toggle="modal" data-target="#modal-insertar-escudos">Registrar <i class="fas fa-plus"></i></button>
      <table class="table table-dark" id="tablaEscudos">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Modelo</th>    
            <th scope="col">Marca</th>
            <th scope="col">Estado</th>

            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>

          <?php 
          
          $escudos = ControllerEscudos::listarEscudosCtr();

          foreach ($escudos as $key => $value) {
            if($value["estadoEscudos"]=="libre"){
              $estado="Bodega";
            }else{
              $estado="en Terreno";
            }
            echo '
              <tr>
                <th scope="row">'.$value["serieEscudos"].'</th>
                <td>'.$value["modeloEscudos"].'</td>
                <td>'.$value["marcaEscudos"].'</td>
                <td>' .$estado.'</td>               
                <td width="100">
                  <button class="btn btn-sm btn-info " idEscudos="'.$value["idEscudos"].'" data-toggle="modal" data-target="#modal-editar-escudos">
                    <i class="far fa-edit"></i>
                  </button>
                  <button class="btn btn-sm btn-danger btnEliminarEscudos" idEscudos="'.$value["idEscudos"].'" ">
                    <i class="far fa-trash-alt"></i>
                  </button>
                </td>
              </tr>
            ';
          }
          echo " <script> $('#tablaEscudos').DataTable(); </script>";
          ?>
        </tbody>
      </table>

    </section>
    <!-- /.content -->
  </div>