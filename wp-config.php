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

define( 'DB_NAME', "wp_ecommerce" );


/** MySQL database username */

define( 'DB_USER', "root" );


/** MySQL database password */

define( 'DB_PASSWORD', "" );


/** MySQL hostname */

define( 'DB_HOST', "localhost" );


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

define( 'AUTH_KEY',         ']2>9o_UIRQ)oX f!z7n/D,@l6]b!|kFpTBGy&n_9[~;E95_V`mUF6*,tV+z`LWlp' );

define( 'SECURE_AUTH_KEY',  '@BLmwfwHu;|a/,+): [$8xZ,T#DHyEUcc$E)4A<Gd s1$0YI)Mw~WKtqS@(VkCv1' );

define( 'LOGGED_IN_KEY',    'E2i`%#{Gq#Z]k2#D3SBX/|v:%TTB^`5[vfo1_GQv,`K;y]$STYTao$<D@Th1EL6p' );

define( 'NONCE_KEY',        'w7g7N3-oYf.*YaflQ;m{#*ZqMyyz,v|%OVLSD0[DO!Hh+MUJ?<n/O=d_c+:DB9+d' );

define( 'AUTH_SALT',        'm9+z)/_~cZs8{#[+C&4C=Ey/;1Jeua7BFqnNWU*tBL_0dzojJh2E^v/uR8<`I<`}' );

define( 'SECURE_AUTH_SALT', 'r`7fJ^/=i.x{60Bj|3?3+Lsdd&*r]Q{P&9x$Rw1 ^&7BF@_O@sj58.-BF6~j@k$k' );

define( 'LOGGED_IN_SALT',   'YhQ&F19QsD|E%wDowzEV8p/x^RBOhTz:+#V:i$UB#|d~Ed<#D_Dj.56Tue`Or/Sr' );

define( 'NONCE_SALT',       '>3W3B1o}ma@:9MlN.LXh!j4heX+#YAfn=]@y3kxF6rGdnm6^(X&PX:gdG1E$o&W3' );


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

