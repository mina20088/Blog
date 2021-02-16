<?php include "Config/Config.php"; ?>
<?php include "Class/Category.php"; ?>
<?php include 'Class/DatabaseClass/Database.php'; ?>
<?php include 'Logic/Error.php'?>
<?php include "Components/header.php" ?>

<div class="container-fluid" id="InsertPostHeader">
    <div class="row">
        <div class="col-12">
            <h1>Insert Post</h1>
        </div>
    </div>
</div>
<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <strong><?php Errors('Error',',')?></strong>
        </div>
    </div>
</div>
<div class="container mt-5">
    <?php $Error = errorArray('Error',',')?>
    <form class="" action="Logic/insert.php" method="post">
        <input type="hidden" name="Author" value="">
        <div class="row mb-3">
            <label for="Title" class="col-sm-2 col-form-label" style="font-weight: bold">Title</label>
            <div class="col-sm-10">
                <?php if(isset($_GET['Title']) &&isset($_GET['Error'])):?>
                <input type="text" class="form-control is-invalid" id="Title" name="Title" value="<?php echo $_GET['Title']?>" placeholder="Title" >
                    <div class="invalid-feedback">
                        <span><?php echo $Error[0]?></span>
                    </div>
                <?php else:?>
                    <input type="text" class="form-control" id="Title" name="Title" value="" placeholder="Title" >
                <?php endif;?>
            </div>
        </div>
        <div class="row mb-3">
            <label for="SEO-Title" class="col-sm-2 col-form-label" style="font-weight: bold">SEO-Title</label>
            <div class="col-sm-10">
                <?php if (isset($_GET['SEO_title']) && isset($_GET['Error'])):?>
                <input type="text" class="form-control is-invalid" id="SEO-Title" name="SEO-Title" value="<?php echo $_GET['SEO_title']?>" placeholder="SEO-Title">
                    <div class="invalid-feedback">
                        <span><?php echo $Error[1]?></span>
                    </div>
                <?php else:?>
                    <input type="text" class="form-control" id="SEO-Title" name="SEO-Title" value="" placeholder="SEO-Title">
                <?php endif;?>
            </div>
        </div>
        <div class="row mb-3">
            <label for="Category" class="col-sm-2 col-form-label" style="font-weight: bold">Category</label>
            <div class="col-sm-10">
                <?php if(isset($_GET['Category']) && isset($_GET['Error'])):?>
                <select id="Category" class="form-select is-invalid" name='Category[]' multiple size="5">
                    <option value="-1" selected>Please Choose a Category</option>
                    <?php $conncetion = new Database(host, username, password, Database) ?>
                    <?php $Category = new Category($conncetion); ?>
                    <?php $Category->SetCategoryDropdown() ?>
                </select>
                    <div class="invalid-feedback">
                       <span><?php echo $Error[2]?></span>
                    </div>
                <?php else:?>
                    <select id="Category" class="form-select" name='Category[]' multiple size="5">
                        <option value="-1" selected>Please Choose a Category</option>
                        <?php $conncetion = new Database(host, username, password, Database) ?>
                        <?php $Category = new Category($conncetion); ?>
                        <?php $Category->SetCategoryDropdown() ?>
                    </select>
                <?php endif; ?>
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
<?php include "Components/footer.php"; ?>



