<?php
//inluimos el archivo que nos permite llamar a una funci�n que se conecta a la  Bd y nos devuelve una conexi�n exitosa
require_once 'lib/dbconect.inc.php';
$mysqli = Conectarse();

//esto print es para saber que es lo que viene del archivo anterior
//print_r($_REQUEST);

//la variable modificar es la que viene del icono y si se hizo click all� se podr� ingresar
if (isset($_REQUEST['modificar']) and $_REQUEST['modificar'] == 001) {
    if (
        $resultado = mysqli_query(
            $mysqli,
            'SELECT * FROM alumno  WHERE  alu_dni = ' .
                $_REQUEST['walu_dni'] .
                ''
        )
    ) {
        //observen que queda la llave del while abierta y la de del if anterior esto se atendera al finalizar la consulta que llenara los campos a actualizar
        while ($row = $resultado->fetch_assoc()) { ?>

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
                        <ul><a href="#">Nueva Materia</a></ul>
                        <ul><a href="index.php">Nuevo Alumno</a></ul>
                    </li>
                </div>
                <div class="container-fluid main">
                    <table width="50%" border="2" cellpadding="2" cellspacing="2" class=border>
                        <tr>
                            <td class=td>
                                <font class=tit><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ACTUALIZACI&OacuteN DE ALUMNOS</b></font><BR>
                                <font class=tit>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>MODIFICACI&OacuteN DE DATOS</b></font>
                            </td>
                        </tr>
                    </table>
                    <form name="form2" method="get" action="actualizar.php">
                        <input id="nrodoc" name="nrodoc" type="hidden" value=<?php echo $row['alu_dni']; ?>>

                        <table>
                            <tr>
                                <td class=tit>Nombre:</td>
                                <td class=cuerpotit><input type="text" name="nombre" id="nombre" value=<?php echo $row['alu_nombre']; ?> SIZE="20" MAXLENGTH="10"></td>
                            </tr>
                            <tr>
                                <td class=tit>Apellidos:</td>
                                <td class=cuerpotit><input type="text" name="apellidos" id="apellidos" value=<?php echo $row['alu_apellido']; ?> SIZE="20" MAXLENGTH="30"></td>
                            </tr>
                            <tr>
                                <td class=tit>Carrera:</td>
                                <td class=cuerpotit><input type="text" name="car" id="car" value=<?php echo $row['alu_carrera']; ?> SIZE="50" MAXLENGTH="50"></td>
                            </tr>
                            <tr>
                                <td class=tit>Nro Doc:</td>
                                <td class=cuerpotit><input type="text" name="nrodoc_dis" id="nrodoc_dis" value=<?php echo $row['alu_dni']; ?> SIZE="50" MAXLENGTH="50" DISABLED /></td>
                            </tr>
                            <tr>
                                <td class=tit>Nro Insc:</td>
                                <td class=cuerpotit><input type="text" name="nroinsc" id="nroinsc" value=<?php echo $row['alu_insc']; ?> SIZE="50" MAXLENGTH="50"></td>
                            </tr>
                            <tr>
                                <td class=tit>Provincia:</td>
                                <td class=cuerpotit>
                                    <select name="provincia" id="provincia">
                                        <option value="">Seleccionar</option>
                                        <option value="Mendoza" <?php if (
                                                                    !strcmp('Mendoza', $row['alu_provincia'])
                                                                ) {
                                                                    echo "selected=\"selected\"";
                                                                } ?>>Mendoza</option>
                                        <option value="Cordoba" <?php if (
                                                                    !strcmp('Cordoba', $row['alu_provincia'])
                                                                ) {
                                                                    echo "selected=\"selected\"";
                                                                } ?>>Cordoba</option>
                                        <option value="San Luis" <?php if (
                                                                        !strcmp('San Luis', $row['alu_provincia'])
                                                                    ) {
                                                                        echo "selected=\"selected\"";
                                                                    } ?>>San Luis</option>
                                        <option value="Neuquen" <?php if (
                                                                    !strcmp('Neuquen', $row['alu_provincia'])
                                                                ) {
                                                                    echo "selected=\"selected\"";
                                                                } ?>>Neuquen</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class=tit>Telefono:</td>
                                <td class=cuerpotit><input type="text" name="nrotel" id="nrotel" value=<?php echo $row['alu_telefono']; ?> MAXLENGTH="10"></td>
                            </tr>
                            <tr>
                                <td class=tit>Comentarios:</td>
                                <td class=cuerpotit><textarea name="coment" id="coment" rows=10 cols=20><?php echo $row['alu_coment']; ?></textarea></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" name="Actualizar_Alumno" value="Actualizar Alumno" onClick="return Validar_formulario(this.form)">
                                    <input type="reset" value="Borrar">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="footer hstack">
                    <img src="img/footer.jpg">
                </div>
            </body>

            </html>
<?php } //aqui cerramos el while de la sql
    } else {
        echo 'Alumnos inexistente';
        header('Location: ./ingreso.php');
    }
} elseif (
    isset($_REQUEST['Actualizar_Alumno']) and
    $_REQUEST['Actualizar_Alumno'] == 'Actualizar Alumno'
) {
    //tomamos las variables que vienen desde este mismo archivo pero gracias a las varibles del bot�n la utilizamos para llegar
    //hasta aqu� y no a otro lugar
    $stamp_now = time();
    $w_fec_mod = date('Y-m-d', $stamp_now);
    $wins_cod_car = $_REQUEST['car'];
    $walu_nro_doc = $_REQUEST['nrodoc'];
    $walu_nombre = $_REQUEST['nombre'];
    $walu_apellido = $_REQUEST['apellidos'];
    $walu_nroinsc = $_REQUEST['nroinsc'];
    $walu_provincia = $_REQUEST['provincia'];
    $walu_nrotel = $_REQUEST['nrotel'];
    $walu_coment = $_REQUEST['coment'];

    //insertamos estas variables en la bd
    $resultado = mysqli_query(
        $mysqli,
        "UPDATE alumno SET 
            alu_dni = $walu_nro_doc,
            alu_nombre = '$walu_nombre',alu_apellido = '$walu_apellido',
            alu_provincia ='$walu_provincia',alu_carrera='$wins_cod_car',
            alu_coment ='$walu_coment', alu_insc = $walu_nroinsc, alu_tel = '$walu_nrotel'
        WHERE alu_dni = " .
            $_REQUEST['nrodoc'] .
            ';'
    );

    //verificamos que la inserci�n haya sido exitosa - caso contrario le avisamos y lo reenviamos de vuelta
    if ($mysqli->affected_rows == 1) {
        echo "<script languaje=\"javascript\" type\"text/javascript\"> alert('Se ha actualizado exitosamente.'); document.location.href = \"ingreso.php\"; </script>";
    } else {
        echo "<script languaje=\"javascript\" type\"text/javascript\"> alert('Error en la actualización de datos. " . $mysqli->error . "'); document.location.href = \"actualizar.php?modificar=001&walu_dni=" .
            $_REQUEST['nrodoc'] .
            "\"; </script>";
    }
} else {
    echo 'Archivo incorrecto';
    header('Location: ./ingreso.php');
}
?>