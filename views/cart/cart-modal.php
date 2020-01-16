<?php if (empty($_SESSION['cart'])): ?>
    <h3>Корзина пуста</h3>
<?php else: ?>
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <td>Фото</td>
            <td>Наименование</td>
            <td>Кол-во</td>
            <td>Цена</td>
            <td>
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            </td>
        </tr>
        </thead>
        <tbody>
		<?php foreach ($_SESSION['cart'] as $id => $item): ?>
            <tr>
                <td><?php echo \yii\helpers\Html::img('@web/images/products/'.$item['img'], ['alt' => $item['name'], 'height' => 50]); ?></td>
                <td><?php echo $item['name'] ?></td>
                <td><?php echo $item['qty'] ?></td>
                <td><?php echo $item['price'] ?></td>
                <td>
                    <span data-id="<?php echo $id; ?>" class="glyphicon glyphicon-remove text-danger del-item"></span>
                </td>
            </tr>
		<?php endforeach; ?>
        <tr>
            <td></td>
            <td></td>
            <td><strong><?php echo $_SESSION['cart.qty']; ?></strong></td>
            <td><strong><?php echo $_SESSION['cart.sum']; ?></strong></td>
            <td></td>
        </tr>
        </tbody>
    </table>
<?php endif; ?>


