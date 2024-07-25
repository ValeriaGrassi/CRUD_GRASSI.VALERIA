<!DOCTYPE html>
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
    <div class="container-fluid main">
        <table width="50%" border="0" cellpadding="2" cellspacing="2" class="border">
            <tr>
                <td class="td">
                    <span class="tit">
                        <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;REQUISITOS DE ASPIRANTES</b>
                    </span>
                    <br />
                    <span class="tit">
                        <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MODIFICACIÓN DE DATOS</b>
                    </span>
                </td>
            </tr>
        </table>
        <form class="form" name="form1" method="get" action="recepcionmateria.php">
            <table>
                <tr>

                    <TD class=tit>Nombre de la Materia:</TD>
                    <TD class=cuerpotit><INPUT TYPE="text" NAME="materia" ID="materia" SIZE="50" MAXLENGTH="50"></TD>
                </tr>
                <tr>
                    <TD colspan="2">
                        <INPUT TYPE="submit" name="insertar" value="Insertar Materia" onClick="return Validar_materia(this.form)">
                        <INPUT TYPE="Reset" value="borrar">
                    </TD>
                </tr>

                <table width="50%" border="4" cellpadding="2" cellspacing="2" class=border>
                    <tr>
                        <td class=conten style="background-color: White" id="linea_1_1" name="linea_1_1">
                            <div align="center"><a href="recepcionmateria.php">Ver Lista de Materias</a></div>
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