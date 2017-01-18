$(document).keydown(function(e)
{
    e.preventDefault();
    switch(e.which)
    {
        case 37:
              log("left");
              break;

        case 38:
              log("up");
              break;

        case 39:
              log("right");
              break;
 
        case 40:
              log("down"); 
              break;

        default:
                log(e.which);
    }
});

function log(keyNum) {
    console.log(keyNum);
}
