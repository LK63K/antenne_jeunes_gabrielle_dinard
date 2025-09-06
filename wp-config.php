<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'antenne_jeunes' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '|h483|SK#I}4oHP8sxof(FRctRLnvq(+K*rE!QClnDRFsq7 hU*H|{s~pJS-6TW>' );
define( 'SECURE_AUTH_KEY',  '(% 6 saAA+/i0b)|Aap.f1@!G{)vda$D)Zb+)8D+Lxc>HnH,M+SNPVEx`D+e?)@-' );
define( 'LOGGED_IN_KEY',    'gl}ScV!:*0u8O(;O1C7fT5.K!OpMtjgc| ,L^-T3+*h9%n[2x<v(,gieaqyHVc]h' );
define( 'NONCE_KEY',        '}=@9T=}+^wNQrI_KQO5~#!fg#xkNp8*:^Y9Ks)cUex:dw*Jp%ktgsZTU3=kW6{H~' );
define( 'AUTH_SALT',        '8=aGx{!C]6_f&}4DDFa{TImbCxxGu7]n@iQ6;McT8z{AS>8H}N_rU~#WTDXZE,V6' );
define( 'SECURE_AUTH_SALT', '>LJ=}xbg6kc;XpQzIJ:CBBOXC,<Wf22}@ soQ YZRX=wxo2,Nanl]+zhzn[5J|]M' );
define( 'LOGGED_IN_SALT',   '55oie;<MSb^ex&N%{bi G0K(B+>glc _B;#bJa3sR#wgS<2&(yD>O7ieJHBFwCI$' );
define( 'NONCE_SALT',       '*d9%(xMy^B$!)goGm2KB.pNqeKVC$0:3^+I{AFy&)QX%L!tC6az>iEvlr/sh9&$:' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
