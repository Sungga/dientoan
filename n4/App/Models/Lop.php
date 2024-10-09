<?php 
    require_once 'App/Core/db.php';

class Lop extends DB{
    public function getlop()
    {
        $sql = "SELECT * FROM `tbl_lop`";
        $result = $this->db->query($sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result))
            {
                $data[] = $row;
            }
        }
        return $data;
    }
}