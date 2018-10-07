$("#faculty").change(function(event) {

    $.get("/school/" + event.target.value + "", function(response, faculty) {
        $("#school").empty();
        $('#school').append($('<option>', {
            value: 0,
            text: 'Seleccione'
        }));
        for (i = 0; i < response.length; i++) {
            $('#school').append($('<option>', {
                value: response[i].id,
                text: response[i].nombre
            }));
        }
    });

});

$("#school").change(function(event) {

    $.get("/cathedra/" + event.target.value + "", function(response, faculty) {
        $("#cathedra").empty();
        $('#cathedra').append($('<option>', {
            value: 0,
            text: 'Seleccione'
        }));
        for (i = 0; i < response.length; i++) {
            $('#cathedra').append($('<option>', {
                value: response[i].id,
                text: response[i].nombre
            }));
        }
    });

});

$("#cathedra").change(function(event) {

    $.get("/matter/" + event.target.value + "", function(response, faculty) {
        $("#matter").empty();
        $('#matter').append($('<option>', {
            value: 0,
            text: 'Seleccione'
        }));
        for (i = 0; i < response.length; i++) {
            $('#matter').append($('<option>', {
                value: response[i].id,
                text: response[i].nombre
            }));
        }
    });

});