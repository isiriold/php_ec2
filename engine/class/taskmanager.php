<?php

class taskmgr 
{
 public $theincludes = array( "styleincludes" , "scriptincludes" , "viewincludes" , "procincludes" );
		
 public $pagesettings = array('pagetitle'=> 'Project Title', 'sectiontitle'=> '', 'ssl'=>'0', 'secure'=>'0');
 public $styleincludes = array();
 public $scriptincludes = array();
 public $viewincludes = array();
 public $procincludes = array();
 
function loadViews( &$list )
{
 	foreach( $list as $item )
 	{
  	var_dump( $item);
  	echo "<br />";
	}
}

function parseTask( &$task )
{
 	$this->parseSettings( $task->pagesettings );
	foreach( $this->theincludes as $inc )
	{
	 $this->parseFiles( $task->{$inc} , $inc );
	} 
}

function parseSettings( &$settings )
{
 	foreach( $settings->pagesetting as $set )
	{
		$tmp = (string)$set['name']; 
		$this->pagesettings[ $tmp ] = $set['value'];
	}
}

function parseFiles( &$files , $key )
{
 	foreach( $files->include as $file )
	{
	 $tmp = array();
	 $tmp['file'] = (string)$file['file'];
	 $tmp['variable'] = (string)$file['variable'];
	 $this->{$key}[(string)$file['variable']] = $tmp; 
	}

}


		
		/* if( array_key_exists( $tmp , $this->pagesettings ) )
		 { 
		 
		 
		 } else { 
		   
		 }*/
} // class end



?>