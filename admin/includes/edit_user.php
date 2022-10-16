<?php 


if(isset($_GET['edit_user'])) {
    $the_user_id = $_GET['edit_user'];

    
    
}

$query = "SELECT * FROM users WHERE user_id={$the_user_id}";

$fetch_user_data = mysqli_query($connection, $query);

confirm($fetch_user_data);

while($row = mysqli_fetch_assoc($fetch_user_data)) {
    $username = $row['username'];
    $password = $row['password'];
    $user_role = $row['user_role'];
    $user_first = $row['user_firstname'];
    $user_last = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
}


if(isset($_POST['edit_user'])) {
 $username = $_POST['username'];
 $user_password = $_POST['password'];
 $user_firstname = $_POST['first_name'];
 $user_lastname = $_POST['last_name'];
 $user_email = $_POST['email'];
 $user_image = $_FILES['image']['name'];
 $user_image_temp = $_FILES['image']['tmp_name'];

 $user_role = $_POST['user_role'];

 $user_date = date('d-m-y');
//  $post_comment_count = 4;

    move_uploaded_file($user_image_temp, "../images/$user_image" );



    $query = "INSERT INTO users (username, user_password, user_firstname, user_lastname, user_email, user_image, user_role, user_date) ";
               $query .= "VALUES ('$username', '$user_password', '$user_firstname', '$user_lastname', '$user_email', '$user_image', '$user_role', now());";  

    $create_user_query = mysqli_query($connection, $query);
    // echo print_r($create_post_query);

    confirm($create_user_query);

    header("Location: users.php");
}



?>



<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $username ?>">
    </div>
    <div class="form-group">
        <label for="password">
            Password
        </label>
        <input type="password" class="form-control" name="password" value="<?php echo $password ?>>
    </div>
    <div class="form-groupd">
        <label for="user_role">
            Role
        </label>
        <br>
        <select class="form-select me-3" name="user_role" id="user_role">
            <option value="admin">Admin</option>
            <option value="sub">Subscriber</option>
        </select>
    </div>

    <div class="form-group">
        <label for="first_name">
           First Name
        </label>
        <input type="text" class="form-control" name="first_name" value="<?php echo $user_first ?>">
    </div>
    <div class="form-group">
        <label for="last_name">
            Last Name
        </label>
        <input type="text" class="form-control" name="last_name" value="<?php echo $user_last ?>">
    </div>
    <div class="form-group">
        <label for="user_image">
            Post Image
        </label>
        <input type="file" name="image">
    </div>
    
    <div class="form-group">
        <label for="email">
            Email
        </label>
        <input type="email" name="email" class="form-control" value="<?php echo $user_email ?>">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_user" value="Edit User">
    </div>
</form>