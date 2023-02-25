<div class="col-3">
    <ul class="list-group">
        <a href="./category-list.php"><li class="list-group-item list-group-item-primary">Bölümler</li></a>
        <?php  $result = getCategories();  while($kategori = mysqli_fetch_assoc($result)): ?>
            <li class="list-group-item list-group-item-action"><?php echo $kategori["nameCat"]?></li>
        <?php endwhile; ?>
    </ul>   
</div>