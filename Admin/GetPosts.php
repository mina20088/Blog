<?php $Connection = new mysqli("localhost", 'root', '22058149', 'Blog');
if ($Connection->connect_error) {
    echo "Cant Access The Database" . $Connection->connect_errno . " " . $Connection->connect_error;
} ?>
<?php $Query = "select * from posts GROUP by id ORDER By postDate DESC LIMIT 20 " ?>
<?php if ($Statement = $Connection->query($Query)): ?>
    <?php while ($Result = $Statement->fetch_assoc()): ?>
        <div class="col">
            <div class="card h-100">
                <img src="../Images/Default.gif" class="card-img-top" alt="...">
                <div class="card-body h-100">
                    <h5 class="card-title"><?php echo $Result['title'] ?></h5>
                    <p class="card-text"><?php echo $Result['content'] ?></p>
                    <?php $Query = "select * from category inner join has_category on category = id where posts = " . $Result['id'] ?>
                    <?php if ($Statement2 = $Connection->query($Query)): ?>
                        <?php while ($Result2 = $Statement2->fetch_assoc()): ?>
                        <?php if($Result2['name'] == 'JavaScript'):?>
                               <a href="#"><span class="badge bg-info"><?php echo $Result2['name']?></span></a>
                        <?php endif;?>
                            <?php if($Result2['name'] == 'Bootstrap'):?>
                                <a href="#"><span class="badge bg-primary"><?php echo $Result2['name']?></span></a>
                            <?php endif;?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Added <?php echo $Result['postDate'] ?></small>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>



