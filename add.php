<?php
require("inc/db.php");

if ($_POST){
$id = trim($_POST['id']);
$productName = trim($_POST['productName']);
$productCompany = trim($_POST['productCompany']);
$productpricebd = (float) $_POST['productpricebd'];
$productprice = (float) $_POST['productprice'];
$productDescription = trim($_POST['productDescription']);
$productShippingcharge = (float) $_POST['productShippingcharge'];
$productAvailability = trim($_POST['productAvailability'};



try{


$sql = 'INSERT INTO products(id , productName, productCompany, productpricebd, productDescription, productShippingcharge, productAvailability )
        VALUES(:id , :productName, :productCompany, :productpricebd, :productDescription, :productShippingcharge, :productAvailability )';
		
		$stmt = $conn->prepare($sql);
		$stmt ->bindParam(":id",$id);
		$stmt ->bindParam(":productName",$productName);
		$stmt ->bindParam(":productCompany",$productCompany);
		$stmt ->bindParam(":productpricebd",$productpricebd);
		$stmt ->bindParam(":productDescription",$productDescription);
		$stmt ->bindParam(":productShippingcharge",$productShippingcharge);
		$stmt ->bindParam(":productAvailability",$productAvailability);
		$stmt ->execute();
		if($stmt->rowCount()){
			header("Location: create.php?status_create");
			exit();
}catch(Exception $e) {
echo "Error",$e ->getMessage();
exit();
} else {
    header("Location: create.php?status=fail_create");
	exit();
	}
?>