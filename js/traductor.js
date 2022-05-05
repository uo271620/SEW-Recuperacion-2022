var traductor = new Object();

traductor.traduce = function (buttonid) {
    var commentId = "comentario-"+buttonid.split('-')[1];

    
    this.settings.data.q = $("#"+commentId).text();
    this.settings.data.source=$("#source option:selected").val();
    this.settings.data.target= $("#target option:selected").val();

    $.ajax(this.settings).done(function (response) {
        
        var texto=response.data.translations['0'].translatedText;
        $("#"+commentId).html(texto);
    });
}

traductor.getDataSource= function(data){

}

traductor.configuraAPI = function() {
		this.settings = {
			"async": true,
			"crossDomain": true,
            "dataType:" : "json",
			"url": "https://google-translate1.p.rapidapi.com/language/translate/v2",
			"method": "POST",
			"headers": {
				"content-type": "application/x-www-form-urlencoded",
				"x-rapidapi-key": "62ec1162b5msh330582a3b663638p163899jsn147ac89e094c",
				"x-rapidapi-host": "google-translate1.p.rapidapi.com"
			},
			"data": {
				
			}
		};
	}

traductor.configuraAPI();
	