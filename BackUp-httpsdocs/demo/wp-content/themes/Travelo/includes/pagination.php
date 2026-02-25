<?php
function pagination($pages = '', $range = 4,$extLink = '#search_results')
{  
     $showitems = ($range * 2)+1;  
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
 
     if(1 != $pages)
     {
         echo "<div class=\"pageNr\">";
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span id=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i).$extLink."'/>".$i."</a>";
             }
         }
         echo '</div>';
         echo '<div class ="pageNrBtn">';
         if(!($paged == $pages))echo "<a href=\"".get_pagenum_link($paged + 1).$extLink."\">Next</a>";  
         if(!($paged == 1))echo "<a href='".get_pagenum_link($paged - 1)."'>Prev</a>";
         echo "</div>\n";
     }
}
?>