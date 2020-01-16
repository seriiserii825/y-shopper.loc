<?php


namespace app\controllers;

use Yii;
use app\models\Product;
use app\models\Category;

class ProductController extends AppController
{
	public function actionView(){
		$id = Yii::$app->request->get('id');

		$product = Product::findOne($id);

		if ($product === null) { // item does not exist
			throw new \yii\web\HttpException(404, 'Такого товара нету');
		}

		$hits = Product::find()->asArray()->where(['hit' => '1'])->limit(6)->all();

		$this->setMeta('E-SHOPPER | '.$product->name, $product->keywords, $product->description);

		return $this->render('view', compact('product', 'hits'));
	}
}