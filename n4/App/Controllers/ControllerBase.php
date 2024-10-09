<?php 
require_once 'App/Models/SinhVien.php';
require_once 'App/Models/Lop.php';

class ControllerBase {
    public function render($view, $params = []) {
        extract($params);
        require_once 'App/Views/'.$view.'.php';
    }

    public function index() {
        $dssv = new SinhVien();
        $dssv = $dssv->getsvbylop();
        $this->render('index', ['dssv' => $dssv]);
    }
    public function create() {
        $lop = new Lop();
        $lops = $lop->getlop();
        $this->render('create', ['lops' => $lops]);
    }

    public function themSV(){
        if(isset($_POST['ten_sv']) && $_POST['ngaysinh'] && $_POST['gioitinh'] && ($_POST['ma_lop']))
        {
            $ten_sv = $_POST['ten_sv'];
            $ngaysinh = $_POST['ngaysinh'];
            $gioitinh = $_POST['gioitinh'];
            $ma_lop = $_POST['ma_lop'];
            $sv = new SinhVien();
            if($sv->themSV($ten_sv, $ngaysinh, $gioitinh, $ma_lop)){
                header("Location: index.php");
                exit();
            } else {
                echo "Đã xảy ra lỗi khi thêm sinh viên!";
            }
            
        }
    }

    public function edit($id) {
        $lop = new Lop();
        $lops = $lop->getlop();
        $sv = new SinhVien();
        $sv = $sv->getsvbyid($id);
        $sv = !empty($sv) ? $sv[0] : null;
        $this->render('edit', ['sv' => $sv, 'lops' => $lops]);
    }

    public function suaSV($id){
        if(isset($_POST['ten_sv']) && $_POST['ngaysinh'] && $_POST['gioitinh'] && ($_POST['ma_lop']))
        {
            $ten_sv = $_POST['ten_sv'];
            $ngaysinh = $_POST['ngaysinh'];
            $gioitinh = $_POST['gioitinh'];
            $ma_lop = $_POST['ma_lop'];
            $sv = new SinhVien();
            if($sv->suaSV($id, $ten_sv, $ngaysinh, $gioitinh, $ma_lop)){
                header("Location: index.php");
                exit();
            } else {
                echo "Đã xảy ra lỗi khi sửa sinh viên!";
            }
            
        }
    }

    public function xoaSV($id){
        $sv = new SinhVien();
        if($sv->xoaSV($id)){
            header("Location: index.php");
            exit();
        } else {
            echo "Đã xảy ra lỗi khi xóa sinh viên!";
        }
    }
}