<h2>Товар</h2>

<div>
    <img src="data:image/jpeg;base64, <?= base64_encode($product->image) ?>" alt="image">
    <h3><?=$product->name?></h3>
    <p><?=$product->description?></p>
    <p>price: <?=$product->price?></p>
    <a href="/product/add">Add to basket</a>
</div>