<?php 
if(isset($_GET['post_id'])) {
    $edit_post_id = $_GET['post_id'];
};

$query = "SELECT * FROM posts ";
$query .= "WHERE post_id = $edit_post_id";
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






?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $post_title?>" type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
        <label for="post_category">
            Post Category Id
        </label>
        <input type="text" class="form-control" name="post_category_id" value="<?php echo $post_id ?>">
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