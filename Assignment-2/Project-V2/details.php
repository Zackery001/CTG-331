<?php include 'element/header.php'; DocName("Post Details"); ?>
<?php include 'element/navbar.php'; ?>
<?php include 'core/Activity.php'; ?>

<?php 

    if(isset($_GET['q_id'])){
        
        $post = new Activity;
        $details = $post->details($_GET['q_id']);
        $user = $post->getUser($details[0]['user_id']);
        // echo "<pre>";
        // print_r($user);
        // echo "</pre>";

        if(count($details) == 1){
            $details = $details[0];
            $user = $user[0];
        }else{
            echo "Something Went Wrong";
            exit();
        }

    }else{
        echo "Invalid Request";
        exit();
    }
?>


<div class="container">
    <div class="row">
       <div class="col-8 offset-2 card">

            <h5>Post by : <?= $user['username']?></h5>
            <h3><?= $details['title'] ?></h3>

            <div class="border border-primary">
                <?= $details['description'] ?>
            </div>

        </div>
    </div>
</div>

<?php include 'element/footer.php'; ?>