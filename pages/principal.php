<?php
/*
 * Autor: Marcio Souza
 * Revisao: 0
 * Data: 12/12/2011
 * Arquivo principal do sistema, faz chamadas para todas as interfaces
 */
/* session_start('login');
  if($_SESSION["conectado"]=='sim'){
  echo "<script language='JavaScript'>
  alert('Voce nao esta conectado, Favor logar novamente.');
  window.location = 'index.php';
  </script>";
  } */
if (!isset($_SESSION))
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Valparts S.A</title>

        <!-- jQuery UI 1.12.1 -->
        <link href="../vendor/jquery-ui-1.12.1.custom/jquery-ui.css" rel="stylesheet">

        <!-- Bootstrap Core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="principal.php">Valparts v1.0</a>
                </div>
                <!-- /.navbar-header -->
                <ul class="nav navbar-top-links navbar-right">
                    <a class="navbar-brand" href="#">
                        <i class="fa fa-user fa-fw"></i> 
                        <?php echo @$_SESSION['usu_login']; ?>
                    </a>
                    <a class="navbar-brand" href="../index.php"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <?php include '../view/menu.php'; ?>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>
            <!-- Page Content -->
            <div id="page-wrapper">
                <div id="conteudo" class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Pagina Inicial</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../vendor/jquery/jquery.min.js"></script>

        <!-- jQuery UI 1.12.1 -->
        <script src="../vendor/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../vendor/metisMenu/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../dist/js/sb-admin-2.js"></script>

        <!-- jqwidgets Fonts -->

        <link rel="stylesheet" href="../jqwidgets-ver4.5.0/jqwidgets/styles/jqx.base.css" type="text/css" />

        <script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxcore.js"></script>
        <script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxbuttons.js"></script>
        <script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxscrollbar.js"></script>

        <script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxdata.js"></script>
        <script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxdata.export.js"></script>
        <script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxdatatable.js"></script>
        <script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxdropdownlist.js"></script>
        <script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxlistbox.js"></script>

        <script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxmenu.js"></script>

        <script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxgrid.js"></script>
        <script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxgrid.filter.js"></script>
        <script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxgrid.sort.js"></script> 
        <script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxgrid.pager.js"></script> 
        <script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxgrid.selection.js"></script> 
        <script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxgrid.edit.js"></script> 
        <script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxgrid.export.js"></script>
        <script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxinput.js"></script>

        <script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxdatetimeinput.js"></script>
        <script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxcalendar.js"></script>

    </body>

</html>
