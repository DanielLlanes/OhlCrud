<?php

include '../controller/ProductController.php';
include '../model/Product.php';

/**
 *
 */
class ProductAjax
{
	public $name;
	public $description;
	public $price;
	public $id;

	public function getProductsAjax()
	{
		$products = ProductController::getRecordsController();

		$productsTable = '{';
		$productsTable .= '"data": [';
		$productsTable = '{"data": [ ';
		if (count($products) > 0) {
			for ($i=0; $i < count($products); $i++) {
				$actions = "<button type='button' edit='".$products[$i]['id']."' class='btn btn-info m-1 btn-sm edit'>Editar</button><button type='button' delete='".$products[$i]['id']."' class='btn btn-danger m-1 btn-sm delete'>Eliminar</button>";
				$productsTable .= ' [
						"'.($i+1).'",
				      	"'.$products[$i]['name'].'",
				      	"'.$products[$i]['description'].'",
				      	"$ '.$products[$i]['price'].'",
				      	"'. $actions. '"
				    ],';
			}
		}

		$productsTable = substr($productsTable, 0, -1);
		$productsTable .=  ']}';
		echo($productsTable);
	}
	public function addProductAjax()
	{
		$addProducts = array(
			'name' => $this->name,
			'description' => $this->description,
			'price' => $this->price,
		);
		$products = ProductController::addRecordsController($addProducts);
		echo json_encode($products);
	}
	public function deleteProductAjax()
	{
		$products = ProductController::deleteRecordsController($this->id);
		echo $products;
	}
	public function editProductAjax()
	{
		$products = ProductController::editRecordsController($this->id);
		echo json_encode($products);
	}
	public function updeteProductAjax()
	{
		$editProducts = array(
			'name' => $this->name,
			'description' => $this->description,
			'price' => $this->price,
			'id' => $this->id,
		);
		$products = ProductController::updeteRecordsController($editProducts);

		return $products;
	}
}

if (isset($_REQUEST['getProducts'])) {
	$a = new ProductAjax();
	$a->getProductsAjax();
}
if (isset($_REQUEST['addProduct'])) {
	$b = new ProductAjax();
	$b->name = $_REQUEST['name'];
	$b->description = $_REQUEST['description'];
	$b->price = $_REQUEST['price'];
	$b->addProductAjax();
}
if (isset($_REQUEST['deleteProduct'])) {
	$b = new ProductAjax();
	$b->id = $_REQUEST['delete'];
	$b->deleteProductAjax();
}
if (isset($_REQUEST['editProduct'])) {
	$c = new ProductAjax();
	$c->id = $_REQUEST['id'];
	$c->editProductAjax();
}
if (isset($_REQUEST['updateProduct'])) {
	$d = new ProductAjax();
	$d->name = $_REQUEST['name'];
	$d->description = $_REQUEST['description'];
	$d->price = $_REQUEST['price'];
	$d->id = $_REQUEST['id'];
	$d->updeteProductAjax();
}