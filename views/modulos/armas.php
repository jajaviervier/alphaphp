<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gestor de Armas
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <button class="btn btn-primary" data-toggle="modal" data-target="#modal-insertar-armas">Registrar <i class="fas fa-plus"></i></button>
      <table class="table table-dark" id="tablaArmas">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Modelo</th>    
            <th scope="col">Marca</th>
            <th scope="col">Estado</th>
            <th scope="col">Imagen </th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>

          <?php 
          
          $armas = ControllerArmas::listarArmasCtr();

          foreach ($armas as $key => $value) {
            if($value["estadoArmas"]=="libre"){
              $estado="Bodega";
            }else{
              $estado="en Terreno";
            }
            echo '
              <tr>
                <th scope="row">'.$value["serieArmas"].'</th>
                <td>'.$value["modeloArmas"].'</td>
                <td>'.$value["marcaArmas"].'</td>
                <td>' .$estado.'</td>
              
                
                <td width="100">
                  <button class="btn btn-sm btn-info " idArmas="'.$value["idArmas"].'" data-toggle="modal" data-target="#modal-editar-armas">
                    <i class="far fa-edit"></i>
                  </button>
                  <button class="btn btn-sm btn-danger btnEliminarArmas" idArmas="'.$value["idArmas"].'" ">
                    <i class="far fa-trash-alt"></i>
                  </button>
                </td>
              </tr>
            ';
          }
          echo " <script> $('#tablaArmas').DataTable(); </script>";
          ?>
        </tbody>
      </table>

    </section>
    <!-- /.content -->
  </div>