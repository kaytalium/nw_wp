<?php

function wpse_get_images($id) {
        
        $size = 'medium';
        $attachments = get_children( array(
                'post_parent' => $id,
                'post_status' => 'inherit',
                'post_type' => 'attachment',
                'post_mime_type' => 'image',
                'order' => 'ASC',
                'orderby' => 'menu_order'
            ) );
            
        if ( empty( $attachments ) )
                    return '';

        $output = array();
    /**
     * Loop through each attachment
     */
     
    foreach ( $attachments as $id  => $attachment ) :
        
        $title = esc_html( $attachment->post_title, 1 );
        $img = wp_get_attachment_image_src( $id, $size );
        $content = $attachment->post_content;
        $detail = array("title"=>$title, "image"=>$img,"content"=>$content);
        $output[$id] = $detail;
    endforeach;
        return $output;
    }

//This function is used to get all the post id from the system
  function get_all_post_id(){
      $all_posts = get_posts();
        if(isset($all_posts)){
            foreach($all_posts as $el => $post){
                $id[$el] = $post->ID;
            }
            return $id;
        }else{
            return '';
        }
  }

/*
    These are the only two functions that is used by the UI to render images+
    Show all images from post loop twice

    see test.php for examples on both function 
*/
  function K_images_by_post(){
      if("null" !== get_all_post_id()){
          foreach(get_all_post_id() as $key => $id){
            $images[$key] = wpse_get_images($id);
          }
          return $images;
      }else{
          return '';
      }
  }

/*
    Show image from post in one array loop once
*/
  function K_all_images(){
      $counter = 0;
      $images = array();
      $imagesByPost = k_images_by_post();
      if(isset($imagesByPost) && !empty($imagesByPost)){
          foreach($imagesByPost as $key => $post){
            if(!empty($post)){
                foreach($post  as $imageId => $image){
                    $image['id'] = $imageId;
                    $image['post_id'] = $key;
                    $images[$counter] =$image;
                    $counter++;                  
                }
            }
          }
      }
      return $images;
  }