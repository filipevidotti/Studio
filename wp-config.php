<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'agenciagpweb17');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'agenciagpweb17');
define ('WPLANG', 'pt_BR');
/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'filipe1');

/** nome do host do MySQL */
define('DB_HOST', 'mysql.agenciagpweb.com.br');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'CB8r%-)`^9|v/Fn,>#f-)yJ+$|#sm%q%Zo~rBZTiL-Og+pQ.8]+z%B5Bd}|iL09]');
define('SECURE_AUTH_KEY',  '`B&GxYF}r({SWk,J8c[rQG<j~C9Gbucr~g9~;< yu$vE|p!/1el)8oZ,mb Y3|Y_');
define('LOGGED_IN_KEY',    '1M<;U*9O,])J{>^wPzxunvp:9UtKi-RsI9I/zD$+#msW9k%QXHbD_Ih(H|U^0/{A');
define('NONCE_KEY',        'OLW.Qx(m|%lrv0c%sl*$*=+dt>r#T^a3+6hA24$[{4a-93N;b8SO%[*q5Ux^v4~.');
define('AUTH_SALT',        '!<k MDp!},Y%({:.p#5Z:6@Uh6SDek, !uf.b|BM;`4js/iIW@W[?I $_R/z1v,g');
define('SECURE_AUTH_SALT', 'Yyr@]M.+S}EVo~aYa|{(|@Rqunr6Ul@g-A`4^d,?%-gEbz|=U<+m1E?eO-}w?2.P');
define('LOGGED_IN_SALT',   'vfi_QCV2xiAE2bkHyJ0~o2RTxV5<1e4&ajl,z3)}i5D&gmImNEL#weZi~Sot_>A,');
define('NONCE_SALT',       'CeD*~odK{~6Z?-0)=T *LCq=[L(zc%| 4(6 EeK$3-QrX>d+C9+B%[=-+5zo~=*.');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';


/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
