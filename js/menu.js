  $('document').ready(function () {

    $(function(){
       $(window).scroll(function () {//Au scroll dans la fenetre on déclenche la fonction
          if ($(this).scrollTop() > 10) { //si on a défilé de plus de 200px du haut vers le bas
            var res = 80;
            document.getElementById('nav').style.top='-200px';
            document.getElementById('scroll-nav').style.top='0px';
            document.getElementById('menu').style.top= res + 'px';
          } else{
            document.getElementById('nav').style.top='0px';
            document.getElementById('scroll-nav').style.top='-200px';
            var compteur = $(this).scrollTop();
            var res = 200-compteur;
            document.getElementById('menu').style.top= res + 'px';
          }
       });
     });

    window.onload=ajuste;
      function ajuste(){
      document.getElementById('filtre').style.height=document.body.clientHeight + 100 +"px";
      document.getElementById('aside1').style.minHeight=document.getElementById('bloc1').offsetHeight+"px";
      document.getElementById('aside2').style.minheight=document.getElementById('calendar').offsetHeight+"px";
      document.getElementById('bloc1').style.minHeight=document.getElementById('aside1').offsetHeight+"px";
      document.getElementById('calendar').style.minheight=document.getElementById('aside2').offsetHeight+"px";
    }

  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 120, // Creates a dropdown of 15 years to control year
    max: moment().year(moment().year()).toDate(),
  });  


    var trigger = $('#hamburger'),
        isClosed = false;
    var trigger2 = $('#hamburger2'),
        isClosed = false;

    var menu = $('#menu');
    var page = $('#page');
    var open = true;

    trigger.click(function () {
      menuopen();
      burgerTime2();
      burgerTime();
      if(open == true){
        document.getElementById('filtre').style.visibility = "visible";
        open = false;
      }
      else{
        document.getElementById('filtre').style.visibility = "hidden";
        open = true;
      }
    });

    trigger2.click(function () {
      menuopen();
      burgerTime2();
      burgerTime();
      if(open == true){
        document.getElementById('filtre').style.visibility = "visible";
        open = false;
      }
      else{
        document.getElementById('filtre').style.visibility = "hidden";
        open = true;
      }
    });

    function burgerTime() {
      if (isClosed == true) {
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;

      } else {
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
    }

    function burgerTime2() {
      if (isClosed == true) {
        trigger2.removeClass('is-open');
        trigger2.addClass('is-closed');
      } else {
        trigger2.removeClass('is-closed');
        trigger2.addClass('is-open');
      }
    }

    function menuopen(){
      if (isClosed == true) {
        page.animate({left: "0px",right: "0px"}, "linear");
        menu.animate({right: "-300px"});
      } else {
        page.animate({right: "300px",left: "-300px"},"linear");
        menu.animate({right: "0"});
      }
    }



  });