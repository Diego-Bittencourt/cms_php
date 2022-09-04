<?php

function insert_categories () {

    global $connection;

    if(isset($_POST['submit'])) {

        $cat_title = $_POST['cat_title']; //input value into a variable
    
        if ($cat_title == "" || empty($cat_title)) {
            echo "<p style='color: red;'>Insert a category name</p>";
            
        } else {
    
    
        $query = "INSERT INTO categories(cat_title) ";
        $query .= "VALUE('{$cat_title}')";
        //created the query
    
        $add_category_query = mysqli_query($connection, $query);
        //sending the query to the db
    
        if(!$add_category_query) {
            echo "QUERY FAILED" . mysqli_error($connection);
        }
        //checking for errors
        }//end the else statement when the var isn't empty
    }
} // End insert_categories funtion


function findAllCategories() {

    global $connection;

    //Find all categories query
    $query = "SELECT * FROM categories";
    $all_categories = mysqli_query($connection, $query);
    //fetching data from the mysql db and getting all categories

while($row = mysqli_fetch_assoc($all_categories)) {
    $title = $row['cat_title'];
    $id = $row['cat_id'];
    echo "<tr>
            <td>{$id}</td>
            <td>{$title}</td>
            <td><a href='categories.php?delete={$id}'>Delete</a></td>
            <td><a href='categories.php?edit={$id}'>Edit</a></td>
            </tr>";
    } // End while
} // End findAllCategories function



function deleteCategory() {

    global $connection;

    if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $query = "DELETE FROM categories ";
    $query .= "WHERE cat_id='{$delete_id}'";

    $deleted = mysqli_query($connection, $query);

    if ($deleted) {
    echo "Deleted!";
    header("Location: categories.php");
    //This header function with that argument just refreshes the page.
    } else {
    echo "Something went wrong.";
    };
    }


}




