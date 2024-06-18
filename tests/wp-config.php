<?php

/* Path to the WordPress codebase you'd like to test. Add a forward slash in the end. */
define('ABSPATH', dirname(dirname(__FILE__)) . '/wordpress/');

/*
 * Path to the theme to test with.
 *
 * The 'default' theme is symlinked from test/phpunit/data/themedir1/default into
 * the themes directory of the WordPress installation defined above.
 */
define('WP_DEFAULT_THEME', 'default');

// Test with multisite enabled.
// Alternatively, use the tests/phpunit/multisite.xml configuration file.
// define( 'WP_TESTS_MULTISITE', true );

// Force known bugs to be run.
// Tests with an associated Trac ticket that is still open are normally skipped.
// define( 'WP_TESTS_FORCE_KNOWN_BUGS', true );

// Test with WordPress debug mode (default).
define('WP_DEBUG', true);

// ** MySQL settings ** //

// This configuration file will be used by the copy of WordPress being tested.
// wordpress/wp-config.php will be ignored.

// WARNING WARNING WARNING!
// These tests will DROP ALL TABLES in the database with the prefix named below.
// DO NOT use a production database or one that is shared with something else.

define('DB_NAME', getenv('WP_DB_NAME') ?: 'wordpress_test');
define('DB_USER', getenv('WP_DB_USER') ?: 'root');
define('DB_PASSWORD', getenv('WP_DB_PASS') ?: 'root');
define('DB_HOST', getenv('WP_DB_HOST') ?: 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 */
define('AUTH_KEY',         'OouZCCjyLf7LA7|-t=*o#F)k?R_sCVoY@JZNknf}k)GScd-`HZX|KdRcUr!fwjE`');
define('SECURE_AUTH_KEY',  'l5Xd:,F4{Q:+Mvy4/]=3`3=<)zpD[!Q-|.-n(lSJMbbn{y~M|)&I}erF5]P>d=CB');
define('LOGGED_IN_KEY',    'ENzz:gxOf@h8rcLbCVmG?B<Gmnu}|>^!t.,-a(1)|E:-@3sF{.<hESwzxx<7I>){');
define('NONCE_KEY',        'iASy9g-c62:)(X8{Ld2CsC@Wg)/?=~-V(M(8d9djAt9{yaO0KB- 9WI-^.Y5y!L+');
define('AUTH_SALT',        'wtx/Jq~UK_xt`v=Q<|-ZkC])0K:WAH(tG/;.UhBldtFwajLqcYsz43{Z[>iW<c3x');
define('SECURE_AUTH_SALT', 'DfE:.(t:H)+X%QsB|a>$a0#HL6;XJ;*mCPD~N6/<dLSLb3Nrnnh=sY}K9sE|Sq%z');
define('LOGGED_IN_SALT',   ' &Wayu7>D~|rQGAEf9,VQaxSYri:Jr8d@l-~lTx)TD>-_czgm(%Be+n]KtIqy-6K');
define('NONCE_SALT',       '|D;XUOhEJ/FsQJjwF6}S[.Di=`TksKSYVfsR`B@=gI^0):|n`q.G>u-g|8T:]WA9');

$table_prefix = 'tests_';   // Only numbers, letters, and underscores please!

define('WP_TESTS_DOMAIN', 'example.org');
define('WP_TESTS_EMAIL', 'admin@example.org');
define('WP_TESTS_TITLE', 'Test Blog');

define('WP_PHP_BINARY', 'php');

define('WPLANG', '');
