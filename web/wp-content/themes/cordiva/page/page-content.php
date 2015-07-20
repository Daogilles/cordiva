<?php
/**
* Template Name: Content template
*/

require_once( get_template_directory() . '/includes/classes/PageContentItem.php' );
require_once( get_template_directory() . '/includes/classes/LatestNewsItem.php' );
$pageContent = new PageContentItem();
$latest_news = new LatestNewsItem();

$context = Timber::get_context();

$post_per_page = 12;

$args = $pageContent->getArgs();
$result = $pageContent->getPageContentItem($args);

$category = "latest_news";
$argsN = $latest_news->getArgs($post_per_page, $category);
$resultN = $latest_news->getLatestNews($argsN);
$context['latest_news'] = $resultN;

$context["page"] = $result;

$templates = array( 'page-templates/page-content.twig' );


Timber::render($templates, $context);
