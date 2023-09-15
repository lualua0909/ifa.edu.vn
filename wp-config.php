<?php
define( 'WP_CACHE', true );



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
define( 'DB_NAME', 'cpved891_ifa' );

/** Database username */
define( 'DB_USER', 'cpved891_ifa' );

/** Database password */
define( 'DB_PASSWORD', '@Duy854530' );

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
define('AUTH_KEY',         'HNZ/jE%bsBQ%:EX wzKr}VPeimPUq,gV,Q=T`F>8pcrdkeofoRg7qmt^JF{]v=!5');
define('SECURE_AUTH_KEY',  '0raBfT3BJj]sK,Coo=+GN@{`3@DcJ`/U8)w62-duv?SXo&2e#CIPL`T!NU!vuE[B');
define('LOGGED_IN_KEY',    'X8|kP )KOBwYYNb!CrhKsL_hn#@YR*sT/*L-PsiitgLFOeCs*{.1_zZE.m(&`+we');
define('NONCE_KEY',        'c{_h*)>GLgED?{!>k!)BZ+%}-sQIa2<R]x=akAniZnm5Ye5]=&0,8,ob?#7OB+|5');
define('AUTH_SALT',        'L+lTP4.wfX=BM1!<Y,Vs/#Rh=f(5==.i:hlQ+[Q#;kPj.Zt[x-}r=OMwegg(W@-$');
define('SECURE_AUTH_SALT', '7*&~.h[<.ioBqTZ]N=(*7];&,%5]do~gnj9G+aTn><_R ++(:f03u*swKL@z_5Fo');
define('LOGGED_IN_SALT',   '@[vL2K5T8&q/G.yFhTO:Wp|^GG=t+:<+;Q+Ww?8$gJkp^cY9#yoX 3~XY|-SsV}h');
define('NONCE_SALT',       'S@BcALQ@E[L$Ekv2_Al,^R:-TAcX5bye6GN->eRlho7)fA4Rj`^fmo^%h+dR:.0a');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ifa_';

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
