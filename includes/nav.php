<?php include "db.php" ?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Top</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                <!-- Inserting PHP -->
                <?php 
                $query = "SELECT * FROM categories";
                $select_all_categories = mysqli_query($connection, $query);
                
                while ($row = mysqli_fetch_assoc($select_all_categories)) {
                    $title = $row['cat_title'];
                    $cat_id = $row['cat_id'];

                    echo "<li><a href='category.php?c_id={$cat_id}'>{$title}</a></li>";
                    //to put variables inside string use the {} brackets inside double quotes.
                    //Im fetching data from the db and showing in the nav bar
                }
                
                
                
                ?>

                    <li>
                        <a href="admin">ADMIN</a>
                    </li>



                    <!-- <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li> -->



                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>