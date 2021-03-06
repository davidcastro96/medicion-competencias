<?php

require'../controlador/sessions.php';
$objses = new Sessions();
$objses->init();
$user = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : null ;
$cedula = isset($_SESSION['cedula']) ? $_SESSION['cedula'] : null ;
if($user == ''){
	 header('Location:../usuario.php?error=2');
} ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>docente</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/uno.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

     <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background: #c9302c;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
<!--                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Start Bootstrap</a>-->
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right" style="background: #c9302c;">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background: #c9302c;">Salir <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="../controlador/log_out.php">cerrar cesi??n</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Docente:
                    <small><?php echo ''.$user; ?></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="inicio.php">docente</a>
                    </li>
                    <li class="active">calificaciones</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-md-3">
                <div class="list-group">
                    <a href="inicio.php" class="list-group-item">Inicio</a>
                    <a href="curso.php" class="list-group-item ">Adicionar curso</a>
                    <a href="preguntas.php" class="list-group-item">Adicionar preguntas</a>
                    <a href="examen.php" class="list-group-item ">Publicar examen</a>
                    <a href="calificacion.php" class="list-group-item active">Calificaciones</a>
                </div>
            </div>
            <!-- Content Column -->
            <div class="col-md-9">
                <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Curso</th>
                <th>Alumno</th>
                <th>Examen</th>
                <th>Calificaci??n</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Curso</th>
                <th>Alumno</th>
                <th>Examen</th>
                <th>Calificaci??n</th>
            </tr>
        </tfoot>
        <tbody>
             <?php
              require '../dao/CalificacionDao.php';
              require '../modelo/Conexion.php';
                    $uDao = new CalificacionDao();
                    $allusers = $uDao->calificaciones($cedula);
                   foreach($allusers as $user) {?>
                <tr><td><?php echo $user['a']; ?> </td>
                    <td>   <?php echo $user['b']; ?> </td>
                    <td> <?php echo $user['c']; ?> </td>
                    <td><?php echo $user['d']; ?></td>
                </tr>
                <?php
                    }?>
        </tbody>
    </table>
                <a href="reporte.php" target="_BLANK">generar pdf</a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12" style="text-align: center;">
                    <p>ADSI;Website 2016</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    
      <script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>


<script>
$(document).ready(function() {
    $('#example').DataTable({responsive: true});
} );</script>

</body>

</html>
