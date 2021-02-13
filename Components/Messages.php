<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <?php if (isset($_GET['EmptyFields'])||isset($_GET['EmptySEO']) || isset($_GET['EmptyContent'])|| isset($_GET['EmptyAuthor']) ||isset($_GET['EmptyCategory'])): ?>
                <div class="alert alert-danger alert-dismissible fade show pb-0" role="alert">
                    <ul class="list-unstyled">
                        <?php foreach ($_GET as $Message): ?>
                            <li><p style="color: red">*<?php echo $Message ?></p></li>
                        <?php endforeach; ?>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <?php if (isset($_GET['Inserted'])): ?>
                <div class="alert alert-primary alert-dismissible fade show" role="alert" role="alert">
                    <ul>
                        <?php foreach ($_GET as $Message): ?>
                            <li class="align-middle"><?php echo $Message ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>




