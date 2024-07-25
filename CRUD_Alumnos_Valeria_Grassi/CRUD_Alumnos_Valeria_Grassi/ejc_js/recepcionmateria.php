<?php
//inluimos el archivo que nos permite llamar a una funci�n que se conecta a la  Bd y nos devuelve una conexi�n exitosa
require_once('lib/dbconect.inc.php');
$mysqli = Conectarse();

//esto print es para saber que es lo que viene del archivo anterior
//print_r($_REQUEST);

if (isset($_REQUEST['insertar']) and $_REQUEST['insertar'] == 'Insertar Materia') {

    //tomamos las variables que vienen del archivo index.html
    $stamp_now = time();
    $w_fec_mod = date('Y-m-d', $stamp_now);
    $wmat_nombre  = $_REQUEST['materia'];
    //insertamos estas variables en la bd
    $resultado = mysqli_query($mysqli, "INSERT into materia ( mat_nombre)
				                values ('$wmat_nombre')");


    //verificamos que la inserci�n haya sido exitosa - caso contrario le avisamos y lo reenviamos de vuelta
    if ($mysqli->affected_rows == 1) {
        echo "<script languaje=\"javascript\" type\"text/javascript\"> alert('Se ha cargado exitosamente.'); </script>";
    } else {
        echo ". $mysqli->error . ";
        "<script languaje=\"javascript\" type\"text/javascript\"> alert('Error en la insercion de datos.'); document.location.href = \"materia.php\"; </script>";
    }
} else if (isset($_REQUEST['eliminar']) and $_REQUEST['eliminar'] == 001) {
    //tomamos las variables que vienen desde este mismo archivo pero gracias a las varibles del bot�n la utilizamos para llegar 
    //hasta aqu� y no a otro lugar

    //eliminamos este alumno de la bd
    $resultado = mysqli_query($mysqli, "DELETE FROM materia WHERE mat_codigo = " . $_REQUEST['wmat_nombre'] . "");


    //verificamos que la inserci�n haya sido exitosa - caso contrario le avisamos y lo reenviamos de vuelta
    if ($mysqli->affected_rows == 1) {
        echo "<script languaje=\"javascript\" type\"text/javascript\"> alert('Se ha eliminado exitosamente.'); document.location.href = \"recepcionmateria.php\"; </script>";
    } else {
        echo ". $mysqli->error . ";
    }
}
?>

<html>

<head>
    <meta charset="utf-8" />
    <title>Materia</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css" />
    <script src="js/materia.js"></script>
</head>

<body>
    <div class="hstack header">
        <div class="hstack">
            <img src="img/logo.png">
            <span>Instituto Superior Manuel Belgrano</span>
        </div>
        <li class="hstack">
            <ul><a href="ingreso.php">Ingreso</a></ul>
            <ul><a href="materia.php">Nueva Materia</a></ul>
            <ul><a href="index.php">Nuevo Alumno</a></ul>
        </li>
    </div>
    <div align="center">
        <form name="form1" method="get" action="materia.php">
            <table width="50%" border="0" cellpadding="2" cellspacing="2" class=border>
                <tr>
                    <td class=td>
                        <font class=tit><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Materia Cargada</b></font><BR>
                    </td>
                </tr>
            </table>
            <table width="50%" border="1" cellpadding="2" cellspacing="2" class=border style="background-color:#537e7c">
                <tr>
                    <td width="50%" class=td>
                        <div>
                            <font class=tit>Materia</font>
                        </div>
                    </td>
                </tr>
                <?php
                if ($resultado = mysqli_query($mysqli, "SELECT * FROM materia")) {
                    //el siguiente while permite que se vayan imprimiendo en html de a uno por vez seg�n la tabla de la BD
                    while ($row = $resultado->fetch_assoc()) {

                        echo "<tr>
              <td class=conten style=\"background-color:#f5f5f5\" id=\"linea_1_1\" name=\"linea_1_1\">" . $row['mat_nombre'] . "</td>
  
            </tr>";
                    }

                    /* liberar el proceso de RAM sobre el conjunto de resultados */
                    $resultado->close();
                }

                ?>
            </table>
        </form>
    </div>
    <div class="footer hstack">
        <img src="img/footer.jpg">
    </div>
</body>

</html>