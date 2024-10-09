<!DOCTYPE html>
<html>
<head>
<title>Book Book</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clound";

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['action'])) {
    $action = $_POST['action'];
  
?>
<style>
  body {
    /* background: linear-gradient(135deg, #9c9db7 0%, #2c2c54 100%); */
    background-color: #2c2c54;
  }
  .container {
    height: auto;
    width: 1000px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    background: linear-gradient(135deg, #74759f 0%, #171737 100%);
    /* background-color: #9c9db7; */
    border-radius: 10px;
  }
  .form-container {
    display: none; /* Ẩn ban đầu */
  }
  .nav-tabs .nav-link{
    color: black;
  }
  .form-container.active {
    display: block; /* Hiển thị khi active */
    background-color: #9a8bb3;
  }
  .nav-tabs .nav-link.active {
    display: block;
    background-color: #9a8bb3;
  }
  .btn-input{
    padding: 5px 20px;
    border: none;
    border-radius: 10px ;
    background-color: #8369af;
  }
  .btn-input:hover {
    background-color: #74759f;
  }
</style>
<script src="notification.js"></script>



</head>
<body>
<?php
  // Thêm sản phẩm
  if ($action == 'add') {
    $ten_san_pham = $_POST['nameBook'];
    $tacgia = $_POST['nameTG'];
    $gia = $_POST['price'];

    // Xử lý upload hình ảnh
    $target_dir = "uploads/"; 
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Kiểm tra kích thước file
  if ($_FILES["img"]["size"] > 500000) {
    echo "<script> showNotification('Dung lượng file quá lớn!','error'); </script>";
    $uploadOk = 0;
  }

  // Cho phép các định dạng file nhất định
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "<script> showNotification('Error','error'); </script>";
    $uploadOk = 0;
  }

  // Kiểm tra nếu $uploadOk = 0 thì có lỗi xảy ra
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // Nếu mọi thứ đều ổn, thử upload file
  } else {
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
      $sql = "INSERT INTO book (tensach, img, tacgia, gia) VALUES ('$ten_san_pham', '$target_file', '$tacgia', '$gia')";

      if ($conn->query($sql) === TRUE) {
        echo "<script> showNotification('Thêm sản phẩm thành công!'); </script>";
      } else {
        echo "<script> showNotification('!', 'error'); </script> " . $sql . "<br>" . $conn->error;
      }
    } else {
      echo "<script> showNotification('Error!','error'); </script>";
    }
  }
}
    // Xóa sản phẩm
    if ($action == 'delete') {
      $id = $_POST['id'];
  
      $sql = "DELETE FROM book WHERE id_book='$id'";
  
      if ($conn->query($sql) === TRUE) {
        echo "<script> showNotification('Xoa sản phẩm thành công!','warning'); </script>";
      } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
      }
    }
  }
  $sql = "SELECT * FROM book";
  $result = $conn->query($sql);
?>
<div class="container mt-3 mb-3">
<h2 style="color: #03efd1;font-size: -webkit-xxx-large;
    font-family: cursive;">Book Book</h2>
    <div>
        <div class="nav nav-tabs" role="tablist">
            <button id="showListBtn" class="nav-link active" data-toggle="tab">Danh sách </button>
            <button id="showAddBtn" class="nav-link" data-toggle="tab">Thêm mới</button>
        </div>
    
  <div id="listForm" class="form-container active ">
    <table class="table text-center w-100">
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Tên tác giả</th>
            <th>Giá</th>
            <th>Xóa</th>
        </tr>
        <?php
        $i = 1;
        while($row = $result->fetch_assoc()) {
            ?>
        <tr style="vertical-align: middle;">
            <td><?php echo $i++ ?></td>
            <td><?php echo $row['tensach'] ?></td>
            <td><img src="<?php echo $row['img'] ?>" width="70px" height="80px"></td>
            <td><?php echo $row['tacgia'] ?></td>
            <td><?php echo $row['gia'] ?></td>
            <td>
                <form method="post">
                    <input type='hidden' name='action' value='delete'>
                    <input type='hidden' name='id' value='<?php echo $row['id_book'] ?>'>
                    <input class="btn-input" type='submit' value='Xóa' onclick="return confirm('Are you want to delete?')">
                </form>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
  </div>

  <div id="addForm" class="form-container  p-3">
    <form method="post" enctype="multipart/form-data">
    <input type='hidden' name='action' value='add'>
        <div class="form-group">
            <p >Tên Sách</p>
            <input
                class="form-control"
                type="text"
                name="nameBook"
            />
        </div>
        <div class="form-group">
            <p>Hình ảnh</p>
            <input
                class="form-control"
                type="file"
                name="img"
            />
        </div>
        <div class="form-group">
            <p>Tên tác giả</p>
            <input
                class="form-control"
                type="text"
                name="nameTG"
            />
        </div>
        <div class="form-group">
            <p>Giá</p>
            <input
                class="form-control"
                type="text"
                name="price"
            />
        </div>
      <input class="btn-input" type="submit" value="Thêm" style="margin-top: 20px; padding: 10px 20px" />
    </form>
  </div>
  </div>
</div>

<script src="index.js"></script>
</body>
</html>