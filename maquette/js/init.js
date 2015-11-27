function Listener(elem ,event, fnct) 
{
  if (elem)
  {
    // Teste si la méhode addEventListener existe (Non IE)
    if (elem.addEventListener)
    {
      // Associe à  l'événement click la fonction (Non IE)
      elem.addEventListener(event , fnct, false);
    }
    else
    {
      // Associe à  l'événement onclick la fonction (IE)
      elem.attachEvent('on' + event, fnct);
    }
		
    // Si l'événement est un click on change le curseur de souris
    if ('click' == event) 
    { 
      elem.style = 'cursor: pointer';
    }
  }
    
} // Listener(elem ,event, fnct)


// Récupère l'élément <form id="inscription">
var form_inscription = document.getElementById('inscription');
Listener(form_inscription, 'submit', verifIns);

// Teste si l'élémént form_inscription existe
if (form_inscription)
{
  var verif_email = document.getElementById('email');
  Listener(verif_email, 'change', isEmail);
  
  var verif_pass = document.getElementById('passe');
  Listener(verif_pass, 'change', isPass);

}

function stopEvent(event)
{
  if (event.stopPropagation)
  {
    event.stopPropagation();
    event.preventDefault();
  }
  else
  {
    event.cancelBubble = true;
    event.returnValue = false;
  }
} // stopEvent(event)
