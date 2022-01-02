
    <?php
    include('include/header.php');
    
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Add Contacts
                            <a href="index.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                            <div class="form-group mb-3">
                                <label for="name">FirstName</label>
                                <input type="text" class="form-control" id="name" name="first_name" placeholder="Enter Name">
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">LastName</label>
                                <input type="text" class="form-control" id="name" name="last_name" placeholder="Enter Name">
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone">
                            </div>
                            <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary" name="save_contact">Save Contact</button>

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

    