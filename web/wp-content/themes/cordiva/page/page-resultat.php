<?php
/**
* Template Name: Résultat template
*/

require_once( get_template_directory() . '/includes/classes/ResultatItem.php' );
$pageResultat = new ResultatItem();

$context = Timber::get_context();

$argsResultat = $pageResultat->getArgs();
$resultResultat = $pageResultat->getResultatItem($argsResultat);
$context["resultat"] = $resultResultat;

$templates = array( 'page-templates/resultat.twig' );

Timber::render($templates, $context);
