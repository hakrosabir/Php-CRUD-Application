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
<table border="1">
<form action="" method="POST">
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
    </tr>

    
    <input type="submit" value="Save">
</form>
</table>