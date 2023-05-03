<?php include 'element/header.php'; DocName("login"); ?>
<?php include 'core/User.php';?>
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <h3 class="text-center">
                    <?php echo "<h2 class = 'text-center mt-2'>Login</h2>"?>
                </h3>
                <?php 
                    if(isset($_POST['submit'])){
                        $user = new User;
                        $userLog = $user->userLog($_POST['username'],$_POST['password']);
                        if(count($userLog)==1){
                            $getId = $userLog[0]['id'];
                            $getName = $userLog[0]['username'];

                            session_start();
                            $_SESSION['user_id'] = $getId;
                            $_SESSION['username'] = $getName;

                            header("location:index.php");
                        }else{
                            echo "<p class='alert alert-warning'>
                            Entered Credentials Do Not Match</p>";
                        }
                    }
                ?>
                <form action="" method="POST">
                    <div class = "form-control mt-2">
                        <label>Username :</label>
                        <input class = "form-control" type="text" name = "username" required>
                    </div>
                    <div class = "form-control mt-2">    
                        <label >Enter your password :</label>
                        <input class = "form-control" type="password" name = "password" required>
                    </div>
                    <div class = "mt-4" ><a class = "btn btn-success btn-sm" href="index.php">Go To Home (⌐■_■)</a></div>
                    <div class = "d-grid gap-2 col-6 mx-auto">
                        <input class = "btn btn-primary btn-success mt-5" type="submit" 
                        name = "submit" value = "Login">
                    </div>
                </form>
            </div>
        </div>
        <div class = "text-center mt-3">
            <label>Don't have an account? Create one here :</label>
            <a href="signup.php">Register</a>
        </div>
    </div>
<?php include 'element/footer.php';?>