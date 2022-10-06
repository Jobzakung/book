<?php
include('../condb.php');
$btype  ="SELECT * FROM btype" or die("Error:" . mysqli_error()); 
$bty = mysqli_query($con, $btype);

$distribution  ="SELECT * FROM distribution" or die("Error:" . mysqli_error()); 
$dis = mysqli_query($con, $distribution);

$publisher  ="SELECT * FROM publisher" or die("Error:" . mysqli_error()); 
$pub = mysqli_query($con, $publisher);


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
        <h1 class="text-center bg-primary text-white">เพิ่มข้อมูลหนังสือ</h1>
        
        
    <form action="../check/insert_book.php" method="post" name="form1" id="form1">
      <br>



  <div class="row">
    <div class="col">
    <label class="small mb-1" for="inputPassword">ชื่อหนังสือ</label>
       <input class="form-control" id="name_book" name="name_book"  type="text"  required />
    </div>
    <div class="col">
    <label class="small mb-1" for="inputPassword">จำนวนหน้า</label>
    <input class="form-control" id="page" name="page"  type="number"  />
    </div>
  </div>

  <div class="row">
    <div class="col">
    <label class="small mb-1" for="inputPassword">ผู้แต่ง</label>
       <input class="form-control" id="author" name="author"  type="text"  />
    </div>
  </div>


  <div class="row">
    <div class="col">
    <div class="form-group">
    					<label class="small mb-1"  for="exampleInputEmail1">ประเภทหนังสือ</label>
    					<select class="form-control select2" name="id_btype">
    					  <option value="">--Select--</option>
 
    					  <?php foreach ($bty as $b) {?>
    					  	<option  value="<?php echo $b['id_btype']; ?>">
    					  	<?php echo $b['btype']; ?>
    					    </option>
    					  <?php }?>
						 
						</select>
    					
  					</div>
 
    </div>
    <div class="col">
    <label class="small mb-1"  for="exampleInputEmail1">สถานที่จัดจำหน่าย</label>
    					<select class="form-control select2" name="id_distribution">
    					  <option value="">--Select--</option>
 
    					  <?php foreach ($dis as $d) {?>
    					  	<option  value="<?php echo $d['id_distribution']; ?>">
    					  	<?php echo $d['distribution']; ?>
    					    </option>
    					  <?php }?>
						 
						</select>
    					
  					</div>
 
    </div>
    <div class="row">
    <div class="col">
    <div class="form-group">
    					<label class="small mb-1"  for="exampleInputEmail1">สำนักพิมพ์</label>
    					<select class="form-control select2" name="id_publisher">
    					  <option value="">--Select--</option>
 
    					  <?php foreach ($pub as $p) {?>
    					  	<option  value="<?php echo $p['id_publisher']; ?>">
    					  	<?php echo $p['publisher']; ?>
    					    </option>
    					  <?php }?>
						 
						</select>
    					
  					</div>
 
    </div>
    <div class="col">
    <label class="small mb-1" for="inputPassword">ปีที่พิมพ์</label>
       <input class="form-control" id="year" name="year"  type="text"  required />
    </div>
    					
  					</div>
 
                      <div class="row">
    <div class="col">
    <label class="small mb-1" for="inputPassword">ISBN</label>
       <input class="form-control" id="isbn" name="isbn"  type="tel" pattern="[0-9]+" minlength="13" maxlength="13" />
    </div>
    <div class="col">
    <label class="small mb-1" for="inputPassword">จำนวนหนังสือ</label>
    <input class="form-control" id="a" name="a"  type="number" value="1"min="1" required />
    </div>
  </div>
    
  </div>
  <br>
  <button type="submit" class="btn btn-primary btn-block">เพิ่มข้อมูล</button>
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