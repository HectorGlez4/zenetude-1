$(document).ready(function(){
    $("#formula").submit(function(event){
    	//alert("gitant");
    	var data = $(this).serialize();
        $.ajax({
            type : $(this).attr("method"),
            url: $(this).attr("action"),
            data: data, 
            success : function(retour){
					    if (retour.send == "ok") {
					    	if(retour.msg != null)
					    		alert(retour.msg);
					        window.location.href = retour.redirection;
					    }
					    else {
					         $('#result').empty().append($('<span>').html(retour.msg));
					    }
					   
			}, // success()
			error: function (resultat, statut, erreur){
	            alert("error");
	        }
        });
        
        return false;
    });
});