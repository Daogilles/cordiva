<?php
/**
 * Created by PhpStorm.
 * User: gillesdaoduc
 * Date: 30/06/2015
 */

class ResultatItem {

    public function __construct(){

    }

    public function getArgs(){

        $args = array(
            'page_id' => '13'
        );

        return $args;
    }

    public function getResultatItem( $args ){

        $query = new WP_Query( $args );
        $tab_result = array();
        $cpt = 0;
        if ( $query->have_posts() ) {
            while ($query->have_posts()) {
                $query->the_post();
                $tab_result["author"] = get_the_author();
                $tab_result["link"] = get_permalink();
                $tab_result["title"] = $query->post->post_title;
                $tab_result["content"] = $query->post->post_content;
                $originalDate = $query->post->post_date;
                $newDate = date("d M Y", strtotime($originalDate));
                $tab_result["date"] = $newDate;

                $image = get_field('image');
                $tab_result["image"] = wpthumb($image['url'],'height=500&crop=1');
                $tab_result["titre"] = get_field('titre');
                $tab_result["sous_titres"] = get_field('sous_titres');
                $images = get_field('images');
                foreach ($images as $img) {
                    $tab_result["images"][$cpt] = $img['img']['url'];
                    $cpt++;
                }
            }
        }
        wp_reset_query();
        return $tab_result;
    }

}