<?php
 validate_input();
$con =mysqli_connect('localhost','root','');
if(!$con)
{
    echo 'Not connected';
}
   
if(!mysqli_select_db($con,'pacific'))
{
    echo 'Databse not selected';
}

$Name=$_POST['fname'];
$Lname=$_POST['lname'];
$Address=$_POST['address'];
$Phone=$_POST['phone'];
$Arrival=$_POST['ArrDate'];
$Email=$_POST['email'];
$Nights=$_POST['nights'];
$Activity=$_POST['activities'];
$Package=$_POST['packages'];
$Comments=$_POST['comments'];
$When=$_POST['myDate'];

$check="SELECT activityid FROM activities WHERE activityname='$Activity';";
$res=mysqli_query($con,$check) or die("error");
$rows = mysqli_fetch_array($res);
$id=$rows['activityid'];

$check2="SELECT packageid FROM package WHERE packagedescription='$Package';";

$res2=mysqli_query($con,$check2) or die("error");
$rows2 = mysqli_fetch_array($res2);

$id2=$rows2['packageid'];



$sql="INSERT INTO reservationyurt (arrival,no_ofnights,packageid) VALUES('$Arrival','$Nights',$id2);";
if(!mysqli_query($con,$sql))
{
    echo 'Not Interested 1';
}

else
{
    echo 'Inserted 1';
}

$check3="SELECT MAX(resid) FROM reservationyurt AS resid;";

$res3=mysqli_query($con,$check3) or die("error");

$rows3 = mysqli_fetch_array($res3);

$id3=$rows3['MAX(resid)'];


$sql2="INSERT INTO client (fname,lname,address,phone,email,resid,activityid, comments) VALUES('$Name','$Lname','$Address',$Phone,'$Email',$id3,$id,'$Comments');";
 

if(!mysqli_query($con,$sql2))
{
    echo 'Not Interested 2';
}

else
{
    echo 'Inserted 2';
}

$check4="SELECT MAX(clientid) from client;";
$res4=mysqli_query($con,$check4) or die("error");

$rows4 = mysqli_fetch_array($res4);

$id4=$rows4['MAX(clientid)'];

$sql3="INSERT INTO whenn(dates,activityid,clientid) VALUES('$When', $id, $id4);";
echo $sql3;
if(!mysqli_query($con,$sql3))
{
    echo 'Not Interested 3';
}

else
{
    echo 'Inserted 3';
}


function validate_input(){

    $Name = $Lname = $Email = $Phone = $Nights = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["fname"])) {
        echo "<script type='text/javascript'>"; 
        echo "alert('Please enter first name.');"; 
        echo "</script>";
        exit();
      } else {
        $Name = test_input($_POST["fname"]);
        // check if name only contains letters
        if (!preg_match("/^[a-zA-Z]*$/",$Name)) {
            echo "<script type='text/javascript'>"; 
            echo "alert('First Name: Only alphabets are allowed.');"; 
            echo "</script>";
            exit();
        }
      }
    if (empty($_POST["lname"])) {
        echo "<script type='text/javascript'>"; 
        echo "alert('Please enter last name.');"; 
        echo "</script>";
        exit();
      } else {
        $Lname = test_input($_POST["lname"]);
        // check if name only contains letters
        if (!preg_match("/^[a-zA-Z]*$/",$Lname)) {
            echo "<script type='text/javascript'>"; 
            echo "alert('Last Name: Only alphabets are allowed.');"; 
            echo "</script>";
            exit();
        }
      }
    if (empty($_POST["email"])) {
        echo "<script type='text/javascript'>"; 
        echo "alert('Please enter email.');"; 
        echo "</script>";
        exit();
      } else {
        $Email = test_input($_POST["email"]);
        // check if email is in valid format
        if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            echo "<script type='text/javascript'>"; 
            echo "alert('Invalid email. Format (xyz@abc.com))');"; 
            echo "</script>";
            exit();
        }
      }
    if (empty($_POST["phone"])) {
        
      } else {
        $Phone = test_input($_POST["phone"]);
        // check if phone number is in valid format
        if (!preg_match("/^[0-9]{10}$/",$Phone)) {
            echo "<script type='text/javascript'>"; 
            echo "alert('Phone: Only numbers are allowed. Phone Number (Format: 9999999999)');"; 
            echo "</script>";
        }
      }
    if (empty($_POST["nights"])) {
        
      } else {
        $Nights = test_input($_POST["nights"]);
        // check if nights only contains numbers between 1 to 14
        if (!preg_match("/^[0-9]+$/",$Nights)) {
            echo "<script type='text/javascript'>"; 
            echo "alert('Nights: Only numbers are allowed. Range (1 - 14)');"; 
            echo "</script>";
            exit();
        }
        elseif((int)$Nights < 1 || (int)$Nights > 14){
            echo "<script type='text/javascript'>"; 
            echo "alert('Nights: Range (1 - 14)');"; 
            echo "</script>";
            exit();
        }
      }
      if (empty($_POST["comments"])) {
            echo "<script type='text/javascript'>"; 
            echo "alert('Please enter comments.');"; 
            echo "</script>";
            exit();
        }
    }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


header("refresh:2; url=reservations.php");?>
