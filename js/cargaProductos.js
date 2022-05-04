gestorXML = new Object();

gestorXML.openFile = function(file){
    var archivo = file[0];
    if (archivo.type.match("text/xml")) 
       {
        var lector = new FileReader();
        lector.onload = function (evento) {
            var responseDoc = new DOMParser().parseFromString(lector.result, 'application/xml');
            console.log(responseDoc.getElementsByTagName("tipo"));
        }      
        lector.readAsText(archivo);
        }
    else {
         console.log("Error : ¡¡¡ Archivo no válido para lectura !!!");
        }       
};