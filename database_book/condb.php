<?php
$con=mysqli_connect("localhost","root","","book")
or die ("Error : ".mysqli_error($con));

mysqli_query($con,"SET NAME'UTF8'");



?>