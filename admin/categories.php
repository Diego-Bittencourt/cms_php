
<?php include "includes/admin_header.php";?>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>
        <div id="page-wrapper">

            

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin,
                            <small>Author</small>
                        </h1>

                            <div class="col-xs-6">

<?php 
if(isset($_POST['submit'])) {

    $cat_title = $_POST['cat_title']; //input value into a variable

    if ($cat_title == "" || empty($cat_title)) {
        echo "<p style='color: red;'>Insert a category name</p>";
        
    } else {


    $query = "INSERT INTO categories(cat_title) ";
    $query .= "VALUE('{$cat_title}')";
    //created the query

    $add_category_query = mysqli_query($connection, $query);
    //sending the query to the db

    if(!$add_category_query) {
        echo "QUERY FAILED" . mysqli_error($connection);
    }
    //checking for errors
    }//end the else statement when the var isn't empty
}





?> 
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="cat-title">Add Category</label>
                                        <input type="text" class="form-control" name="cat_title">
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                    </div>
                                </form> 
                            </div><!-- Add category form -->

                            <div class="col-xs-6">

<?php 
$query = "SELECT * FROM categories";
$all_categories = mysqli_query($connection, $query);
//fetching data from the mysql db and getting all categories
?>

                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category Title</th>
                                        </tr>
                                     </thead>
                                     <tbody>



                                       
                                        <?php 
while($row = mysqli_fetch_assoc($all_categories)) {
    $title = $row['cat_title'];
    $id = $row['cat_id'];
    echo "<tr>
            <td>{$id}</td>
            <td>{$title}</td>
            </tr>";
}
?>
                                            
                                        
                                     </tbody>
                                </table>
                            </div>


                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
