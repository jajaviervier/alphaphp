<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Resumen Diario
        <small>Informacion rapida.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Inicio</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
    <?php

$funcionarios = ControllerFuncionarios::listarFuncionariosCtr();


$funcionariosActivos=0;
$funcionariosInactivos=0;
$funcTotales=0;
$porcentaje=0;
          foreach ($funcionarios as $key => $value) {
           
            switch ($value["estado"]) {
              case "terreno":
              $funcionariosActivos++;
                  break;
              case "libre":
              $funcionariosInactivos++;
                  break;

          }
     
          } 
          $funcTotales=$funcionariosActivos+$funcionariosInactivos;
          $porcentaje=$funcionariosActivos*100;
          $porcentaje=$porcentaje/$funcTotales;

?>
  <div class="row">
    <div class="col-sm-6">
<!-- Apply any bg-* class to to the info-box to color it -->
        <div class="info-box bg-grey">
        <span class="info-box-icon"><i class="fas fa-users"></i></span>
        <div class="info-box-content">
        <span class="info-box-text">Funcionarios En Terreno </span>
        <span class="info-box-number"><?php echo $funcionariosActivos; ?>/<?php echo $funcTotales; ?></span>
        <!-- The progress section is optional -->
        <div class="progress">
          <div class="progress-bar" style="width: <?php echo $porcentaje; ?>%;" ></div>
        </div>
        <span class="progress-description">
         Actualizado hace 3 min...
        </span>
      </div>
  <!-- /.info-box-content -->

<!-- /.info-box -->
    </div>
  </div>
<!-- Tarjeta Vehiculo -->
    <div class="col-sm-6">

        <div class="info-box bg-grey">
        <span class="info-box-icon"><i class="fas fa-car"></i>
        </span>
        <div class="info-box-content">
        <span class="info-box-text">Vehiculos En Terreno</span>
        <span class="info-box-number">2/8</span>
        <!-- The progress section is optional -->
        <div class="progress">
          <div class="progress-bar" style="width: 20%;"></div>
        </div>
        <span class="progress-description">
         Actualizado hace 3 min...
        </span>
      </div>

    </div>
    </div>
<!-- Tarjeta Vehiculo -->
<!-- Tarjeta Armas -->
<div class="col-sm-6">
<?php

$armas = ControllerArmas::listarArmasCtr();


$armasActivos=0;
$armasInactivos=0;
$armasTotales=0;
$porcentajeArmas=0;
          foreach ($armas as $key => $value) {
           
            switch ($value["estadoArmas"]) {
              case "terreno":
              $armasActivos++;
                  break;
              case "libre":
              $armasInactivos++;
                  break;

          }
     
          } 
          $armasTotales=$armasActivos+$armasInactivos;
          $porcentajeArmas=$armasActivos*100;
          $porcentajeArmas=$porcentajeArmas/$armasTotales;

?>
<div class="info-box bg-grey">
<span class="info-box-icon"><i class="fas fa-list-ul"></i>
</span>
<div class="info-box-content">
<span class="info-box-text">Armas En Terreno</span>
<span class="info-box-number"><?php echo $armasActivos; ?>/<?php echo $armasInactivos; ?></span>
<!-- The progress section is optional -->
<div class="progress">
  <div class="progress-bar bg-green"  style="width: <?php echo $porcentajeArmas; ?>%;" ></div>
</div>
<span class="progress-description">
 Actualizado hace 3 min...
</span>
</div>

</div>
</div>
<!-- Tarjeta Armas -->

<!-- Tarjeta Quimico -->
<div class="col-sm-6">

<div class="info-box bg-grey">
<span class="info-box-icon"><i class="fas fa-flask"></i>
</span>
<div class="info-box-content">
<span class="info-box-text">Quimicos Disponible</span>
<span class="info-box-number">200/1800</span>
<!-- The progress section is optional -->
<div class="progress">
  <div class="progress-bar " style="width: 20%;"></div>
</div>
<span class="progress-description">
 Actualizado hace 3 min...
</span>
</div>

</div>
</div>
<!-- Tarjeta Quimicos -->
    </section>
    <!-- /.content -->
  </div>