function verifIns(event)
{
	var frm = event.target || event.srcElement;
	
}


function isEmail(event)
{
  // Récupère l'élément <input>
  var elem = event.target || event.srcElement;
  // Expression régulière vérifiant la validité de  l'email
  var pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

  // Teste si l'email est valide
  if (!elem.value.match(pattern))
  {
    // Appel à la fenêtre d'erreur personnalisée
	windowError('Votre adresse email comporte une erreur !');
  }
}