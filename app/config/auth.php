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
        'specialist' => array(
            'driver' => 'eloquent',
            'model' => 'Specialist'
        )
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
