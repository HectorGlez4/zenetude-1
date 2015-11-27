  $('document').ready(function () {
    var trigger = $('#hamburger'),
        isClosed = true;
    var trigger2 = $('#hamburger2'),
        isClosed = true;

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
        isClosed = false;
      } else {
        trigger2.removeClass('is-closed');
        trigger2.addClass('is-open');
        isClosed = true;
      }
    }

  });