

<html>
<head> 
<title>PROJECT MRS</title>
<style>
    .hello{
        background-color : #f6f6f6;
        width : 300px;
    }
    .container{
        background-image : url(https://www.annfone.com/img/cms/mobiles-phones-banner.png);
        height : 30%;
        background-position : center;
        background-repeat : no-repeat;
        background-size : cover;
        position: relative;
    }
    .larger{
    display: flex;
}
.hello{
    width: 300px;
}
.res{
    flex-grow: 20;
}
table {
    border-collapse: collapse;
}

td {
    padding-top: .6em;
    padding-bottom: .6em;
}
</style>
</head>

<body bgcolor="White">   
<form name="searchbarop" action = "MobileRecommendationSystemv2.php" method="GET">
<table border="0" width="100%" bgcolor="#aee1e1">
<tr>
<td align="center" ><img src="https://seeklogo.com/images/M/MRS-logo-07C5767841-seeklogo.com.gif" width="200" height="100"></td>
<td align="center"><input type="text" name="sbar" style="width: 700px;height:50px"  placeholder="Search"/></td>
<td align="left"><input type="submit" name="submit"/></td>
</tr>
</table>
<table border="0" width="100%" bgcolor="white" height="8%">
    <tr> <!-- three radio buttons for selection of search-->
        <td> 
            <input type="radio" id ="device" name="radio" value="device"><!--changed all three names-->
            <label for="device"> Device Name</label></br>
         </td>
           <td>
               <input type="radio" id ="company" name="radio" value="company">
            <label for="company">Company</label><br>
         </td>
         <td>
            <input type="radio" id ="processor" name="radio" value="processor">
            <label for="processor"> Processor</label></br>
         </td>
        
    </tr>

</table>
<div class = "container" >

</div>
<div class="larger">
<div class = "hello" >

<div style="height:80px;width:300px;">
  
   <label for="type"><br>Type of Mobile:</label>
 <select name="type" id="type">
    <option value="none">None</option>
    <option value="budget">Budget</option>
    <option value="mediocre">Mediocre</option>
    <option value="flagship">Flagship</option>
  </select>
 </div>

<div style="height:80px;width:300px;">
  <label for="price"><br>Classify by price</label>
  <select name="price" id="price">
    <option value="none">None</option>
      <option value="10k">0-10000</option>
      <option value="20k">10000-20000</option>
      <option value="35k">20000-35000</option>
      <option value="36k">More than 35000</option>
    </select>
</div>

<div style="height:80px;width:300px;">
    <label for="p1"><br>Select First Priority option : </label>       <!--Priority sort options-->
              <select name="p1" id="p1">
                <option value="none">None</option>
                  <option value="gaming">Gaming</option>
                  <option value="display">Display</option>
                  <option value="camera">Camera</option>
                </select>
                
</div>


<div style="height:80px;width:300px;">
                <label for="p2"><br>Select Second Priority option : </label>       <!--Priority sort options-->
              <select name="p2" id="p2">
                <option value="none">None</option>
                  <option value="gaming">Gaming</option>
                  <option value="display">Display</option>
                  <option value="camera">Camera</option>
                </select>
</div>


    <div style="height:80px;width:300px;">
                <label for="p3"><br>Select Third Priority option : </label>       <!--Priority sort options-->
              <select name="p3" id="p3">
                <option value="none">None</option>
                  <option value="gaming">Gaming</option>
                  <option value="display">Display</option>
                  <option value="camera">Camera</option>
                </select>
  
    </div>
</div>
<?php

$selected = $_GET['id'];
//echo $selected;
$conn = mysqli_connect('localhost','root','','mobrecsys(1)');
$selectdata= "SELECT * FROM mdata WHERE devicename = '$selected';";
$des = "SELECT * FROM description WHERE devicename = '$selected';";
$imgquery = mysqli_query($conn,$selectdata);
$desquery = mysqli_query($conn,$des);
//echo "<br> data table  ".mysqli_num_rows($imgquery);
//echo "<br> display table".mysqli_num_rows($desquery);
$res = mysqli_fetch_assoc($desquery);
//echo "<br> data table  ".mysqli_num_rows($imgquery);
//echo "<br> display table".mysqli_num_rows($desquery);
if(mysqli_num_rows($imgquery)==0)
{
  echo "No Results found";
}
else
{
?>
<div class="res">
<table>
<?php 
//$ip = gethostbyname(gethostname());

while($row = mysqli_fetch_assoc($imgquery))
{
    ?>
<tr>
    <td>
    <img src  = "<?php echo $row['image']; ?>" >
    </td>
    <td>
      <p><b><?php echo strtoUpper($row['devicename']) ?> </b></p>
      <ul>
        <li> <p> Price : &#8377 <?php echo $row['price'] ?> </li>
            
        <li><p>Overall Rating : <?php echo $row['overall'] ?> </P></li>

        <li> <p>RAM :<?php echo $res['ram']?> GB </p> </li>

        <li><p>Camera : <?php echo $res['Camera']?></p> </li>     

        <li><p>Processor : <?php echo ucwords($row['pname']) ?></p> </li>

        <li><p><a href="<?php echo $res['buy']?>">Buy</a></p> </li>

        <!--<li><p> Your IP address : <?php echo $ip ?></p></li>

        <li><p><i>We are watching you </i></p></li>-->
        

      </ul>
    </td>
</tr>
<?php
}
}
?>
</table>
</div>
</form>
</body>
</html> 

