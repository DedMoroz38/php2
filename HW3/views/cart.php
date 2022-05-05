<?php
if ($isAdmin): ?>
    <h2>Order</h2>
    <?php foreach ($orders as $item):?>
        <div style="cursor:pointer; border: 1px solid grey; width: fit-content">
            <p>Email: <?=$item["login"]?></p>
            <p>Address: <?=$item["address"]?></p>
            <p>City: <?=$item["city"]?></p>
            <p>Zip: <?=$item["zip"]?></p>
        </div>
        <br>
    <?php endforeach;?>
<?php else: ?>
<div style="display: flex; max-width: 800px; justify-content:space-between;">
    <div>
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
    </div>
    <form action="/order/add" method="post">
        <h2>Order</h2>
        <input name="address" placeholder="address" type="text" />
        <br />
        <br />
        <input name="city" placeholder="city" type="text" />
        <br />
        <br />
        <input name="zip" placeholder="zip" type="text" />
        <br />
        <br />
        <input value="Place an order" type="submit" class="placeAnOrder"/>
    </form>
</div>
<?php endif; ?>



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
