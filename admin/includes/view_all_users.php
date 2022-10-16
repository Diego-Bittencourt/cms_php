
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>Role</th>
                                    <th>randSalt</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>

<?php 
//query to select all users
$query = "SELECT * FROM users";
$select_users = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_users)) {
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_firstname= $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_password = $row['user_password'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];
    $user_randSalt = $row['randSalt'];



                               echo "<tr>
                                    <td>{$user_id}</td>
                                    <td>{$username}</td>
                                    <td>{$user_password}</td>
                                    <td>{$user_firstname}</td>
                                    <td>{$user_lastname}</td>
                                    <td>{$user_email}</td>
                                    <td><img src='{$user_image}'></td>
                                    <td>{$user_role}</td>
                                    <td>{$user_randSalt}</td>
                                    <td><a href='users.php?source=edit_user&edit={$user_id}'>Edit</a></td>
                                    <td><a href='users.php?delete={$user_id}'>Delete</a></td>
                                    </tr>";
 } ?> <!-- catching the end of the while loop. -->
                            </tbody>
                        </table>
            
<?php 
//Deleting comment
if(isset($_GET['delete'])) {
    $delete_user = $_GET['delete'];
    $query = "DELETE FROM users WHERE user_id = $delete_user";
    $delete_user_query = mysqli_query($connection, $query);

    confirm($delete_user_query);
    
    header("Location: users.php");

};


?>