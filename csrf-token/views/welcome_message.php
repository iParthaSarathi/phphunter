<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//this is our  good looking view 
?>

<!DOCTYPE html>
<html>
<head>
  <title>csrf token </title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  
</head>
<body>
  <div class="container">
    <div class="h6">
    <label>ajax username check (403 problem)</label></br></br></br>
    <input type="hidden" id="csrf_token" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
    <input type="text" name="username" class="" id="username">
    <span id="msg"></span>
  </div>
  </div>
  
</body>
</html>
<script >
  $(document).ready(function(){
  $("#username").on('keyup', function(event) {
    event.preventDefault();
    /* Act on the event */
      prof_username();
  });

})
  function prof_username(){
  var csrfName = $("#csrf_token"). attr('name'),
      csrfHash = $("#csrf_token").val();
  var username=$('#username').val();

  $.ajax({
      url:'index.php/welcome/usernameChk',
      type: 'POST',
      dataType: 'json',
      data: {[csrfName]: csrfHash, username: username},
      success:function(res) { // here you will receive every thing  (*_*) 
        $("#csrf_token").val(res.csrfHash) // reloD THE security value
       if(res.message==0){
          $("#msg").html('you can use this').css('color', 'green');
       }else{
         $("#msg").html("alredy taken").css('color', 'red');
         
       }
      console.log(res.message); // and your mintos life is fixed lets check
       
    }
    });
}



</script>