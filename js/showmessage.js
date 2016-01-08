$(document).ready(function(){
    $("#formula").submit(function(event){
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
	            alert("erreur");
	        }
        });

        return false;
    });
    //if($.session.get('msg')) {
		//showmessage();
    //}
});

//function showmessage(){
//	var data = $(this).serialize();
//	$.ajax({
//		type : $(this).attr("method"),
//		url: $(this).attr("action"),
//		data: data,
//		success : function(retour){
//			if (retour.send == "ok") {
//				if(retour.msg != null)
//					alert(retour.msg);
//				window.location.href = retour.redirection;
//			}
//			else {
//				$('#result').empty().append($('<span>').html(retour.msg));
//			}
//
//		}, // success()
//		error: function (resultat, statut, erreur){
//			alert("erreur");
//		}
//	});
//	$.session.set('msg',false);
//	return false;
//}