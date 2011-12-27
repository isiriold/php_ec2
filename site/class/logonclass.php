<?php

class MEMBER {
	private $userid = null;
	private $user = null;
	private $pword = null;
	private $firstname = null;
	private $lastname = null;
	private $suffix = null;
	private $prefix = null;
	private $profiles = array(null);

public function __construct( 
$pUserID="", $pUser="", $pPword="", $pEmail="", $pPrefix="", $pFistname="",
 $pMiddlename="", $pLastname="", $pSuffix="", $pSignup="", $pProfiles=array()  ){
	$this->userid = $pUserID;
	$this->user = $pUser;
	$this->pword = $pPword;
	$this->email = $pEmail;
	$this->firstname = $pFistname;
	$this->middlename = $pMiddlename;
	$this->lastname = $pLastname;
	$this->suffix = $pSuffix;
	$this->prefix = $pPrefix;
	$this->profiles = $pProfiles;

} // __construct

public function getUserID() { return $this->userid; }
public function getUser() { return $this->user ; }
public function getEmail() { return $this->email ; }

public function getSuffix() { return $this->suffix; }
public function getPrefix() { return $this->prefix; }
public function getFirstname() { return $this->firstname; }
public function getLastname() { return $this->lastname; }
public function getMiddlename() { return $this->middlename; }
public function getName() { 
  $rtn = $this->getFirstname();
  $rtn.= rtrim(" " . $this->getMiddlename() );
  $rtn.= rtrim(" " . $this->getLastname() );
return $rtn;
} // getName
public function getTitledname() {
	   $rtn = $this->getPrefix();
	   $rtn.= rtrim(" " . $this->getName() );
	   $rtn.= rtrim(" " . $this->getSuffix() );
	   return $rtn;
}





} //MEMBER

?>