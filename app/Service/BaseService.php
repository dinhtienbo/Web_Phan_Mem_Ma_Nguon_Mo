<?php

namespace App\Service;


class BaseService 
{
    /**
     * @var validation;
     */
    public $validation;

	public function __construct()
    {
        $this->validation= \Config\Services::validation();
    }
	
}
