<?php

return array(
    'multi' => array(
        'admin' => array(
            'driver' => 'eloquent',
            'model' => 'AdminUser'
        ),
        'customer' => array(
            'driver' => 'eloquent',
            'model' => 'Customer'
        ),
        // 'staff' => array(
        // )
    ),
	// 'driver' => 'eloquent',
	// 'model' => 'AdminUser',
	// 'table' => 'admin_users',

	'reminder' => array(
		'email' => 'emails.auth.reminder',
		'table' => 'password_reminders',
		'expire' => 60,
	),

);
