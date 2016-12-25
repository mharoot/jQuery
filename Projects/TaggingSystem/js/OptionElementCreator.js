/*
name: OptionsElementCreator.js
purpose: to create an option element and append to the end.
*/

/*      Includes    */
// $.getScript("https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js", function(){
//    alert("Script loaded but not necessarily executed.");
// });

function OptionElementCreator(parentID,optionName) 
{
    /*  field variables                     */
    this.optionName = optionName;
    this.parentID   = parentID;


    /*  this method creates an option element child and appends it to the end of its parent  */
    this.createOptionElement = function createAnOption() 
    {
              
      if(this.optionName ==='')
      {
        alert("You have not submitted a tag name...");
        return false;
      }
      
      var option = document.createElement("option");
      var node = document.createTextNode(this.optionName);
      option.appendChild(node);
      var element = document.getElementById(parentID);
      element.appendChild(option);

      /** If It is a tag that is being added do the appropriate ajax call to add the new tag */
      if(this.parentID ==='tag') {
        var post_data = 'tag='+this.optionName; 
        //ajax handler
        jQuery.ajax({
        type: "POST",
        url: "ajax_calls/AddOption.php", 
        dataType:"text",
        data:post_data,
        success:function(response){
        },
        error:function (xhr, ajaxOptions, thrownError){
          alert("ERROR");
        }
        });
      } else if (this.parentID === 'pornstar')
      {
         var post_data = 'pornstar='+this.optionName; 
        //ajax handler
        jQuery.ajax({
        type: "POST",
        url: "ajax_calls/AddOption.php", 
        dataType:"text",
        data:post_data,
        success:function(response){
        },error:function (xhr, ajaxOptions, thrownError){
          alert("ERROR");
        }
        });
      }
        
    }


}
