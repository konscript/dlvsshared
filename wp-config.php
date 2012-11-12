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
define('DB_NAME', getenv('MYSQL_DB_NAME'));

/** MySQL database username */
define('DB_USER', getenv('MYSQL_USERNAME'));

/** MySQL database password */
define('DB_PASSWORD', getenv('MYSQL_PASSWORD'));

/** MySQL hostname */
define('DB_HOST', getenv('MYSQL_DB_HOST'));

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** --- PHP Fog --- Set WordPress to cache requests (for Varnish) */
define('WP_CACHE', true);

/** --- PHP Fog --- Patch a few issues with file saves, plugins, etc. */
define('FS_METHOD', 'direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'F9o&Fr RlmwE`oW2x)czubZ;r7hBA,:?[P+|gGT6VsMveA6>Esqn~vgJE[=n+Q%[');
define('SECURE_AUTH_KEY',  'Y-nKZbs!TSx;HWtJ);hA0mIv/32[-h^0C+:Z=r+*E!g;$pDur8-EY `,;E1;U[pM');
define('LOGGED_IN_KEY',    ';+^G(n|5&S[o@]0l$R0zX+6XC-*FRcJ-7OB=[+]//-fI;L9,:IOIdAiqt^Ak,44)');
define('NONCE_KEY',        'I5^zT|+1B5FZ2Lln3xk&VLxwI=#F?MI7#a#j/5}+.-K-bim)bC|xg=.%Xz|^PXF#');
define('AUTH_SALT',        '?%my 118-Qp#8SV@-yg4w7>`VFu6Ss1Ym.xZ7=0Zz]h1a0<s:4:SjN UMtf,[Taf');
define('SECURE_AUTH_SALT', 's,2z<eesb)`T+aS;T=m;I~2Y*g64>cMs(9Hk0vWPK/td(ZJ_G-@qJG5P#;c!<|l/');
define('LOGGED_IN_SALT',   '^dX{: ap%kmA1Y/*sF}0dk]6%0dwzvhl:aERN5kH^xJJA~btn#*BSg7]! :+OH~d');
define('NONCE_SALT',       '@+xlA_z4&mDO4}2%qCWnuh+6 T$S ^UB~R6ds.MH@dmkN}{8a2KpIJ1F4J95{7M7');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
