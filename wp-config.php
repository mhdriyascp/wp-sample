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
define( 'DB_NAME', 'wp_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'toor' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost:2525' );

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
define( 'AUTH_KEY',         '[)B]BSP+u|!oP^C%vP)+5!eiT/nmxujzSX`5(XEG_-]6)Gp^9:2?&:d$E!HlE5iH' );
define( 'SECURE_AUTH_KEY',  'YamPNq:MoSS/$&lV!N;!s6Q!mk?A=D&kw%>U*L]TaU)f*{u(aqI6Z*8T@iIjPY#j' );
define( 'LOGGED_IN_KEY',    'n}`{:I?3un9 -`{OC?2)wbV(Qk4B(c}`#uQDUd :z1%_`i35:Aa4n`I6]HAfy<U9' );
define( 'NONCE_KEY',        '$,;3{X@DkReuktYth!$QQ<noTF5B{K<Xh)4_-Z2(bQoW.=nF_ 6C$8!-GbGP;m^H' );
define( 'AUTH_SALT',        '0#b!w(=$UZ!v1 hzQ:4]fA-7z*q]h7&|N%b#qyKk}kTFhI.$w%Y(fx.WaqR]d9+f' );
define( 'SECURE_AUTH_SALT', 'BIw*H{-S2*TLu/lk9@?#3=sqPm4U[Mqn9/,|@UHZ];[Fam&;]>3iD]krJW6jn+U{' );
define( 'LOGGED_IN_SALT',   '`wPc9jn:)fr:KzWFe;P9ATRX8IBR{x`_RJm}T*XO0rlqSKC+@~Ro6%#0FX&)92B/' );
define( 'NONCE_SALT',       '9|Q/ ms_q};[4OoBn>.FYUx6A5~e@e5.Ld#[^_UB5XVQD7`i9ZaiF|t+Ngz{pQ}X' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
