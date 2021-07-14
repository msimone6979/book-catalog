/**
 * popolaUtenti
 */
 function popolaCasaEditrici(id) {
    $.getJSON("./public/casa-editrice/list", function (data) {
      var select = $("#idCasaEditrice");
      select.empty().append('<option value="-1">Casa Editrice</option>');
      $.each(data, function (k, v) {
        var option = $("<option />");
        if (v.id === id) {
          option.attr("selected", "selected");
        }
        option.attr("value", v.id).html(v.denominazione).appendTo(select);
      });
    });
  }

  
  /**
 * popolaAutore
 */
 function popolaAutore(id) {
  $.getJSON("./public/autore/list", function (data) {
    var select = $("#idAutore");
    select.empty().append('<option value="-1">Autore</option>');
    $.each(data, function (k, v) {
      var option = $("<option />");
      if (v.id === id) {
        option.attr("selected", "selected");
      }
      option.attr("value", v.id).html(v.cognome+ " "+ v.nome).appendTo(select);
    });
  });
}