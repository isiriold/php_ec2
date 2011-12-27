function callAjax ( div , url ) 
{
	var a = null;
	LoadPage( url, div, a );
}

function LoadPage(url, target, hldr) {
  document.getElementById(target).innerHTML = 'Page is Loading...';
  
  if (window.XMLHttpRequest) {
    hldr = new XMLHttpRequest();
  } else if (window.ActiveXObject) {
    hldr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  if (hldr != undefined) {
    hldr.onreadystatechange = function() {PageDone(url, target, hldr);};
    hldr.open("GET", url, true);
    hldr.send("");
  } 


}  

function PageDone(url, target, hldr) {
  if (hldr.readyState == 4) { // only if req is "loaded"
    if (hldr.status == 200) { // only if "OK"
      document.getElementById(target).innerHTML = "" + hldr.responseText; //<br style='height: 0px;' />
    } else {
      document.getElementById(target).innerHTML= " AJAX Error:\n"+ hldr.status + "\n" +hldr.statusText;
    }
  }
}

function CloseAjax(target) 
{
	var divPath = document.getElementById(target);
	divPath.style.display= "none";
}

function OpenAndLoad(url,target)
{
	//alert('a');
	var divPath = document.getElementById(target);
	//divPath.style.display= "";
	LoadPage(url, target);
}

function JScallAJAX(url) {
	var a = null;
	return JSLoadPage( url, a );
	
}

function JSLoadPage(url, hldr) {
  rtn = "";
  if (window.XMLHttpRequest) {
    hldr = new XMLHttpRequest();
  } else if (window.ActiveXObject) {
    hldr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  if (hldr != undefined) {
    hldr.onreadystatechange = function(xxx) { JSPageDone(url, hldr);};
    hldr.open("GET", url, true);
    hldr.send("");
  } 
return xxx;
} 

function JSPageDone(url, hldr) {
  if (hldr.readyState == 4) { // only if req is "loaded"
    if (hldr.status == 200) { // only if "OK"
      return "" + hldr.responseText;
    } else {
      return " AJAX Error:\n"+ hldr.status + "\n" +hldr.statusText;
    }
  }
}

