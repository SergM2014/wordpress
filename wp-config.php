<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '1');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'Hr@`a#7Zjhk+4Q+r)$e}Z6]-cE1=&@&w>0P^usb<[OyR}n^4<A4-9Y$qS<{ixls)');
define('SECURE_AUTH_KEY',  ',iCJyjci^k>32?E5#l++:fl~t+L&kn^<y]!N9-,6x>;~fXU~<c81L |zOy3Q8$xe');
define('LOGGED_IN_KEY',    '7!wp.5%HkI$s3FJW6*}.[DZ-y-6Xe$iO5g$M^?e{0]j(G9I-kuuC|TS@-N]]?)Ce');
define('NONCE_KEY',        'JhSM:c[!80!c|fvdb=&heR^JkN8BCm:=)G:w%F_bCIO%7}Q:4j|b.<GV?TkWIt`E');
define('AUTH_SALT',        '_<#UY61f2lN1%VCly|62E*$77U2-s)U2hIPb+9M{QDddl(xN[&O~FJ%?C/^B|w[X');
define('SECURE_AUTH_SALT', 'u8=haxA[0TI!-{&PbI~9U5hFJ{X-p1f(L!NS1 xR71HCU2oAT4aUaDobJDY|eMQb');
define('LOGGED_IN_SALT',   'GJOAv9ATOBCe5!^wI`t4:7{${#Z6?I1XFJV|JE)Q*83Ir;-Bm]m|jHC(C(ar84-p');
define('NONCE_SALT',       'Z(R7+ZT;c ;-35|%>;6YG21cz&@>8Oe~_|~hQv//p`i$_mAHFQ-{y1>B#[gKH`:Z');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
