<?php session_start(); ?>
<div class="container">
    <div class="row">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href = "index.php">Home</a>
                <form class="d-flex">
                    <div class = "text-center mt-4">
                        <?php if(!isset($_SESSION['username'])):?>
                        <a class="btn btn-primary btn-sm me-1" href = "login.php">Login</a>
                        <a class="btn btn-primary btn-sm me-1" href = "signup.php">Register</a>
                        <?php else:?>
                        <div class="btn-group">
                            <label type="button" class="btn btn-primary btn-sm">+</label>
                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="upload.php">Image Post</a></li>
                                <li><a class="dropdown-item" href="post.php">Text Post</a></li>
                            </ul>
                        </div>
                        <!-- <a class="btn btn-primary btn-sm me-3" href = "upload.php">+</a> -->
                        <a class="btn btn-danger btn-sm ms-3" href = "logout.php"> Logout🏃‍♂️</a>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </nav>
    </div>
</div>