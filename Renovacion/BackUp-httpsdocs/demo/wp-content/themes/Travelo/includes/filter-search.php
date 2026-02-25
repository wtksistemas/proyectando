<?php
 if(!isset($_SESSION)) 
    { 
		session_start();
	}
function filterSessionStart() {
    if(!session_id()){
        session_start();
    }
}
/* Session for filter */
add_action('init', 'filterSessionStart', 1);
add_action('wp_logout', 'EndSession');
add_action('wp_login', 'EndSession');

function EndSession() {
    session_destroy ();
}

/* Filter */

add_action("init","addCategories");
function addCategories(){
    $filterOptions = get_field('filter_options_attributes', 'options');
        if($filterOptions){
        foreach ($filterOptions as $option)
        {
            if($option["category_name"]){
            $current_cat = "um_".toAscii($option["category_name"]);
            register_taxonomy($current_cat,array (
		          0 => 'tours_post',
		        ),array( 'hierarchical' => true, 
                'label' => $option["category_name"],
                'show_ui' => true,'query_var' => true,'singular_label' => $option["category_name"]) );
            }
        }
    }    
}

function toAscii($str) {
	$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $str);
	$clean = strtolower(trim($clean, '-'));
	$clean = preg_replace("/[\/_|+ -]+/", '-', $clean);

	return $clean;
}

function printWidgetFilter( $meta = array(), $tax = array()){
 
	$pages = get_pages(array(
                'meta_key' => '_wp_page_template',
                'meta_value' => 'template-search.php',
                'hierarchical' => 0
        )); 
    ?>
    <form class= "widgetFilter" method="POST" action="<?php echo get_permalink(get_page_by_title($pages[0]->post_title)); ?>">
    <input type="hidden" name="um_FilterSearch" value="true">
    <ul class="widgetFilterWrap">
        
            <?php
            $filterCategories = get_field('filter_options_attributes','options');
            if($filterCategories):
            foreach($filterCategories as $cat):
            if($cat["show_on_filter"]):
            $current_cat = "um_".toAscii($cat["category_name"]);
            $current_terms = get_terms($current_cat,array("hide_empty"=>false));
            ?>
            <li class="filter">
                <span class="selector">
                <select name="<?php echo  $current_cat; ?>" class="filterSelectBox">
                
                    <option value="disable"><?php  echo $cat['category_name'] ?></option>     			        
                    <?php 
                        if($current_terms):               
                        foreach($current_terms as $term): 
                    ?>
                    <option
                    <?php 
                        foreach($tax as $newArray)
                        {
                            if(($newArray['terms'] ==  $term->slug) && ($newArray['taxonomy'] == $current_cat))
                            {
                                echo 'selected="selected"';                            
                            }   
                        }
                    ?>
                    value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
                    <?php
                    endforeach;
                    endif;
                     ?>
		        </select>    
                </span>
            </li> <!-- END filter -->
            <?php
            endif; 
            endforeach; 
            endif;
                  $checkboxPrice = get_field('show_price_on_filter','options');
                  if($checkboxPrice):         
                  $filterPrice = get_field('filter_options','options');
                    if($filterPrice):
                        $currency = get_field('currency','options');  
                ?>
            <li class="filter">
                <span class="selector">
                <select name="um_price" class="filterSelectBox">
			         <option value="disable"><?php _e("Select price","um_lang"); ?></option>
                <?php 
                    foreach($filterPrice as $price):
                ?>
                    <?php if($price['maximum_price'] == 0):?>
                    <option 
                            <?php 
                            if($meta)
                            {
                                if($meta[0]['value'] == $price['minimum_price'])
                                {
                                    echo 'selected="selected"';                            
                                }
                            }
                            ?> 
                            value="<?php echo $price['minimum_price'].'-'.$price['maximum_price'] ?>"><?php echo $currency.$price['minimum_price'].'+' ?></option>
                    <?php else:?>
			        <option 
                            <?php 
                            if($meta)
                            {
                                if(($meta[0]['value'][0] == $price['minimum_price']) && ($meta[0]['value'][1] == $price['maximum_price']))
                                {
                                    echo 'selected="selected"';    
                                }
                            }
                            ?>
                            value="<?php echo $price['minimum_price'].'-'.$price['maximum_price'] ?>"><?php echo $currency.$price['minimum_price'].' - '.$currency.$price['maximum_price'] ?></option>
                <?php 
                endif; 
                endforeach;
                ?>
                </select>  
                </span>
            </li> <!-- END filter -->
            <?php
            endif;
            endif;
            ?>
            <li>
                <a href="" onclick="jQuery(this).closest('form').submit(); return false;"><div class="filterBtn"><p><?php _e("Search","um_lang");?></p></div></a>
            </li>      
        </ul>
    </form>
    <?php
    }



