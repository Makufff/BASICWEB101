<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <?php 
    // define
    $Srv_name = "localhost";
    $user = "root";
    $pwd = "";
    $name = "test";
    $connect = new mysqli($Srv_name , $user , $pwd , $name) ;
    if ($connect->connect_error) $status = "Connect Failed Database" ;
    else $status = "Connected Database";

    // render card
    $querystr = "SELECT * FROM web_db" ; ;
    if (isset($_GET['search'])) $keyword = $_GET['search'] ;
    if (isset($keyword) && $keyword != 'ALL') $querystr = $querystr . " WHERE categorys LIKE '$keyword'" ;
    $raw_data = mysqli_query($connect , $querystr) ;
    $fetchdata = mysqli_fetch_all($raw_data,MYSQLI_ASSOC);
    ?>
    <script>
        function imagePreview(fileInput) {
        if (fileInput.files && fileInput.files[0]) {
            var fileReader = new FileReader();
            fileReader.onload = function (event) {
                console.log(event.target.result);
                document.getElementById("preview").innerHTML = '<img src="'+event.target.result+'" style="width:250px ; hight:250px">'
            };
            fileReader.readAsDataURL(fileInput.files[0]);
          }
        }
    </script>
</head>
<body>
    <!-- Check Connect database ? -->
    <p id="chk_error"><?php echo $status ; ?></p>
    <div class="container py-3">
        <div class="row">
            <!-- Search Bar -->
            <div class="col-8 border-end">
                <label for="">ค้นหา</label>
                <form method="get" action="index.php" class="filter input-group">
                    <!-- Search Categories bar -->
                <input name="search" class="form-control" placeholder="Search" type="text">
                    <!-- Search button -->
                    <button type='submit' class="btn btn-primary">Serach</button>
            </form>
            <!-- template Card -->
            <div style="display : flex; flex-wrap :wrap" class="p-2 my-2">
                <?php foreach ($fetchdata as $idx) : ?>
                    <div class="card p-2 m-2" style="width:250px"> 
                        <img src=<?php echo $idx['imgs'] ;?>>
                        <p>ประเภท : <?php echo $idx['categorys'] ;?></p>
                        <p><?php echo $idx['discriptions'] ;?></p>
                    </div>
                    <?php endforeach ?>
                </div>
    </div>
            <div class="col-3">
                <!-- preview image -->
                <div id="preview">
                </div>
                <!-- Select Categories -->
                <form class="form-control" enctype="multipart/form-data" action="/upload.php" method="post">
                    <input onchange="imagePreview(this);" name="image" class="form-control mb-2" type="file">
                    <select name="categorys" class="form-select mb-2" id="">
                        <option value="ALL">ALL</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                    <!-- Discription area -->
                    <textarea name = "discriptions" class="form-control mb-2" placeholder="คำอธิบาย"></textarea>
                    <!-- Submit button -->
                    <button class="btn btn-primary mb-2" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>   
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>