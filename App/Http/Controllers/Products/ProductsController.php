<?php

namespace App\App\Http\Controllers\Products;

use App\App\models\Products as ModelsProducts;
use App\config\App;
use App\config\Controller as ConfigController;

class ProductsController extends ConfigController
{

  public function index()
  {
    $product = new ModelsProducts();
    return $this->render('pages/products/products', 'products', [
      'products' => $product
    ]);
  }
  public function create()
  {
    $ModelsProducts = new ModelsProducts();

    if (App::$app->request->is_post()) {
      $id = App::$app->session->getItem('id');
      $data = App::$app->request->reqData();
      $imageName = App::$app->request->filePath('file', 'image');

      if ($imageName) {
        $data['image'] = $imageName;
      }
      $data['user_id'] = $id;
      $ModelsProducts->loadData($data);
      if ($ModelsProducts->validate() && $ModelsProducts->save()) {
        App::$app->session->setFlash('up', 'Product is posted');
        App::$app->response->redirect('/products');
        return true;
      }
    }
    return $this->render('pages/products/create', 'createProducts', [
      'product' => new $ModelsProducts()
    ]);
  }
  public function update()
  {
    $Products = new ModelsProducts();

    if (App::$app->request->is_post()) {
      $id = App::$app->session->getItem('id');
      $data = App::$app->request->reqData();
      $imageName = App::$app->request->filePath('file', 'image');

      if ($imageName) {
        $data['image'] = $imageName;
      }
      $Products->update(['user_id' => $id,'id' => $data['product_id']], $data);
      App::$app->response->redirect('/products');
    }
    return $this->render('pages/products/index', 'products', [
      'products' => $Products->getAll()
    ]);
  }
}