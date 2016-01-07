<?php
/**
 * This class contains the definitions of all the functions used for tokenizing the input
 */
class UltimateCleanerTokenizer {

	public function normalize( $text ) {
		$text = strip_tags( $text ); // strips the HTML tags like <br /> and <nowiki>

		// remove the special characters which hold significance in wiki formatting
		$specialChars = array( "'", "\"", '=', '--', '*', '|' );
		$text = str_replace( $specialChars, '', $text );

		// remove the [[]] types of text
		$pattern = "/\[\[.*?\]\]|{{.*?}}/";
		$text = preg_replace( $pattern, '', $text );

		// remove links
		$pattern = "/\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|$!:,.;]*[A-Z0-9+&@#\/%=~_|$]/i";
		$text = preg_replace( $pattern, '', $text );

		// remove the other special characters
		$specialChars = array( '[', ']', '{', '}', ':', '/', ';', '?', '-', '$', "\\" );
		$text = str_replace( $specialChars, '', $text );

		if ( class_exists( 'Sanitizer' ) ) {
			if ( method_exists( 'Sanitizer', 'decodeCharReferencesAndNormalize' ) ) {
				$text = Sanitizer::decodeCharReferencesAndNormalize( $text );
			}
		}

		return $text;
	}

	public function tokenize( $text = null ) {
		static $tok = true;

		$delimiters = " \n\t\r,.";

		if ( $tok == false ) {
			return null;
		} elseif ( $text ) {
			$tok = strtok( $text, $delimiters );
		} else {
			$tok = strtok( $delimiters );
		}

		return $tok;
	}

}