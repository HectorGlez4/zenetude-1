  $('document').ready(function () {

    $(function(){
       $(window).scroll(function () {//Au scroll dans la fenetre on déclenche la fonction
          if ($(this).scrollTop() > 200) { //si on a défilé de plus de 200px du haut vers le bas
            document.getElementById('scroll-nav').style.top='0px';
          } else{
            document.getElementById('scroll-nav').style.top='-200px';
          }
       });
     });

    window.onload=ajuste;
      function ajuste(){
      document.getElementById('aside1').style.minHeight=document.getElementById('bloc1').offsetHeight+"px";
      document.getElementById('aside2').style.minheight=document.getElementById('calendar').offsetHeight+"px";
      document.getElementById('bloc1').style.minHeight=document.getElementById('aside1').offsetHeight+"px";
      document.getElementById('calendar').style.minheight=document.getElementById('aside2').offsetHeight+"px";
    }

    var trigger = $('#hamburger'),
        isClosed = false;
    var trigger2 = $('#hamburger2'),
        isClosed = false;

    var menu = $('#menu');
    var page = $('#page');

    trigger.click(function () {
      burgerTime();
    });

    trigger2.click(function () {
      burgerTime2();
    });

    function burgerTime() {
      if (isClosed == true) {
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        page.animate({left: "0px",right: "0px"}, "linear");
        menu.animate({right: "-300px"}, "linear");
        $("body").css("overflow", "auto");
        isClosed = false;

      } else {
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        page.animate({right: "300px",left: "-300px"},"linear");
        menu.animate({right: "0"}, "linear");
        $("body").css("overflow", "hidden");
        isClosed = true;
      }
    }

    function burgerTime2() {
      if (isClosed == true) {
        trigger2.removeClass('is-open');
        trigger2.addClass('is-closed');
        page.animate({left: "0px",right: "0px"}, "linear");
        menu.animate({right: "-300px"});
        $("body").css("overflow", "auto");
        isClosed = false;
      } else {
        trigger2.removeClass('is-closed');
        trigger2.addClass('is-open');
        page.animate({right: "300px",left: "-300px"},"linear");
        menu.animate({right: "0"});
        $("body").css("overflow", "hidden");
        isClosed = true;
      }
    }



  });