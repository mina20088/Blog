
<?php include "../Components/header.php"?>
<div class="container-fluid" id="InsertPostHeader">
    <div class="row">
        <div class="col-12">
            <h1>Insert Post</h1>
        </div>
    </div>
</div>
<div class="container mt-5">
    <form action="PHP/insert.php" method="post">
        <input type="hidden"  name="Author" value="1">
        <div class="row mb-3">
            <label for="Title" class="col-sm-2 col-form-label" style="font-weight: bold">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Title" name="Title" value="" placeholder="Title">
            </div>
        </div>
        <div class="row mb-3">
            <label for="SEO-Title" class="col-sm-2 col-form-label" style="font-weight: bold">SEO-Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="SEO-Title" name="SEO-Title" value="" placeholder="SEO-Title">
            </div>
        </div>
        <div class="row mb-3">
            <label for="Category" class="col-sm-2 col-form-label" style="font-weight: bold">Category</label>
            <div class="col-sm-10">
                <select id="Category" class="form-select" name = 'Category[]' multiple size="2">
                    <option value="-1" selected>Please Choose a Category</option>
                    <option value="1">Bootstrap</option>
                    <option value="2">JavaScript</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="Content" class="col-sm-2 col-form-label" style="font-weight: bold">Content</label>
            <div class="col-sm-10">
                <textarea id="Content" name="Content" class="form-control" rows="10" COLS="0">
                </textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label for="" class="col-sm-2 col-form-label" style="font-weight: bold"></label>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary" name="insert">Insert</button>
                <button type="submit" class="btn btn-danger" name="cancel">Cancel</button>
            </div>
        </div>
    </form>
</div>
<?php include "../Components/footer.php";?>



