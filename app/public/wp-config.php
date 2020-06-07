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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'pEm0Mj7olvURmd54W1tsuh+cm6DjsHm0HW4NzfVlnKNEYj4W4J/f0UjeXWOGd7pJDF59/0h2IvlzfMO5muuTZQ==');
define('SECURE_AUTH_KEY',  'SqN22sr+q9XFln8OucKczKHNXiGTUZTWSs6VBGsr1+9PBwrH+TIZf83xFP3n47AJdvzDE0o09RfbOhlxMVQt3Q==');
define('LOGGED_IN_KEY',    'nF1ulkS5nCBVvXRJDEfucnXpWKtjz68pXD84BpoZ9mIN8r0Rk6+Ovybo2QvJc6S9qg0D6t673YlZD1GPQ1QLGg==');
define('NONCE_KEY',        'pi8R7ZRiTZE6S3DabPzJZUfvjslJ+w0+lt3B7h3l9cqUBpmao3S+z5cLOevywYM0QNHz9x3xo8YKY01FsHx0Ug==');
define('AUTH_SALT',        'XQcslzRxckAdUmz1YRgqQBJwpRsd2E/3kPhNnfItbrk/Ql0pYr2VQdpRBr2M5tJF2dwiXRWJN48DBx4+TGEhoA==');
define('SECURE_AUTH_SALT', 'oygw0j3ilOqU7M5ENOBqE9wJETbRS+3tSoB6qkAoUfpczroKCerh9fgXuv4rvqls1RgNW4671eqZqC0++BI74g==');
define('LOGGED_IN_SALT',   'cJExiBNWj/eOEpM/7IFEhghO2+dgrKt1SznNUHBHepFAKcaqZgiw/yVhc9TqQK5tBCUSkI0UzaD8Pv+giq4I8Q==');
define('NONCE_SALT',       'WxyVVY0V7HeDWMfB5/Ve+74guP+/v04muavOtVdMjj8bvlRQ4P42RzKu+W52Uu7m5ITVlyEXJ/U0sWsmh6eg0A==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

define('WP_DEBUG',true);
