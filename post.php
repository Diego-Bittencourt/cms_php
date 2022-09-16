<?php 
include "includes/header.php";


?>

    <!-- Navigation -->
    <?php 
    include "includes/nav.php";
    ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">


<?php 
if(isset($_GET['p_id'])) {
    $post_id = $_GET['p_id'];
}



$query = "SELECT * FROM posts WHERE post_id = {$post_id}";
$select_all_posts = mysqli_query($connection, $query);


//My aproach here was to echo a big chunk of data in one echo.
//Another approach is to close the php tag and put the html tags and use the php tag only on the places to put the variable, like
//<p><php? echo $content ></p>
//to work with images, you put on the dbase the reference to the image. A link or the name of the image in the site's folders
while ($row = mysqli_fetch_assoc($select_all_posts)) {
$title = $row['post_title'];
$author = $row['post_author'];
$date = $row['post_date'];
$image = $row['post_image'];
$content = $row['post_content'];
$comment_count = $row['post_comment_count'];

echo "<h2><a href='#'>{$title}</a></h2>
        <p class='lead'> by {$author}</p>
        <p><span class='glyphicon glyphicon-time'></span> Posted on {$date}</p>
        <hr>
        <img class='img-responsive' src='images/{$image}' alt=''>
        <hr>
        <p>{$content}</p>
        <a class='btn btn-primary' href='#'> Read Mode <span class='glyphicon glyphicon-chevron-right'></span></a>";
};

?>

                <!-- Blog Comments -->


<?php 
if(isset($_POST['create_comment'])) {
    
    //getting the data via url args
    $the_post_id = $_GET['p_id'];

    //getting the data from the submit event
    $comment_author = $_POST['comment_author'];
    $comment_email = $_POST['comment_email'];
    $comment_content = $_POST['comment_content'];

    $insert_comment_query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_status, comment_date )";
    $insert_comment_query .= "VALUE ($the_post_id, '{$comment_author}', '{$comment_email}', 'unapproved', now())";

    $create_comment_query = mysqli_query($connection, $insert_comment_query);

    if($create_comment_query) {
        die('Query failed' . mysqli_error($connection));
    }

}

?>


                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    
                    <form role="form" action="" method="post">
                        <div class="form-group">
                            <label for="author">Name</label>
                            <input type="text" class="form-control" name="comment_author">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="comment_email">
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea class="form-control" rows="3" name="comment_content"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div>

                <hr>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>
            
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        
    <?php include "includes/footer.php"; ?>

</body>

</html>
