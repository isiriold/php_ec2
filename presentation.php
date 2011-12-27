<?php
n show_ppt_url()
{
  <?php if(!empty($_REQUEST['file'])){
    $ppt_file_name = $_REQUEST['file'];
   }else{
    $ppt_file_name = '';
   }
  ?>

  var ppt_file_name = "<?php echo $ppt_file_name ?>";
  var ppt_url =  "<iframe src='http://docs.google.com/gview?url="+ location.protocol + '//' + location.host + '/dpm5/site/upload/ppt/' + ppt_file_name+ "&embedded=true' style='width:600px; height:500px;' frameborder='0'>  </iframe>";

/*!
* OpenTok PHP Library
* http://www.tokbox.com/
*
* Copyright 2010, TokBox, Inc.
*
*/
  require_once 'API_Config.php';
  require_once 'OpenTokSDK.php';

  $apiObj = new OpenTokSDK(API_Config::API_KEY, API_Config::API_SECRET);
  $session = $apiObj->create_session($_SERVER["REMOTE_ADDR"]);
  if ( empty($_GET['s']) ){
    $sessionId = $session->getSessionId();
  } else {
    $sessionId = $_GET['s'];
  }
  
  $token = $apiObj->generate_token(); 
?>



<html lang="en">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title>OpenTok API Sample </title>
	<script src="http://staging.tokbox.com/v0.91/js/TB.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" charset="utf-8">

function show_ppt_url()
{
  <?php if(!empty($_REQUEST['file'])){
    $ppt_file_name = $_REQUEST['file'];
   }else{
    $ppt_file_name = '';
   }
  ?>

  var ppt_file_name = "<?php echo $ppt_file_name ?>";
  var ppt_url =  "<iframe src='http://docs.google.com/gview?url="+ location.protocol + '//' + location.host + '/dpm5/site/upload/ppt/' + ppt_file_name+ "&embedded=true' style='width:600px; height:500px;' frameborder='0'>  </iframe>";
  document.getElementById('ppt_display').innerHTML = ppt_url;   
}

function save_presenration_url()
{
  if (window.XMLHttpRequest)
  { 
    xmlhttp=new XMLHttpRequest();
  }
  else
  {// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function()
  {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      document.getElementById("txtHint").innerHTML= xmlhttp.responseText;
i    }
  }

  var domain = location.protocol + '//' + location.host + location.pathname + location.search;
  presentation_token = '<?php echo $sessionId ; ?>';
  var params = "domain="+ domain + '&token='+ presentation_token  + '&commit=1';
  var sel = document.getElementById("filename_list");
  file_name =  sel.options[sel.selectedIndex].value;
  if(file_name != '')
  {
     params += '&file_name=' + file_name;
  }
  xmlhttp.open("POST","?TASK=PRESENT",true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.setRequestHeader("Content-length", params.length);
  xmlhttp.setRequestHeader("Connection", "close");
  xmlhttp.send(params);
}

function inactive_presentation_url(){
  if (window.XMLHttpRequest)
  { 
    xmlhttp=new XMLHttpRequest();
  }
  else
  {// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function()
  {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      document.getElementById("txtHint").innerHTML= xmlhttp.responseText;
    }
  }
  var params = 'inactive=1&commit=1';
  if(document.getElementById("presentation_url_id"))
  {
    pres_id = document.getElementById("presentation_url_id").value;
    params += '&presentation_url_id=' + pres_id;
  }
  xmlhttp.open("POST","?TASK=PRESENT",true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.setRequestHeader("Content-length", params.length);
  xmlhttp.setRequestHeader("Connection", "close");
  xmlhttp.send(params);
  
}

function file_name_append(val) {
  if(val == '') {
    hide('ppt_display');
    var final_ppt_url=  location.protocol + '//' + location.host + location.pathname + location.search + '&s='+ sessionId  + "&file="+val;
    document.getElementById('share_url_result').innerHTML = final_ppt_url;
  }
  else {
    
    var final_ppt_url=  location.protocol + '//' + location.host + location.pathname + location.search + '&s='+ sessionId  + "&file="+val;
    var ppt_url =  "<iframe src='http://docs.google.com/gview?url="+ location.protocol + '//' + location.host + '/dpm5/site/upload/ppt/' + val+ "&embedded=true' style='width:600px; height:500px;' frameborder='0'>  </iframe>";
    document.getElementById('ppt_display').innerHTML = ppt_url;
    document.getElementById('share_url_result').innerHTML = final_ppt_url;
    show('ppt_display');
  }
  
  
}

	  var apiKey = '<?php echo API_Config::API_KEY; ?>';
      var sessionId = '<?php echo $sessionId; ?>';
		var token = 'devtoken'; // '<?php echo $token; ?>';
 
		var session;
		var publisher;
		var subscribers = {};

		// Un-comment either of the following to set automatic logging and exception handling.
		// See the exceptionHandler() method below.
		// TB.setLogLevel(TB.DEBUG);
		// TB.addEventListener("exception", exceptionHandler);

		if (TB.checkSystemRequirements() != TB.HAS_REQUIREMENTS) {
			alert("You don't have the minimum requirements to run this application."
				  + "Please upgrade to the latest version of Flash.");
		} else {
			session = TB.initSession(sessionId);	// Initialize session

			// Add event listeners to the session
			session.addEventListener('sessionConnected', sessionConnectedHandler);
			session.addEventListener('sessionDisconnected', sessionDisconnectedHandler);
			session.addEventListener('connectionCreated', connectionCreatedHandler);
			session.addEventListener('connectionDestroyed', connectionDestroyedHandler);
			session.addEventListener('streamCreated', streamCreatedHandler);
			session.addEventListener('streamDestroyed', streamDestroyedHandler);
		}

		//--------------------------------------
		//  LINK CLICK HANDLERS
		//--------------------------------------

		/*
		If testing the app from the desktop, be sure to check the Flash Player Global Security setting
		to allow the page from communicating with SWF content loaded from the web. For more information,
		see http://www.tokbox.com/opentok/build/tutorials/helloworld.html#localTest
		*/
		function admin_connect() {
			session.connect(apiKey, token);
			show('ppt_display');
			save_presenration_url();
		}

		function admin_disconnect() {
			session.disconnect();
			hide('disconnectLink');
			hide('url');
			hide('publishLink');
			hide('unpublishLink');
			hide('ppt_display');
			inactive_presentation_url();
			
		}
		function connect() {
			session.connect(apiKey, token);
		}

		function  disconnect() {
			session.disconnect();
			hide('disconnectLink');
			hide('url');
			hide('publishLink');
			hide('unpublishLink');
		}
		// Called when user wants to start publishing to the session
		function startPublishing() {
			if (!publisher) {
				var parentDiv = document.getElementById("myCamera");
				var publisherDiv = document.createElement('div'); // Create a div for the publisher to replace
				publisherDiv.setAttribute('id', 'opentok_publisher');
				parentDiv.appendChild(publisherDiv);
				publisher = session.publish(publisherDiv.id); // Pass the replacement div id to the publish method
				show('unpublishLink');
				hide('publishLink');
				show('url');
				
			}
		}

		function stopPublishing() {
			if (publisher) {
				session.unpublish(publisher);
			}
			publisher = null;
			show('publishLink');
			hide('unpublishLink');
		}

		//--------------------------------------
		//  OPENTOK EVENT HANDLERS
		//--------------------------------------

		function sessionConnectedHandler(event) {
			// Subscribe to all streams currently in the Session
			for (var i = 0; i < event.streams.length; i++) {
				addStream(event.streams[i]);
			}
			show('disconnectLink');
			show('publishLink');
			hide('connectLink');
		}

		function streamCreatedHandler(event) {
			// Subscribe to the newly created streams
			for (var i = 0; i < event.streams.length; i++) {
				addStream(event.streams[i]);
			}
		}

		function streamDestroyedHandler(event) {
			// This signals that a stream was destroyed. Any Subscribers will automatically be removed.
			// This default behaviour can be prevented using event.preventDefault()
		}

		function sessionDisconnectedHandler(event) {
			// This signals that the user was disconnected from the Session. Any subscribers and publishers
			// will automatically be removed. This default behaviour can be prevented using event.preventDefault()
			publisher = null;

			show('connectLink');
			hide('disconnectLink');
			hide('publishLink');
			hide('unpublishLink');
		}

		function connectionDestroyedHandler(event) {
			// This signals that connections were destroyed
		}

		function connectionCreatedHandler(event) {
			// This signals new connections have been created.
		}

		/*
		If you un-comment the call to TB.addEventListener("exception", exceptionHandler) above, OpenTok calls the
		exceptionHandler() method when exception events occur. You can modify this method to further process exception events.
		If you un-comment the call to TB.setLogLevel(), above, OpenTok automatically displays exception event messages.
		*/
		function exceptionHandler(event) {
			alert("Exception: " + event.code + "::" + event.message);
		}

		//--------------------------------------
		//  HELPER METHODS
		//--------------------------------------

		function addStream(stream) {
			// Check if this is the stream that I am publishing, and if so do not publish.
			if (stream.connection.connectionId == session.connection.connectionId) {
				return;
			}
			var subscriberDiv = document.createElement('div'); // Create a div for the subscriber to replace
			subscriberDiv.setAttribute('id', stream.streamId); // Give the replacement div the id of the stream as its id.
			document.getElementById("subscribers").appendChild(subscriberDiv);
			subscribers[stream.streamId] = session.subscribe(stream, subscriberDiv.id);
		}

		function show(id) {
			document.getElementById(id).style.display = 'block';
		}

		function hide(id) {
			document.getElementById(id).style.display = 'none';
		}

	</script>
</head>
<body>  
    
<?php 
$filenames=array ();
$fileCount=0;
$filePath= $rootpath .'/site/upload/ppt/'; # Specify the path you want to look in. 
$dir = opendir($filePath); # Open the path
while ($file = readdir($dir)) { 
  if (eregi("\.ppt",$file)) { # Look at only files with a .ppt extension
    array_push($filenames,$file);
    $fileCount++;
  }
}
if(isset( $_SESSION['member']['isadmin']) && $_SESSION['member']['isadmin']==1 ){
if ($fileCount > 0) {
  sort($filenames);
  echo "<select id=filename_list name=filename_list onchange = \"file_name_append(this.value)\" ><option value=''>[Select a ppt file]</option>";
  foreach( $filenames as $v){
    echo "<option value=\"$v\">$v</option>\n";
  }
  echo "</select>";
}else
{
   echo  sprintf("<strong>PPT files are not present </strong>");
}
}
?>

	<div id="opentok_console"></div>
	<div id="links">
     

     <?php 
         if(isset( $_SESSION['member']['isadmin']) && $_SESSION['member']['isadmin']==1 )
           echo "<input type='button' value='Initiate Presentation' id ='connectLink' class = 'left' onClick='javascript:admin_connect()'  />
                 <input type='button' value='Leave Presentation' id ='disconnectLink' class = 'left' onClick='javascript:admin_disconnect()'  style = 'display:none;' />
                 <input type='button' value='Start Publishing' id ='publishLink' class = 'left' onClick='javascript:startPublishing()' style = 'display:none;'  /> 
                <input type='button' value='Stop Publishing' id ='unpublishLink' class = 'left' onClick='javascript:stopPublishing()' style = 'display:none;' />";
        
        else
           echo "<input type='button' value='Join Presentation' id ='connectLink' class = 'left' onClick=\"show('ppt_display'); connect();  \"  />
     <input type='button' value='Leave Presentation' id ='disconnectLink' class = 'left' onClick=\"hide('ppt_display'); disconnect(); \"  style = 'display:none;' />";
 
 
     ?>
   <div id='txtHint'>  </div>
    <div class = 'clear'> </div>
	</div>
	<br />
	<div id = 'url'  style = "display:none;" > 
	  <label>Share this URL with users whom you wish to be a part of this presentation:</label> <br />
	  <span id="share_url_result"> <?php echo "http://" . $_SERVER['HTTP_HOST']  . $_SERVER['REQUEST_URI'] . "&s=" . $sessionId; ?> 
          </span>
          
      <br />
  </div>
  <br />
   <div style="float:left;  width:40%; "> 
 	 <div id="myCamera" class="publisherContainer"></div>
	 <div id="subscribers"></div>
   </div>
   <div style="float:right;  width:55%; ">	 
       <div id="ppt_display" style='display:none';> 
<!--          <iframe src="http://docs.google.com/gview?url=http://classroom.jc-schools.net/guidance/powerpoints/Friendship.ppt&embedded=true" style="width:600px; height:500px;" frameborder="0">
          </iframe> -->
       </div>
   </div>    
</body>
	<script>
		show('connectLink');
	</script>
</html>

<?php 

if(!empty($_REQUEST['s'])) {
        if($_REQUEST['file'])
        {
          echo "<script>";
		  echo "show_ppt_url();";
	      echo "</script>";
           
        }
        
        
    }
?>
