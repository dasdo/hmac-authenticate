<?php
namespace HmacAuthenticate\Modelos;

/**
 *	Model to Manage keys access the api
 *
 *	@author Daniel Sanchez <dasdo1@gmail.com>
 *	@version 1.0.0
 */
class Keys extends Base
{
	/**
	 * We define the table name for the model
	 *
	 *	@return string name of table
	 */
	public function getSource()
	{
		return 'api_keys';
	}
}