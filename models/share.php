<?php /* @noinspection ALL */
class ShareModel extends Model {
    public function Index():?array{
        $this->query("SELECT * FROM share ");
        $row = $this->resultQuery();
        return $row;
    }

    public function Add(){
        $input = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $error = [];
        if (isset($input['submit'])){
            if (isset($input['title']) && empty($input['title'])) {
                $error[] = 'title empty';
            }
            if (isset($input['body']) && empty($input['body'])) {
                $error[] = 'body empty';
            }
            if (isset($input['link']) && empty($input['link'])) {
                $error[] = 'link empty';
            }
            $this->query("INSERT INTO share SET
             user_id= :user_id,
             title= :title,
             body= :body,
             link= :link ");

            $this->bindParameters(":title", $input['title']);
            $this->bindParameters(":body", $input['body']);
            $this->bindParameters(":link", $input['link']);
            $this->bindParameters(":user_id", $_COOKIE['user_id']);
            $this->QueryExecute();
            if (!empty($error)){
                $_SESSION['error'] = $error;
                header("location: " . ROOT_URL . "shares/add");
                exit();
            }elseif ($this->lastInsertId()) {
                $_SESSION['success'][] = "you have shared your comment";
                header("location: " . ROOT_URL . "shares");
                exit();
            }
        }
    }
}