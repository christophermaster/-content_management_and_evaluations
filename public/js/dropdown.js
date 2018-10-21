$("#faculty").change(function(event) {

    $.get("/school/" + event.target.value + "", function(response, faculty) {

        $("#school").empty();
        $("#cathedra").empty();
        $("#matter").empty();
        $("#topic").empty();
        $('#topic').append($('<option>', {
            value: "",
            text: 'Seleccione'
        }));
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


/**Segundo formulario */

$("#facultyy").change(function(event) {

    $.get("/school/" + event.target.value + "", function(response, faculty) {

        $("#schooll").empty();
        $("#cathedraa").empty();
        $("#matterr").empty();
        $("#topicc").empty();
        $('#topicc').append($('<option>', {
            value: "",
            text: 'Seleccione'
        }));
        $('#schooll').append($('<option>', {
            value: "",
            text: 'Seleccione'
        }));
        $('#cathedraa').append($('<option>', {
            value: "",
            text: 'Seleccione'
        }));
        $('#matterr').append($('<option>', {
            value: "",
            text: 'Seleccione'
        }));
        $('#topicc').append($('<option>', {
            value: "",
            text: 'Seleccione'
        }));
        $('#contentt').append($('<option>', {
            value: "",
            text: 'Seleccione'
        }));
        for (i = 0; i < response.length; i++) {
            $('#schooll').append($('<option>', {
                value: response[i].id,
                text: response[i].nombre
            }));
        }
    });

});

$("#schooll").change(function(event) {

    $.get("/cathedra/" + event.target.value + "", function(response, faculty) {
        $("#cathedraa").empty();
        $("#matterr").empty();
        $('#cathedraa').append($('<option>', {
            value: "",
            text: 'Seleccione'
        }));
        $('#matterr').append($('<option>', {
            value: "",
            text: 'Seleccione'
        }));
        $('#topicc').append($('<option>', {
            value: "",
            text: 'Seleccione'
        }));
        $('#contentt').append($('<option>', {
            value: "",
            text: 'Seleccione'
        }));
        for (i = 0; i < response.length; i++) {
            $('#cathedraa').append($('<option>', {
                value: response[i].id,
                text: response[i].nombre
            }));
        }
    });

});

$("#cathedraa").change(function(event) {

    $.get("/matter/" + event.target.value + "", function(response, faculty) {
        $("#matterr").empty();
        $('#matterr').append($('<option>', {
            value: "",
            text: 'Seleccione'
        }));
        $('#topicc').append($('<option>', {
            value: "",
            text: 'Seleccione'
        }));
        $('#contentt').append($('<option>', {
            value: "",
            text: 'Seleccione'
        }));
        for (i = 0; i < response.length; i++) {
            $('#matterr').append($('<option>', {
                value: response[i].id,
                text: response[i].nombre
            }));
        }
    });

});
$("#matterr").change(function(event) {
    $.get("/topic/" + event.target.value + "", function(response, faculty) {
        $("#topicc").empty();
        $('#topicc').append($('<option>', {
            value: "",
            text: 'Seleccione'
        }));
        $('#contentt').append($('<option>', {
            value: "",
            text: 'Seleccione'
        }));
        for (i = 0; i < response.length; i++) {
            $('#topicc').append($('<option>', {
                value: response[i].id,
                text: response[i].nombre
            }));
        }
    });

});

$("#topicc").change(function(event) {
    $.get("/content/" + event.target.value + "", function(response, faculty) {
        $("#contentt").empty();
        $('#contentt').append($('<option>', {
            value: "",
            text: 'Seleccione'
        }));
        for (i = 0; i < response.length; i++) {
            $('#contentt').append($('<option>', {
                value: response[i].id,
                text: response[i].nombre
            }));
        }
    });

});