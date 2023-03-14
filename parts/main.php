<style>
    #reklam{
        border: 1px solid black;
        background-color: azure;
    }

    #reklam-h{
        text-align: center;
        font-size: large;

    }

    #reklam-p{
        text-align: justify;
        font-size: medium;
        padding-left: 5px;
        padding-right: 5px;
    }

    #reklam-a{
        text-align: center;
    }

</style>

<div class="col-3">
    <ul class="list-group">
        <a href="./category-list.php"><li class="list-group-item list-group-item-primary" style="text-align: center;">Bölümler</li></a>
        <?php  $result = getCategories();  while($kategori = mysqli_fetch_assoc($result)): ?>
            <li class="list-group-item list-group-item-action" style="text-align: center;"><?php echo $kategori["nameCat"]?></li>
        <?php endwhile; ?>
        <br><br>
        <div id="reklam">
            <h6 id="reklam-h">Ferrari Elektrikli Araba 2025 Yılında Yollarda</h6>
            <p id="reklam-p">Ferrari‘nin ilk elektrikli otomobili 2025’te yollarda olacak. Sektördeki elektrifikasyon dalgasına kapılan İtalyan otomobil üreticisi, 
                bu anlamda hazırlıklara başladı bile. Halihazırda birçok farklı marka her gün yeni elektrikli modellerini piyasaya sürüyor. 
                Ferrari elektrikli araç pazarındaki yerini almak için hazırlık içerisinde. Haberin devamı için linke tıklayınız.
            </p>
            <a href="https://www.arabam.com/blog/genel/ferrarinin-ilk-elektrikli-otomobili-2025te-yollarda-olacak/" class="nav-link px-2 text-white" id="reklam-a"><button class="btn btn-priamry">Haberin Devamı</button></a>
        </div>
    </ul>   
    <br><br>

</div>
