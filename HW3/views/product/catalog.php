<h2>Каталог</h2>

<?php foreach ($catalog as $item):?>
    <div style="cursor:pointer; border: 1px solid grey">
        <img src="" alt="">
        <img src="data:image/jpeg;base64, <?= base64_encode($item["image"]) ?>" alt="image">
        <h3><a href="/product/product/?id=<?=$item['id']?>"><?=$item['name']?></a></h3>
        <p>price: <?=$item['price']?></p>
        <button data-id="<?=$item['id']?>" class="add_to_cart">Купить</button>
    </div>
    <br>
<?php endforeach;?>

<a href="/product/catalog/?page=<?=$page?>">Next-></a><br>

<script>
    document.querySelectorAll(".add_to_cart").forEach(button => {
        button.addEventListener('click', ()=>{
            id = button.getAttribute("data-id");
            (
                async () => {
                    const res = await fetch("/cart/add/?id=" + id);
                    const answer = await res.json();
                    document.getElementById("count").innerText = answer.count;
                 }
            )();
        });

    });
</script>
