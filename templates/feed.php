<?php
/**
 * Template Name: Google Product Feed
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// Sets the charset.
@ob_clean();
header( 'Content-type: application/xml' );
// Helpers classes.
require_once 'classes/class-wc-gmcf-simplexml.php';
require_once 'classes/class-wc-gmcf-xml.php';
$feed = new WC_GMCF_XML;
echo $feed->render();
exit;