<?php include_once './layout/header.php' ?>
<?php include_once 'handelcrud.php' ?>
<?php
$id = intval($_GET["id"]);
$prodect = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM categories WHERE id =$id"));

?>
<html>
    <header></header>
    <body>
    <div class="col-8 mx-auto">
        <form class="border rounded p-3 m-3 shadow-lg p-3 mb-5 bg-white" method="POST" enctype="multipart/form-data"
            action="handelcrud.php">
            <h1 class="text-center">Edit catagory</h1>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value=<?php echo $prodect['name'] ?> aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" value=<?php echo $prodect['description'] ?> name="description" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="file" class="form-label">Image</label>
                <input class="form-control" type="file" name="file" >
            </div>
            <button type="submit" name="submit" value="edit" class="btn btn-primary">edit</button>
        </form>
    </div>
    </body>
</html>
<?php include_once './layout/footer.php' ?>