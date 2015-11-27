/**
 * Created by m15026768 on 23/11/2015.
 */
function deconnect(){
    var formdeconnexion = document.getElementById("deconnexion");
    formdeconnexion.submit();

}

function verif(frm){
	 var tabLabel = frm.getElementsByTagName('label');
	  var nbLabel = tabLabel.length;

	  for (var i = 0, message = 'Veuillez renseigner le ou les champs suivants :\n'; i < nbLabel; ++i)
	  {
	    var atFor = tabLabel[i].getAttribute('for');

	    if (atFor)
	    {
		  var elemById = document.getElementById(atFor);
	 
	      
	      
	      
	    	if (!elemById.value)
	    	{
		  message += ' - ' + tabLabel[i].innerHTML + '\n';
	     	}
	      
	    }
	  }

	if (message == 'Veuillez renseigner le ou les champs suivants :\n'){
		return true;
	}else{
		alert(message);
		return false;
	}	
	  
	
}
