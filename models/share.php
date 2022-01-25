<?php
class ShareModel extends Model {
    public function Index(){
        $this->query("SELECT * FROM share ");
        $row = $this->resultQuery();
        return $row;
    }
}