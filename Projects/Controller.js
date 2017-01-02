$(document).keydown(function(e)
{
    e.preventDefault();
    console.log(e.which);
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
                alert("undocumented action");
    }
});

function log(keyNum) {
    console.log(keyNum);
}
