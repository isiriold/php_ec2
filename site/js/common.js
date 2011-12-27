// changes in code -- DTS -- start
myHtml = document.getElementsByTagName("html")[0];
myHtml.style.overflow = "auto";
// changes in code -- DTS -- end

function getDocHeight() {
    var D = document;
    return Math.max(
        Math.max(D.body.scrollHeight, D.documentElement.scrollHeight),
        Math.max(D.body.offsetHeight, D.documentElement.offsetHeight),
        Math.max(D.body.clientHeight, D.documentElement.clientHeight)
    );
}

function getStyle(el, style) {
   if(!document.getElementById) return;
   
     var value = el.style[toCamelCase(style)];
   
    if(!value)
        if(document.defaultView)
            value = document.defaultView.
                 getComputedStyle(el, "").getPropertyValue(style);
       
        else if(el.currentStyle)
            value = el.currentStyle[toCamelCase(style)];
     
     return value;
}

function setStyle(objId, style, value) {
    document.getElementById(objId).style[style] = value;
}

function toCamelCase( sInput ) {
    var oStringList = sInput.split('-');
    if(oStringList.length == 1)    
        return oStringList[0];
    var ret = sInput.indexOf("-") == 0 ? 
    	oStringList[0].charAt(0).toUpperCase() + oStringList[0].substring(1) : oStringList[0];
    for(var i = 1, len = oStringList.length; i < len; i++){
        var s = oStringList[i];
        ret += s.charAt(0).toUpperCase() + s.substring(1)
    }
    return ret;
}

function increaseWidth(addToWidth, whichDiv){
    var theDiv = document.getElementById(whichDiv);
    var currWidth = parseInt(getStyle(theDiv, "width"));
    var newWidth = currWidth + parseInt(addToWidth);
    setStyle(whichDiv, "width", newWidth + "px");
}

String.prototype.trim = function() {
	return this.replace(/^\s+|\s+$/g,"");
}
String.prototype.ltrim = function() {
	return this.replace(/^\s+/,"");
}
String.prototype.rtrim = function() {
	return this.replace(/\s+$/,"");
}
function toggleDiv(div) {
var compare = "";
div = document.getElementById(div);
compare= div.style.display.toLowerCase().trim();

div.style.display = ( compare== "none")? "block":"none";


// changes in code -- DTS -- start
myHtml.style.overflow = (myHtml.style.overflow == "auto")? "hidden":"auto";
// changes in code -- DTS -- end


} //toggleDiv

/* in the end, we didn't need this
function frameFix(){
var adminMovieF = document.getElementsByClassName("adminMOVIEFrame");
var flashWrap = document.getElementsByClassName("flashWrap");
for(i = 0; i < adminMovieF.length; i++){
adminMovieF[i].style.display="block";
}
for(i = 0; i < flashWrap.length; i++){
flashWrap[i].style.display="block";
}
}

*/