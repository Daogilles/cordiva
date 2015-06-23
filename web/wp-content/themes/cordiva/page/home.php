<?php
/**
Template Name: home template
 */

// require_once( get_template_directory() . '/includes/classes/LivingForceItem.php' );
// $living_force = new LivingForceItem();

$context = Timber::get_context();

$templates = array( 'page-templates/home.twig' );

Timber::render($templates, $context);