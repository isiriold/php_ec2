<?php

//var_dump($LOCALPOST);


$LOGO = getKey("newlogo" , $_FILES);
//var_dump($LOGO );
if( is_array($LOGO) && array_key_exists('name', $LOGO ) && strlen($LOGO['name']) ) {

	$target_path = $logopath . basename( $LOGO['name']); 
	if(move_uploaded_file($LOGO['tmp_name'], "$rootpath/$target_path")) {
    	echo "The file ".  basename( $LOGO['name']). " has been uploaded";
	} else{
      echo "There was an error uploading the file, please try again!";
	}

} else {
  $target_path =""; 
}
/**/
$qProd = $conn->productMGR( 
      $product_id=$LOCALPOST["productid"] ,
      $company_id=$LOCALPOST["companyid"] ,
      $product_name=$LOCALPOST["productname"] ,
      $product_desc=$LOCALPOST["productdesc"] ,
      $product_code=$LOCALPOST["productcode"] ,
      $active_flag=$LOCALPOST["productactive"] ,
      $sort=$LOCALPOST["productsort"],
      $logo=$target_path  );

$productid = $qProd[0][0]->product_id ;



header("Location: ?TASK=$CURTASK&MSG=UPDATE&PRODUCTID=$productid");
?>

