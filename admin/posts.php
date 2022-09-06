
<?php
include "includes/admin_header.php";

?>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>
        <div id="page-wrapper">
        <h1 class="page-header">
                            Welcome to Admin,
                            <small>Author</small>
                        </h1>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th>Content</th>
                                </tr>
                            </thead>
                            <tbody>

<?php 
$query = "SELECT * FROM posts";
$select_posts = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_posts)) {
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_comments = $row['post_comment_count'];
    $post_date = $row['post_date'];
    $post_content = $row['post_content'];








                               echo "<tr>
                                    <td>{$post_id}</td>
                                    <td>{$post_author}</td>
                                    <td>{$post_title}</td>
                                    <td>{$post_category}</td>
                                    <td>{$post_status}</td>
                                    <td><img src='{$post_image}' height='20px' width='20px'></td>
                                    <td>{$post_tags}</td>
                                    <td>{$post_comments}</td>
                                    <td>{$post_date}</td>
                                    <td>{$post_content}</td>
                                </tr>";
 } ?> <!-- catching the end of the while loop. -->
                            </tbody>
                        </table>
            

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        
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
