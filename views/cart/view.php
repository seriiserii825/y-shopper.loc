<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<div class="container">
    <?php if(Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success">
        <?php echo Yii::$app->session->getFlash('success'); ?>
    </div>
    <?php else: ?>
        <div class="alert alert-danger">
		    <?php echo Yii::$app->session->getFlash('error'); ?>
        </div>
    <?php endif; ?>


    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <td>Фото</td>
            <td>Наименование</td>
            <td>Кол-во</td>
            <td>Цена</td>
            <td>Сумма</td>
            <td>
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            </td>
        </tr>
        </thead>
        <tbody>
		<?php foreach ($_SESSION['cart'] as $id => $item): ?>
            <tr>
                <td><?php echo \yii\helpers\Html::img('@web/images/products/' . $item['img'], ['alt' => $item['name'], 'height' => 50]); ?></td>
                <td><a href="<?php echo Url::to(['product/view', 'id' => $id]); ?>"><?php echo $item['name'] ?></a></td>
                <td><?php echo $item['qty'] ?></td>
                <td><?php echo $item['price'] ?></td>
                <td><?php echo $item['price'] * $item['qty']; ?></td>
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
</div>
<hr>
<div class="container">
	<?php $form = ActiveForm::begin(); ?>
	<?php echo $form->field($order, 'name'); ?>
	<?php echo $form->field($order, 'email'); ?>
	<?php echo $form->field($order, 'phone'); ?>
	<?php echo $form->field($order, 'address'); ?>
	<?php echo Html::submitButton('Заказать', ['class' => 'btn btn-success']); ?>
	<?php ActiveForm::end(); ?>
</div>
