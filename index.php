<html>
<head>
<title>File Upload</title>
</head>
<body>

<form action="index.php" enctype="multipart/form-data" method="post">
<h2>Upload an image : </h2>
<input type="file" name="file"><br/><br/>
<input type="submit" value="Upload" name="Submit1"> <br/>


</form>
<?php
include 'connect.php';
require_once 'PhpXlsxGenerator.php';

if(isset($_POST['Submit1'])) {
$img_name = $_FILES['file']['name']; 
$ext = pathinfo($img_name, PATHINFO_EXTENSION);    
$allowed = ['png', 'gif', 'jpg', 'jpeg'];    

if(in_array($ext, $allowed))    
{     

$filepath = "images/" . $_FILES["file"]["name"];    
$filename = basename($_FILES["file"]["name"]);
$type = $_FILES["file"]["type"];    
$size = $_FILES["file"]["size"];    
 
    $sql = "INSERT INTO images (file,type,size) VALUES ('$filename','$type','$size')";
 
    mysqli_query($conn, $sql);
if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) 
{
	$get = "SELECT * FROM images";
$result = mysqli_query($conn, $get);
while($row = mysqli_fetch_array($result)) {
$id = $row['id'];

}
        if ($result = mysqli_query($conn, $get)) {
    if (mysqli_num_rows($result) > 0) {
        echo '<table border="1px" align="center">';
        echo "<tr><th colspan=5>Image Details</th></tr>";
        echo "<tr>";
        echo "<th>File Name</th>";
        echo "<th>File Type</th>";
        echo "<th>Size</th>";
        echo "<th>Image</th>";
        echo "<th>Action</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['file'] . "</td>";
            echo "<td>" . $row['type'] . "</td>";
            echo "<td>" . $row['size'] . "</td>";
            echo "<td> <img src=images/" . $row['file']." height='100' width='100'></td>";
             $query = "SELECT * FROM images";
                $results=mysqli_query($conn,$query);
            $row_users = mysqli_fetch_array($results);
                $dlink="delete.php?id=".$row_users['id'];?>
            <td><a onclick="return confirm ('Are you sure?')" href=<?php echo $dlink; ?> >Delete</a></td>
            <?php
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
$fileName = "data_". date('Y-m-d') . ".xlsx"; 
        $excelData[] = array('id', 'file', 'type', 'size'); 
$query = $conn->query("SELECT * FROM images"); 
if($query->num_rows > 0){ 
    while($row = $query->fetch_assoc()){ 
        $lineData = array($row['id'], $row['file'], $row['type'], $row['size']);  
        $excelData[] = $lineData; 
    } 
} 
 
//$xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $excelData ); 
//$xlsx->downloadAs($fileName); 
 
exit;

    } else {
        echo "No records found";
    }
} }} 
else 
{
echo "Error !!";
}
}
 
?>

</body>
</html>