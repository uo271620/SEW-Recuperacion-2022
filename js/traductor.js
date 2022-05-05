var traductor = new Object();

traductor.traduce = function (buttonid) {
    var id = buttonid.split('-')[1];
    var commentId = "comentario-"+buttonid.split('-')[1];

    this.settings.data.q = $("#"+commentId).text();
    this.settings.data.source=$("#source-"+id+" option:selected").val();
    this.settings.data.target= $("#target-"+id+" option:selected").val();

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
				"x-rapidapi-key": "ece741474fmsh2da6a88d7f0d0a5p172390jsn3eb49e9a90e7",
				"x-rapidapi-host": "google-translate1.p.rapidapi.com"
			},
			"data": {
				
			}
		};
	}

traductor.configuraAPI();
	