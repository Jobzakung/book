<?php include ('../condb.php'); 


//สร้างตัวแปร
$id_distribution = $_GET['id_distribution'];


	//ลบข้อมูล
	$sql = " DELETE FROM distribution WHERE id_distribution='$id_distribution' ";
	


$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
	
	//ปิดการเชื่อมต่อ database
	mysqli_close($con);
				
				
				//ถ้าสำเร็จให้ขึ้นอะไร
	if ($result){
		echo "<script type='text/javascript'>";
		
	    echo"window.location = '../admin/distribution.php';";
		echo "</script>";
		}
		else {
			//กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
				echo "<script type='text/javascript'>";
				echo "alert('error!');";
				echo"window.location = 'showe.php'; ";
				echo"</script>";
	}




?>