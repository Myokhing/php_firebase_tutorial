
    <?php
    include('include/header.php');
    
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Edit & Update Contacts
                            <a href="index.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php 
                            include('dbcon.php');
                            if (isset($_GET['id'])) {
                            $key_child = $_GET['id'];
                            $ref_table = 'contacts';
                            $getdata = $database->getReference($ref_table)->getChild($key_child)->getValue();
                            if ($getdata > 0) {
                                ?>

                                
                        <form action="code.php" method="POST">
                            <input type="hidden" name="key" value="<?=$key_child;?>">
                            <div class="form-group mb-3">
                                <label for="name">FirstName</label>
                                <input type="text" value="<?=$getdata['fname']; ?>" class="form-control" id="name" name="first_name">
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">LastName</label>
                                <input type="text" value="<?=$getdata['lname']; ?>" class="form-control" id="name" name="last_name">
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" value="<?=$getdata['email']; ?>" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone">Phone</label>
                                <input type="text" value="<?=$getdata['phone']; ?>" class="form-control" id="phone" name="phone">
                            </div>
                            <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary" name="update_contact">Update Contact</button>

                            </div>
                        </form>
                        <?php
                            }else{
                                $_SESSION['message'] = '<h4 class="alert alert-danger">Invalid ID</h4>';
                                header('location: index.php');
                                exit();
                            
                            }
                            }else{
                                $_SESSION['message'] = '<h4 class="alert alert-danger">No Found</h4>';
                                header('location: index.php');
                                exit();
                            
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    include('include/footer.php');
    ?>

    