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

/**
 * getImagePath
 */
function getImagePath(img, imgUrlBase) {
  var imageUrl = "https://via.placeholder.com/150";

  if (img) {
     if (img.indexOf("http://") == 0 || img.indexOf("https://") == 0) {
        imageUrl = img
     } else {
        imageUrl = imgUrlBase + "copertine/" + img;
     }
  }
  return imageUrl;
}