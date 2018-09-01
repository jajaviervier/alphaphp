<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gestor de Cascos
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <button class="btn btn-primary" data-toggle="modal" data-target="#modal-insertar-cascos">Registrar <i class="fas fa-plus"></i></button>
      <table class="table table-dark" id="tablaCascos">
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
          
          $cascos = ControllerCascos::listarCascosCtr();

          foreach ($cascos as $key => $value) {
            if($value["estadoCascos"]=="libre"){
              $estado="Bodega";
            }else{
              $estado="en Terreno";
            }
            echo '
              <tr>
                <th scope="row">'.$value["serieCascos"].'</th>
                <td>'.$value["modeloCascos"].'</td>
                <td>'.$value["marcaCascos"].'</td>
                <td>' .$estado.'</td>               
                <td width="100">
                  <button class="btn btn-sm btn-info " idCascos="'.$value["idCascos"].'" data-toggle="modal" data-target="#modal-editar-cascos">
                    <i class="far fa-edit"></i>
                  </button>
                  <button class="btn btn-sm btn-danger btnEliminarCascos" idCascos="'.$value["idCascos"].'" ">
                    <i class="far fa-trash-alt"></i>
                  </button>
                </td>
              </tr>
            ';
          }
          echo " <script> $('#tablaCascos').DataTable(); </script>";
          ?>
        </tbody>
      </table>

    </section>
    <!-- /.content -->
  </div>