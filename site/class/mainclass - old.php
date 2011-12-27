<?php
require_once "./engine/class/mysql.php";

class SQL extends dbMYSQL
{

	public function __construct( $hst = null, $usr=null, $pw=null, $db=null, $autocon = true )
	{
	 	parent::__construct($hst, $usr, $pw, $db, $autocon);
	}
	
	public function __destruct( )
	{
		parent::__destruct( );
	}
	private function mysql_safe($q) {
    $x = array_shift(func_get_args());
    return vsprintf(preg_replace('/%([1-9]):(d|s)/','%$1$$2',$q), array_map('mysql_escape_string',$x));
	} 
public function productMGR( $product_id=null ,$company_id=null ,$product_name=null ,$product_desc=null ,$product_code=null ,$active_flag=null ,$sort=null, $logo=null  ) {
$arg = func_get_args();
$this->paramSafe( $arg , $arg );
if( !is_numeric($product_id) ) {
$arg[0] = 'null';

}

$theSQL = <<<q
call `DPM_UP_PRODUCT_MGR`( $arg[0],$arg[1],$arg[2],$arg[3],$arg[4],$arg[5],$arg[6],$arg[7],0 );
q;

//var_dump($theSQL);

return $this->runQuery( $theSQL );
}
public function productdetailMGR( $product_detail_id=null ,$product_id=null ,$detail_group_concept_id=null ,$detail_type_concept_id=null ,$detail_name=null ,$detail_value=null ,$active_flag=null ,$sort=null  ) {
	//$product_detail_id = ( is_numeric($product_detail_id))? $product_detail_id : 'null';
	$arg = func_get_args();
	$this->paramSafe( $arg , $arg );
if( !is_numeric($product_detail_id) ) {
$arg[0] = 'null';
}
	
	
$theSQL = <<<q
call `DPM_UP_PRODUCT_DETAIL_MGR`( $arg[0],$arg[1],$arg[2],$arg[3],$arg[4],$arg[5],$arg[6],$arg[7] );
q;
echo $theSQL;
return $this->runQuery( $theSQL );
}
public function productpartprofileMGR( $product_part_profile_id=null ,$product_id=null ,$product_detail_id=null ,$profile_id=null ,$active_flag=null  ) {
$arg = func_get_args();
$this->paramSafe( $arg , $arg );
$theSQL = <<<q
call `DPM_UP_PRODUCT_PART_PROFILE_MGR`( $arg[0],$arg[1],$arg[2],$arg[3],$arg[4] );
q;
//return $theSQL ;
return $this->runQuery( $theSQL );
}

public function proddetailGet($product_id  = null,$company_id  = null, $product_name  = null,  
$product_desc = null,  $product_code  = null, $product_active_flag  = null, $product_detail_id  = null, 
$detail_group_concept_id  = null, $detail_group_concept_code  = null, $detail_group_active_flag  = null, 
$detail_type_concept_id  = null, $detail_type_concept_code  = null, $detail_type_active_flag  = null, 
$detail_name  = null, $detail_value = null, $product_detail_active_flag = null)
{
 $arg = func_get_args();
 $this->paramSafe( $arg, $arg );
$theSQL = <<<q
call `DPM_UP_V_PRODUCT_GET`
($arg[0], $arg[1], $arg[2], $arg[3], $arg[4], $arg[5], $arg[6], $arg[7], $arg[8], $arg[9], $arg[10], $arg[11], $arg[12], $arg[13], $arg[14], $arg[15])
q;

//echo $theSQL;
return $this->runQuery( $theSQL );
}

public function loginGet( $login="", $pword="" ) {
$arg = func_get_args();
$this->paramSafe( $arg, $arg );
$theSQL = <<<q
call DPM_UP_MEMBER_LOGIN($arg[0], $arg[1])
q;
//echo $theSQL;
return $this->runQuery( $theSQL );
} 


public function admin_productGET( $product_id = null ) {
$arg = func_get_args();
$this->paramSafe( $arg, $arg );
$theSQL = <<<q
call DPM_UP_PRODUCT_ADMINGET($arg[0])
q;
return $this->runQuery( $theSQL );
}



public function admin_productdetailGET( $product_id = null, $product_detail_id = null ) {
$arg = func_get_args();
$this->paramSafe( $arg, $arg );
$theSQL = <<<q
call DPM_UP_V_PRODUCT_PART_GET($arg[0],$arg[1])
q;
//echo $theSQL;
return $this->runQuery( $theSQL );
}

public function memberMGR( $memberid = "", $login = "", $pword = "", $email = "", 
$prefixid = "", $firstname = "", $middlename = "", $lastname = "", $active_flag = "", 
$prefixTN = "0", $fistTN = "0", $middleTN = "0", $lastTN = "0" ) {
	$arg = func_get_args();
	$this->paramSafe( $arg, $arg );
$theSQL = <<<zzz
call `DPM_UP_MEMBER_MGR`
($arg[0], $arg[1], $arg[2], $arg[3], $arg[4], $arg[5], $arg[6], $arg[7], $arg[8], $arg[9], $arg[10], $arg[11], $arg[12] )
zzz;

//return $theSQL ;
return $this->runQuery( $theSQL );
} //memberMGR

public function memberproductMGR( $member_product_id=null, $member_id=null ,$product_id=null ,$active_flag=null ,$sort=null  ) {
$arg = func_get_args();
$this->paramSafe( $arg , $arg );
$theSQL = <<<q
call `DPM_UP_MEMBER_PRODUCT_MGR`( $arg[0],$arg[1],$arg[2],$arg[3],$arg[4] );
q;
//return $theSQL;
return $this->runQuery( $theSQL );
} //memberproductMGR

public function memberproductGET( $member_id = null, $active ) {
$arg = func_get_args();
$this->paramSafe( $arg , $arg );
$theSQL = <<<q
call DPM_UP_V_MEMBER_PRODUCT_GET ( $arg[0] , $arg[1] )
q;
//echo $theSQL;
return $this->runQuery( $theSQL );
} //memberproductGET

public function productmemberGET( $member_id = null ) {
$arg = func_get_args();
$this->paramSafe( $arg , $arg );
/*
$theSQL = <<<q
call DPM_UP_V_PRODUCT_MEMBER_GET ( $arg[0] )
q;
*/
$theSQL = <<<q
call DPM_UP_MEMBER_PRODUCT_FOLLOW_GET( $arg[0] )
q;

return $this->runQuery( $theSQL );
} //productmemberGET


public function conceptrelateGET( $concept_relate_id = null, $parent_concept_code = null, $concept_relate_active_flag = null, $parent_active_flag = null, $child_active_flag = null  ) {
	$arg = func_get_args();
	$this->paramSafe( $arg , $arg );
$theSQL = <<<zz
call `DAD_P_CONCEPT_RELATE`( $arg[0],$arg[1],$arg[2],$arg[3],$arg[4])
zz;
   return $this->runQuery( $theSQL );
} // conceptrelateGET


} //class close 

?>
