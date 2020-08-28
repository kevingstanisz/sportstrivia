window.onload = function exampleFunction() { 

    var stringspan = "box"
    var i = 0

    for (i = 0; i < randomTiles.length; i++) {
        document.getElementById(stringspan.concat(randomTiles[i])).style.backgroundColor = "white";
        document.getElementById(stringspan.concat(randomTiles[i])).style.color = "white";
    }

    i = 0

    var boxPrep = setInterval(prepBox, 1250);
    var letterTimeout = setTimeout(() => { var letterShow = setInterval(showLetter, 1250);; }, 500);

    var dotime=function(){
    var iv = setInterval(function(){
        sys.puts("interval");
    }, 1000);
    return setTimeout(function(){
        clearInterval(iv);
    }, 5500);
    };

    function prepBox() {
        if(i == randomTiles.length - 1){
            clearInterval(boxPrep)
        }

        var stringspan = "box"
        document.getElementById(stringspan.concat(randomTiles[i])).style.backgroundColor = "#E84A27";
        document.getElementById(stringspan.concat(randomTiles[i])).style.color = "#E84A27";
    }

    function showLetter() {
        if(i == randomTiles.length){
            //clearTimeout(letterTimeout) not sure how to clearinterval inside of settimeout
            clearInterval(letterTimeout.letterShow)
        }
        else{
            var stringspan = "box"
            document.getElementById(stringspan.concat(randomTiles[i])).style.backgroundColor = "white";
            document.getElementById(stringspan.concat(randomTiles[i])).style.color = "black";

            i++;
        }
    }

    $('#reloadButton').click(function() {
        location.reload();
    });
} 