<?php
	include '../staff/staff_nav.php';	
	$p_id = $_REQUEST['p_id']; 
  $act = $_REQUEST['act'];
  $qty=0;
  unset($_SESSION['cart'][0]);
	if($act=='add' && !empty($p_id))
	{
		if(isset($_SESSION['cart'][$p_id]))
		{
			$_SESSION['cart'][$p_id]++;
		}
		else
		{
			$_SESSION['cart'][$p_id]=0;
		}
	}

	if($act=='remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
	{
    unset($_SESSION['cart'][$p_id]);
	}

	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $p_id=>$amount)
		{
			$_SESSION['cart'][$p_id]=$amount;
		}
	}
	include("../condb.php");  
	$last   ="SELECT id_borrow FROM borrow ORDER BY id_borrow DESC LIMIT 1"; 
	$lastrow = mysqli_query($con, $last);
	
?>

<!DOCTYPE html>
<html>
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
	<br>
	<br>

	<div class="container">
     <div class="card">
        <div class="card-body">

        <h1 class="text-center bg-info text-white">รายการหนังสือที่เลือก</h1>
	<br>
	<form id="frmcart" name="frmcart" method="post" action="../staff/s_saveorder.php">
  <table width="600" border="1" align="center" class="square">
    <tr>
      <td align="center"bgcolor="#EAEAEA">รหัสหนังสือ</td>
      <td align="center" bgcolor="#EAEAEA">ชื่อหนังสือ</td>
      <td align="center" bgcolor="#EAEAEA">ลบ</td>
    </tr>
<?php
$total=0;
if(!empty($_SESSION['cart']))
{
	include("../condb.php");
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql = "select * from all_book where id_book=$p_id";
		$query = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($query);
		echo "<tr>";
		echo "<td width='36'align='center' bgcolor='#FFFFFF '>" . $row["id_book"] . "</td>";
		echo "<td width='334' align='center'bgcolor='#FFFFFF '>" . $row["name_book"] . "</td>"; 
		//remove product
		echo "<td width='46' align='center'bgcolor='#FFFFFF '>		<a class='btn  btn-danger btn-sm btn-block' href='cart.php?p_id=$p_id&act=remove'  role='button'>ลบ</a></td>";

		echo "</tr>";
	}
	echo "<tr>";
  	echo "<td colspan='0' bgcolor='#FFFFFF ' align='center'><b></b></td>";
  	echo "<td align='right' bgcolor='#CEE7FF'></td>";
  	echo "<td align='left' bgcolor='#CEE7FF'></td>";
	echo "</tr>";
}
?>

<tr>
<td><a href="../staff/s_borrow.php" class="btn btn-warning btn-sm btn-block " role="button">กลับหน้ารายการหนังสือ</a></td>
<div class="form-group">
        <label class="small mb-1" for="inputPassword">รหัสนักศึกษา</label>
       <input class="form-control" id="id_mem" name="id_mem" pattern="[0-9]+" type="tel" maxlength="13" minlength="13" required />
	   <?php foreach ($lastrow as $l) {?>
	   <input class="form-control" type="hidden" id="id_borrow" name="id_borrow" value="<?php echo $l['id_borrow']+1?>"/> 
	   <?php }?>
    </div>
<td colspan="3" align="center">
	<!-- <input type="button" class="btn btn-success btn-sm btn-block" value="ยืม" name="Submit2" onclick="window.location='confirm.php';"><a>ยืม</a>-->
	<input class="btn btn-primary" type="submit" value="ยืม"/>
</td>
</tr>
</table>

</form>
</div>
</div>
</div>

<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</body>
</html>