<?php
$content = getKey( "srcvid", $LOCALGET );
$type = getKey( "type", $LOCALGET );
if($type == "mp4"){
echo <<<xx
<OBJECT CLASSID="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" WIDTH="481"HEIGHT="287" CODEBASE="http://www.apple.com/qtactivex/qtplugin.cab">
<!-- Kary, for IE, we need param elements -Risi -->
<PARAM name="SRC" VALUE="$content">
<PARAM name="AUTOPLAY" VALUE="true">
<PARAM name="CONTROLLER" VALUE="true">
<PARAM name="wmode" VALUE="opaque">
<!-- Kary, for rest of the browser, we need embed -Risi -->
<EMBED SRC="$content" WIDTH="481" HEIGHT="287" wmode="opaque" AUTOPLAY="true" CONTROLLER="true" PLUGINSPAGE="http://www.apple.com/quicktime/download/"></EMBED>
</OBJECT>


xx;
}
if($type == "yt"){
echo <<<xx
	<iframe src="$content?wmode=opaque" frameborder="0" class="adminMOVIE" allowfullscreen></iframe>
xx;
}
?>