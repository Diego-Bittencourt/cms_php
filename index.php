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
                $query = "SELECT * FROM posts";
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
<!-- 
                First Blog Post
                <h2>
                    <a href="#">Blog Post Title</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">Start Bootstrap</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:00 PM</p>
                <hr>
                <img class="img-responsive" src="http://via.placeholder.com/900x300?text=place_holder" alt="">
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum officiis rerum.</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->

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
