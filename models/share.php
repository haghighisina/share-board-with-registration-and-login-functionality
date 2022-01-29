<?php /* @noinspection ALL */
class ShareModel extends Model {
    public function Index(){
        $this->query("SELECT * FROM share ");
        $row = $this->resultQuery();
        return $row;
    }

    public function Add(){
        $input = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($input['submit'])){
            $this->query("INSERT INTO share SET  
             user_id= :user_id,
             title= :title,
             body= :body,
             link= :link ");

            $this->bindParameters(":title", $input['title']);
            $this->bindParameters(":body", $input['body']);
            $this->bindParameters(":link", $input['link']);
            $this->bindParameters(":user_id", 1);
            $this->QueryExecute();
            if ($this->lastInsertId()) {
                header("location: " . ROOT_URL . "shares");
                exit();
            }
        }
    }
}