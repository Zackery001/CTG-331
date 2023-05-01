<?php include 'element/header.php'; DocName("Signup")?>
<?php include 'core/User.php' ; ?>
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <h3 class="text-center">
                    <h2 class = 'text-center mt-4'>Create your account</h2>
                </h3>

                <?php
                    if(isset($_POST['register'])){
                        $user = new User;
                        $userCount = $user->duplicateUser($_POST['username'],$_POST['email']);
                        if (count($userCount) > 0){
                            echo "<p class='alert alert-warning'>This user already exists</p>";
                        }
                        else{
                            $userAuth = $user->authentication($_POST['age'], $_POST['email'], $_POST['password']);
                            if($userAuth==true){
                                $user->signup($_POST['username'], $_POST['email'], md5($_POST['password']),$_POST['age']);
                            }
                        }
                    }
                ?>

                <form action="" method="POST" enctype = "multipart/form-data">

                    <label class = "mt-2">Username :</label>
                    <input class = "form-control" type="text" name = "username" required>
                    <label class = "mt-2">Enter your gmail address :</label>
                    <input class = "form-control" type="text" name = "email" required>
                    <label class="mt-2 mb-1">Enter your birth year :</label>
                    <label class = "mt-2">Enter a password :</label>
                    <input class = "form-control" type="password" name = "password" required>
                    <div class="row mt-3 ps-3">
                        <input class="btn btn-bg col-md-4" type = "number" name = "age" placeholder = "Birth year" required>
                    </div>
                    <div class = "mt-1" ><a class = "btn btn-success btn-sm" href="index.php">Go To Home (⌐■_■)</a></div>
                    <div class = "d-grid gap-2 col-6 mx-auto">
                        <input class = "btn btn-primary btn-success mt-5" type="submit" 
                        name = "register" value = "Register">
                </form>

            </div>
        </div>
        <div class = "text-center mt-4">
            <label>Already have an account? Login in from here :</label>
            <a href="login.php">Login</a>
        </div>
    </div>
<?php include 'element/footer.php'; ?>