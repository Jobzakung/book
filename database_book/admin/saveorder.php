<?php
	session_start();
    include("../condb.php");  
    echo "<pre>";
print_r($_SESSION['cart']);
print_r($_POST);
echo "</pre>";
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirm</title>
</head>
<body>
<!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->
<?php

	$id_book = $_SESSION['cart'];
    $id_mem = $_POST["id_mem"];
    $id_staff = $_SESSION['id_staff'];
    $id_borrow = $_POST["id_borrow"];
	//บันทึกการสั่งซื้อลงใน order_detail
    $sql1 = " INSERT INTO borrow
	(id_mem, id_staff)
	VALUES
	('$id_mem', '$id_staff')";
	$query1	= mysqli_query($con, $sql1);
	//ฟังก์ชั่น MAX() จะคืนค่าที่มากที่สุดในคอลัมน์ที่ระบุ ออกมา หรือจะพูดง่ายๆก็ว่า ใช้สำหรับหาค่าที่มากที่สุด นั่นเอง.
//	$sql2 = "select max(o_id) as o_id from order_head where o_name='$name' and o_email='$email' and o_dttm='$dttm' ";
//	$query2	= mysqli_query($conn, $sql2);
//	$row = mysqli_fetch_array($query2);
//	$o_id = $row["o_id"];

//PHP foreach() เป็นคำสั่งเพื่อนำข้อมูลออกมาจากตัวแปลที่เป็นประเภท array โดยสามารถเรียกค่าได้ทั้ง $key และ $value ของ array
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
        
        $sql3 = " INSERT INTO borrow_book
        (id_book, id_borrow)
        VALUES
        ('$p_id', '$id_borrow')";
        $query3	= mysqli_query($con, $sql3);

		$sql4	= " UPDATE book SET
        id_bstatus = '02'
        WHERE id_book = '$p_id' ";
        $query4	= mysqli_query($con, $sql4);
	}
	
    if($query1 && $query4 && $query3){
		$msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
		foreach($_SESSION['cart'] as $p_id)
		{	
			//unset($_SESSION['cart'][$p_id]);
			unset($_SESSION['cart']);
		}
	}
	else{
		$msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";	
	}
?>
<script type="text/javascript">
	alert("<?php echo $msg;?>");
	window.location ='../admin/return.php';
</script>

?>

 




</body>
</html>