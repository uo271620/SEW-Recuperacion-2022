gestorXML = new Object();

gestorXML.openFile = function(file){
    var archivo = file[0];
    if (archivo.type.match("text/xml")) 
       {
        var lector = new FileReader();
        lector.onload = function (evento) {
            var responseDoc = new DOMParser().parseFromString(lector.result, 'application/xml');
            var stringResponse = [];
            for (var i = 0; i< responseDoc.getElementsByTagName("tipo").length; i++){
                var tipo = responseDoc.getElementsByTagName("tipo")[i];
                stringResponse.push("<section>");
                stringResponse.push("<h2>" + tipo.attributes[0].value +"</h2>");
                for (var j = 0; j< tipo.getElementsByTagName("producto").length; j++){
                    var producto = tipo.getElementsByTagName("producto")[j];
                    stringResponse.push("<h3> Nombre: "+producto.attributes[0].value +"</h3>");
                    stringResponse.push("<h4> Cantidad: "+producto.attributes[1].value +"</h4>");

                    var descripcion = producto.getElementsByTagName("descripcion")[0].textContent.split("\"")[1]
                    stringResponse.push("<p>"+ descripcion +"</p>");
                    
                    if(producto.getElementsByTagName("recetas").length==1){
                        var recetas = tipo.getElementsByTagName("recetas")[0];
                        for (var k = 0; k< recetas.getElementsByTagName("receta").length; k++){
                            var receta = recetas.getElementsByTagName("receta")[k];
                            stringResponse.push("<h3>"+receta.attributes[0].value +"</h3>");
                            stringResponse.push("<p>"+receta.textContent.replace("\"","") +"</p>");
                        }
                    }

                    var imagenFile = producto.getElementsByTagName("imagen")[0].textContent.split("\"")[1];
                    stringResponse.push("<img src =\"./multimedia/"+imagenFile+"\" alt=\""+ imagenFile.split(".")[0] +"\"/>");

                    var precio = producto.getElementsByTagName("precio")[0].textContent;
                    stringResponse.push("<p>Precio: " + precio + "€</p>");
                    
                }
                stringResponse.push("</section>");
            }
            stringResponse = stringResponse.join('');
            document.getElementById('productos').innerHTML = stringResponse;
            
        }      
        lector.readAsText(archivo);
        }
    else {
        document.getElementById('productos').innerHTML = "Error : ¡ Archivo no válido para lectura !";
        }       
};