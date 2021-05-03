<?php session_start();

/**
 *
 */
class ProductController
{

	public static function getRecordsController()
	{
		$result = Product::getProductsModel();
		return $result;
	}

	public static function addRecordsController($addProducts)
	{
		$result = Product::addProductsModel($addProducts);
		return $result;
	}

	public static function deleteRecordsController($id)
	{
		$result = Product::deleteProductsModel($id);
		return $result;
	}
	public static function editRecordsController($id)
	{
		$result = Product::editProductsModel($id);
		return $result;
	}
	public static function updeteRecordsController($editProducts)
	{

		$result = Product::updateProductsModel($editProducts);
		echo $result;
	}

}
