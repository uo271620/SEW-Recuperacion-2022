misComentarios = new Object;

misComentarios.publicar = function(){
    var asunto = $("#asunto").val();
    var comentario = $("#contenido").val();

    $("#comentarios").append("<section><h2>"+asunto+"</h2><p>"+comentario+"</p></section>");
    $("#asunto").text("");
    $("#contenido").text("");
}

$(document).ready(function(){
	$("#enviar").click(function(){
        misComentarios.publicar();
    });
});





