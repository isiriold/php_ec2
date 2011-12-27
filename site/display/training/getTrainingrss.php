<?php
//get the q parameter from URL
$q=$_GET["q"];

//find out which feed was selected

//SACME feed
  $xml1=("http://www.sacme.org/Content/RSS/events.ashx?pageId=1069916");

	//$xml1=("http://www.nejm.org/action/showFeed?jc=nejm&type=etoc&feed=rss");

  echo ("<br/>");
  echo ("<hr>");
  echo '<p class="btnArticleChnl clr2"> SACME Events <p>';
  
$xml1Doc = new DOMDocument();
$xml1Doc->load($xml1);

//get elements from "<channel>"
$channel1=$xml1Doc->getElementsByTagName('channel')->item(0);
$channel1_title = $channel1->getElementsByTagName('title')
->item(0)->childNodes->item(0)->nodeValue;
$channel1_link = $channel1->getElementsByTagName('link')
->item(0)->childNodes->item(0)->nodeValue;
$channel1_desc = $channel1->getElementsByTagName('description')
->item(0)->childNodes->item(0)->nodeValue;

//output elements from "<channel>"
echo("<p><a href='" . $channel1_link
  . "'>" . $channel1_title . "</a>");
echo("<br />");
echo($channel1_desc . "</p>");

//get and output "<item>" elements
$x=$xml1Doc->getElementsByTagName('item');
for ($i=0; $i<=5; $i++)
  {
  $item1_title=$x->item($i)->getElementsByTagName('title')
  ->item(0)->childNodes->item(0)->nodeValue;
  $item1_link=$x->item($i)->getElementsByTagName('link')
  ->item(0)->childNodes->item(0)->nodeValue;
  $item1_desc=$x->item($i)->getElementsByTagName('description')
  ->item(0)->childNodes->item(0)->nodeValue;

  echo ("<p><a href='" . $item1_link
  . "'>" . $item1_title . "</a>");
  echo ("<br />");
  echo ($item1_desc . "</p>");
  }
  
  echo ("<br/>");
  echo ("<hr>");
   

?> 