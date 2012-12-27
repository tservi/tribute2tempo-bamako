<?php
/**
 * @package tribute_2_tempo-bamako
 * @version 0.0.1
 */
/*
Plugin Name: Tribute to tempo-bamako.ch
Plugin URI: http://code.google.com/p/tribute2tempo-bamako/
Description: This is just a plugin, inspired by Hello Dolly
Author: Jean Tinguely Awais
Version: 0.0.1
Author URI: http://www.t-servi.com
*/

function humanite_indivisible_get_lyric() {
	/** These are the lyrics 		 */
	$lyrics = "Tous les humains sur la terre
Sont nés d'une même mère
Nous sommes tous les enfants de la vie
De la naissance jusqu'à  l'agonie.
Ne parlons pas de la mort
On en causera au cimetière
Partageons sans remords
Et soyons en fiers
Nous avons tous nos rèves
Nous avons tous nos vies
De nos rôles faisons la grève
Pour qu'il y ait une vie après notre vie";

	// Here we split it into lines
	$lyrics = explode("\n", $lyrics);

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand(0, count($lyrics) - 1) ] );
}

// This just echoes the chosen line, we'll position it later
function humanite_indivisible() {
	$chosen = humanite_indivisible_get_lyric();
	echo "<p id='humanite_indivisible'><a href='http://http://www.tempo-bamako.ch/wordpress/?p=1305'>$chosen</a></p>";
}

// Now we set that function up to execute when the admin_footer action is called
add_action('admin_footer', 'humanite_indivisible');

// We need some CSS to position the paragraph
function humanite_indivisible_css() {
	// This makes sure that the posinioning is also good for right-to-left languages
	$x = ( is_rtl() ) ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#humanite_indivisible {
		position: absolute;
		top: 4.5em;
		margin: 0;
		padding: 0;
		$x: 215px;
		font-size: 11px;
	}
	#humanite_indivisible a { color: black; text-decoration: none;}
	#humanite_indivisible a:hover { text-decoration: underline;}
	</style>
	";
}

add_action('admin_head', 'humanite_indivisible_css');

?>