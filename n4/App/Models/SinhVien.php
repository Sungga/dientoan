<?php
require_once 'App/Core/db.php';
class SinhVien extends DB{
    public function getsvbylop()
{
    $data = [];
    $sql = "SELECT * FROM tbl_sinhvien";
    $result = $this->db->query($sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $ma_lop = $row['ma_lop'];
            $lop_sql = "SELECT * FROM tbl_lop WHERE ma_lop = '$ma_lop'";
            $lop_result = $this->db->query($lop_sql);
            if(mysqli_num_rows($lop_result) > 0) {
                while($row_lop = mysqli_fetch_assoc($lop_result)){
                    $row['ten_lop'] = $row_lop['ten_lop'];
                }
            }
            $data[] = $row;
        }
    }
    return $data;
}

    public function themSV($ten_sv, $ngaysinh, $gioitinh, $ma_lop){
        $ten_sv = $this->db->real_escape_string($ten_sv);
        $ngaysinh = $this->db->real_escape_string($ngaysinh);
        $gioitinh = $this->db->real_escape_string($gioitinh);
        $ma_lop = $this->db->real_escape_string($ma_lop);
        $sql = "INSERT INTO tbl_sinhvien (ten_sv, ngaysinh, gioitinh, ma_lop) VALUES ('$ten_sv', '$ngaysinh', '$gioitinh', '$ma_lop')";
        $result = $this->db->query($sql);
        if($result){
            return true;
        } else {
            return false;
        }
    }

    public function getsvbyid($id){
        $sql = "SELECT * FROM tbl_sinhvien WHERE ma_sv = '$id'";
        $result = $this->db->query($sql);
        if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
        }
        }
        return $data;
    }

    public function suaSV($id, $ten_sv, $ngaysinh, $gioitinh, $ma_lop){
        $ten_sv = $this->db->real_escape_string($ten_sv);
        $ngaysinh = $this->db->real_escape_string($ngaysinh);
        $gioitinh = $this->db->real_escape_string($gioitinh);
        $ma_lop = $this->db->real_escape_string($ma_lop);
        $sql = "UPDATE tbl_sinhvien SET ten_sv = '$ten_sv', ngaysinh = '$ngaysinh', gioitinh = '$gioitinh', ma_lop = '$ma_lop' WHERE ma_sv = '$id'";
        $result = $this->db->query($sql);
        if($result){
            return true;
        } else {
            return false;
        }
    }

    public function xoaSV($id){
        $sql = "DELETE FROM tbl_sinhvien WHERE ma_sv = '$id'";
        $result = $this->db->query($sql);
        if($result){
            return true;
        } else {
            return false;
        }
    }

}

