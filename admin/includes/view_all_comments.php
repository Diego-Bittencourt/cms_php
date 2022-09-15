
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Email</th>
                                    <th>Content</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

<?php 
$query = "SELECT * FROM comments";
$select_comments = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_comments)) {
    $comment_id = $row['comment_id'];
    $comment_post_id = $row['comment_post_id'];
    $comment_date = $row['comment_date'];
    $comment_author = $row['comment_author'];
    $comment_email = $row['comment_email'];
    $comment_content = $row['comment_content'];
    $comment_status = $row['comment_status'];



    

                               echo "<tr>
                                    <td>{$comment_id}</td>
                                    <td>{$comment_author}</td>
                                    <td>{$comment_email}</td>
                                    <td>{$comment_content}</td>
                                    <td>{$comment_date}</td>
                                    <td>{$comment_status}</td>
                                    </tr>";
 } ?> <!-- catching the end of the while loop. -->
                            </tbody>
                        </table>
            
<?php 

if(isset($_GET['delete'])) {
    $delete_post = $_GET['delete'];
    $query = "DELETE FROM posts WHERE post_id = $delete_post";
    $delete_post_query = mysqli_query($connection, $query);

    confirm($delete_post_query);
    
    header("Location: posts.php");

};
?>