<?php 

return array( 
	
	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => 'Session', 

	/**
	 * Consumers
	 */
	'consumers' => array(

		/**
		 * Facebook
		 */
        'Facebook' => array(
            'client_id'     => '532811273488601',
            'client_secret' => 'a83ff9336f18b1e94fed01d68ccfdae7',
            'scope'         => array('email'),
        ),		
        'Google' => array(
            'client_id'     => '888775239760-9m3t3hgbq1ve91i6f7pefv0h6u7mf0a6.apps.googleusercontent.com',
            'client_secret' => 'U9CM-k34mLs7GqBRH-SOlzKZ',
            'scope'         => array('userinfo_email', 'userinfo_profile'),
        )

	)

);