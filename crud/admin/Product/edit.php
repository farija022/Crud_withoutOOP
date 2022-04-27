<?php
$webroot="http://localhost/crud/";
$_id =$_GET['id'];

//var_dump($_GET);
//connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce", $username = "root", $password = "");
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//insert a QUERY

$query="SELECT * FROM `products` WHERE id=:id";
$stmt= $conn->prepare($query);
$stmt->bindParam(':id',$_id);

$result = $stmt->execute();
$product = $stmt->fetch();

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Edit</title>
</head>
<body>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-5">
                <h1 class="text-center">Edit</h1>
                <form method="post" action="update.php" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="inputId" class="col-md-2 col-form-label"></label>
                        <div>
                            <input type="hidden"
                                   class="form-control"
                                   id="inputId"
                                   name="id"
                                   value="<?=$product['id'];?>"
                            >
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputTitle" class="col-md-2 col-form-label">Title:</label>
                        <div>
                            <input type="text"
                                   class="form-control"
                                   name="title"
                                   id="inputTitle"
                                   value="<?=$product['title'];?>"
                            >
                        </div>
                    </div>
                    <div class="mb-3 row form-check">
                        <div class="col-md-9">
                            <?php
                            if($product['is_draft'] == 0){
                                ?>
                                <input type="checkbox"
                                       class="form-check-input"
                                       name="is_draft"
                                       id="inputIsDraft"
                                       value="1"
                                >
                                <?php
                            }else{
                                ?>
                                <input type="checkbox"
                                       class="form-check-input"
                                       name="is_draft"
                                       id="inputIsDraft"
                                       value="1"
                                       checked>
                                <?php
                            }
                            ?>
                        </div>
                        <label for="inputIsDraft" class="col-md-2 form-check-label">Is_Draft:</label>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputDescription" class="col-md-2 col-form-label">Description:</label>
                        <div>
                            <input type="text"
                                   class="form-control"
                                   name="description"
                                   id="inputDescription"
                                   value="<?=$product['description'];?>"
                            >
                        </div>
                    </div>
                    <div class="mb-3 row form-check">
                        <div class="col-md-9">
                            <?php
                            if($product['is_active'] == 0){
                            ?>
                            <input type="checkbox"
                                   class="form-check-input"
                                   name="is_active"
                                   id="inputIsActive"
                                   value="1"
                            >
                            <?php
                            }else{
                            ?>
                            <input type="checkbox"
                                   class="form-check-input"
                                   name="is_active"
                                   id="inputIsActive"
                                   value="1"
                                   checked>
                            <?php
                            }
                            ?>
                        </div>
                        <label for="inputIsActive" class="col-md-2 form-check-label">Is_Active</label>
                    </div>
                    <div class="mb-3 row form-check">
                        <div class="col-md-9">
                            <?php
                            if($product['is_deleted'] == 0){
                                ?>
                                <input type="checkbox"
                                       class="form-check-input"
                                       name="is_deleted"
                                       id="inputIsDeleted"
                                       value="1"
                                >
                                <?php
                            }else{
                                ?>
                                <input type="checkbox"
                                       class="form-check-input"
                                       name="is_deleted"
                                       id="inputIsDeleted"
                                       value="1"
                                       checked>
                                <?php
                            }
                            ?>
                        </div>
                        <label for="inputIsDeleted" class="col-md-2 form-check-label">Is_Deleted:</label>
                    </div>
                        <div class="mb-3 row">
                            <label for="inputImage" class="col-md-2 col-form-label">Picture:</label>
                            <div>
                                <input type="file"
                                       class="form-control"
                                       name="picture"
                                       id="inputImage"
                                       value="<?=$product['picture'];?>"
                                >
                            </div>
                            <img src="<?=$webroot;?>uploads/<?=$product['picture'];?>">
                            <input type="hidden"
                                   name="old-picture"
                                   value="<?=$product['picture'];?>"
                                   >
                        </div>
                        <div class="col-auto">
                            <button
                                type="submit"
                                class="btn btn-primary mb-3">Submit
                            </button>
                        </div>
                </form>
                <dl class="row">

                    <dd class="col-md-9 fs-2">
                        Go to  <a href="index.php" >List</a>
                    </dd>
                </dl>
            </div>
        </div>
    </div>




</section>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>
</html>