function printFilter($WraperName = 'filterForm', $meta = array(), $tax = array()){
       
        $pages = get_pages(array(
                'meta_key' => '_wp_page_template',
                'meta_value' => 'template-search.php',
                'hierarchical' => 0
        )); 
    ?>
    <form class= "<?php echo $WraperName ?>" method="POST" action="<?php echo get_permalink(get_page_by_title($pages[0]->post_title)); ?>">
    <input type="hidden" name="um_FilterSearch" value="true">
    <table class="filterWrap">
        <tr>
            <?php
            $filterCategories = get_field('filter_options_attributes','options');
            if($filterCategories):
            foreach($filterCategories as $cat):
            if($cat["show_on_filter"]):
            $current_cat = "um_".toAscii($cat["category_name"]);
            $current_terms = get_terms($current_cat,array("hide_empty"=>false));
            ?>
            <td class="filter">
                <span class="selector">
                <select name="<?php echo  $current_cat; ?>" class="filterSelectBox">
                
                    <option value="disable"><?php  echo $cat['category_name'] ?></option>     			        
                    <?php 
                        if($current_terms):               
                        foreach($current_terms as $term): 
                    ?>
                    <option
                    <?php 
                        foreach($tax as $newArray)
                        {
                            if(($newArray['terms'] ==  $term->slug) && ($newArray['taxonomy'] == $current_cat))
                            {
                                echo 'selected="selected"';                            
                            }   
                        }
                    ?>
                    value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
                    <?php
                    endforeach;
                    endif;
                     ?>
		        </select>    
                </span>
            </td> <!-- END filter -->
            <?php
            endif; 
            endforeach; 
            endif;
                  $checkboxPrice = get_field('show_price_on_filter','options');
                  if($checkboxPrice):         
                  $filterPrice = get_field('filter_options','options');
                    if($filterPrice):
                        $currency = get_field('currency','options');  
                ?>
            <td class="filter">
                <span class="selector">
                <select name="um_price" class="filterSelectBox">
			         <option value="disable"><?php _e("Select price","um_lang"); ?></option>
                <?php 
                    foreach($filterPrice as $price):
                ?>
                    <?php if($price['maximum_price'] == 0):?>
                    <option 
                            <?php 
                            if($meta)
                            {
                                if($meta[0]['value'] == $price['minimum_price'])
                                {
                                    echo 'selected="selected"';                            
                                }
                            }
                            ?> 
                            value="<?php echo $price['minimum_price'].'-'.$price['maximum_price'] ?>"><?php echo $currency.$price['minimum_price'].'+' ?></option>
                    <?php else:?>
			        <option 
                            <?php 
                            if($meta)
                            {
                                if(($meta[0]['value'][0] == $price['minimum_price']) && ($meta[0]['value'][1] == $price['maximum_price']))
                                {
                                    echo 'selected="selected"';    
                                }
                            }
                            ?>
                            value="<?php echo $price['minimum_price'].'-'.$price['maximum_price'] ?>"><?php echo $currency.$price['minimum_price'].' - '.$currency.$price['maximum_price'] ?></option>
                <?php 
                endif; 
                endforeach;
                ?>
                </select>  
                </span>
            </td> <!-- END filter -->
            <?php
            endif;
            endif;
            ?>
            <td>
                <a href="" onclick="jQuery(this).closest('form').submit(); return false;"><div class="filterBtn"><p><?php _e("Search","um_lang");?></p></div></a>
            </td>
        </tr>
      
        </table>
    </form>
    <?php
    }

function search_filter(){    
    $list = array();
    $metas = array();
    $tax_query = array();
    foreach($_POST as $key => $value){
        if($value != 'disable' && $key != 'um_FilterSearch'){ 
            if($key !='um_price'){
            array_push($tax_query,array(
			                            'taxonomy' => $key,
			                            'terms' => $value,
			                            'field' => 'slug',
                                        'operator' => 'AND'
		                                )
                        );
            }        
            else{
                $spliter = split('-',$value);
                if($spliter[1] == 0){
                       array_push($metas,array(
			                        'key'       =>  'price',   
			                        'value'     =>  $spliter[0],
			                        'type'      =>  'numeric',
			                        'compare'   =>  '>='
		                            )
                        ); 
                }
                else
                {
		            array_push($metas,array(
			                        'key'       =>  'price',   
			                        'value'     =>  array($spliter[0], $spliter[1]),
			                        'type'      =>  'numeric',
			                        'compare'   =>  'BETWEEN'
		                            )
                        );
                } 
            }
        }
    }   

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;    
    $list = array(
	    'post_type'  => 'tours_post',
    	'meta_query' => $metas,
        'tax_query'  => $tax_query,
        'showposts'  => 6,
        'paged'      => $paged
        );
        return $list;
}
?>