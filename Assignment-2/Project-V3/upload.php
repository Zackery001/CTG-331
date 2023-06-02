<?php include 'element/header.php'; DocName("Image Upload")?>
<?php include 'element/navbar.php'; ?>
<?php include 'core/User.php'; ?>
<?php include 'core/Activity.php'; ?>
<?php
    $user = new User;
    $user->logCheck($_SESSION['username']);
?>
<div class="container">
    <div class="row">
        <h3 class="text-center">
            <h2 class = 'text-center mt-2'>Upload :</h2>
        </h3>

        <?php
            try{
                if(isset($_POST['upload'])){
                    if($_POST['description']!=null){
                        $activity = new Activity;
                        $img_url = $activity->image($_SESSION['user_id'], $_SESSION['username']);
                        $activity->post($_POST['title'],$_POST['description'],$_SESSION['user_id'],$img_url);

                        echo "<p class='alert alert-success'>
                            Your upload has been successfully submitted!</p>";
                    }else{
                        echo "<p class='alert alert-warning'>
                            Your description field seems to be empty.</p>";
                    }

                }
            }catch(Exception $error){
                header("location:index.php");
            }
        ?>

        <form action="" method="POST" enctype = "multipart/form-data">
            <div class="form-group">
                <label>Title</label>
                <input class = "form-control" type="text" name="title" placeholder = "Title..." required>
            </div>
            <div class="form-group mt-2">
                <label>Description</label>
                <textarea id = "textarea" class = "form-control" name="description" placeholder = "Description Here..."></textarea>
            </div>

            <h5 class = "text-bg mt-2">Attachment :</h5>
            <div>
                <input class = "btn" type="file" name="image" accept="image/*" required> 
            </div>
            <div class = "d-grid gap-2 col-6 mx-auto">
                <input class = "btn btn-primary btn-success mt-4" type="submit" 
                name = "upload" value = "Upload">
            </div>
            <a class="btn btn-danger mt-4" href="index.php" role="button">Back</a>
        </form>
    </div>
</div>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script type = "text/javascript">
    tinymce.init({
        selector: 'textarea'
    });
</script>
 
<?php include 'element/footer.php';?>