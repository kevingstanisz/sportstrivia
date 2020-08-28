$(function () {
  ; (function ($, window) {

    var _defaults = {
      x: 2, // number of tiles in x axis
      y: 2, // number of tiles in y axis
      random: true, // animate tiles in random order
      speed: 2000 // time to clear all times
    };

    /**
    * range Get an array of numbers within a range
    * @param min {number} Lowest number in array
    * @param max {number} Highest number in array
    * @param rand {bool} Shuffle array
    * @return {array}
    */
    function range(min, max, rand) {
      var arr = (new Array(++max - min))
        .join('.').split('.')
        .map(function (v, i) { return min + i })
      return rand
        ? arr.map(function (v) { return [Math.random(), v] })
          .sort().map(function (v) { return v[1] })
        : arr
    }

    // Prevent css3 transitions on load
    $('body').addClass('css3-preload')
    $(window).load(function () { $('body').removeClass('css3-preload') })

    $.fn.sliced = function (options) {

      var o = $.extend({}, _defaults, options);

      return this.each(function () {

        var $container = $(this);

        /*---------------------------------
         * Make the tiles:
         ---------------------------------*/

        var width = $container.width(),
          height = $container.height(),
          $img = $container.find('img'),
          n_tiles = o.x * o.y,

          tiles = [], $tiles;
        piecedegree = [];
        xpos = [];
        ypos = [];
        sinresult = [];
        cosresult = [];


        var classId = 'test'
        var degreeHolder = 0.0;

        for (var i = 0; i < n_tiles; i++) {
          classId = '<div class="tile" id="mydiv' + i + '"/>';
          tiles.push(classId);
          degreeHolder = Math.round(Math.random() * 360);
          piecedegree.push(degreeHolder);
          sinresult.push(Math.sin(degreeHolder * Math.PI / 180));
          cosresult.push(Math.cos(degreeHolder * Math.PI / 180));
        }

        $tiles = $(tiles.join(''));

        // Hide original image and insert tiles in DOM
        $img.hide().after($tiles);

        // Set background
        $tiles.css({
          width: width / o.x,
          height: height / o.y,
          backgroundImage: 'url(' + $img.attr('src') + ')',
        });

        // Adjust position
        $tiles.each(function (index) {
          var tileWidth = $(this).width();
          var tileHeight = $(this).height();
          $(this).css({ 'backgroundPosition': index % o.x * -tileWidth + 'px ' + Math.floor(index / o.x) * -tileHeight + 'px', 'opacity': 0 });
          $(this).css({ 'position': 'absolute', 'left': index % o.x * tileWidth + 'px', 'top': Math.floor(index / o.x) * tileHeight + 'px' });
          xpos.push(index % o.x * tileWidth);
          ypos.push(Math.floor(index / o.x) * tileHeight);
        });

        /*---------------------------------
         * Animate the tiles:
         ---------------------------------*/

        var tilesArr = range(0, n_tiles, o.random),
          tileSpeed = o.speed / n_tiles; // time to clear a single tile

        var move = 300;
        var swtichit = -1;
        var leftmove = 0;
        var topmove = 0;
        var divClass = "test";
        const RADIUS = 250.0;
        const NUMBEROFTURNS = 10.0
        var changeOpacity = 0;
        var animateComplete = 0;

        var increment = RADIUS / NUMBEROFTURNS;

        var moveradius = RADIUS;

        $(document).ready(function () {
          // $('#myButton').click(function () {
            setInterval(function () {
              for (i = -1; i < 400; i++) {
                divClass = '#mydiv' + i + '.tile';
                $(divClass).animate({ left: leftmove, top: topmove, opacity: changeOpacity }, "fast", "swing", animatePixels(i));
              }
            }, 600);
          // });
        });

        function animatePixels(hello) {
          if (hello == -1 && moveradius != 0) {
            if (moveradius == 100) {
              increment /= 2;
              console.log(increment);
            }
            if (moveradius == 50) {
              increment /= 2;
              console.log(increment);
            }
            if (moveradius == 25) {
              increment /= 2;
              console.log(increment);
            }
            if (moveradius == 12.5) {
              increment /= 2;
              console.log(increment);
            }

            moveradius = moveradius - increment;
            swtichit *= -1;
          }
          
          if (moveradius == 0){
            animateComplete++;
          }

          leftmove = xpos[hello + 1] + cosresult[Math.round(Math.random() * n_tiles)] * moveradius * swtichit;
          topmove = ypos[hello + 1] + sinresult[Math.round(Math.random() * n_tiles)] * moveradius * swtichit;

          if (hello == 399) {
            // leftmove = xpos[0] + cosresult[0] * moveradius * swtichit;
            // topmove = ypos[0] + sinresult[0] * moveradius * swtichit;
            changeOpacity = 1;
          }


          if(animateComplete > 400*2){
              $("#teamname").fadeIn();
          }

        }
      });

    };

  }(jQuery, window));

  $('.sliced').sliced({ x: 20, y: 20, speed: 1000 });

  $('#reloadButton').click(function() {
    location.reload();
  });
});