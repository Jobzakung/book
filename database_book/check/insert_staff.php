
<?php 
echo "<pre>";
print_r($_POST);
echo "</pre>";
include('../condb.php');

$name_staff = $_POST['name_staff'];
$lname_staff = $_POST['lname_staff'];
$id_stype = $_POST['id_stype'];
$username = $_POST['username'];
$password = $_POST['password'];

	//เพิ่มข้อมูล
	$sql = " INSERT INTO staff
	(name_staff, lname_staff, id_stype, username, password)
	VALUES
	('$name_staff', '$lname_staff', '$id_stype', '$username', '$password')";
	
	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
	
	//ปิดการเชื่อมต่อ database
	mysqli_close($con);
			
			
				//ถ้าสำเร็จให้ขึ้นอะไร
	if ($result){
		echo "<script type='text/javascript'>";
		echo"alert('เพิ่มข้อมูลพนักงานสำเร็จ');";
	    echo"window.location = '../admin/staff.php';";
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