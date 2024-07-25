var urlParams;
(window.onpopstate = function () {
  var match,
    pl = /\+/g, // Regex for replacing addition symbol with a space
    search = /([^&=]+)=?([^&]*)/g,
    decode = function (s) {
      return decodeURIComponent(s.replace(pl, " "));
    },
    query = window.location.search.substring(1);

  urlParams = {};
  while ((match = search.exec(query)))
    urlParams[decode(match[1])] = decode(match[2]);
})();

function Validar_formulario(formobj) {
  var fieldRequired = new Array(
    "nombre",
    "apellidos",
    "car",
    "nrodoc",
    "nroinsc",
    "provincia",
    "nrotel",
    "coment"
  );

  var fieldDescription = new Array(
    "Nombre",
    "Apellidos",
    "Carrera",
    "Nro Doc",
    "Nro Insc",
    "Provincia",
    "Telefono",
    "Comentarios"
  );

  var alertMsg = "Por favor complete el siguiente campo:\n";
  var l_Msg = alertMsg.length;

  for (var i = 0; i <= fieldRequired.length; i++) {
    var obj = formobj.elements[fieldRequired[i]];
    //alert(obj.name);
    if (obj) {
      switch (obj.type) {
        case "select-one":
          if (
            obj.options[obj.selectedIndex].value == "" ||
            obj.options[obj.selectedIndex].text == "Seleccionar"
          ) {
            alertMsg += " - " + fieldDescription[i] + "\n";
          }
          break;
        case "text":
          if (obj.value == "" || obj.value == null) {
            alertMsg += " - " + fieldDescription[i] + "\n";
          }

          if (obj.name == "nrodoc" && !Esentero(obj.value)) {
            alertMsg += " - " + fieldDescription[i] + "\n";
          } else if (obj.name == "nroinsc" && !Esentero(obj.value)) {
            alertMsg += " - " + fieldDescription[i] + "\n";
          } else if (obj.name === "nrotel" && !esTelefono(obj.value)) {
            alertMsg += " - " + fieldDescription[i] + "\n";
          }

          break;
        case "textarea":
          if (obj.value == "" || obj.value == null) {
            alertMsg += " - " + fieldDescription[i] + "\n";
          }
          break;
        default:
      }
      if (obj.type == undefined) {
        var blnchecked = false;
        for (var j = 0; j < obj.length; j++) {
          if (obj[j].checked) {
            blnchecked = true;
          }
        }
        if (!blnchecked) {
          alertMsg += " - " + fieldDescription[i] + "\n";
        }
      }
    }
  }

  if (alertMsg.length == l_Msg) {
    return true;
  } else {
    alert(alertMsg);
    return false;
  }
}

/* Verifica que sea un numero de telefono con los siguientes posibles formatos:
  123-456-7890
  (123) 456-7890
  123 456 7890
  123.456.7890
  +91 (123) 456-7890
  1234567890
*/
function esTelefono(valor) {
  return valor.match(/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/);
}

//VERIFICA QUE SEA UN NUMERO ENTERO   124444
function Esentero(valor) {
  if (!isNaN(valor)) {
    for (var i = 0; i < valor.length; i++) {
      if (valor.charCodeAt(i) < 48 || valor.charCodeAt(i) > 57) return false;
    }
  } else {
    return false;
  }

  return true;
}
