<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sinh viên</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Thêm sinh viên</h2>
        <form method="post" action="index.php?action=themSV" class="needs-validation">
            <div class="form-group">
                <label for="ten_sv">Tên sinh viên:</label>
                <input type="text" class="form-control" id="ten_sv" name="ten_sv" required>
                <div class="invalid-feedback">Vui lòng nhập tên sinh viên.</div>
            </div>
            <div class="form-group">
                <label for="ngaysinh">Ngày sinh:</label>
                <input type="date" class="form-control" id="ngaysinh" name="ngaysinh" required>
                <div class="invalid-feedback">Vui lòng chọn ngày sinh.</div>
            </div>
            <div class="form-group">
                <label for="gioitinh">Giới tính:</label>
                <select class="form-control" id="gioitinh" name="gioitinh">
                    <option value="Nam">Nam</option>
                    <option value="Nữ" selected>Nữ</option>
                </select>
            </div>
            <div class="form-group">
                <label for="ma_lop">Lớp:</label>
                <select class="form-control" id="ma_lop" name="ma_lop">
                    <?php foreach ($lops as $lop): ?>
                    <option value="<?= $lop['ma_lop'] ?>"><?= $lop['ten_lop'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Thêm sinh viên</button>
            <a href="index.php" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
