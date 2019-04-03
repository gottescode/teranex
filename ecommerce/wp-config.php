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
define('FS_METHOD', 'direct');

define('DB_NAME', 'beta_teranex');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'vinove');

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
define('AUTH_KEY',         'BNE[)Q/@f<;X}PmKS7yGT|AziiGw.(2eUBG0(w:SvD<F#mIZ&,Dt36i3B~8GX;40');
define('SECURE_AUTH_KEY',  'a#<jz6AVJx5mGNp]y#D:ivG{pcC5JZ!~<AP$2}{v3S|;kS.g{c~u`tUXnk<m}>v|');
define('LOGGED_IN_KEY',    'O&MgR-=hCE;.v6.Gi6>f/jQLbnh~<bE7H&|]ca2`}N|[3izI$`%ne/ol4Z 4qMnd');
define('NONCE_KEY',        'UNq@S1fl|31O`Su%n3AX{7[~zymaIL^A($#ib/;0N)$FKjlNxA}CqcaJgzLq/nMq');
define('AUTH_SALT',        'DC0podxny==3=vS4Eyuh%>!r;0hz>l(Mt/bh6ODqj}tICJ;1&Hh5|=N[4ScMQTLj');
define('SECURE_AUTH_SALT', '.4CmYQ=6[fna7^M{JWvq^pI@>Ehsp3(u&fenJfmJC!l$p ~QlM:J?7+Ojva%drY[');
define('LOGGED_IN_SALT',   '=Xsx,ZpTbT$BJbUDAeTe=-K|XQTllx[:a5Oe-3Ldp!l$#g31TQO<*}~JNTWKtw?O');
define('NONCE_SALT',       '}3c6MO8RPVdu:O!N>3&@Hq?Dd(<B{O/lN`ltrn?hg~d[YI!6@m^la%A}8b:#u..Z');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ecommerce_';
define( 'FS_METHOD', 'direct' );
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
//define('WP_DEBUG', true);
define('WP_MEMORY_LIMIT', '256M');
//define( 'WP_DEBUG_LOG', true );
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
