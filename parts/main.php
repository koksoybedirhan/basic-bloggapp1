<div class="col-9">
    <?php  $result = getBlogs();  while($araclar = mysqli_fetch_assoc($result)): ?>

        <div class="card mb-3">
            <div class="row">
                <div class="col-3">
                    <img class="img-fluid" src="img/<?php echo $araclar["image"]?>">                                            
                </div>
                <div class="col-9">
                    <div class="card-body">                        
                        <h5 class="card-title"><?php echo $araclar["name"]." / ".$araclar["price"]."(".$araclar["nameCat"].")";?></h5>
                        <p class="card-text"><?php echo $araclar["description"]?></p>
                    </div>
                
                </div>
            </div>
        </div>

    <?php endwhile; ?>
</div>