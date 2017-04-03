<?php
/**
 * Grundeinstellungen für WordPress
 *
 * Zu diesen Einstellungen gehören:
 *
 * * MySQL-Zugangsdaten,
 * * Tabellenpräfix,
 * * Sicherheitsschlüssel
 * * und ABSPATH.
 *
 * Mehr Informationen zur wp-config.php gibt es auf der
 * {@link https://codex.wordpress.org/Editing_wp-config.php wp-config.php editieren}
 * Seite im Codex. Die Zugangsdaten für die MySQL-Datenbank
 * bekommst du von deinem Webhoster.
 *
 * Diese Datei wird zur Erstellung der wp-config.php verwendet.
 * Du musst aber dafür nicht das Installationsskript verwenden.
 * Stattdessen kannst du auch diese Datei als wp-config.php mit
 * deinen Zugangsdaten für die Datenbank abspeichern.
 *
 * @package WordPress
 */

/** Der absolute Pfad zum WordPress-Verzeichnis. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

require_once ABSPATH . 'vendor/autoload.php';

define( 'WP_AUTO_UPDATE_CORE', 'minor' );

//include_once("geoip.php");

A365\Wordpress\Environment::getInstance();
A365\Wordpress\Cache\Fpc::output();


// ** MySQL-Einstellungen ** //
/**   Diese Zugangsdaten bekommst du von deinem Webhoster. **/

/**
 * Ersetze datenbankname_hier_einfuegen
 * mit dem Namen der Datenbank, die du verwenden möchtest.
 */
define('DB_NAME', getenv('DB_NAME'));

/** MySQL database username */
define('DB_USER', getenv('DB_USER'));

/** MySQL database password */
define('DB_PASSWORD', getenv('DB_PASSWORD'));

/** MySQL hostname */
define('DB_HOST', getenv('DB_HOST'));

/**
 * Der Datenbankzeichensatz, der beim Erstellen der
 * Datenbanktabellen verwendet werden soll
 */
define('DB_CHARSET', 'utf8mb4');

/**
 * Der Collate-Type sollte nicht geändert werden.
 */
define('DB_COLLATE', '');

/**#@+
 * Sicherheitsschlüssel
 *
 * Ändere jeden untenstehenden Platzhaltertext in eine beliebige,
 * möglichst einmalig genutzte Zeichenkette.
 * Auf der Seite {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * kannst du dir alle Schlüssel generieren lassen.
 * Du kannst die Schlüssel jederzeit wieder ändern, alle angemeldeten
 * Benutzer müssen sich danach erneut anmelden.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'HtEVK;>gB*QB8-t>EN-vliG%:ou|h?tVyKQu_<F2nE;bMEoW_XdD8O-(:S~Bp)`#');
define('SECURE_AUTH_KEY',  '51)$m.:`w6U5qWSQ,u/.U*o0Xs;z4n;$*!_G<JA3bA2fa=TMq}V;a|z,24]stb 9');
define('LOGGED_IN_KEY',    'tpQGPz]83jSCnnVXiQzd5]CEGm(_%|~fzKBilb~Cq(>a,]5&U~1TL;PY6C0;S,8i');
define('NONCE_KEY',        '!yBj`%k39k6g>1j:AnI{2>VPL6bIxcO,VmRg dh=n|.Tatwn2=&:nS_22!H}}O/=');
define('AUTH_SALT',        'A+=x;<Y|7ikDO{9z^>?w200 TP5@RGxG-P&?xo,ng?b%xRxB$:i5}2=<T[=-u%2B');
define('SECURE_AUTH_SALT', '>x=Eq{db]N,`#lJD17R(5J#Zo,<{248T./2ocVLE>b0uC{y|s+Z<Q>uqaM{X,:58');
define('LOGGED_IN_SALT',   '|Xm.=sWw#3[y?2k)[9u{+#_4v%Pnb;JnDF2*~t0!20)59l?g+B_1)dsc8kQ@^V{B');
define('NONCE_SALT',       'FT6p#e+GXN%&lYK?^jqB#EAy$i[7.bRGSwsyY.R jA@jJC<q?&S<a}@AG:JR]K<u');

/**#@-*/

/**
 * WordPress Datenbanktabellen-Präfix
 *
 * Wenn du verschiedene Präfixe benutzt, kannst du innerhalb einer Datenbank
 * verschiedene WordPress-Installationen betreiben.
 * Bitte verwende nur Zahlen, Buchstaben und Unterstriche!
 */
$table_prefix  = 'wp_';

/**
 * Für Entwickler: Der WordPress-Debug-Modus.
 *
 * Setze den Wert auf „true“, um bei der Entwicklung Warnungen und Fehler-Meldungen angezeigt zu bekommen.
 * Plugin- und Theme-Entwicklern wird nachdrücklich empfohlen, WP_DEBUG
 * in ihrer Entwicklungsumgebung zu verwenden.
 *
 * Besuche den Codex, um mehr Informationen über andere Konstanten zu finden,
 * die zum Debuggen genutzt werden können.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Das war’s, Schluss mit dem Bearbeiten! Viel Spaß beim Bloggen. */
/* That's all, stop editing! Happy blogging. */



/** Definiert WordPress-Variablen und fügt Dateien ein.  */
require_once(ABSPATH . 'wp-settings.php');
