<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'vahrite' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ':Bw{{t6TswvxQ0=H@f!SFRO>tI)pL)C(,Nx:Y;b`8H+1PtA58%j|?N$^^B3l8,$c' );
define( 'SECURE_AUTH_KEY',  'n&,#$TDurGh1RdMhccF6pw3VlgeesYxH,J jwd?!WH_jK,(*iAcFDNV WcG@e9CZ' );
define( 'LOGGED_IN_KEY',    'xTeIk:0H{tdLwBy,o,py^2U9]b%2|[Z7FXH<uJ^xP9D=py]KzX6/li?b$LACz/o@' );
define( 'NONCE_KEY',        'yail7aEFR>P~k6_/6^VM[KkL&b7l-srsQ]~rT`V?>((1uPuIU|9P9iS.t*`8R4(_' );
define( 'AUTH_SALT',        'DaCtYGzH?x{Ti,)=*[2[x#A[BE9 jFsrPj[w~nr88R}:Nzi/S<{!&BHym:aB7Q`P' );
define( 'SECURE_AUTH_SALT', '[z][1xb|!s`1|(KS,+}yA-6;!/2^G8~YDoGy6>sm(fMd!=H>9HA-U.?8ALfMEXyR' );
define( 'LOGGED_IN_SALT',   'dv8jKfU-eB3y(Tl$z~^+,@+N-60`Tmq`bO|~GAq&q{QRA>jHg(oI*VMSuVDla@=8' );
define( 'NONCE_SALT',       '>>_,(yod2LtMm.z?WOkA`V8S-]rDfGv`B~#O=@(r,sFqZ~/@vg(52K?T/8yCiJd+' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
