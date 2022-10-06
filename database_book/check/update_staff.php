<?php 
echo "<pre>";
print_r($_POST);
echo "</pre>";
?>

<?php 

    $con=mysqli_connect("localhost","root","","book")
                or die ("Erroe : ".mysqli_error($con));
                
                mysqli_query($con,"SET NAME'UTF8'"); 


//สร้างตัวแปร
$name_staff = $_POST['name_staff'];
$lname_staff = $_POST['lname_staff'];
$id_stype = $_POST['id_stype'];
$username = $_POST['username'];
$password = $_POST['password'];
$id_staff = $_POST['id_staff'];



//แก้ไขข้อมูล
	$sql = " UPDATE staff SET
	name_staff = '$name_staff',lname_staff = '$lname_staff',id_stype = '$id_stype',username = '$username',password = '$password'
	WHERE id_staff = '$id_staff' ";
	
	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

//ปิดการเชื่อมต่อ database
mysqli_close($con);
//ถ้าสำเร็จให้ขึ้นอะไร
if ($result){
        echo "<script type='text/javascript'>";
        echo"alert('แก้ไขข้อมูลสำเร็จ!');";
        echo"window.location = '../admin/staff.php'; ";

echo "</script>";
}
else {
//กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
echo "<script type='text/javascript'>";
echo "alert('error!');";
echo"</script>";
}
?>