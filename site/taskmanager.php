<?php
function currentTask()
{
   $a = getKey("task", $GLOBALS["LOCALGET"]);
   if( strlen($a) == 0 ) { $a = getKey("task", $GLOBALS["LOCALPOST"]); }
   if( strlen($a) == 0 ) { $a = "Public"; }
   return $a;
}

$ENG = array( "display" => array(), "pull" => array(), "commit" => array() );
$ENG['formname'] = "theForm";
$ENG['sitetitle'] = "eRemedy by Allacciare";
switch( strtolower(currentTask()) )
{
 
case "admincontent":
 	$ENG["pull"][] = "site/pull/contentpull.php";
	$ENG["display"][] = "site/display/content/admincontent1.php"; 
	$ENG["commit"][] = ""; // none for home page
break;

case "public":
 	//$ENG["pull"][] = "site/pull/contentpull.php";
	$ENG["display"][] = "site/display/public.php"; 
	//$ENG["commit"][] = ""; // none for home page
break;

 
case "editcontent":
 	$ENG["pull"][] = "site/pull/contentpull.php";
 	$ENG["pull"][] = "site/pull/grouppull.php";
 	$ENG["pull"][] = "site/pull/conceptpull.php";
	$ENG["display"][] = "site/display/content/editcontent1.php"; 
	$ENG["commit"][] = "site/commit/contentsave.php"; 
break;


case "contentedit":
 	$ENG["pull"][] = "site/pull/contentpull.php";
 	$ENG["pull"][] = "site/pull/grouppull.php";
 	$ENG["pull"][] = "site/pull/conceptpull.php";
 	$ENG["pull"][] = "site/pull/contentdetailpull.php";
	$ENG["display"][] = "site/display/content/editcontent2.php"; 
	//$ENG["display"][] = "site/display/content/editcontentdetail.php";
	//$ENG["commit"][] = "site/commit/contentsave.php";  
	$ENG["commit"][] = "site/commit/contentsave2.php"; // none for home page
break;


case "articles":
 	//$ENG["pull"][] = "site/pull/contentpull_restricted.php";
	//$ENG["display"][] = "site/display/articles/articles.php"; 
	$ENG["display"][] = "site/display/articles/rss.php";
	$ENG["pagetitle"] = "Articles"; 
	//$ENG["commit"][] = "site/commit/contentsave.php"; // none for home page
break;

case "training":
 	//$ENG["pull"][] = "site/pull/contentpull_restricted.php";
	//$ENG["display"][] = "site/display/articles/articles.php"; 
	$ENG["display"][] = "site/display/training/training.php";
	$ENG["pagetitle"] = "Training"; 
	//$ENG["commit"][] = "site/commit/contentsave.php"; // none for home page
break;


case "showproduct":
 	$ENG["pull"][] = "site/pull/contentpull_restricted.php";
 	$ENG["pull"][] = "site/pull/contentdetailpull.php";
	$ENG["display"][] = "site/display/articles/readarticle2.php"; 
	//$ENG["commit"][] = "site/commit/contentsave.php"; // none for home page
break;


case "product":
 	$ENG["pull"][] = "site/pull/products.php";
	$ENG["display"][] = "site/display/product/site_product.php"; 
	$ENG["pagetitle"] = "Products";
	//$ENG["commit"][] = "site/commit/contentsave.php"; // none for home page
break;

/* forums functionality removed/commented out (also the links) as per new requirement
case "forums":
    $ENG["display"][] = "site/display/forums/forums.php"; // none for home page
break;

case "forumslogin":
    $ENG["ajaxdisplay"] = array();
    //$ENG["ajaxdisplay"][] = "site/display/forums/forumslogin.php"; // uncomment when CURL works
    $ENG["ajaxdisplay"][] = "site/display/forums/forums1.php"; // uncomment when CURL works
break;
*/

case "products":
	$ENG["pull"][] = "site/pull/listproducts.php";
	$ENG["display"][] = "site/display/product/list_product.php"; 
	$ENG["pagetitle"] = "Products";
	//$ENG["commit"][] = "site/commit/contentsave.php"; // none for home page
break;
case "presentations":
	$ENG["pull"][] = "site/pull/listpresentations.php";
	$ENG["display"][] = "site/display/present/list_presentation.php"; 
	$ENG["pagetitle"] = "Presentations";
	//$ENG["commit"][] = "site/commit/contentsave.php"; // none for home page
break;
case "present":
	$ENG["display"][] = "site/display/present/presentation.php";
	$ENG["pagetitle"] = "Presentation";
	$ENG["commit"][] = "site/commit/presentation_url_save.php";

	 // none for home page
break;

case "ppt":
	$ENG["display"][] = "site/display/ppt/upload_ppt1.php";
	$ENG["pagetitle"] = "PPT Upload";
	$ENG["commit"][] = "site/commit/pptsave.php"; // save the file on commit
break;

case "poser":
 	$ENG["pull"][] = "site/pull/grouppull.php";
	$ENG["display"][] = "site/display/groups/poser1.php"; 
	$ENG["commit"][] = "site/commit/poser.php"; // none for home page
break;

case "login":
 	//$ENG["pull"][] = "site/pull/products.php";
	$ENG["display"][] = "site/display/logon/login.php"; 
	$ENG["pagetitle"] = "Login";
	$ENG["commit"][] = "site/commit/login.php"; // none for home page
break;

case "logout":
	$ENG["commit"][] = "site/commit/logout.php"; // none for home page
break;

case "profile":
	$ENG["display"][] = "site/display/profile/profile.php";
	$ENG["pagetitle"] = "My Profile";
break;


// signup start
case "signup":
	$ENG["display"][] = "site/display/profile/signup.php";
	$ENG["pagetitle"] = "Sign me up";
	$ENG["commit"][] = "site/commit/commitProfile.php";
	break;
	
case "signpg":
	
	$ENG["ajaxdisplay"] = array();
	$ENG["ajaxdisplay"][] = "site/display/profile/signup_general.php"; // none for home page
	break;
// signup stop

case "ajaxpg":
	$ENG["pull"][] = "site/pull/profilepull.php";
	$ENG["ajaxdisplay"] = array();
	$ENG["ajaxdisplay"][] = "site/display/profile/profile_general.php"; // none for home page
	break;

case "ajaxplay":
	$ENG["ajaxdisplay"] = array();
	$ENG["ajaxdisplay"][] = "site/display/autoplay.php"; // none for home page
	break;
case "ajaxproup":
	 $ENG["commit"][] = "site/commit/userprofileupdate.php";
	break;

case "ajaxpprod":
	$ENG["pull"][] = "site/pull/profileproducts.php";
	$ENG["ajaxdisplay"] = array();
	$ENG["ajaxdisplay"][] = "site/display/profile/profile_product.php"; // none for home page
	break;
	
case "ajaxpprodup":
	$ENG["commit"][] = "site/commit/userproductupdate.php";
	break;
	
case "ajaxpart":
	$ENG["ajaxdisplay"] = array();
	$ENG["ajaxdisplay"][] = "site/display/profile/profile_article.php"; // none for home page
	break;
	
// Order start
case "orders":
	$ENG["display"][] = "site/display/orders/orders.php"; 

	$ENG["pagetitle"] = "Orders";
	$ENG["commit"][] = "site/commit/commitOrders.php";
	break;

case "orderspg":
	$ENG["pull"][] = "site/pull/pullorders.php";
	$ENG["ajaxdisplay"] = array();
	$ENG["ajaxdisplay"][] = "site/display/orders/orders_general.php"; // none for home page
	break;
// Order stop	

case "ask":
	$ENG["display"][] = "site/display/questions/ask.php"; 
	$ENG["pagetitle"] = "Ask a question";
	$ENG["commit"][] = "site/commit/commitAsk.php";
	break;

case "askpg":
	$ENG["ajaxdisplay"] = array();
	$ENG["ajaxdisplay"][] = "site/display/questions/ask_general.php"; // none for home page
	break;
	
case "getresponsepg":
	$ENG["pull"][] = "site/pull/pullResponses.php";
	$ENG["ajaxdisplay"] = array();
	$ENG["ajaxdisplay"][] = "site/display/questions/responses.php"; // none for home page
	break;


	
/////////////////////////////////////////////////////////////
//////////////////ADMIN FUNCTIONS////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
case "adminprodlist":
 	$ENG["pull"][] = "site/pull/adminproducts.php";
	$ENG["display"][] = "site/display/product/admin_list_product.php"; 
	$ENG["pagetitle"] = "Product Admin";
	//$ENG["commit"][] = "site/commit/logout.php"; // none for home page
	break;
	
case "adminproduct":
 	$ENG["pull"][] = "site/pull/edit_adminproduct.php";
	$ENG["display"][] = "site/display/product/admin_edit_product.php"; 
	$ENG["pagetitle"] = "Product Admin";
	$ENG["commit"][] = "site/commit/edit_adminproduct.php"; // none for home page
	break;
	
	
case "toggledp":
	$ENG["commit"][] = "site/commit/toggledetailprofile.php"; // none for home page
	break;
	
case "ajaxdptag":
	$ENG["ajaxdisplay"] = array();
	$ENG["ajaxdisplay"][] = "site/display/ajaxdptag.php"; // none for home page
	break;
	
case "ajaxproddetail":
	$ENG["ajaxdisplay"] = array();
	$ENG["ajaxdisplay"][] = "site/display/ajaxproddetail.php"; // none for home page
	$ENG["commit"][] = "site/commit/ajaxproddetail.php"; // none for home page
	break;

case "ajaxdetailsave":
	 $ENG["commit"][] = "site/commit/ajaxdetailsave.php";
//	$ENG["ajaxdisplay"] = array();
//	$ENG["ajaxdisplay"][] = "site/display/ajaxdptag.php"; // none for home page
	break;
	
case "openworkdiv":
	$ENG["ajaxdisplay"] = array();
	$ENG["ajaxdisplay"][] = "site/display/product/video.php";
break;

case "reports":
 	$ENG["pull"][] = "site/pull/report.php";
	$ENG["display"][] = "site/display/reports/report.php"; 
	$ENG["pagetitle"] = "Site Usage";
	//$ENG["commit"][] = "site/commit/logout.php"; // none for home page
	break;
	
case "togglearea":
	 $ENG["commit"][] = "site/commit/togglearea.php";
break;

	
case "ajaxpatag":
	$ENG["ajaxdisplay"] = array();
	$ENG["ajaxdisplay"][] = "site/display/ajaxpatag.php"; // none for home page
	break;

case "adminprofsearch":
	$ENG["display"][] = "site/display/profile/profileSearchAdmin.php";
	$ENG["pagetitle"] = "Search";
break;

	
case "adminproflist":
	$ENG["display"][] = "site/display/profile/profileAdmin.php";
	$ENG["pagetitle"] = "Profile";
break;
case "ajaxprofadminup":
	 $ENG["commit"][] = "site/commit/userprofileupdate_admin.php";
	break;

case "ajaxprofpg":
	$ENG["pull"][] = "site/pull/profileAdminpull.php";
	$ENG["ajaxdisplay"] = array();
	$ENG["ajaxdisplay"][] = "site/display/profile/profileAdmingeneral.php"; // none for home page
	break;

/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////








 default:
 	$ENG["pull"][] = "";
	$ENG["display"][] = "site/display/landing1.php"; 
	$ENG["commit"][] = ""; // none for home page
}

?>
