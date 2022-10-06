
<?php 
echo "<pre>";
print_r($_POST);
echo "</pre>";
include('../condb.php');

$publisher = $_POST['publisher'];

	//เพิ่มข้อมูล
	$sql = " INSERT INTO publisher
	(publisher)
	VALUES
	('$publisher')";
	
	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
	
	//ปิดการเชื่อมต่อ database
    mysqli_close($con);
    				
				//ถ้าสำเร็จให้ขึ้นอะไร
	if ($result){
		echo "<script ty    pe='text/javascript'>";
		echo"alert('เพิ่มข้อมูลสำนักพิมพ์สำเร็จ');";
	    echo"window.location = '../admin/publisher.php';";
		echo "</script>";
		}
		else {
			//กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
				echo "<script type='text/javascript'>";
				echo "alert('error!');";
				echo"window.location = '../admin/publisher.php'; ";
				echo"</script>";
	}
?>