<?php
include("conaction.php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST["submit"])) {
    if ($_POST["submit"] == "add") {
        add();
    } elseif ($_POST["submit"] == "edit") {
        edit();
    } else {
        delete();
    }
}
function add()
{
    global $conn;

    $name = $_POST["name"];
    $description = $_POST["description"];
    $filename = $_FILES["fille"]["name"];
    $tmpname = $_FILES["file"]["tmp_name"];

    $newfile = uniqid() . "-" . $filename;
    move_uploaded_file($tmpname, 'uplods/'.$filename);

    $query = "INSERT INTO categories VALUES('','$name','$description','$newfile') ";
    mysqli_query($conn, $query);
    echo
    "
<script> alert('Add sucessfully'); document.location.href ='index.php';</script>
";
}
function edit(){
    global $conn;
    $id = intval($_GET["id"]);
    $name = $_POST["name"];
    $description = $_POST["description"];
    if($_FILES["file"]["error"]!= 4){
        $filename =$_FILES["file"]["name"];
        $tmpname = $_FILES["file"]["tmp_name"];
        $newfile = uniqid() . "-" . $filename;
        move_uploaded_file($tmpname, 'uplods/'.$filename);
        $query = "UPDATE categories SET image ='$newfile'WHERE id =$id" ;
        mysqli_query($conn, $query);
    }
    $query = "UPDATE categories SET name ='$name' description='$description'WHERE id =$id" ;
        mysqli_query($conn, $query);
        echo
        "
    <script> alert('Edit sucessfully'); document.location.href ='index.php';</script>
    ";  

}
function delete(){
    global $conn;
    $id = $_POST["submit"];
    $query = "DELETE FROM categories WHERE id =$id";
    mysqli_query($conn, $query);

    echo
        "
    <script> alert('Delete sucessfully'); document.location.href ='index.php';</script>
    ";  
}
