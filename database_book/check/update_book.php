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
$id_book = $_POST['id_book'];
$name_book = $_POST['name_book'];
$page = $_POST['page'];
$author = $_POST['author'];
$id_btype = $_POST['id_btype'];
$id_distribution = $_POST['id_distribution'];
$id_publisher = $_POST['id_publisher'];
$year = $_POST['year'];
$isbn = $_POST['isbn'];


//แก้ไขข้อมูล
	$sql = " UPDATE book SET
	name_book = '$name_book', page = '$page', author = '$author', id_btype = '$id_btype', id_distribution = '$id_distribution', id_publisher = '$id_publisher', year = '$year', isbn = '$isbn'
	WHERE id_book = '$id_book' ";
	
	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

//ปิดการเชื่อมต่อ database
mysqli_close($con);
//ถ้าสำเร็จให้ขึ้นอะไร
if ($result){
        echo "<script type='text/javascript'>";
        echo"alert('แก้ไขข้อมูลสำเร็จ!');";
        echo"window.location = '../admin/book.php'; ";

echo "</script>";
}
else {
//กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
echo "<script type='text/javascript'>";
echo "alert('error!');";
echo"</script>";
}
?>