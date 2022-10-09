
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


<?php 
//Getting the url param to include page conditionally
if(isset($_GET['source'])) {
    $source = $_GET['source'];
} else {
    $source = "";
}

switch($source) {

    case "add_post";
    include "includes/add_user.php";
    break;

    case "edit_post";
    include "includes/edit_user.php";
    break;

    default:
    include "includes/view_all_users.php";
}

?>


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
