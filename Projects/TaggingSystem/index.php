<html>

<?php 
    require_once('header.php');
    require_once('classes/Options.php'); // load the Options class
    $options = new Options();
?>

<div class="jumbotron">

<br><br>

<center>

<h3>TAG SELECTOR PREVIEW</h3>

<select id="tag">
    <option value="0">Tag</option>
<?php
    $a = $options->get_tags();
    echo $a;
?>
</select>

<br><br><br>

<h3>TAG SUBMISSION FORM</h3>
    <textarea class="form-control" name="bulk_description_textarea" id="tag_textarea" rows="1" placeholder="tag here"></textarea>
    <button id="tag_button" onclick="addOption()">Add Photo Tag</button>
</center>
</div>



<script>
function addOption() {
/*      option element creator initialized    */
    var tag = document.getElementById("tag_textarea").value;
      if(tag ==='')
      {
        //alert("You have not submitted a URL to upload a photo...");
        return false;
      }

     var optionElementCreator = new OptionElementCreator("tag",tag);
     optionElementCreator.createOptionElement();
     document.getElementById("tag_textarea").value="";
}
</script>


</html>