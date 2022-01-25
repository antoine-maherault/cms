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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'antoine-maherault_wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wordpress' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost:3306' );

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
define( 'AUTH_KEY',         'M_J$,{5o,FHcC@l*dXeVXL)jSCoi,T 8h RBPMbQ@,`|vI[}k=M3 pu|(A[NDbbH' );
define( 'SECURE_AUTH_KEY',  '5REP?*&@8 bJ^JcgD90^i0uN6[KYQ$,`aU3aov_W9z8+5pybYPnB(zMv)8<`Z3pV' );
define( 'LOGGED_IN_KEY',    'MJ;TU|&<b0N`Xd~$$<`Y,^`tUv[SMzQH0T)-@J}eyjhVUg@)??(?`BejQt{{j0EH' );
define( 'NONCE_KEY',        '~WDV>SqM@5WmZL1{a,/68z`l21[]}BIUmo9#FsEy5]Ap:ZfRvt^~~~a2p~$~G?oZ' );
define( 'AUTH_SALT',        'D#2Fh+`O9dSVVzL<>2p<_f*W=Fe1}M]40;R8/vOOU[ZV]QG:l.=qjl7R9X?:9,Ev' );
define( 'SECURE_AUTH_SALT', 'BGF;b[--x<^G1Fm#d)boCb1&Fd M|]g}cAeT%xk{gb|qoFj#2[#[5DKmO&;{m`dp' );
define( 'LOGGED_IN_SALT',   'UjzjO.I_Tiw=6XV#[Jaw]5[E#{]W%Vp`^l3U7#eX$-6O,pmc#^Y+95$H4d3TTFTp' );
define( 'NONCE_SALT',       ':?%0XWJta!MC8|ZQIeaNPDnow.aZ-p%N> >yESE[Uwe!2 h1.h!p^X]h#)XJ}/4}' );

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
