<?php

$db =  mysqli_connect("localhost","root","hakro123","my_books");

if($db)
{

}else{
    echo"Error in MYSQl Connection.";
}

// data insertion into database code
if(isset($_POST['book_name'])){
   
    $book_name =   $_POST['book_name'];
    $book_author =   $_POST['book_author'];
    $book_price =   $_POST['book_price'];

    $db->query("INSERT INTO books(book_name,book_author,book_price) VALUES('". $book_name . "' , '". $book_author ."' , ". $book_price ." )");

}else if(isset($_POST['book_id']))
{
    $book_id= $_POST['book_id'];
    $db->query("DELETE FROM books WHERE book_id = $book_id");
}else if(isset($_POST['update_book_name']))
{
    $update_book_id = $_POST['update_book_id'];
    $update_book_name = $_POST['update_book_name'];
    $update_book_author =   $_POST['update_book_author'];
    $update_book_price =   $_POST['update_book_price'];
    
    $db->query("UPDATE books SET book_name= '$update_book_name',book_author='$update_book_author',book_price=$update_book_price where book_id = '$update_book_id' ");
}







$result = $db-> query("SELECT * FROM books");
//print_r($result);
// Fetching one by one record from the table city in world database
//$a = mysqli_fetch_assoc($result);
//print_r($a);

//echo"<br>"; echo"<br>";
//$a = mysqli_fetch_assoc($result);
//print_r($a);
//to print all the data
//print_r(mysqli_fetch_all($result));
// using while print all the data
/*
while($a = mysqli_fetch_assoc($result))
{
    echo "Book ID:".$a['book_id'];
    echo"<br>";
    echo "Book Name:".$a['book_name'];
    echo"<br>";
    echo "Book Author:".$a['book_author'];
    echo"<br>";
    echo "Book Price RS:".$a['book_price'];
    echo"<br>";
    echo"<br>";
}
*/

?>
<br><br>
<center>
<h1 style="color:white; background-color:gray; padding:10px;"> Database Assignment- CRUD APPLICATION using PHP and MYSQL </h1>
</center>
<table border="1" width=100%>
    <tr>
        <th>
            Book ID
        </th>
        <th>
            Book Name
        </th>
        <th>
            Book Author
        </th>
        <th>Book Price</th>
    </tr>
    <?php
    
    while($a = mysqli_fetch_assoc($result))
    {
        ?>
        <tr>
            <td>
                <?php echo $a['book_id']; ?>
            </td>
            
            <td>
                <?php echo $a['book_name']; ?>
            </td>
            
            <td>
                <?php echo $a['book_author']; ?>
            </td>
            
            <td>
                <?php echo $a['book_price']; ?>
            </td>
        </tr>


        <?php
        
    }
    ?>
</table>

<br><br>




<table border="0">
<!-- Form for Insertion record  -->
<form action="" method="POST">
<h3 style="color:blue">Insert the Data </h3>
    <tr>
        <td>
            <label for="book_name">Enter Book Name:</label>
        </td>
        <td>
            <input type="text" name="book_name">
        </td>  
        <td>
            <label for="book_name">Enter Book Author:</label>
        </td>
        <td>
            <input type="text" name="book_author">
        </td>
        <td>
            <label for="book_name">Enter Book Price:</label>
        </td>
        <td>
            <input type="number" name="book_price">
        </td>   
        <td>
            <input style="color:white;background-color:blue; border:0;padding: 5px;" type="submit" value="Insert Record">
        </td>
    </tr>
</form>
</table>



<br>
<!-- Form for Deletion  -->
<table border="0">
<form action=" " method="POST">
<h3 style="color:red;">Delete the Data</h3>
    <tr>
        <td>
        <label for="book_id">Delete the Record with Book ID:</label>
        </td>
        <td>
        <input type="number" name="book_id">        
        </td>
        <td>
        <input style="color:white;background-color:red; border:0;padding: 5px;" type="submit" value= "Delete Record">
        </td>
    </tr>
</form>
</table>


<br>

<!-- Form for updation  --> 
<table border="0">
<form action=" " method="POST">
    <h3 style="color: green;">Update the Data</h3>
<tr>
        <td>
            <label for="book_name">Update Book Name:</label>
        </td>
        <td>
            <input type="text" name="update_book_name">
        </td>  
        <td>
            <label for="book_name">Update Book Author:</label>
        </td>
        <td>
            <input type="text" name="update_book_author">
        </td>
        <td>
            <label for="book_name">Update Book Price:</label>
        </td>
        <td>
            <input type="number" name="update_book_price">
        </td>
        <td>
        <label for="book_id">Book ID to Update:</label>
        </td>
        <td>
            <input type="number" name="update_book_id">
        </td>   
        <td>
        <input style="color:white;background-color:green;border:0;padding: 5px;" type="submit" value="Update ">
        </td>
    </tr>


</form>
</table>