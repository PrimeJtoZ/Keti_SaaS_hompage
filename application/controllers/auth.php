<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
    
    public function login()
    {
        echo "hi login page";
    }
}
