<?php

/**
 * Return the html selected attribute if stringified $value is found in array of stringified $options
 * or if stringified $value is the same as scalar stringified $options.
 *
 * @param string|int       $value   Value to find within options.
 * @param string|int|array $options Options to go through when looking for value.
 * @return string
 */
function xtfw_selected( $value, $options ) {
	if ( is_array( $options ) ) {
		$options = array_map( 'strval', $options );
		return selected( in_array( (string) $value, $options, true ), true, false );
	}

	return selected( $value, $options, false );
}

/**
 * Display a WooCommerce help tip.
 *
 * @since  2.5.0
 *
 * @param  string $tip        Help tip text.
 * @param  bool   $allow_html Allow sanitized HTML if true or escape.
 * @return string
 */
function xtfw_help_tip( $tip, $allow_html = false ) {

	if ( $allow_html ) {
		$tip = xtfw_sanitize_tooltip( $tip );
	} else {
		$tip = esc_attr( $tip );
	}

	return '<span class="xtfw-help-tip" data-tip="' . $tip . '"></span>';
}

/**
 * Display a changelog from a readme file
 *
 * @since  1.3.7
 *
 * @param  string $readme_file  readme file path
 * @return string changelog html
 */
function xtfw_changelog_html($readme_file) {

	require_once XTFW_DIR_INCLUDES . '/class-parsedown.php';

	$parsedown = new XT_Framework_Parsedown();

	$changelog = '';

	$data = file_get_contents( $readme_file );

	if ( ! empty( $data ) ) {
		$data = explode( '== Changelog ==', $data );
		if ( ! empty( $data[1] ) ) {

			$changelog = $data[1];
			$changelog = preg_replace(
				array(
					'/\[\/\/\]\: \# fs_.+?_only_begin/',
					'/\[\/\/\]\: \# fs_.+?_only_end/',
				),
				'',
				$changelog
			);

			$changelog = $parsedown->text( $changelog );

			$changelog = preg_replace(
				array(
					'/\<strong\>(.+?)\<\/strong>\:(.+?)\n/i',
					'/\<p\>/',
					'/\<\/p\>/'
				),
				array(
					'<span class="update-type $1">$1</span><span class="update-txt">$2</span>',
					'',
					''
				),
				$changelog
			);

		}
	}

	return '<div class="xtfw-changelog">' . wp_kses( $changelog, wp_kses_allowed_html( 'post' ) ) . '</div>';
}