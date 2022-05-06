<?php
if ($isAuth):?>
Добро пожаловать <?= $userName ?> <a href="/auth/logout">[Log out]</a>
<?php else: ?>
<form action="/auth/login" method="post">
    <input placeholder="login" type="text" name="login">
    <input placeholder="password" type="text" name="password">
    <input type="submit">
</form>

<?php endif; ?><br>

<a href="/">Main</a>
<a href="/product/catalog">Catalog</a>
<?php
if ($isAdmin):?>
    <a href="/cart/">Orders</a><br>
<?php else: ?>
    <a href="/cart/">Cart(<span id="count"><?=$count?></span>)</a><br>
<?php endif; ?><br>