<?php

namespace HmacAuthenticate\Events;


/**
 * Event that Authenticates the client message with HMac
 *
 *	@author Daniel Sanchez <dasdo1@gmail.com>
 *	@version 1.0.0
 */
class HmacAuthenticate extends \Phalcon\Events\Manager 
{

	/**
	 * Constructor
	 * 
	 */
	public function __construct() 
	{
		$this->handleEvent();
	}

	/**
	 * Setup an Event
	 *
	 * Phalcon event to make sure client sends a valid message
	 * http://docs.phalconphp.com/en/latest/reference/micro.html#micro-application-events
	 * 
	 * @return FALSE|void
	 */
	public function handleEvent() 
	{
		$this->attach('micro', function ($event, $app) 
		{
			if ($event->getType() == 'beforeExecuteRoute') 
			{
				//disable security
				if(!\Phalcon\DI::getDefault()->getConfig()->application->hmacSecurity)
					return;

				// Authenticate method using credentials
				try
				{ 
					$apiAuth = new Api($app->request);	
					return $apiAuth->authenticate($app->router->getMatchedRoute()->getHttpMethods()); 
				}
				catch (\Exception $e) 
				{
					//log problem
					\Phalcon\DI::getDefault()->getLogger()->error($e->getMessage());

					$app->response->setStatusCode(200, "Unauthorized");
					$app->response->setContentType('application/json', 'UTF-8');
					$app->response->setJsonContent(['type' => 'FAILED', 'message' => $e->getMessage()]);
					$app->response->send();
					return false;
				}
			}
		});
	}
}