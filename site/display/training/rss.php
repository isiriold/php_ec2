<?php
if ($USERLOGGED != 1)
{
echo <<<xx
<h2 class="">ATTENTION: Please Log in to access Articles </h2>
xx;
}


else
{

require_once "site/display/articles/rss_loggedin.html";

}
?>



<hr>
</body>
</html> 