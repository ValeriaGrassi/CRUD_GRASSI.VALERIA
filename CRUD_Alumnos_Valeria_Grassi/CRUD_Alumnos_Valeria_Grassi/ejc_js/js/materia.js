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

function Validar_materia(formobj) {
    var fieldRequired = new Array("materia");

    var fieldDescription = new Array("Materia");

    var alertMsg = "Por favor complete el siguiente campo:\n";
    var l_Msg = alertMsg.length;
    for (var i = 0; i <= fieldRequired.length; i++) {
        var obj = formobj.elements[fieldRequired[i]];

        if (obj) {
            switch (obj.type) {
                case "text":
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
