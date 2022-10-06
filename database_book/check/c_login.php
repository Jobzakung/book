<?php 
echo "<pre>";
print_r($_POST);
echo "</pre>";
session_start();
        if(isset($_REQUEST['Username'])){
				//connection
                $con=mysqli_connect("localhost","root","","book")
                or die ("Erroe : ".mysqli_error($con));
                
                mysqli_query($con,"SET NAME'UTF8'");

				//รับค่า user & password
                  $Username = $_REQUEST['Username'];
                  $Password = $_REQUEST['Password'];
				//query 
                  $sql="SELECT * FROM staff Where username='".$Username."' and password='".$Password."' ";

                  $result = mysqli_query($con,$sql);
				
                  if(mysqli_num_rows($result)==1){

                      $row = mysqli_fetch_array($result);

                      $_SESSION["id_staff"] = $row["id_staff"];//ประกาศตัวแปรUserIDไว้เพื่อส่งค่า
                      $_SESSION["name_staff"] = $row["name_staff"];
                      $_SESSION["lname_staff"] = $row["lname_staff"];//ประกาศตัวแปรUserไว้เพื่อส่งค่า
                      $_SESSION["id_stype"] = $row["id_stype"];//ประกาศตัวแปรUserlevelไว้เพื่อส่งค่า
                      $_SESSION["username"] = $row["username"];
                      $_SESSION["password"] = $row["password"];

                      if($_SESSION["id_stype"]=="1"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php
                        Header("Location: ../admin/admin_page.php");

                      }

                      if ($_SESSION["id_stype"]=="2"){  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php

                        Header("Location: ../staff/staff_page.php");

                      }else{
                        echo "<script>";
                            echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                            echo "window.history.back()";
                        echo "</script>";
     
                      }
     
            }else{
     
                 echo "<script>";
                 echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                 echo "window.history.back()";
                 echo "</script>";
            }  
          }
        
?>