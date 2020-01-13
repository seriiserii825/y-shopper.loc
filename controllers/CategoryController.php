<?php


namespace app\controllers;

use app\models\Category;
use app\models\Product;

class CategoryController extends AppController
{
	public function actionIndex(){
		$hits = Product::find()->asArray()->where(['hit' => '1'])->limit(6)->all();

		return $this->render('index', compact('hits'));
	}
}