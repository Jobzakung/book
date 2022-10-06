<?php
include('../condb.php');
$member  ="SELECT * FROM all_mem" or die("Error:" . mysqli_error()); 
//ประกาศตัวแปร sqli
$mem = mysqli_query($con, $member);
//echo ($query_level);//test query
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

    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <title>libary</title>
  </head>
  <body>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->

   <?php include 'admin_nav.php'?>


   <br>
   <div class="container">
     <div class="card">
        <div class="card-body">
        <h1 class="text-center bg-info text-white">ข้อมูลสมาชิก</h1>
        <br><div class="text-center">
        <a href="../admin/add_mem.php" class="btn btn-success btn-lg active" role="button" aria-pressed="true">เพิ่มข้อมูลสมาชิก</a>
        </div>

        

  <br>
    <table id="myTable" class="display text-center">
    <thead>
    <tr>
        <th>รหัสนักเรียน/นักศึกษา</th>
        <th>ชื่อ-สกุล</th>
        <th>แผนกวิชา</th>
        <th>เบอร์โทรศัพท์</th>
        <th>แก้ไข</th>
        <th>ลบ</th>
    </tr>
    </thead>
    <?php foreach ($mem as $m) {?>
      <tr>
        <td><?php echo $m['id_mem']; ?></td>
        <td><?php echo $m['name_mem'],"     ",$m['lname_mem']; ?></td>
        <td><?php echo $m['department']; ?></td>
        <td><?php echo $m['phone_num']; ?></td>
        <td><a class="btn btn-warning btn-md" href="../admin/edit_mem.php?id_mem=<?php echo  $m['id_mem']; ?>"  role="button">แก้ไข</td>
        <td><a class="btn btn-danger btn-md" href='../check/del_member.php?id_mem=<?php echo $m['id_mem']; ?>'onclick="return confirm('คุณต้องการที่จะลบข้อมูลนี้หรือไม่')">ลบ</a></td>  
      </tr>
    					  <?php }?>
    </table>
    </div>
</div>
</div>

}
<?php  

mysqli_close($con);
?>
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</body>
</html>