//Cancelo la recarga de la pagina cuando se presiona ENTER
$("#busqueda").on("keypress",function (e) {
    var tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13)
        e.preventDefault();
});

//Busco por ajax los videos de youtube
function Buscar()
{
    var busqueda = $("#busqueda").val();

    if (busqueda == "")
    {
        alert("Debe ingresar una busqueda!");
        return false;
    }

    var param = "busqueda="+busqueda;

    $.ajax({
        type: "POST",
        url: "search_youtube.php",
        data: param,
        dataType:"json",
        success: function(data_result){
            if (data_result.success==true)
            {
                console.log("Resultados");
                console.log(data_result);
                MostrarResultados(data_result.resultados);
                return true;
            }
            else
            {
            	console.log(data_result);
                MostrarError(data_result.error_desc);
                return false;
            }
        }
    });
}

//Muestro los errores o busquedas nulas
function MostrarError(error_desc) {
    var html = "<div class='alert alert-danger'>"+ error_desc +"</div>";

    $("#results").html(html);

    return true;
}

//Muestro los resultados en el html
function MostrarResultados(datos){
    var html = '';
    var contador = 1;
    $.each(datos, (index, value) =>{
        html += '<div class="col-md-4">\n' +
            '                    <div class="card" style="width: 18rem;">\n' +
            '                        <iframe id="iframe" style="width:100%;height:100%" src="//www.youtube.com/embed/'+value.videoId+'" data-autoplay-src="//www.youtube.com/embed/'+value.videoId+'"></iframe>\n' +
            '                        <div class="card-body">\n' +
            '                            <h5 class="card-title">'+ value.title +'</h5>\n' +
            '                            <p class="card-text">'+ value.description +'</p>\n' +
            '                        </div>\n' +
            '                        <ul class="list-group list-group-flush">\n' +
            '                            <li class="list-group-item"><b>Id:</b> '+ value.videoId +'</li>\n' +
            '                            <li class="list-group-item"><b>publishedAt:</b> '+ value.publishedAt +'</li>\n' +
            '                            <li class="list-group-item"><b>thumbnails(default url):</b> '+ value.thumbnails.default.url +'</li>\n' +
            '                            <li class="list-group-item"><b>channelTitle:</b> '+ value.channelTitle +'</li>\n' +
            '                        </ul>\n' +
            '                    </div>\n' +
            '                </div>';

        if (contador == 3)
        {
            html += '<div class="w-100">&nbsp;</div>';
            contador = 0;
        }
        contador++;
    });

    $("#results").html(html);

    return true;
}