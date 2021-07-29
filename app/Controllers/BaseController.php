<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;


/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

class BaseController extends Controller
{
	/**
	 * Instance of the main Request object.
	 *
	 * @var IncomingRequest|CLIRequest
	 */
	protected $request;

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];

	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.: $this->session = \Config\Services::session();
	}


	/*
		Set data for master layout
	*/
	public function loadUserLayout($data,$title,$content,$leftMenu,$slide, $dataLayout=[])
	{
		$data['title']=$title;
		$data['css']=view('user/layout/css');

		if($leftMenu=="")
			$data['leftMenu']=null;
		else $data['leftMenu']=view($leftMenu);

		$data['header']=view('user/layout/header');
		if($slide=="")
			$data['slide']=null;
		else $data['slide']=view($slide);
		
		$data['content']=view($content,$dataLayout);
		$data['footer']=view('user/layout/footer');
		$data['js']=view('user/layout/js');
		return $data;
	}

	public function loadMastLayout($data,$title,$content,$dataLayout=[],$cssFiles=[], $jsFiles=[])
	{
		$data['title']=$title;
		$data['cssjs']=view('admin/layout/css-js');
		
		$data['content']=view($content,$dataLayout);
		$data['leftmenu']=view('admin/layout/left-menu');
		$data['cssFiles']=$cssFiles;
		$data['jsFiles']=$jsFiles;
		
		return $data;
	}


	/**
     * @var validation;
     */
    public $validation;

	public function __construct()
    {
        $this->validation= \Config\Services::validation();
		
    }
	
}
