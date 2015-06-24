<?php
/**
Template Name: home template
 */

require_once( get_template_directory() . '/includes/classes/LatestNewsItem.php' );
$latest_news = new LatestNewsItem();

$context = Timber::get_context();

$post_per_page = 6;
$category = "latest_news";

$args = $latest_news->getArgs($post_per_page, $category);
$result = $latest_news->getLatestNews($args);

$context['latest_news'] = $result;


$templates = array( 'page-templates/home.twig' );

Timber::render($templates, $context);
