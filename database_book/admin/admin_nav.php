<?php
session_start();
//echo '<pre>';
//print_r($_SESSION);
//echo '</pre>';

include('../condb.php');

$id_staff = $_SESSION['id_staff'];
$id_stype = $_SESSION['id_stype'];
$name_staff = $_SESSION['name_staff'];
$lname_staff = $_SESSION['lname_staff'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];


$query ="SELECT * FROM staff WHERE id_staff='$id_staff'" or die("Error:" . mysqli_error()); 
//ประกาศตัวแปร sqli
$result = mysqli_query($con, $query);
//สร้างตัวแปร $row มารับค่าจากการ fetch array
$row = mysqli_fetch_array($result);

if ($id_stype!='1'){

  Header("Location: ../index.php");
}
?>
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark ">
            <a class="navbar-brand" href="../admin/admin_page.php">LIBARY</a>
           
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../admin/borrow.php">ยืม <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../admin/return.php">คืน <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">จัดการหนังสือ</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="../admin/book.php">หนังสือ</a>
      <a class="dropdown-item" href="../admin/btype.php">ประเภทหนังสือ</a>
      <a class="dropdown-item" href="../admin/distribution.php">สถานที่จัดจำหน่าย</a>
      <a class="dropdown-item" href="../admin/publisher.php">สำนักพิมพ์</a>
      </li>

      <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">จัดการสมาชิก</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="../admin/member.php">สมาชิก</a>
      <a class="dropdown-item" href="../admin/dep.php">แผนกวิชา</a>
      </li>
      <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">จัดการพนักงาน</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="../admin/staff.php">พนักงาน</a>
      <a class="dropdown-item" href="../admin/stype.php">ประเภทพนักงาน</a>  
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../admin/report.php">ข้อมูลการยืมคืน <span class="sr-only">(current)</span></a>
      </li>
        </div>
        
</div>


           
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?php echo $row["name_staff"],"   ", $row["lname_staff"];?></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="admin_edit_pro.php">แก้ไขรหัสผ่าน</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../check/logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
