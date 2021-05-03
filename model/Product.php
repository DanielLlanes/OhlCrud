<?php

include_once('Connection.php');

/**
 *
 */

class Product
{
	public static function getProductsModel()
	{
		$pdo = Connection::connect();
		$getProducts = $pdo->prepare("SELECT * FROM products");
		$getProducts -> execute();
		return $getProducts->fetchAll();
	}
	public static function addProductsModel($addProducts)
	{
		//return $addProducts['name'];
		$pdo = Connection::connect();
		$addProduct = $pdo->prepare("INSERT INTO  products (name, description, price) VALUES (:name, :description, :price) ");
		$addProduct -> bindParam(':name', $addProducts['name'], PDO::PARAM_STR);
		$addProduct -> bindParam(':description', $addProducts['description'], PDO::PARAM_STR);
		$addProduct -> bindParam(':price', $addProducts['price'], PDO::PARAM_STR);
		if ($addProduct -> execute()) {
		    $lastInsertId = $pdo->lastInsertId();
		    $respuesta = array(
		        'lastInsertDriverId'=>$lastInsertId,
		        'hecho'=> 1
		    );
		    return  $respuesta;
		}else{
		    $respuesta = array(
		        'lastInsertDriverId'=> '0',
		        'hecho'=> 0
		    );
		}
		$addProduct -> close();
	}
	public static function deleteProductsModel($id)
	{
		$pdo = Connection::connect();
		$deleteProduct = $pdo->prepare("DELETE FROM products WHERE id = :id");
		$deleteProduct -> bindParam(":id", $id, PDO::PARAM_INT);
		if($deleteProduct -> execute()){
		    return "ok";
		}else{
		    return "error";
		}
		$deleteProduct -> close();
		$deleteProduct = null;
	}
	public static function editProductsModel($id)
	{
		$pdo = Connection::connect();
		$editProducts = $pdo->prepare("SELECT * FROM products WHERE id = :id");
		$editProducts -> bindParam(':id', $id, PDO::PARAM_INT);
		$editProducts -> execute();
		return $editProducts->fetch();
	}
	public static function updateProductsModel($editProducts)
	{
		//echo '<pre>'; print_r($editProducts); echo '</pre>';
		$pdo = Connection::connect();
		$editProduct = $pdo->prepare("UPDATE products SET name = :name, description = :description, price = :price WHERE id = :id");
		$editProduct -> bindParam(':name', $editProducts['name'], PDO::PARAM_STR);
		$editProduct -> bindParam(':description', $editProducts['description'], PDO::PARAM_STR);
		$editProduct -> bindParam(':price', $editProducts['price'], PDO::PARAM_STR);
		$editProduct -> bindParam(':id', $editProducts['id'], PDO::PARAM_INT);
		if($editProduct -> execute()){
		    return 1;
		}else{
		    return "error";
		}
		$editProduct -> close();
	}
}