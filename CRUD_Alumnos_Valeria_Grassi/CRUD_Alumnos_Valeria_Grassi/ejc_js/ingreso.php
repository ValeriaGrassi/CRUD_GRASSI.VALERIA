<?php
//inluimos el archivo que nos permite llamar a una funci�n que se conecta a la  Bd y nos devuelve una conexi�n exitosa
require_once 'lib/dbconect.inc.php';
$mysqli = Conectarse();

//esto print es para saber que es lo que viene del archivo anterior
//print_r($_REQUEST);

if (
  isset($_REQUEST['insertar']) and
  $_REQUEST['insertar'] == 'Insertar Alumno'
) {
  //tomamos las variables que vienen del archivo index.html
  $stamp_now = time();
  $w_fec_mod = date('Y-m-d', $stamp_now);
  $wins_cod_car = $_REQUEST['car'];
  $walu_nro_doc = $_REQUEST['nrodoc'];
  $walu_nombre = $_REQUEST['nombre'];
  $walu_apellido = $_REQUEST['apellidos'];
  $walu_nroinsc = $_REQUEST['nroinsc'];
  $walu_provincia = $_REQUEST['provincia'];
  $walu_telefono = $_REQUEST['nrotel'];
  $walu_coment = $_REQUEST['coment'];

  //insertamos estas variables en la bd
  $resultado = mysqli_query(
    $mysqli,
    "INSERT into alumno (alu_dni, alu_nombre, alu_apellido, alu_carrera, alu_insc, alu_provincia, alu_coment, alu_telefono)
				  values ($walu_nro_doc,'$walu_nombre','$walu_apellido','$wins_cod_car',$walu_nroinsc,'$walu_provincia','$walu_coment','$walu_telefono')"
  );

  //verificamos que la inserción haya sido exitosa - caso contrario le avisamos y lo reenviamos de vuelta
  if ($mysqli->affected_rows == 1) {
    echo "<script languaje=\"javascript\" type\"text/javascript\"> alert('Se ha cargado exitosamente.'); </script>";
  } else {
    // echo "<script languaje=\"javascript\" type\"text/javascript\"> alert('Error en la insercion de datos.'); document.location.href = \"index.html\"; </script>";
    echo $resultado;
    echo $mysqli->error;
  }
} elseif (isset($_REQUEST['eliminar']) and $_REQUEST['eliminar'] == 001) {
  //tomamos las variables que vienen desde este mismo archivo pero gracias a las varibles del boton la utilizamos para llegar
  //hasta aquí y no a otro lugar

  //eliminamos este alumno de la bd
  $resultado = mysqli_query(
    $mysqli,
    'DELETE FROM alumno WHERE alu_dni = ' . $_REQUEST['walu_dni'] . ''
  );

  //verificamos que la inserci�n haya sido exitosa - caso contrario le avisamos y lo reenviamos de vuelta
  if ($mysqli->affected_rows == 1) {
    echo "<script languaje=\"javascript\" type\"text/javascript\"> alert('Se ha eliminado exitosamente.'); document.location.href = \"ingreso.php\"; </script>";
  } else {
    echo "<script languaje=\"javascript\" type\"text/javascript\"> alert('Error en la eliminaci&oacuten de datos.'); document.location.href = \"ingreso.php\"; </script>";
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>ABM ALUMNOS BELGRANO</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
  <link rel="stylesheet" type="text/css" href="css/estilo.css">
  <script src="js/script.js"></script>
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
  <div class="container-fluid main">
    <table width="50%" border="0" cellpadding="2" cellspacing="2" class=border>
      <tr>
        <td class=td><span class=tit><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ALUMNOS INSCRIPTOS POR CARRERA</b></span><BR></td>
      </tr>
    </table>
    <table width="100%" border="1" cellpadding="2" cellspacing="2" class=border style="background-color:#C5C5C5">
      <tr>
        <td width="25%" class=td>
          <div><span class=tit>Carrera</span></div>
        </td>
        <td class=td>
          <div><span class=tit>Apellido</span></div>
        </td>
        <td class=td>
          <div><span class=tit>Nombre</span></div>
        </td>
        <td class=td>
          <div><span class=tit>Nro. Documento</span></div>
        </td>
        <td class=td>
          <div><span class=tit>Nro Insc.</span></div>
        </td>
        <td class=td>
          <div><span class=tit>Provincia</span></div>
        </td>
        <td class=td>
          <div><span class=tit>Telefono</span></div>
        </td>
        <td class=td>
          <div><span class=tit>Comentarios</span></div>
        </td>
        <td class=td>
          <div><span class=tit>Actualizar</span></div>
        </td>
        <td class=td>
          <div><span class=tit>Eliminar</span></div>
        </td>
      </tr>
      <?php if (
        $resultado = mysqli_query($mysqli, 'SELECT * FROM alumno')
      ) {
        //el siguiente while permite que se vayan imprimiendo en html de a uno por vez seg�n la tabla de la BD
        while ($row = $resultado->fetch_assoc()) {
          echo '<tr>' .
            "<td class=\"conten\" style=\"background-color:#f5f5f5\">" .
            $row['alu_carrera'] .
            '</td>' .
            "<td class=\"conten\" style=\"background-color:#f5f5f5\">" .
            $row['alu_apellido'] .
            '</td>' .
            "<td class=\"conten\" style=\"background-color:#f5f5f5\">" .
            $row['alu_nombre'] .
            '</td>' .
            "<td class=\"conten\" style=\"background-color:#f5f5f5\">" .
            $row['alu_dni'] .
            '</td>' .
            "<td class=\"conten\" style=\"background-color:#f5f5f5\">" .
            $row['alu_insc'] .
            '</td>' .
            "<td class=\"conten\" style=\"background-color:#f5f5f5\">" .
            $row['alu_provincia'] .
            '</td>' .
            "<td class=\"conten\" style=\"background-color:#f5f5f5\">" .
            $row['alu_telefono'] .
            '</td>' .
            "<td class=\"conten\" style=\"background-color:#f5f5f5\">" .
            $row['alu_coment'] .
            '</td>' .
            "<td class=\"conten\" style=\"background-color:#f5f5f5\">" .
            "<div align=\"center\">" .
            "<a href=\"actualizar.php?modificar=001&walu_dni=" .
            $row['alu_dni'] .
            "\">" .
            "<img src=\"img/upd.gif\" width=\"20\" height=\"20\" />" .
            '</a>' .
            '</div>' .
            '</td>' .
            "<td class=conten style=\"background-color:#f5f5f5\">" .
            "<div align=\"center\">" .
            "<a href=\"ingreso.php?eliminar=001&walu_dni=" .
            $row['alu_dni'] .
            "\">" .
            "<img src=\"img/del.gif\" width=\"20\" height=\"20\" />" .
            '</a>' .
            '</div>' .
            '</td>' .
            '</tr>';
        }
        /* liberar el proceso de RAM sobre el conjunto de resultados */
        $resultado->close();
      } ?>
    </table>
    <table width="50%" border="0" cellpadding="2" cellspacing="2" class=border>
      <tr>
        <td class=conten style="background-color:#f5f5f5">
          <div align="center"><a href="index.php">Ingresar Nuevo Alumno</a></div>
        </td>
      </tr>
    </table>
  </div>
  <div class="footer hstack">
    <img src="img/footer.jpg">
  </div>
</body>

</html>