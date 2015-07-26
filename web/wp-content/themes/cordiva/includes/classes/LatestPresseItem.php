<?php
/**
 * Created by PhpStorm.
 * User: gillesdaoduc
 * Date: 30/06/2015
 */

class LatestNewsItem {

    public function __construct(){

    }

    public function getArgs($limit, $category){

        $args = array(
            'post_type' => 'post',
            'post_status'=>'publish',
            'category_name' => $category,
            'posts_per_page'=> $limit,
            'orderby' => 'date',
            'order'   => 'DESC',
        );

        return $args;
    }

    public function getLatestNews( $args ){

        $query = new WP_Query( $args );
        $tab_result = array();
        $cpt = 0;
        if ( $query->have_posts() ) {
            while ($query->have_posts()) {
                $query->the_post();
                $tab_result[$cpt]["author"] = get_the_author();
                $tab_result[$cpt]["link"] = get_permalink();                
                $tab_result[$cpt]["title"] = $query->post->post_title;
                $tab_result[$cpt]["content"] = $query->post->post_content;
                $tab_result[$cpt]["sub_title"] = wp_trim_words( $query->post->post_content, 10, '...' );
                $originalDate = $query->post->post_date;
                $newDate = date("d M Y", strtotime($originalDate));
                $tab_result[$cpt]["date"] = $newDate;
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $query->post->ID ), 'full' );
                $tab_result[$cpt]["image"] = wpthumb($image[0],'width=1248&height=1024&crop=1');
                $cpt++;
            }
        }
        wp_reset_query();
        return $tab_result;
    }

}
