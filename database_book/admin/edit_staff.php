<?php
include('../condb.php');

$id_staff = $_GET['id_staff'];
$staff ="SELECT * FROM staff WHERE id_staff='$id_staff'" or die("Error:" . mysqli_error()); 
//ประกาศตัวแปร sqli
$staf = mysqli_query($con, $staff);
//สร้างตัวแปร $row มารับค่าจากการ fetch array
$st = mysqli_fetch_array($staf);

$stype = $st['id_stype'];
$id_staff = $st['id_staff'];

$styp  ="SELECT * FROM stype WHERE id_stype!='$stype'" or die("Error:" . mysqli_error()); 
//ประกาศตัวแปร sqli
$sty = mysqli_query($con, $styp);

$styp2  ="SELECT * FROM stype WHERE id_stype='$stype'" or die("Error:" . mysqli_error()); 
$st2 = mysqli_query($con, $styp2);
$ss = mysqli_fetch_array($st2);



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
        <h1 class="text-center bg-secondary text-white">เพิ่มข้อมูลสมาชิก</h1>    
    <form action="../check/update_staff.php" method="post" name="form1" id="form1">
      <br>
  <div class="row">
    <div class="col">
    <label class="small mb-1" for="inputPassword">ชื่อ</label>
       <input class="form-control" id="name_staff" name="name_staff"  type="text" value="<?php echo $st["name_staff"]?>" required/>
    </div>
    <div class="col">
    <label class="small mb-1" for="inputPassword">นามสกุล</label>
    <input class="form-control" id="lname_staff" name="lname_staff"  type="text" value="<?php echo $st["lname_staff"]?>" required/>
    </div>
  </div>

  <div class="row">
    <div class="col">
    <div class="form-group">
    					<label class="small mb-1"  for="exampleInputEmail1">ประเภทพนักงาน</label>
    					<select class="form-control select2" name="id_stype">
                        <option value="<?php echo $st["id_stype"]?>"><?php echo $ss["stype"]?></option>
 
    					  <?php foreach ($sty as $s) {?>
    					  	<option  value="<?php echo $s['id_stype']; ?>">
    					  	<?php echo $s['stype']; ?>
    					    </option>
    					  <?php }?>
						</select>
    					
  					</div>


    <div class="row">
    <div class="col">
    <label class="small mb-1" for="inputPassword">username</label>
       <input class="form-control" id="username" name="username"  type="text" value="<?php echo $st["username"]?>" required />
    </div>
    <div class="col">
    <label class="small mb-1" for="inputPassword">password</label>
    <input class="form-control" id="password" name="password" pattern="[0-9]+" value="<?php echo $st["password"]?>" type="tel"required placeholder="*ตัวเลขเท่านั้น!"/>
    <input class="form-control" id="id_staff" name="id_staff"  type="hidden" value="<?php echo $st["id_staff"]?>" />
    </div>
  </div>
    </div>
    
    
  </div>
  <br>
  <button type="submit" class="btn btn-primary btn-block">แก้ไขข้อมูล</button>
</form>
<br>
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

<script type="text/javascript">	
				$(document).ready(function() {
				$('.select2').select2({
				closeOnSelect: false
				});
				});
			</script>
 
</body>
</html>