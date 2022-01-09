
    <?php
    session_start();
    if (isset($_SESSION['verified_user_id'])) {
        $_SESSION['message'] = 'You are already Logged in.';
        header('location: home.php');
        exit();
    }
    include('include/header.php');
    
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <?php 
            if (isset($_SESSION['message'])) {
                echo '<h4 class="alert alert-success">'.$_SESSION['message'].'</h4>';
                unset($_SESSION['message']);
            }
            ?>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Register
                            <a href="index.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                            <div class="form-group mb-3">
                                <label for="name">FullName</label>
                                <input type="text" class="form-control" id="name" name="full_name" placeholder="Enter FullName">
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Phone Number</label>
                                <input type="text" class="form-control" id="name" name="phone" placeholder="Enter Phone Number">
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address">
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone">Password</label>
                                <input type="text" class="form-control" id="phone" name="password" placeholder="Enter Password">
                            </div>
                            <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary" name="register_btn">Register</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    include('include/footer.php');
    ?>

    