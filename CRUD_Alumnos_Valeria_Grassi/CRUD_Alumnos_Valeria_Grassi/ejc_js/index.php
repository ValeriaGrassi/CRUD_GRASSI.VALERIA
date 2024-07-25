<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Validación de Formulario</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
  <link rel="stylesheet" type="text/css" href="css/estilo.css" />
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
    <form class="form" name="form1" method="get" action="ingreso.php">
      <table>
        <tr>
          <td class="tit">Nombre:</td>
          <td class="cuerpotit">
            <input type="text" name="nombre" id="nombre" size="20" maxlength="10" />
          </td>
        </tr>
        <tr>
          <td class="tit">Apellidos:</td>
          <td class="cuerpotit">
            <input type="text" name="apellidos" id="apellidos" size="20" maxlength="30" />
          </td>
        </tr>
        <tr>
          <td class="tit">Carrera:</td>
          <td class="cuerpotit">
            <input type="text" name="car" id="car" size="50" maxlength="50" />
          </td>
        </tr>
        <tr>
          <td class="tit">Nro Doc:</td>
          <td class="cuerpotit">
            <input type="text" name="nrodoc" id="nrodoc" size="10" maxlength="10" />
          </td>
        </tr>
        <tr>
          <td class="tit">Nro Insc:</td>
          <td class="cuerpotit">
            <input type="text" name="nroinsc" id="nroinsc" size="10" maxlength="10" />
          </td>
        </tr>
        <tr>
          <td class="tit">Provincia:</td>
          <td class="cuerpotit">
            <select name="provincia" id="provincia">
              <option value="">Seleccionar</option>
              <option value="Mendoza">Mendoza</option>
              <option value="Cordoba">Cordoba</option>
              <option value="San Luis">San Luis</option>
              <option value="Neuquen">Neuquen</option>
            </select>
          </td>
        </tr>
        <tr>
          <td class="tit">Telefono:</td>
          <td class="cuerpotit">
            <input type="text" name="nrotel" maxlength="10" />
          </td>
        </tr>
        <tr>
          <td class="tit">Comentarios:</td>
          <td class="cuerpotit">
            <textarea name="coment" id="coment" rows="10" cols="20"></textarea>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <input type="submit" name="insertar" value="Insertar Alumno" onClick="return Validar_formulario(this.form)" />
            <input type="Reset" value="borrar" />
          </td>
        </tr>
      </table>
    </form>
    <table width="50%" border="0" cellpadding="2" cellspacing="2" class="border">
      <tr>
        <td class="conten" style="background-color: #f5f5f5" id="linea_10_1" name="linea_9_1">
          <div align="center">
            <a href="ingreso.php">Ver Lista de Alumnos</a>
          </div>
        </td>
      </tr>
    </table>
  </div>
  <div class="footer hstack">
    <img src="img/footer.jpg">
  </div>
</body>

</html>