<?php
/**
 * Created by PhpStorm.
 * User: gillesdaoduc
 * Date: 30/06/2015
 */

class PageContentItem {

    public function __construct(){

    }

    public function getArgs(){


        $args = array(
            'page_id' => get_the_id()
        );

        return $args;
    }

    public function getPageContentItem( $args ){

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
                
                $image = get_field('image');
                $tab_result["image"] = wpthumb($image['url'],'height=1024&crop=1');
                $tab_result["titre"] = get_field('titre');
                $tab_result["sous_titres"] = get_field('sous_titres');

                $pages = get_pages('child_of='.$query->post->ID.'&sort_column=post_date&meta_key=image_child&sort_order=desc'); 
                $count = 0; 
                foreach($pages as $page) {                     
                    $content = $page->post_content; 
                    // if(!$content) continue;           
                    $images = get_post_custom($page->ID, 'large', true);
                    $imageID = $images['image_child'][0];
                    $imageUrl = wp_get_attachment_image_src($imageID, 'large');
                    // // $tab_result['baba'][$count]['image_child'] = $imageUrl[0];
                    $page->image_child = $imageUrl[0];
                    $tab_result["subpage"][$count] = $page;

                    
                    $count++;                    
                }

                if ($query->post->ID == 164) {
                    $tab_result["contact"] =  do_shortcode('[contact-form-7 id="170" title="Contactez nous particulier"]');
                }else if ($query->post->ID == 167) {
                    $tab_result["contact"] =  do_shortcode('[contact-form-7 id="171" title="Contactez nous professionnels"]');
                }else if ($query->post->ID == 19) {
                    $tab_result['actu'] = true;
                }else if ($query->post->ID == 140) {
                    $tab_result['lexique'] = do_shortcode('[namedirectory dir="3"]');
                }
                
            }
        }
        
        wp_reset_query();
        return $tab_result;
    }

}