
<?php 
echo "<pre>";
print_r($_POST);
echo "</pre>";
include('../condb.php');

$id_mem = $_POST['id_mem'];
$name_mem = $_POST['name_mem'];
$lname_mem = $_POST['lname_mem'];
$id_department = $_POST['id_department'];
$phone_num = $_POST['phone_num'];

	//เพิ่มข้อมูล
	$sql = " INSERT INTO member
	(id_mem, name_mem, lname_mem, id_department, phone_num)
	VALUES
	('$id_mem', '$name_mem', '$lname_mem', '$id_department', '$phone_num')";
	
	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
	
	//ปิดการเชื่อมต่อ database
	mysqli_close($con);
			
			
				
				
				//ถ้าสำเร็จให้ขึ้นอะไร
	if ($result){
		echo "<script type='text/javascript'>";
		echo"alert('เพิ่มข้อมูลสมาชิกสำเร็จ');";
	    echo"window.location = '../admin/member.php';";
		echo "</script>";
		}
		else {
			//กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
				echo "<script type='text/javascript'>";
				echo "alert('error!');";
				echo"window.location = '../admin/member.php'; ";
				echo"</script>";
	}


?>