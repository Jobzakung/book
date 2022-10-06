<?php
include('../condb.php');
$book   ="SELECT * FROM all_borrow "  or die("Error:" . mysqli_error()); 
//ประกาศตัวแปร sqli
$boo = mysqli_query($con, $book);
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
        <h1 class="text-center bg-primary text-white">ข้อมูลการยืมคืน</h1>
        <br><div class="text-center">
        </div>



  <br>
    <table id="myTable" class="display text-center">
    <thead>
    <tr>
        <th>รหัสการยืม</th>
        <th>รหัสหนังสือ</th>
        <th>ชื่อหนังสือ</th>
        <th>รหัสผู้ยืม</th>
        <th>ชื่อ-สกุล</th>
        <th>วันที่ยืม</th>
        <th>วันที่คืน</th>
        <th>สถานะ</th>
    </tr>
    </thead>
    <?php foreach ($boo as $b) {?>
      <tr>
	  <form action="../check/return.php" method="post" name="form1" id="form1">
        <td><?php echo $b['id_borrow']; ?></td>
        <td><?php echo $b['id_book']?></td>
        <td><?php echo $b['name_book']; ?></td>
        <td><?php echo $b['id_mem']; ?></td>
        <td><?php echo $b['name_mem'],"  ",$b['lname_mem']; ?></td>
        <td><?php echo $b['date_b']; ?></td>
		<input class="form-control" type="hidden" id="id_borrow" name="id_borrow" value="<?php echo $b['id_borrow']?>"/>
		<input class="form-control" type="hidden" id="date" name="date" value="<?php echo date("Y-m-d")?>"/> 
		<input class="form-control" type="hidden" id="id_book" name="id_book" value="<?php echo $b['id_book']?>"/> 
		<input class="form-control" type="hidden" id="id_borrowb" name="id_borrowb" value="<?php echo $b['id_borrowb']?>"/> 
        <td><?php echo $b['date_r']; ?></td>
        <td><?php echo $b['bstatus']; ?></td>
      </form>
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