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
        <a class='btn btn-primary' href='#'> Read Mode <span class='glyphicon glyphicon-chevron-right'></span></a>
        <br>";
};

?>

<br>
<?php 

//fetching the comments count
$the_post_id = $_GET['p_id'];
$comment_count_query = "SELECT COUNT(comment_id) as comment_count FROM comments WHERE comment_post_id = '{$the_post_id}' ";
$comment_count_query .= "AND comment_status = 'approved' ";
$get_count = mysqli_query($connection, $comment_count_query);
if(!$get_count) {
    die('Count error' . mysqli_error($connection));
}

while ($row = mysqli_fetch_assoc($get_count)) {
    $count_number = $row['comment_count'];

    echo "<h3>Number of comments: {$count_number}</h3>";
}

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

    $insert_comment_query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date )";
    $insert_comment_query .= "VALUE ('{$the_post_id}', '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved', now())";

    $create_comment_query = mysqli_query($connection, $insert_comment_query);

    // if($create_comment_query) {
    //     die('Query failed' . mysqli_error($connection));
    // }

}

?>


                <!-- Comments Form -->
                <br>
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

<?php 



//fetching approved and post related comments
// $the_post_id = $_GET['p_id'];
$comments_query = "SELECT * FROM comments WHERE comment_post_id = '{$the_post_id}' ";
$comments_query .= "AND comment_status = 'approved' ";
$comments_query .= "ORDER BY comment_id DESC ";
$get_comments_query = mysqli_query($connection, $comments_query);
if(!$get_comments_query) {
    die('Query Failed' . mysqli_error($connection));
}

while ($row = mysqli_fetch_assoc($get_comments_query)) {
    $comment_date = $row['comment_date'];
    $comment_content = $row['comment_content'];
    $comment_author = $row['comment_author'];




    echo "<div class='media'>
            <a class='pull-left' href='#'>
            <img class='media-object' src'https://via.placeholder.com/65.jpg?text=just+an+ordinary+image' alt=''>
            </a>
            <div class='media-body'>
            <h4 class='media-heading'>{$comment_author}
            <small>{$comment_date}</small>
            </h4>
            {$comment_content}
            </div>
            </div>
            ";



}



?>



                <!-- Comment
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

               Comment 
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
                </div> -->

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
