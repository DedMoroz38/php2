<h2>Каталог</h2>

<?php foreach ($catalog as $item):?>
    <div style="cursor:pointer; border: 1px solid grey">
        <img src="" alt="">
        <img src="data:image/jpeg;base64, <?= base64_encode($item["image"]) ?>" alt="image">
        <h3><a href="/?c=product&a=product&id=<?=$item['id']?>"><?=$item['name']?></a></h3>
        <p>price: <?=$item['price']?></p>
        <button>Купить</button>
    </div>
    <br>
<?php endforeach;?>

<a href="/?c=product&a=catalog&page=<?=$page?>">Next-></a><br>