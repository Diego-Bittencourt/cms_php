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
                $query = "SELECT * FROM posts WHERE post_status = 'published' ";
                $select_all_posts = mysqli_query($connection, $query);
                if (mysqli_num_rows($select_all_posts) == 0) {
                    //if the array with the data comes empty from the database, show the following.
                    //note that I tried to use the empty() function but it didn't work. this approach seems more reasonable
                    //in this approach, I'm checking if the result of the query has any row.
                    echo "<h1>No posts available</h1>";
                } else {


                //My aproach here was to echo a big chunk of data in one echo.
                //Another approach is to close the php tag and put the html tags and use the php tag only on the places to put the variable, like
                //<p><php? echo $content ></p>
                //to work with images, you put on the dbase the reference to the image. A link or the name of the image in the site's folders
                while ($row = mysqli_fetch_assoc($select_all_posts)) {
                    $post_id = $row['post_id'];
                    $title = $row['post_title'];
                    $author = $row['post_author'];
                    $date = $row['post_date'];
                    $image = $row['post_image'];
                    $content = substr($row['post_content'], 0, 100);
                    $comment_count = $row['post_comment_count'];

                    echo "<h2><a href='post.php?p_id={$post_id}'>{$title}</a></h2>
                          <p class='lead'> by {$author}</p>
                          <p><span class='glyphicon glyphicon-time'></span> Posted on {$date}</p>
                          <hr>
                          <a href='post.php?p_id={$post_id}'><img class='img-responsive' src='images/{$image}' alt=''></a>
                          <hr>
                          <p>{$content}</p>
                          <a class='btn btn-primary' href='#'> Read Mode <span class='glyphicon glyphicon-chevron-right'></span></a>";
                };
            } // end if>else statmente if the array has data
                ?>

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
