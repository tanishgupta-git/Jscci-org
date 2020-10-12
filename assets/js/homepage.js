(function($){
    "use strict";
  
    // Init AOS
    function aos_init() {
      AOS.init({
        duration: 1000,
        once: true
      });
    }
    $(window).on('load', function() {
      aos_init();
    });
  
  })(jQuery);

  $(document).ready(function(){

    var myET = $('.myTicker').easyTicker({
        direction: 'up',
        easing: 'swing',
        speed: 'slow',
        interval: 3000,
        height: 'auto',
        visible: 3,
        mousePause: true,
        controls: {
            up: '.up',
            down: '.down',
            toggle: '.toggle',
            stopText: 'Stop !!!'
        },
        callbacks: {
            before: function(ul, li){
                console.log(this, ul, li);
                $(li).css('color', 'red');
            },
            after: function(ul, li){
                console.log(this, ul, li);
            }
        }
    }).data('easyTicker');

    cc = 1;
    $('.add').click(function(){
        $('.myTicker ul').append('<li>' + cc + ' Triangles can be made easily using CSS also without any images. This trick requires only div tags and some</li>');
        cc++;
    });

    $('.visible-3').click(function(){
        myET.options['visible'] = 3;

    });

    $('.visible-all').click(function(){
        myET.stop();
        myET.options['visible'] = 0 ;
        myET.start();
    });

});
