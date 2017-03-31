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
     //print_r($attachments);
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

  function get_all_images(){
      if("null" !== get_all_post_id()){
          foreach(get_all_post_id() as $key => $id){
            $images[$key] = wpse_get_images($id);
          }
          return $images;
      }else{
          return '';
      }
  }