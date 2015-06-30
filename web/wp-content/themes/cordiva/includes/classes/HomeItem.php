<?php
/**
 * Created by PhpStorm.
 * User: gillesdaoduc
 * Date: 30/06/2015
 */

class HomeItem {

    public function __construct(){

    }

    public function getArgs(){

        $args = array(
            'page_id' => '7'
        );

        return $args;
    }

    public function getHomeItem( $args ){

        $query = new WP_Query( $args );
        $tab_result = array();
        if ( $query->have_posts() ) {
            while ($query->have_posts()) {
                $query->the_post();
                $tab_result["author"] = get_the_author();
                $tab_result["link"] = get_permalink();                
                $tab_result["title"] = $query->post->post_title;
                $originalDate = $query->post->post_date;
                $newDate = date("d M Y", strtotime($originalDate));
                $tab_result["date"] = $newDate;
                $tab_result["titre_dispositif"] = get_field('titre_dispositif');
                $tab_result["dispositif"] = get_field('dispositif');
                $tab_result["titre_more"] = get_field('titre_more');
                $tab_result["en_savoir_plus"] = get_field('en_savoir_plus');
            }
        }
        wp_reset_query();
        return $tab_result;
    }

}