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
$id_borrow = $_POST['id_borrow'];
$date = $_POST['date'];
$id_book = $_POST['id_book'];
$id_borrowb = $_POST['id_borrowb'];
$date1 = date("Ymd");



//แก้ไขข้อมูล
	$sql1 = " UPDATE borrow SET
    date_r = '$date1'
	WHERE id_borrow = '$id_borrow' ";
	
    $result = mysqli_query($con, $sql1) or die ("Error in query: $sql1 " . mysqli_error());
    

    $sql2 = " UPDATE borrow_book SET
	id_bstatus = '03'
	WHERE id_borrowb = '$id_borrowb' ";
	
    $result = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " . mysqli_error());
    
    $sql3 = " UPDATE book SET
	id_bstatus = '01'
	WHERE id_book = '$id_book' ";
	
	$result = mysqli_query($con, $sql3) or die ("Error in query: $sql2 " . mysqli_error());

//ปิดการเชื่อมต่อ database
mysqli_close($con);
//ถ้าสำเร็จให้ขึ้นอะไร
if ($result){
        echo "<script type='text/javascript'>";
        echo"alert('คืนหนังสือสำเร็จ!');";
        echo"window.location = '../staff/s_return.php'; ";

echo "</script>";
}
else {
//กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
echo "<script type='text/javascript'>";
echo "alert('error!');";
echo"</script>";
}
?>