<?php
/**
* Template Name: Content template
*/

require_once( get_template_directory() . '/includes/classes/PageContentItem.php' );
$pageContent = new PageContentItem();

$context = Timber::get_context();

$args = $pageContent->getArgs();
$result = $pageContent->getPageContentItem($args);

$context["page"] = $result;

$templates = array( 'page-templates/page-content.twig' );


Timber::render($templates, $context);
