<?php
/**
Template Name: home template
 */

require_once( get_template_directory() . '/includes/classes/HomeItem.php' );
require_once( get_template_directory() . '/includes/classes/LatestNewsItem.php' );
require_once( get_template_directory() . '/includes/classes/SlideItem.php' );
$home = new HomeItem();
$latest_news = new LatestNewsItem();
$slide = new SlideItem();

$context = Timber::get_context();

$post_per_page = 6;
// $slide_per_page = 3;

$argsHome = $home->getArgs();
$resultHome = $home->getHomeItem($argsHome);
$context["home"] = $resultHome;

$category = "latest_news";
$args = $latest_news->getArgs($post_per_page, $category);
$result = $latest_news->getLatestNews($args);
$context['latest_news'] = $result;


$argsSlide = $slide->getArgs();
$resultSlide = $slide->getSlideItem($argsSlide);
$context['slide_item'] = $resultSlide;




$templates = array( 'page-templates/home.twig' );

Timber::render($templates, $context);
