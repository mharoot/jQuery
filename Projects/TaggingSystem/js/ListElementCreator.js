/*
name: ListElementCreator.js
purpose: To create an Option Element for a Select Element
*/
function ListElementCreator( parentID, listElementTxt ) 
{
    /*  field variables                     */
    this.parentID       = parentID;
    this.listElementTxt = listElementTxt;



    /*  this method creates an option element child and appends it to the end of its parent  */
    this.createListElement = function createAListElement() 
    {
              
      if(this.listElementTxt ==='')
      {
        alert("You have not submitt anything for the list..");
        return false;
      }

        var option = document.createElement("li");
        var node = document.createTextNode(this.listElementTxt);
        option.appendChild(node);
        var element = document.getElementById(parentID);
        element.appendChild(option);
        
    }


}
