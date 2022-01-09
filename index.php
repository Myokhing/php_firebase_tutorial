
    <?php
    //session_start();
    include('authentication.php');
    include('include/header.php');
    
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5>Total Number of Record: </h5>
                        <?php
                        include('dbcon.php');
                        $ref_table = 'contacts';
                        $total_count = $reference = $database->getReference($ref_table)->getSnapshot()->numChildren();
                        echo $total_count;
                        ?>
                    </div> 
                </div>
            </div> 
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php 
                    if (isset($_SESSION['message'])) {
                        echo '<h4 class="alert alert-success">'.$_SESSION['message'].'</h4>';
                        unset($_SESSION['message']);
                    }
                ?>
                <div class="card">
                    <div class="card-header">
                        <h4>
                            PHP Firebase Crud - Reatime Database
                            <a href="add_contact.php" class="btn btn-primary float-end">Add Contacts</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>FirstName</th>
                                    <th>LastName</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    include('dbcon.php');
                                    $ref_table = 'contacts';
                                    //$fetchdata = $database->getReference($ref_table)->getValue();
                                    $fetchdata = $database->getReference($ref_table)->getValue();
                                    
                                    if ($fetchdata > 0) {
                                        $i = 1;
                                        foreach($fetchdata as $key => $row) {
                                            ?>
                                                <tr>
                                                    <td><?=$i++; ?></td>
                                                    <td><?=$row['fname']; ?></td>
                                                    <td><?=$row['lname']; ?></td>
                                                    <td><?=$row['email']; ?></td>
                                                    <td><?=$row['phone']; ?></td>
                                                    <td><a href="edit_contact.php?id=<?=$key; ?>" class="btn btn-success btn-sm">Edit</a></td>
                                                    <td>
                                                        <!-- <a href="delete_contact.php?id=<?=$key; ?>" class="btn btn-danger btn-sm">Delete</a> -->
                                                        <form action="code.php" method="POST">
                                                            <!--  -->
                                                            <button type="submit" class="btn btn-danger btn-sm" name="delete_btn" value="<?=$key; ?>">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php
                                        }
                                    }else{
                                        ?>
                                        <tr>
                                            <td colspan="7" class="text-center">No Data Found</td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    include('include/footer.php');
    ?>

    