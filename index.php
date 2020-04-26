<?php
    include('header.php');
    include('process.php');
    ?>
        <!-- For showing alerts -->
    <?php
    if (isset($_SESSION['message'])) {
        ?>
        <div class="alert alert-<?= $_SESSION['msg_type']; ?> alert-dismissible fade show text-center" role="alert">
            <strong>
                <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
            </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
    }
    ?>

    <?php
    require_once 'config.php';
    $query = "SELECT * FROM hello";
    $result = mysqli_query($con, $query);
    $row = mysqli_num_rows($result);
    ?>
    <div class="row justify-content-center mx-5">
        <table class="table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Location</th>
                    <th>ACtion</th>
                </tr>
            </thead>
            <?php
            while ($count = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $count['username'] ?></td>
                    <td><?php echo $count['location'] ?></td>
                    <td>
                        <a href="index.php?edit=<?php echo $count['id']; ?>" class="btn btn-primary">Edit</a>
                        <a href="index.php?delete=<?php echo $count['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php
            }
            ?>


</table>

    </div>
    <div class="container">
        <div class="row justify-content-center">
            <form action="process.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-grou">
                    <label for="username">Username</label>
                    <input type="text" value="<?php echo $username; ?>" name="username" placeholder="Enter your Username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" value="<?php echo $location; ?>" name="location" placeholder="Enter location" class="form-control">
                </div>

                <div class="form-group">
                    <?php
                    if ($update == true) {
                    ?>

                        <button type="submit" name="update" class="btn btn-warning">Update</button>
                    <?php
                    }
                    else{
                        ?>
                    <button type="submit" name="save" class="btn btn-success">Save</button>
                        <?php
                }
                ?>
                </div>
            </form>
        </div>

    </div>

    
    <?php include('footer.php') ?>