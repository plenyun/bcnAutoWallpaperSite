<?php
/**
** A base module for [acceptance]
**/

/* Shortcode handler */

wpcf7_add_shortcode( 'acceptance', 'wpcf7_acceptance_shortcode_handler', true );

function wpcf7_acceptance_shortcode_handler( $tag ) {
	global $wpcf7_contact_form;

	if ( ! is_array( $tag ) )
		return '';

	$type = $tag['type'];
	$name = $tag['name'];
	$options = (array) $tag['options'];
	$values = (array) $tag['values'];

	if ( empty( $name ) )
		return '';

	$atts = '';
	$id_att = '';
	$class_att = '';

	$class_att .= ' wpcf7-acceptance';

	foreach ( $options as $option ) {
		if ( preg_match( '%^id:([-0-9a-zA-Z_]+)$%', $option, $matches ) ) {
			$id_att = $matches[1];

		} elseif ( preg_match( '%^class:([-0-9a-zA-Z_]+)$%', $option, $matches ) ) {
			$class_att .= ' ' . $matches[1];

		} elseif ( 'invert' == $option ) {
			$class_att .= ' wpcf7-invert';
		}
	}

	if ( $id_att )
		$atts .= ' id="' . trim( $id_att ) . '"';

	if ( $class_att )
		$atts .= ' class="' . trim( $class_att ) . '"';

	$default_on = (bool) preg_grep( '/^default:on$/i', $options );

	if ( WPCF7_LOAD_JS )
		$onclick = ' onclick="wpcf7ToggleSubmit(this.form);"';

	$checked = $default_on ? ' checked="checked"' : '';

	$html = '<input type="checkbox" name="' . $name . '" value="1"' . $atts . $onclick . $checked . ' />';

	return $html;
}


/* Acceptance filter */

add_filter( 'wpcf7_acceptance', 'wpcf7_acceptance_filter' );

function wpcf7_acceptance_filter( $accepted ) {
	global $wpcf7_contact_form;

	$fes = $wpcf7_contact_form->form_scan_shortcode( array( 'type' => 'acceptance' ) );

	foreach ( $fes as $fe ) {
		$name = $fe['name'];
		$options = (array) $fe['options'];

		if ( empty( $name ) )
			continue;

		$value = $_POST[$name] ? 1 : 0;

		$invert = (bool) preg_grep( '%^invert$%', $options );

		if ( $invert && $value || ! $invert && ! $value )
			$accepted = false;
	}

	return $accepted;
}


/* Tag generator */

add_action( 'admin_init', 'wpcf7_add_tag_generator_acceptance', 35 );

function wpcf7_add_tag_generator_acceptance() {
	wpcf7_add_tag_generator( 'acceptance', __( 'Acceptance', 'wpcf7' ),
		'wpcf7-tg-pane-acceptance', 'wpcf7_tg_pane_acceptance' );
}

function wpcf7_tg_pane_acceptance( &$contact_form ) {
?>
<div id="wpcf7-tg-pane-acceptance" class="hidden">
<form action="">
<table>
<tr><td><?php echo esc_html( __( 'Name', 'wpcf7' ) ); ?><br /><input type="text" name="name" class="tg-name oneline" /></td><td></td></tr>
</table>

<table>
<tr>
<td><code>id</code> (<?php echo esc_html( __( 'optional', 'wpcf7' ) ); ?>)<br />
<input type="text" name="id" class="idvalue oneline option" /></td>

<td><code>class</code> (<?php echo esc_html( __( 'optional', 'wpcf7' ) ); ?>)<br />
<input type="text" name="class" class="classvalue oneline option" /></td>
</tr>

<tr>
<td colspan="2">
<br /><input type="checkbox" name="default:on" class="option" />&nbsp;<?php echo esc_html( __( "Make this checkbox checked by default?", 'wpcf7' ) ); ?>
<br /><input type="checkbox" name="invert" class="option" />&nbsp;<?php echo esc_html( __( "Make this checkbox work inversely?", 'wpcf7' ) ); ?>
<br /><span style="font-size: smaller;"><?php echo esc_html( __( "* That means visitor who accepts the term unchecks it.", 'wpcf7' ) ); ?></span>
</td>
</tr>
</table>

<div class="tg-tag"><?php echo esc_html( __( "Copy this code and paste it into the form left.", 'wpcf7' ) ); ?><br /><input type="text" name="acceptance" class="tag" readonly="readonly" onfocus="this.select()" /></div>
</form>
</div>
<?php
}

?>