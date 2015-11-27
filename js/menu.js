  $('document').ready(function () {
    var trigger = $('#hamburger'),
        isClosed = false;
    var trigger2 = $('#hamburger2'),
        isClosed = false;

    var menu = $('#menu');

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
        menu.animate({right: "-300px"});
        isClosed = false;
      } else {
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        menu.animate({right: "0"});
        isClosed = true;
      }
    }

    function burgerTime2() {
      if (isClosed == true) {
        trigger2.removeClass('is-open');
        trigger2.addClass('is-closed');
        menu.animate({right: "-300px"});
        isClosed = false;
      } else {
        trigger2.removeClass('is-closed');
        trigger2.addClass('is-open');
        menu.animate({right: "0"});
        isClosed = true;
      }
    }

  });