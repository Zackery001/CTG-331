<?php
include_once 'Database.php';
class Activity extends Database{
    public function image($user_id,$username){
        $accExt = ['jpeg','png','jpg'];
        $content = $_FILES['image']['tmp_name'];
        $conExt = explode('.',$_FILES['image']['name']);
        if (in_array(end($conExt), $accExt)){
            $conExt = end($conExt);
            // $conName = uniqid()."-".time().".".$conExt;
            $conName = $user_id."-".$username."-".uniqid().".".$conExt;
            move_uploaded_file($content,"core/content/".$conName);
            return $conName;
        }else{
            echo
            "<div>
            <p class='alert alert-danger'>File format not supported</p>
            </div>";
        }
    }
    public function post($title,$description,$user_id,$img_url){
        $created_at = date('Y-m-d H:i:s');
        $sql = "INSERT INTO  posts( title, description, user_id, created_at, url ) 
        VALUES ( '$title', '$description', '$user_id', '$created_at', '$img_url' ) ";
        $this->exec($sql);
        
    }
    public function activity(){
        $sql = "SELECT posts.id, posts.title, posts.user_id, posts.created_at, posts.url, users.username
         FROM posts JOIN users ON users.id = posts.user_id";
        return $this->fetch($sql);
    }
    public function details($q_id){
        $sql = "SELECT * FROM posts WHERE id='$q_id' ";
        return $this->fetch($sql);
    }
    public function getUser($u_id){
        $sql = "SELECT username FROM users WHERE id = '$u_id' ";
        return $this->fetch($sql);
    }
    public function addComment($u_id, $q_id,$comment){
        $created_at = date('Y-m-d H:i:s');
        $sql = "INSERT INTO comments (user_id, post_id, created_at, details) 
            VALUES ('$u_id', '$q_id', '$created_at','$comment')" ;

        $this->exec($sql);
    }

}

?>