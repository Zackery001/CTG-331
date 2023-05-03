<?php include 'element/header.php'; DocName("Index"); ?>
<?php include 'element/navbar.php'; ?>
<?php include 'core/Activity.php'; ?>

<?php 
    $userActivity = new Activity;
    $activity = $userActivity->activity();
    // echo "<pre>";
    // print_r($activity);
    // echo "</pre>"
?>
<div class="container">
    <div class="row">
        <?php if(isset($_SESSION['username'])):?>
            <h3>Hello <?= $_SESSION ['username']; ?> !</h3>
        <?php endif;?>
        <?php foreach($activity as $userActivity):?>
            <?php if($userActivity['url'] != 'NULL' ):?>
                <div class="col-12 card mt-2 mb-2 card-header bg-transparent border-secondary">
                    <div class="row g-0">
                        <div class="col me-1">
                            <img src="core/content/<?= $userActivity['url'] ?>" height = "80px" width = "112px" class="img-fluid rounded-start" width = "80px" alt="...">
                        </div>
                        <div class="col-md-4">
                            <div class="card-body">
                                <h5><a href=""><?= $userActivity['title']; ?></a></h5>
                                <small> Created at : <?= date('d M, Y (H:i a)' ,strtotime($userActivity['created_at'])); ?></small><br>
                                <small> Created by : <?= $userActivity['username']; ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else:?>
                <div class="col-12 card mt-2 mb-2 card-header bg-transparent border-secondary">
                    <div class="row g-0">
                        <div class="col-md-5">
                            <div class="card-body">
                                <h5><a href=""><?= $userActivity['title']; ?></a></h5>
                                <small> Created at : <?= date('d M, Y (H:i a)' ,strtotime($userActivity['created_at'])); ?></small><br>
                                <small> Created by : <?= $userActivity['username']; ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif;?>
        <?php endforeach;?>
    </div>
</div>
<?php include 'element/footer.php'; ?>