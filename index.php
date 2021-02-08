<?php include "Components/header.php"?>
<div class="container-fluid" id="InsertPostHeader">
    <div class="row">
        <div class="col-12">
            <h1>Get All Posts</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
        <?php include "GetData/GetPosts.php"?>
    </div>
</div>
<?php include "Components/footer.php";?>
