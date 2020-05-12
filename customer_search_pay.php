<?php
// include_once "menu.php";
include_once "welcome.php";
include_once "connection.php";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Elixir Tech Solutions</title>
    <link rel="stylesheet" href="style.css">

  <title></title>
</head>
<body class="body">
<form class="sidemargin">
  <!-- <table id="form_table">
    <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
      <td>Customer Name<span style="color: red;">*</span></td>
      <td>:</td>
      <td><input type="text" name="customername" id="customername" value=""></td>
            <td>&nbsp;</td>


      <td>Month</td>
      <td>:</td>
      <td id="month"><select>
        <option value="">----ALL----</option>      
        <option value="JAN">JAN</option>
        <option value="FEB">FEB</option>
        <option value="MAR">MAR</option>
        <option value="APR">APR</option>
        <option value="MAY">MAY</option>
        <option value="JUN">JUN</option>
        <option value="JUL">JUL</option>
        <option value="AUG">AUG</option>
        <option value="SEP">SEP</option>
        <option value="OCT">OCT</option>
        <option value="NOV">NOV</option>
        <option value="DEC">DEC</option>

      </select></td>

                  <td>&nbsp;</td>


      <td>Status</td>
      <td>:</td>
      <td id="status"><select>
        <option value="">----ALL----</option>      
        <option value="PENDING">PENDING</option>
        <option value="PAID">PAID</option>
      </select></td>
    </tr>
   
  </table> -->
<div>
<input type="checkbox" name="ALL" value="ALL"> ALL<br>
</div>

  <div align="center">
    <button type="button" onclick="searchOutput();">Search</button> 
  <button type="reset">Reset</button> 
  </div>
</form>

<script type="text/javascript">

    var searchOutput;

    $( document ).ready(function() {

searchOutput = function submit_form(){

var customername = $("#customername").val();
var month     = $("#month").val();
var status   = $("#status").val();


var dataTosend='customername='+customername+'&month='+month+'&status='+status;

$.ajax({

url: 'customer_search_pay.php',

type: 'POST',

data:dataTosend,

async: true,

success: function (data) {

// alert(data);
    // $("#success1").show(6000);
    // $("#success1").fadeOut(5000);
    // $('#regis_form')[0].reset();

},

});

}

});

  </script>



<?php

$customername = $_POST['customername'];
$month     = $_POST['month'];
$status   = $_POST['status'];
// $mobile       = $_POST['mobile'];
// $alt_mobile   = $_POST['alt_mobile'];
// $address      = $_POST['address'];

    $limit = 20;  // Number of entries to show in a page. 
    // Look for a GET variable page if not found default is 1.      
    if (isset($_GET["page"])) {  
      $pn  = $_GET["page"];  
    }  
    else {  
      $pn=1;  
    };   
  
    $start_from = ($pn-1) * $limit;   

$sql = "SELECT * FROM customer_details 
        ORDER BY customer_registration_id ASC

        LIMIT $start_from, $limit

        ";

// echo $sql;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  $td = '';
$th = ''; 
$i=1;
?>

<style type="text/css">
  .searchtable,tr,td,th{
    font-weight: bold;
    color: black;
    /*background-color:lightgrey; */
    text-align: center;
    border:1px solid black;
    border-collapse: collapse;
  }
  .pagee{
    font-weight: bold;
    color: white;
    background-color: #8E8E8E;
  }
</style>
<span class="pagination pagee" >
      <?php   
        $sql1 = "SELECT COUNT(*) FROM customer_details";   
        // $rs_result = mysql_query($sql1);   echo $sql1;
        $rs_result = $conn->query($sql1);

        $row = mysqli_fetch_row($rs_result);
        // echo count($row[0]);
        $total_records = $row[0];  
        echo 'Total '.$total_records.' Records ';
        // echo $total_records."total_records"; 
          
        // Number of pages required. 
        $total_pages = ceil($total_records / $limit); 
        // echo $total_pages.'pages';  
        $pagLink = "";                         
        for ($i=1; $i<=$total_pages; $i++) { 
          if ($i==$pn) { 
              $pagLink .= "<a href='customer_search_pay.php?page=".$i."'>     ".$i."    </a>"; 
          }             
          else  { 
              $pagLink .= "<a href='customer_search_pay.php?page=".$i."'>     ".$i."     </a>";   
          } 
        };   
        echo $pagLink;   
      ?> 
      </span> 
<table class="searchtable sidemargin">
  <tr>
    <th>Sl No</th>
    <th>&nbsp;&nbsp;Edit&nbsp;&nbsp; </th>
    <th>Customer Name</th>
    <th>Last Name</th>
    <th>Customer ID</th>
    <th>Mobile No.</th>

  </tr>

<?php

$j=1;
      // if ($i%2==0) { echo $even;}else {echo $odd;}
    while($row = $result->fetch_assoc()) {
        // echo "id: " . $row["customername"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
      // $th .= '<th>Customer Name</th> ';  
      // $td .= '<td> '.$row["customername"].' </td> ';


// echo '<table>'.$i++.'<tr>' . $th . '</tr><br><tr>' . $td . '</tr></table>';

      // if ($row["mobile"]=='') {
      //   echo 'NIL';
      // }

      if ($j%2==0) {
      $color='#DCDCDC';
        
      }
      else{
      $color='white';


      }



      echo $table='<tr style="background-color:'.$color.'">
                  <td>'.$j++.'</td>
                  <td>

<p> <a onclick="edit();">
   
                  <img height="20" width="30" src="edit.png"></td>

 </a>
</p>


                  </td>

                  <td>'.$row["customername"].'</td>
                  <td>'.$row["lastname"].'</td>
                  <td>'.$row["customerid"].'</td>
                  <td>'.$row["mobile"].'</td>
            </tr>';

 }


 ?>


</table>
<script type="text/javascript">
  function edit(){
    alert("Hi, this is an Edit button!");
  }
</script>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>

</body>
</html>


 <?php


} 

else {
    echo "0 Results Found";
}

// $result = $conn->query($sql);
// if (!$result) { // add this check.
//     die('Invalid query: ' . mysql_error());

// }
// else {
// while ($row = mysql_fetch_array($conn,$result)) {
//  echo $row["customername"]."aaaa";

// } 
// }

?>