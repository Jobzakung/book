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
$id_btype = $_POST['id_btype'];
$btype = $_POST['btype'];



//แก้ไขข้อมูล
	$sql = " UPDATE btype SET
	btype = '$btype'
	WHERE id_btype = '$id_btype' ";
	
	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

//ปิดการเชื่อมต่อ database
mysqli_close($con);
//ถ้าสำเร็จให้ขึ้นอะไร
if ($result){
        echo "<script type='text/javascript'>";
        echo"alert('แก้ไขข้อมูลสำเร็จ!');";
        echo"window.location = '../admin/btype.php'; ";

echo "</script>";
}
else {
//กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
echo "<script type='text/javascript'>";
echo "alert('error!');";
echo"</script>";
}
?>