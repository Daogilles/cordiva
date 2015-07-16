<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur 
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'cordiva');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'yourpasswordhere');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'jpKe+F^fH%s+{WnCv7Jd[<&z`{<K<-(+yn)h+f[&3WGl|Hfa~A{FF8+2Zlxmf,L-');
define('SECURE_AUTH_KEY',  '0 F;16jDw2%hWNp4i+~&M8t2_+k(Q5Mv7WWK79HaP5ym|P sQ4zocrR}3?piW+Ot');
define('LOGGED_IN_KEY',    'QThxQLY<p@D{QIXy)xkJ%_<8+xdYy_bp:[l?K1Q$|V$zR1[>m]CpLI-Hh4bi+e?h');
define('NONCE_KEY',        'njGH_%+iI6j+/Epv)%f*?F>$b!h88M_n,0pT|J:-To!9$v&^aF-|0(p#dsNBjMtu');
define('AUTH_SALT',        '65?0-<Ou5jJN;#.7hl>/Z5:8kp9U/*.FQ]I/I,o;vkFpQ,4x^#V;zf[}]+uuU/p?');
define('SECURE_AUTH_SALT', 'B=dWjsGhi=Huc{0<i|2)-j-4OyY$I.=vit>HX07 /_mFngK%>+,De`r]RWay,t/*');
define('LOGGED_IN_SALT',   'Snp-l4:VH?zK/gRkH~?ZXmU6t@[JV-i@1V{@+![J(V6%s9,QXc+V`46`~/=.}n`A');
define('NONCE_SALT',       'zN^8hPW3X!Npj0eSKUK5r)ZIeY-gzCc5$;g6jtY}fVE75S?HKu::<h,gI8aT,-Ke');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'cdv_';

/** 
 * Pour les développeurs : le mode deboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 */ 
define('WP_DEBUG', true); 

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');