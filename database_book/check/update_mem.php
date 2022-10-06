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
$id_mem = $_POST['id_mem'];
$name_mem = $_POST['name_mem'];
$lname_mem = $_POST['lname_mem'];
$id_department = $_POST['id_department'];
$phone_num = $_POST['phone_num'];
$id_memn = $_POST['id_memn'];





//แก้ไขข้อมูล
	$sql = " UPDATE member SET
	name_mem = '$name_mem',lname_mem = '$lname_mem',id_department = '$id_department',phone_num = '$phone_num',id_mem = '$id_memn'
	WHERE id_mem = '$id_mem' ";
	
	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

//ปิดการเชื่อมต่อ database
mysqli_close($con);
//ถ้าสำเร็จให้ขึ้นอะไร
if ($result){
        echo "<script type='text/javascript'>";
        echo"alert('แก้ไขข้อมูลสำเร็จ!');";
        echo"window.location = '../admin/member.php'; ";

echo "</script>";
}
else {
//กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
echo "<script type='text/javascript'>";
echo "alert('error!');";
echo"</script>";
}
?>