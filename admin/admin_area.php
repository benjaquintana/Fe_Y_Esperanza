<?php 
    // Sesión
    require_once 'funciones/sesiones.php';
    // Funciones
    require_once 'funciones/funciones.php';
    //Header
    include_once 'templates/header.php';
    //Barra
    include_once 'templates/barra.php';
    //Navegacion
    include_once 'templates/navegacion.php';
?>
        
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <h5 class="mb-2 mt-4">Registro de Usuarios</h5>
        <div class="row">
            <div class="col-md-12">
                <!-- AREA CHART -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Registro de Usuarios <small>por Fecha</small></h3>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

        <!-- Datos de los Miembros -->
        <h5 class="mb-2 mt-4">Resumen de Información</h5>
        <div class="row">
            <!-- Total de Miembros -->
            <div class="col-lg-3 col-6">
                <?php
                    $sql = "SELECT COUNT(id_miembro) AS miembros FROM miembro ";
                    $resultado = $conn->query($sql);
                    $miembros = $resultado->fetch_assoc();
                ?>
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?php echo $miembros['miembros']; ?></h3>
                        <p>Total Miembros</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="lista_miembros.php" class="small-box-footer">
                        Más Información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        
            <!-- Total de Páginas -->
            <div class="col-lg-3 col-6">
                <?php
                    /*$sql = "SELECT COUNT(id_pagina) AS paginas FROM paginas ";
                    $resultado = $conn->query($sql);
                    $paginas = $resultado->fetch_assoc();*/
                ?>
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>4<?php echo $paginas['paginas']; ?></h3>
                        <p>Total Páginas</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-flag"></i>
                    </div>
                    <a href="lista_paginas.php" class="small-box-footer">
                        Más Información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        
            <!-- Total de Radios -->
            <div class="col-lg-3 col-6">
                <?php
                    $sql = "SELECT COUNT(id_radio) AS radios FROM radios ";
                    $resultado = $conn->query($sql);
                    $radios = $resultado->fetch_assoc();
                ?>
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?php echo $radios['radios']; ?></h3>
                        <p>Total Radios</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-broadcast-tower"></i>
                    </div>
                    <a href="lista_radios.php" class="small-box-footer">
                        Más Información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        
            <!-- Total de Canales -->
            <div class="col-lg-3 col-6">
                <?php
                    $sql = "SELECT COUNT(id_canal) AS canales FROM canales ";
                    $resultado = $conn->query($sql);
                    $canales = $resultado->fetch_assoc();
                ?>
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?php echo $canales['canales']; ?></h3>
                        <p>Total Canales</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-tv"></i>
                    </div>
                    <a href="lista_canales.php" class="small-box-footer">
                        Más Información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Footer -->
<?php include_once 'templates/footer.php'?>
<!-- Fin Footer -->
