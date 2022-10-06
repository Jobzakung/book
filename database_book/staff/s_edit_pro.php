<?php
include('../condb.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../stly.css">

    <title>libary</title>
  </head>
  <body>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->

    <?php 
    include 'staff_nav.php';
   ?>


   <br>
   <div class="container">
     <div class="card">
        <div class="card-body">

        <h1 class="text-center bg-info text-white">แก้ไขข้อมูลส่วนตัว</h1>


   <form action="../check/s_update_pro.php" method="post" name="form1" id="form1">
      <br>
      <fieldset disabled>
    <div class="form-group">
      <label for="disabledTextInput">รหัสพนักงาน</label>
      <input type="text" id="id_staff" class="form-control" name="id_staff" value ="<?php echo $row["id_staff"];?>">
    </div>
  </fieldset>
  <input type="text" hidden name="id_staff" value ="<?php echo $id_staff?>">
  <div class="row">
    <div class="col">
    <label for="disabledTextInput">ชื่อ</label>
      <input type="text" class="form-control" name="name_staff" value="<?php echo $row["name_staff"]?>">
    </div>
    <div class="col">
    <label for="disabledTextInput">นามสกุล</label>
      <input type="text" class="form-control" name="lname_staff" value="<?php echo $row["lname_staff"] ?>">
    </div>
  </div>

  <div class="row">
    <div class="col">
    <label for="disabledTextInput">username</label>
      <input type="text" class="form-control" name="username" value="<?php echo $row["username"] ?>">
    </div>
    <div class="col">
    <label for="disabledTextInput">password</label>
      <input type="password" class="form-control" name="password" value="<?php echo $row["password"] ?>">
    </div>
  </div>
  <br>
  <button type="submit" class="btn btn-primary btn-block">แก้ไข</button>
</form>
    </div>
</div>
</div>

}
<?php  

mysqli_close($con);
?>

</body>
</html>