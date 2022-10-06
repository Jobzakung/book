
<?php 
echo "<pre>";
print_r($_POST);
echo "</pre>";
include('../condb.php');

$name_book = $_POST['name_book'];
$page = $_POST['page'];
$author = $_POST['author'];
$id_btype = $_POST['id_btype'];
$id_distribution = $_POST['id_distribution'];
$id_publisher = $_POST['id_publisher'];
$year = $_POST['year'];
$isbn = $_POST['isbn'];
$a = $_POST['a'];
$i=1;


while($i<=$a){	//เพิ่มข้อมูล
	$sql = " INSERT INTO book
	(name_book, page, author, id_btype, id_distribution, id_publisher, year, isbn)
	VALUES
	('$name_book', '$page', '$author', '$id_btype', '$id_distribution', '$id_publisher', '$year', '$isbn')";
	
	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
    
    $i++;
}
	//ปิดการเชื่อมต่อ database
	mysqli_close($con);
		
			
				
				
				//ถ้าสำเร็จให้ขึ้นอะไร
                if ($result){
                    echo "<script type='text/javascript'>";
                    echo"alert('เพิ่มข้อมูลหนังสือสำเร็จ');";
                    echo"window.location = '../admin/book.php';";
                    echo "</script>";
                    }
                    else {
                        //กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
                            echo "<script type='text/javascript'>";
                            echo "alert('error!');";
                            echo"window.location = '../admin/book.php'; ";
                            echo"</script>";
                }
            
            
            ?>