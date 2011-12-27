<?php
class dbMYSQL { 
	/* this is an extremely granular MySQL class */
	private $host = null;
	private $user = null;
	private $pass = null;
	private $dbname = null;
	public $conn = null;
	
	public function __construct( $hst = null, $usr=null, $pw=null, $db=null, $autocon = true )
	{
		if($hst) { $this->setHost( $hst ); }
		if($usr) { $this->setUser( $usr ); }
		if($pw) { $this->setPassword( $pw ); }
		if($db) { $this->setDBname( $db ); }
		if($autocon) { $this->openConn(); }
	}
	
	public function __destruct( )
	{
		$this->closeConn();
	}
	
	/*****************************
	SANITIZE MYSQL PARAMETERS
	*****************************/
	protected function paramSafe( &$arg , $sArray )
	{
	 	for( $i = 0; $i < count($arg); $i++ ) { 
	 	$arg[$i] = "'" . $this->conn->real_escape_string( $arg[$i] ) . "'"; 
	 	//if( in_array( $i , $sArray) && strlen( $arg[$i] ) ) { $arg[$i] = "'" . $arg[$i] . "'"; }
	 	if( !strlen( $arg[$i] ) || $arg[$i]=="''" ) { $arg[$i] = 'null'; } 
	 	}
	}	

	function mySQLdate( $date, $pat = '/(.*)\/(.*)\/(.*)/', $fix = '\\3-\\1-\\2' )
	{
 	$rtn = preg_replace( $pat, $fix, $date );
	return ( strlen($rtn) < 10)?  '20' . $rtn : $rtn;
	}
	/************************
	OPEN MYSQL CONNECTION
	************************/
	public function openConn( )
	{
		$this->conn = new mysqli($this->getHost(), $this->getUser(), $this->getPassword(), $this->getDBname() ) ;
		
	}

	/************************
	CLOSE MYSQL CONNECTION
	************************/
	public function closeConn( )
	{
		$this->conn->close();
	}
	
	/************************
	RUN MYSQL QUERY
	************************/
	public function runQuery( $query)
	{
		$this->conn->multi_query( $query ) ;
		$result = $this->loadResults( );
		return $result;
	}
	
	/************************
	LOAD RESULTS INTO ARRAY AND CLEAR RESULT
	*************************/
	private function loadResults( )
	{
		$return = array();
		$counter = 0;
		do {
			$tmp = array();
        	/* store first result set */
        	if ($result = $this->conn->store_result()) {
        	    while ($row = $result->fetch_object()) {
					$tmp[] = $row;
        	       // printf("%s %s<br>", $row[0], $row[1]);
        	    }
        	    $result->close();
        	}
        	/* print divider */
        	if ($this->conn->more_results()) {
        	    //printf("<hr>");
        	}
			$return[$counter] = $tmp;
			$counter++;
    	} while ($this->conn->next_result());
		return $return;
	}
	
	
	/*****************************
	GET AND SET FUNCTIONS
	*****************************/
	public function setPassword( $pw)
	{
		$this->pass = $pw;
	}
	public function getPassword()
	{
		return $this->pass;
	}

	public function setHost( $hst)
	{
		$this->host = $hst;
	}
	public function getHost()
	{
		return $this->host;
	}
	public function setUser( $usr)
	{
		$this->user = $usr;
	}
	public function getUser()
	{
		return $this->user;
	}
	public function setDBname( $db )
	{
		$this->dbname = $db;
	}
	public function getDBname()
	{
		return $this->dbname;
	}
	public function getConn()
	{
		return $this->conn;
	}

} //close class