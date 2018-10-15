$("#faculty").change(function(event) {

    $.get("/school/" + event.target.value + "", function(response, faculty) {

        $("#school").empty();
        $("#cathedra").empty();
        $("#matter").empty();
        $('#school').append($('<option>', {
            value: "",
            text: 'Seleccione'
        }));
        $('#cathedra').append($('<option>', {
            value: "",
            text: 'Seleccione'
        }));
        $('#matter').append($('<option>', {
            value: "",
            text: 'Seleccione'
        }));
        $('#topic').append($('<option>', {
            value: "",
            text: 'Seleccione'
        }));
        $('#content').append($('<option>', {
            value: "",
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
        $("#matter").empty();
        $('#cathedra').append($('<option>', {
            value: "",
            text: 'Seleccione'
        }));
        $('#matter').append($('<option>', {
            value: "",
            text: 'Seleccione'
        }));
        $('#topic').append($('<option>', {
            value: "",
            text: 'Seleccione'
        }));
        $('#content').append($('<option>', {
            value: "",
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
            value: "",
            text: 'Seleccione'
        }));
        $('#topic').append($('<option>', {
            value: "",
            text: 'Seleccione'
        }));
        $('#content').append($('<option>', {
            value: "",
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
$("#matter").change(function(event) {
    $.get("/topic/" + event.target.value + "", function(response, faculty) {
        $("#topic").empty();
        $('#topic').append($('<option>', {
            value: "",
            text: 'Seleccione'
        }));
        $('#content').append($('<option>', {
            value: "",
            text: 'Seleccione'
        }));
        for (i = 0; i < response.length; i++) {
            $('#topic').append($('<option>', {
                value: response[i].id,
                text: response[i].nombre
            }));
        }
    });

});

$("#topic").change(function(event) {
    $.get("/content/" + event.target.value + "", function(response, faculty) {
        $("#content").empty();
        $('#content').append($('<option>', {
            value: "",
            text: 'Seleccione'
        }));
        for (i = 0; i < response.length; i++) {
            $('#content').append($('<option>', {
                value: response[i].id,
                text: response[i].nombre
            }));
        }
    });

});