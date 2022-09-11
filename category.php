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

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <?php 

                if(isset($_GET['c_id'])) {
                    $cat_id = $_GET['c_id'];
                    $query = "SELECT * FROM posts WHERE post_category_id = {$cat_id}";
                    $select_category = mysqli_query($connection, $query);
                }





                //My aproach here was to echo a big chunk of data in one echo.
                //Another approach is to close the php tag and put the html tags and use the php tag only on the places to put the variable, like
                //<p><php? echo $content ></p>
                //to work with images, you put on the dbase the reference to the image. A link or the name of the image in the site's folders
                while ($row = mysqli_fetch_assoc($select_category)) {
                    $post_id = $row['post_id'];
                    $title = $row['post_title'];
                    $author = $row['post_author'];
                    $date = $row['post_date'];
                    $image = $row['post_image'];
                    $content = $row['post_content'];
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
