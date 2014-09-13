<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'bravo-tours-blog');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'Htlu@n2605');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'n0i|w-Tg?bTixtfZIz*Jm4)jR#~8+7Vqu_=WCbM LRSHGWdh@m{>t+gqg$hIz#!<');
define('SECURE_AUTH_KEY',  'zo*q>6tX/8qArE|SMsKCjB9>>M)N}lkv}Q_[}E_SOS&!@;-~rwO+ q8CkOD{Y=xx');
define('LOGGED_IN_KEY',    'hguZ0(n`y+0RX`[)e_*z>c;sqjwDrL1N(L%qKK1V_&/g2_k2}5|(d iWj-dv6Ljs');
define('NONCE_KEY',        'f|gmJf+S5-WC_|re+_rA>_q>$T#~zL/s5ZCy(6ULD5(!)P@(47<((L$)`S+Z=fFl');
define('AUTH_SALT',        'NPf;aWU,iu-;a)J>Y)%n+#vC8s1.gM+%L1e~UC99<b#[KS{+eG^6a$K74o16}Gq*');
define('SECURE_AUTH_SALT', '&Q-|8sf^.Kx:X&Z+d_Beg/QZinI7JOL!.f>+eaKm&Ll#D2$d|S-T`ZL-7Q3x)OdF');
define('LOGGED_IN_SALT',   'n~1xRMG7 s^w<Y~V+w<~t)c_6Y4=zJ|7G;9<F|Ta5kKW+l~3S.<mUYbqlV|-P>wC');
define('NONCE_SALT',       'My8%D N5~uJdt2||]]@)NMc+?rba*}Hp7+bc4yP-k$ko;e?kmPjJ,|;W,}#Z3wxX');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
