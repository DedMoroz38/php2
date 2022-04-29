<h2>Cart</h2>

<?php foreach ($cart as $item):?>
    <div style="cursor:pointer; border: 1px solid grey; width: fit-content">
        <img src="data:image/jpeg;base64, <?= base64_encode($item["image"]) ?>" alt="image">
        <h3><a href="/product/product/?id=<?=$item['id']?>"><?=$item['name']?></a></h3>
        <p>price: <?=$item['price']?></p>
        <button data-id="<?=$item['cart_id']?>" class="delete">Delete</button>
    </div>
    <br>
<?php endforeach;?>

<script>
    document.querySelectorAll(".delete").forEach(button => {
        button.addEventListener('click', ()=>{
            id = button.getAttribute("data-id");
            (
                async () => {
                    const res = await fetch("/cart/delete/?id=" + id);
                    const answer = await res.json();
                    document.getElementById("count").innerText = answer.count;
                    location.reload();
                }
            )();
        });

    });
</script>
