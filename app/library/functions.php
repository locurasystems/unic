<?php
namespace Unic;

class Functions
{
	/**
	 * Generates cryptographically strong random key
	 *
	 * generate_secret_key function
	 * @param integer
	 * @return mixed
	 * @author Ashes Vats
	 **/
	
	public static function generate_secret_key($key='12')
	{
		$c=true;
		return bin2hex(openssl_random_pseudo_bytes($key,$c));
	}
		
}
	
?>