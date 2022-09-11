
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th>Content</th>
                                </tr>
                            </thead>
                            <tbody>

<?php 
$query = "SELECT * FROM posts";
$select_posts = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_posts)) {
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



    $category_query = "SELECT * FROM categories WHERE cat_id='{$post_category}'" ;
    $result_category_query = mysqli_query($connection, $category_query);
    //Making a quey to the other table to fetch the category title and display it on the table. 
    while($row = mysqli_fetch_assoc($result_category_query)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
    }




                               echo "<tr>
                                    <td>{$post_id}</td>
                                    <td>{$post_author}</td>
                                    <td>{$post_title}</td>
                                    <td>{$cat_title}</td>
                                    <td>{$post_status}</td>
                                    <td><img src='../../images/{$post_image}' height='100px' width='auto'></td>
                                    <td>{$post_tags}</td>
                                    <td>{$post_comments}</td>
                                    <td>{$post_date}</td>
                                    <td>{$post_content}</td>
                                    <td><a href='posts.php?source=edit_post&post_id={$post_id}'>Edit</a></td>
                                    <td><a href='posts.php?delete={$post_id}'>Delete</a></td>
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