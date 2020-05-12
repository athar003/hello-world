<?php
// include_once "menu.php";
include_once "welcome.php";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Customer Registraiton From</title>
  <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <link rel="stylesheet" href="style.css">

</head>
<style type="text/css">
.button{
}


</style>
<body class="body" >
  <script type="text/javascript">

    var searchOutput;

    $( document ).ready(function() {

searchOutput = function submit_form(){

var customername = $("#customername").val();
var lastname     = $("#lastname").val();
var customerid   = $("#customerid").val();
var mobile       = $("#mobile").val();
var alt_mobile   = $("#alt_mobile").val();
var address      = $("#address").val();


var dataTosend='customername='+customername+'&lastname='+lastname+'&customerid='+customerid+'&mobile='+mobile+'&alt_mobile='+alt_mobile+'&address='+address;

$.ajax({

url: 'registration_submit.php',

type: 'POST',

data:dataTosend,

async: true,

success: function (data) {

// alert(data);
    $("#success1").fadeIn(5000);
    $("#success1").fadeOut(5000);
    $('#regis_form')[0].reset();

},

});

}

$('.load_button').submit(function() {
    $('#gif').css('visibility', 'visible');
});


});

  </script>


 <div style="width: 50%;" class="sidesmargin">
  <span id="success1" hidden style="background-color: #0d98ba; color: white;font-weight: bold;font-size: 26px;">Customer Registered Successfully !</span>
    </div>
<form id="regis_form" class="sidesmargin" method="post" style="background-color: #33222240;">
 
  <h1>Customer Registration Form</h1>

  <table id="form_table">
    <tr>
      <td>Customer Name<span style="color: red;">*</span></td>
      <td>:</td>
      <td><input type="text" name="customername" id="customername" value=""></td>
            <td>&nbsp;</td>


      <td>Last Name</td>
      <td>:</td>
      <td><input type="text" name="lastname" id="lastname" value=""></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>

    <tr>
      <td>CustomerID</td>
      <td>:</td>
      <td><input type="text" name="customerid" id="customerid" value=""></td>

      <td>&nbsp;</td>

      <td> Mobile No</td>
      <td>:</td>
      <td><input type="text" name="mobile" id="mobile" value=""></td>
    </tr>

     <tr>
      <td>&nbsp;</td>
    </tr>

    <tr>
      <td>Alternate Mobile</td>
      <td>:</td>
      <td><input type="text" name="alt_mobile" id="alt_mobile" value=""></td>
            <td>&nbsp;</td>


      <td>Address</td>
      <td>:</td>
      <td><input type="text" name="address" id="address" value=""></td>
    </tr>
     <tr>
      <td>&nbsp;</td>
    </tr>

  </table>
      <!-- <img src="loader.gif" id="gif" style="display: block; margin: 0 auto; width: 100px; visibility: hidden;"> -->


<div align="center">
    <button class="load_button" type="button" onclick="searchOutput();">Submit</button> 
  <button type="reset">Reset</button> 
  </div>
</form>


</body>
</html>