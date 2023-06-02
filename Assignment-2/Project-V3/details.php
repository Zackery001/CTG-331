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


<div class="container mt-3">
    <div class="row">
       <div class="border border-danger p-2 col-8 offset-2 card">

            <h5 style="background-color:powderblue;">Post by : <?= $user['username']?></h5>
            <h3><?= $details['title'] ?></h3>

            <div class = "mt-3">
                <h5>Description :</h5>
                <?= $details['description'] ?>
            </div>

        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row">
       <div class="border border-danger p-2 col-8 offset-2 card">
            <h5>Comment Section :</h5>

            <?php if(isset($_SESSION['username'])): ?>
                
                <?php

                    if(isset($_POST['submit'])){

                        $link = "details.php?q_id=".$details['id'];
                        $post->addComment($_SESSION['user_id'], $details['id'], $_POST['details']);
                        header("$link");

                    }
                
                ?>
            <?php endif; ?>

            <form class = "form-group" action="" method="POST">
                <textarea name = "details" id = "textarea" class = "border border-primary mt-2 form-control" rows="1"></textarea>
                <input type = "submit" name = "submit" value = "Comment" class = "mt-2 mb-1 btn btn-sm btn-success">
            </form>

            <?php

                $getComments = $post->getComments($details['id']);

            ?>

            <?php foreach($getComments as $comments): ?>

            <div class="border border-info p-2 mt-1 mb-2">
                <small>Comment By : <?= $comments['username'] ?> (<?= $comments['created_at'] ?>) </small>
                <div>
                    <?= $comments['details'] ?>
                </div>
            </div>

            <?php endforeach; ?>
       </div>
    </div>
</div>

<?php include 'element/footer.php'; ?>
