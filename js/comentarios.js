misComentarios = new Object;
misComentarios.count = 2;

misComentarios.publicar = function(){
    var asunto = $("#asunto").val();
    var comentario = $("#contenido").val();
    if (asunto!="" &&comentario!=""){
        $("#comentarios").append("<section><h2>"+asunto+"</h2><p id='comentario-0"+ 
        misComentarios.count +"'>"+comentario+"</p>"+
        "<label for='source-0"+misComentarios.count+"'> Traducir de</label>"+
        "<select id='source-0"+misComentarios.count+"'>"+
        "<option value='en'>en</option><option value='es' selected>es</option><option value='fr'>fr</option>"+
        "</select>" +
        "<label for='target-0"+misComentarios.count+"'> Traducir de</label>"+
        "<select id='target-0"+misComentarios.count+"'>"+
        "<option value='en' selected>en</option><option value='es'>es</option><option value='fr'>fr</option>"+
        "</select>" +
        " <button id='traductor-0"+misComentarios.count+"' onclick='traductor.traduce(this.id)'>Traducir</button>"
        +"</section>");

        misComentarios.count = misComentarios.count + 1;

        $("#asunto").val('');
        $("#contenido").val('');
    }
}
misComentarios.setButons = function (){
    $(document).ready(function(){
        $("#enviar").click(function(){
            misComentarios.publicar();
        });
    });
}
misComentarios.setButons();



