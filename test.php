<?php

    /* main ul that will hold the images for each post 
         the first loop will generate this ul>li.
         In each li we then create a ul and in this ul we run the second loop that 
         creates the li>div.image-container>{{your content from data}}
         
         NB.
         This Function return all the post and all image associated with each post 
         @exapmle
         [0=>image=array(),1=>image=array(),...]
         as such you have to loop twice as shown in the example below also 
         ensure that you check the array at the first loop as it sometimes comes up empty
    */

    //Remove the comment below to see the values of the array
    //print_r(k_images_by_post());
    echo '<ul>';
   if("null" !== K_images_by_post() || '' !== K_images_by_post()){
       foreach(K_images_by_post() as $image){ 
            if(isset($image) && !empty($image)){
                echo '<li>';
                echo '<ul>';
                foreach($image as $id=>$detail){
                    echo '<li><div class="image-container">';
                    echo'<a class="selector thumb" href="' . esc_url( wp_get_attachment_url( $id ) ) . '" title="' . esc_attr( $detail['title'] ) . '">';
                    echo '<img class="aligncenter" src="' . esc_url( $detail['image'][0] ) . '" alt="' . esc_attr( $detail['title'] ) . '" title="' . esc_attr( $detail['title'] ) . '" />';
                    echo '</a>';
                    echo '<p> no Content in this version'.$detail['content'];
                    echo '</p>';
                    echo '</div></li>';
                }   
              echo '</ul>';
              echo '</li>';  
           }                
       }
   } 
echo '</ul>';


  /*
    This function return an array with all the images from all the post 
    @example 
    [img1,img2,img2,...]
    this result array loops only once 
  */
 
  $gallery = K_all_images();
  echo '<ul>';
  if(!empty($gallery)){
    foreach($gallery as $detail){
               echo '<li><div class="image-container">';
              echo'<a class="selector thumb" href="' . esc_url( wp_get_attachment_url( $detail['id'] ) ) . '" title="' . esc_attr( $detail['title'] ) . '">';
              echo '<img class="aligncenter" src="' . esc_url( $detail['image'][0] ) . '" alt="' . esc_attr( $detail['title'] ) . '" title="' . esc_attr( $detail['title'] ) . '" />';
              echo '</a>';
              echo '<p> no Content in this version'.$detail['content'];
              echo '</p>';
              echo '</div></li>';
              }   

  }  
  echo '</ul>';
