<?php 
if(isset($_GET['post_id'])) {
    $edit_post_id = $_GET['post_id'];
};

$query = "SELECT * FROM posts WHERE post_id = $edit_post_id ";
$select_posts_by_id = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_posts_by_id)) {
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
}


if(isset($_POST['edit_post'])) {
   
    $post_author = $_POST['post_author'];
    $post_status = $_POST['post_status'];
    $post_category = $_POST['post_category'];
    $post_title = $_POST['post_title'];
    // $post_date = $_POST['post_date'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_content = $_POST['post_content'];
    $post_tags = $_POST['post_tags'];
    // $post_comment_count = $_POST['post_comment_count'];
    $post_status = $_POST['post_status'];

    move_uploaded_file($post_image_temp, "../images/$post_image");


    if(empty($post_image)) {
        $query = "SELECT * FROM posts WHERE post_id = {$post_id} ";
        $select_image = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_image)) {
            $post_image = $row['post_image'];
        }
    }

    $query = "UPDATE posts SET ";
    $query .= "post_title = '{$post_title}', ";
    $query .= "post_category_id = '{$post_category}', ";
    $query .= "post_date = now(), ";
    $query .= "post_author = '{$post_author}', ";
    $query .= "post_status = '{$post_status}', ";
    $query .= "post_tags = '{$post_tags}', ";
    $query .= "post_content = '{$post_content}', ";
    $query .= "post_image = '{$post_image}' ";
    $query .= "WHERE post_id = '{$post_id}' ";

        $update_post = mysqli_query($connection, $query);

        confirm($update_post);

}



?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $post_title?>" type="text" class="form-control" name="post_title">
    </div>

    <div class="form-groupd">
        <label for="post_category">
            Post Category
        </label>
        <br>
        <select class="form-select me-3" name="post_category" id="post_cagetory">

<?php 

    $query = "SELECT * FROM categories" ;
    $edit_query = mysqli_query($connection, $query);

    confirm($edit_query);


    while($row = mysqli_fetch_assoc($edit_query)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<option value='{$cat_id}'>{$cat_title}</option>";


    }



?>
        </select>
    </div>




    
    <div class="form-group">
        <label for="post_author">
            Post Author
        </label>
        <input type="text" class="form-control" name="post_author" value="<?php echo $post_author ?>">
    </div>
    <div class="form-group">
        <label for="post_status">
            Post Status
        </label>
        <input type="text" class="form-control" name="post_status" value="<?php echo $post_status ?>">
    </div>
    <div class="form-group">
        <label for="post_image">
            Post Image
        </label>
        <img width="100" src="../images/<?php echo $post_image; ?>">
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label for="post_tags">
            Post Tags
        </label>
        <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags ?>">
    </div>
    <div class="form-group">
        <label for="post_content">
            Post Content
        </label>
        <textarea type="text" class="form-control" name="post_content" id="" cols="30" rols="10"><?php echo $post_content ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_post" value="Update Post">
    </div>
</form>