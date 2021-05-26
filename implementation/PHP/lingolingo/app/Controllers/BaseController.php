<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Session\Session;
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
	protected $session;
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
		$this->session = \Config\Services::session();
	}
        
        protected function receiveAJAX()
        {
            // get the data from the JSON message body
            $data = $this->request->getJSON(true);
            // get the method used to send the request
            $method = '_'.strtoupper($this->request->getMethod());
            
            // overwrite the superglobal request method array
            $GLOBALS[$method] = $data;
            // overwrite the request superglobal array (the array that gets its values from the actual request method array)
            $GLOBALS['_REQUEST'] = $data;
            
            // return the message data
            return $data;
        }
        
        /*
         * encode the given data as a JSON object and send an AJAX response to the client
         * this method doesn't check if the $data is convertible to JSON
         * 
         * @param data -- data that will be sent as the response
         * @return none
         */
        protected function sendAJAX($data)
        {
            // set the JSON response data and send it to the client
            $this->response->setStatusCode(200);
            $this->response->setJSON($data);
            $this->response->send();
        }
}
