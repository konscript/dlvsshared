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
define('AUTH_KEY',         '2UCK`ZX_bV~uiE>)6VJ;0PT}@8<g_%rvEMM?>M]-zX?*~my4V$vo89Em?|E7JTDa');
define('SECURE_AUTH_KEY',  'w%aqy=$-60Eb9NU)lhnISS<WHK{e:e-vfl(b[;8WjD[[Hj0}|eN}==}C=d/*?-wf');
define('LOGGED_IN_KEY',    '-zea*n{U>(?HLyg8Dzs<v2WNE#Yj67*-anG,Q]>?>Bn.?SPkQ{?SJk7%IrCNr=m+');
define('NONCE_KEY',        'P+q8 VE9Z}S|l]}@94k6A[~|+}V8Fpcnfh|{^HS Q^GDV$sKmtaaXh;:K~Xw>RLF');
define('AUTH_SALT',        'Mk;{$j*YEt6 Yz|!B!-*2Cz|e&: (oDS.Y5Dx:[I+$D!`f|T:%8,Ux-7J7~PbFsV');
define('SECURE_AUTH_SALT', '%n.9d-%_s,yd^YNmy|6tYn:{*mhF!ryRbcX//zp?{.itL)mT}oN^pQCg==@SDEdm');
define('LOGGED_IN_SALT',   '8cmyQ-uS5%gz^M.1f!~0Kgcl,ui>]OYlP{S+P4]SFUI`az:<dd|pEt9L5z|7P|[8');
define('NONCE_SALT',       't=qesfs*qM;53?-@4IFM.GHu|$Q>FN!R9*RQ:K;cPS-aN;d>6Tx:Dkk)I|LVV@oL');

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
