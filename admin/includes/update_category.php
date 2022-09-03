
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="cat-title">Edit Category</label>

<?php 
//Editing categories
if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];

    $query = "SELECT * FROM categories WHERE cat_id='{$edit_id}'" ;
    $edit_query = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($edit_query)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
    }

    ?>

    <input type="text" value="<?php if(isset($edit_id)) {echo $cat_title;}; ?>" class="form-control" name="cat_title">

    <?php
} 
//catching the closing bracket

?>

<?php 




//UPDATE CATEGORY
if(isset($_POST['update'])) {
    $update_title = $_POST['cat_title'];
    //the value written in the edit input
    //I'm using the value previously sended vya url props as $cat_title to search in the query

    
    $query = "UPDATE categories SET cat_title = '{$update_title}' WHERE cat_title = '{$cat_title}'";
    $update_query = mysqli_query($connection, $query);

    if(!$update_query) {
        die("Query failed" . mysqli_error($connection));
    }

}



?>

                                        
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-primary" type="submit" name="update" value="Edit Category">
                                    </div>
                                </form> 
