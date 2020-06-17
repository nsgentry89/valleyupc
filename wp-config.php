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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_valleyupc' );

/** MySQL database username */
define( 'DB_USER', 'valleyupc' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Va11eyUPC7*' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '`*Ixi~ERZ<dHc]TldJwGpBHj7p7X;uu8h$PLU^ehm4e#x9sK5#i>e/+]mg;ycqw9' );
define( 'SECURE_AUTH_KEY',  '#(/~_B:;w [Bkp<!^tO%bD?]H%K30I{/C7a2|@X~Yvw}24A`i4+QE}6%8AVjZt<V' );
define( 'LOGGED_IN_KEY',    '=mB7-iL!Q Z<MtGlWoTVsbYM{$tX[w_2#DA,J7u}2 5|%xI8[iR-G:D64Dq$J2?b' );
define( 'NONCE_KEY',        'H/b=#r4Fyx]?]$*2f|T5tN$@[-Yd2<}EOV`Z{9xK!=Y4:zT8R$n2A.90pV<3l5,%' );
define( 'AUTH_SALT',        '-XkZvrO7@}hX9P2Z|:Yz[/8N@jo}.Y}U`-@X/~xzEws?NQm5=?[B0,jRqJBzHQZ_' );
define( 'SECURE_AUTH_SALT', 'h[/2}>kv^F<r&xcaUt4 nwkF7B%Spbidbw)X03w=X0[<mP^[,*nm3G$jdAW@^_>c' );
define( 'LOGGED_IN_SALT',   'X$.6p;4<`3MG&o{YuZ}}a<I,>#UdI<5E5CA9O*cH48YHcu%?ONvR5CF9e|!EnvZF' );
define( 'NONCE_SALT',       '3Mt!j_/Jl,m*zy!Am&GoG#&a}B[ujhdag~=o@OdNTV4a4! L;5uk@).*`?o}K(uB' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

