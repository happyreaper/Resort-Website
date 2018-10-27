<?php
 
$con =mysqli_connect('localhost','root','');
if(!$con)
{
    echo 'Not connected';
}


   
if(!mysqli_select_db($con,'pacific'))
{
    echo 'Databse not selected';
}
?>
