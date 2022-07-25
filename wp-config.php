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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'n:guA=gHef9m@tD<Up%Y;1bx (u^LDm(l+81cNT.,,%.JYPOexUFb_j fApsAVw8' );
define( 'SECURE_AUTH_KEY',  'W?/b07-1s;/@z4x,{,XgN :a;~KHM;]I(l`01x?r(.s@7<G|I[iLDgv%8h0UIuwM' );
define( 'LOGGED_IN_KEY',    'SWiMH,B{!iDKPhC-|48G @G8h`(+j`u]~1rc4CZ8{wy9PPncW?I)]9pKWazm=8**' );
define( 'NONCE_KEY',        'x)bIqX+Uk=eEH84,fg?dk!xEg!W]^Sd-O}+[+565=g*e9Fv4#;y*ky ~V^B*mCY|' );
define( 'AUTH_SALT',        'a3/eF/EPS[Ei1VRU3G}%0PRU;;n23+;Vdf}ne0=z;1<|5p~ X&o0BcBQx2LhLWBd' );
define( 'SECURE_AUTH_SALT', 'W!3gYH_D/+#>1jbG8Y]>/~;hlz:^D4 d OE-wY8)Li:xXg(@g|f! 5`HU)d<;WZl' );
define( 'LOGGED_IN_SALT',   '7_:G30>BgY/I_MJsYB[uEr_W7J~H&Kgha?bS]6@i8mjrNN*Z~E[yRK9OR:N>.6c/' );
define( 'NONCE_SALT',       'va@}8#4xQH0UVR;)=V%-$W]f||+s&Dky1gLm6L[@y*b:(kBj.c=H.(Q)~foX<5fb' );

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
