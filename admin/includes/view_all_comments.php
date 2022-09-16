
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Comment</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>In response to</th>
                                    <th>Date</th>
                                    <th>Approve</th>
                                    <th>Unapprove</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>

<?php 
//query to select all comments
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

//query to fetch the post title to display it, along the link to it, in the ADMIN table
$find_post_query = "SELECT * FROM posts WHERE post_id = '{$comment_post_id}' ";
$select_post_id = mysqli_query($connection, $find_post_query);

while($row = mysqli_fetch_assoc($select_post_id)) {
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
}

    

                               echo "<tr>
                                    <td>{$comment_id}</td>
                                    <td>{$comment_author}</td>
                                    <td>{$comment_content}</td>
                                    <td>{$comment_email}</td>
                                    <td>{$comment_status}</td>
                                    <td><a href='../post.php?p_id={$post_id}' target='_blank'>{$post_title}</a></td>
                                    <td>{$comment_date}</td>
                                    <td><a href=''>Approve</a></td>
                                    <td><a href=''>Unapprove</a></td>
                                    <td><a href='comments.php?delete={$comment_id}'>Delete</a></td>
                                    </tr>";
 } ?> <!-- catching the end of the while loop. -->
                            </tbody>
                        </table>
            
<?php 

if(isset($_GET['delete'])) {
    $delete_comment = $_GET['delete'];
    $query = "DELETE FROM comments WHERE comment_id = $delete_comment";
    $delete_comment_query = mysqli_query($connection, $query);

    confirm($delete_comment_query);
    
    header("Location: comments.php");

};
?>