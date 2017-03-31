<?php


if("null" !== get_all_images() || '' !== get_all_images()){
       foreach(get_all_images() as $image){
            if(isset($image) && !empty($image)){
           foreach($image as $id=>$detail){
              echo'<a class="selector thumb" href="' . esc_url( wp_get_attachment_url( $id ) ) . '" title="' . esc_attr( $detail['title'] ) . '">';
              echo '<img class="aligncenter" src="' . esc_url( $detail['image'][0] ) . '" alt="' . esc_attr( $detail['title'] ) . '" title="' . esc_attr( $detail['title'] ) . '" />';
              echo '</a>';
              echo '<p> no Content in this version'.$detail['content'];
              echo '</p>';
              }      
           }                
       }
   }
 
