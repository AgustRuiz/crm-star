<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Configuration_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function rowsPerPage(){
		return 10;
	}
}