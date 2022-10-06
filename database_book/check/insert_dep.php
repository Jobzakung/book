
<?php 
echo "<pre>";
print_r($_POST);
echo "</pre>";
include('../condb.php');

$department = $_POST['department'];

	//เพิ่มข้อมูล
	$sql = " INSERT INTO department
	(department)
	VALUES
	('$department')";
	
	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
	
	//ปิดการเชื่อมต่อ database
	mysqli_close($con);
			
			
				
				
				//ถ้าสำเร็จให้ขึ้นอะไร
	if ($result){
		echo "<script type='text/javascript'>";
		echo"alert('เพิ่มข้อมูลแผนกวิชาสำเร็จ');";
	    echo"window.location = '../admin/dep.php';";
		echo "</script>";
		}
		else {
			//กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
				echo "<script type='text/javascript'>";
				echo "alert('error!');";
				echo"window.location = '../admin/dep.php'; ";
				echo"</script>";
	}


?>