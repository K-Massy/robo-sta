<?php
/**
 * wordpress functions template
 *
 * @package Torapants default
 */


/**
 * ページャー
 */
function pagination($pages='', $range=4)
{
     $showitems = ($range * 2)+1;

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         if(!$pages)
         {
             $pages = 1;
         }
     }

     if(1 != $pages)
     {
         echo "<ul class=\"navigation pager\">\n";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages)
             echo "<li><a href='".get_pagenum_link(1)."'> ≪ </a></li>\n";
         if($paged > 1 && $showitems < $pages)
             echo "<li><a href='".get_pagenum_link($paged - 1)."'> < </a></li>\n";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i) ? "<li class=\"is_current\">".$i."</li>\n" : "<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>\n";
             }
         }

         if ($paged < $pages && $showitems < $pages)
             echo "<li><a href=\"".get_pagenum_link($paged + 1)."\"> > </a></li>\n";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages)
             echo "<li><a href='".get_pagenum_link($pages)."'> ≫ </a></li>";
         echo "</ul>\n";
     }
}

/**
 * パンくずリスト
 */
function get_breadcrumbs(){
    global $wp_query;

    if ( !is_home() ){

        // Start the UL
        echo '<div class="topic_path">';
        echo '<ul>';
        // Add the Home link
//        echo '<li> <a href="'. get_settings('home') .'">'. get_bloginfo('name') .'</a></li>';
        echo '<li class="home"> <a href="'. get_settings('home') .'">ホーム</a></li>';

        if ( is_category() )
        {
            $catTitle = single_cat_title( "", false );
            $cat = get_cat_ID( $catTitle );
            echo "<li class=\"is_current\"> ". get_category_parents( $cat, TRUE, "" ) ."</li>";
        }
        elseif ( is_archive() && !is_category() )
        {
            echo "<li> " . get_post_type_object(get_post_type())->label . "</li>";
        }
        elseif ( is_search() ) {

            echo "<li> 検索結果</li>";
        }
        elseif ( is_404() )
        {
            echo "<li> ページが見つかりません</li>";
        }
        elseif ( is_single() )
        {
            if( get_post_type() == 'post'){
                $category = get_the_category();
                $category_id = get_cat_ID( $category[0]->cat_name );

                echo '<li> '. get_category_parents( $category_id, TRUE, "" )."</li>\n";
                echo "<li class=\"is_current\"> ".the_title('','', FALSE) ."</li>";
            }else{
                echo '<li> <a href="' . get_settings('home') . '/' . get_post_type_object(get_post_type())->name . '">' . get_post_type_object(get_post_type())->label . "</a></li>\n";
                echo "<li class=\"is_current\"> ".the_title('','', FALSE) ."</li>";
            }
        }
        elseif ( is_page() )
        {
            $post = $wp_query->get_queried_object();

            if ( $post->post_parent == 0 ){

                echo "<li class=\"is_current\">".the_title('','', FALSE)."</li>";

            } else {
                $title = the_title('','', FALSE);
                $ancestors = array_reverse( get_post_ancestors( $post->ID ) );
                array_push($ancestors, $post->ID);

                foreach ( $ancestors as $ancestor ){
                    if( $ancestor != end($ancestors) ){
                        echo '<li> <a href="'. get_permalink($ancestor) .'">'. strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) .'</a></li>';
                    } else {
                        echo '<li class="is_current"> '. strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) .'</li>';
                    }
                }
            }
        }

        // End the UL
        echo "</ul></div>";
    }
}







/**
 * IDからリンク先取得
 */
function get_link_url( $ID, $str, $class){
    $link[0] = get_permalink( $ID);
    $targetData = get_post_meta( $ID, '_links_to_target', true);
    $target = ( $targetData == '_blank') ? ' target="_blank"' : '';
    $class = ( $class) ? ' class="'.$class.'"' : '';
    $link[1] = '<a href="' . $link[0] .'"' . $target . '' . $class . '>' . $str . '</a>';
    return $link;
}

/**
 * スラッグからページIDを取得する
 */
function get_id_by_page_slug($slug){

   global $wpdb;

   $myMeta = $wpdb->get_row("
   SELECT ID
   FROM $wpdb->posts
   WHERE
   post_status = 'publish' and
   post_type = 'page' and
   post_name = '$slug'
   LIMIT 1");

   return $myMeta->ID;

}

/**
 * スラッグからカテゴリIDを取得する
 */
function get_id_by_category_slug($slug){

   global $wpdb;

   $myMeta = $wpdb->get_row("
   SELECT term_id
   FROM $wpdb->terms
   WHERE
   slug = '$slug'
   LIMIT 1");

   return $myMeta->term_id;

}

/**
 * スラッグを取得
 */
function the_slug() {
    if(is_page()){
        global $post;
        $post_data = get_post($post->ID, ARRAY_A);
        $slug = $post_data['post_name'];
        return $slug;
    }else if(is_single() || is_archive()){

        $cat_tmp = get_the_category();
        return $cat_tmp[(sizeof($cat_tmp) - 1)]->slug;
    }
}

/**
 * スラッグを出力
 */
function wp_slug() {
    if(is_page()){
        global $post;
        $post_data = get_post($post->ID, ARRAY_A);
        $slug = $post_data['post_name'];
        echo $slug;
    }else if(is_single() || is_archive()){
        $cat_tmp = get_the_category();
        echo $cat_tmp[(sizeof($cat_tmp) - 1)]->slug;
    }
}

/**
 * 親のスラッグを出力
 */
function the_parent_slug() {
    $cat_tmp = get_the_category();
    $cat_id = $cat_tmp[(sizeof($cat_tmp) - 1)]->cat_ID;

    $allSlug = get_category_parents($cat_id, false, '/', true);
    $slug = @explode('/', $allSlug);
    return $slug[0];
}

/**
 * カテゴリー名を取得
 */
function the_category_name() {
    $cat_tmp = get_the_category();

    return $cat_tmp[(sizeof($cat_tmp) - 1)]->cat_name;
}

/**
 * カテゴリー名を出力
 */
function wp_category_name() {
    $cat_tmp = get_the_category();

    echo $cat_tmp[(sizeof($cat_tmp) - 1)]->cat_name;
}

/**
 * カテゴリーIDを出力
 */
function wp_category_id() {
    $cat_tmp = get_the_category();

    echo $cat_tmp[(sizeof($cat_tmp) - 1)]->cat_ID;
}

/**
 * カスタムフィールドを出力
 */
function get_meta_values($post_id) {
    $keys = get_post_custom_keys($post_id);
    foreach ( (array) $keys as $key ) {
        $keyt = trim($key);
        if ( '_' == $keyt{0} )
            continue;
        $values = get_post_custom_values( $key, $post_id);
        $metas[$key] = $values;

    }
    return $metas;
}

/**
 * 画像をmetaから取得
 */
function get_meta_image( $ID, $metaKey, $alt='', $width, $height){
    $img_id = get_post_meta( $ID, $metaKey, true);
    $img = wp_get_attachment_image_src( $img_id, 'full' );
    if( $width && $height){
        $w = $width;
        $h = $height;
    }elseif( $width && $img){
        $w = $width;
        $h = $width * $img[2] / $img[1];
    }elseif( $height && $img){
        $w = $height * $img[1] / $img[2];
        $h = $height;
    }else{
        $w = $img[1];
        $h = $img[2];
    }

    $img = '<img src="' . $img[0] . '" width="' . $w . '" height="' . $h . '" alt="' . $alt . '" />';
    return $img;
}

/**
 * カスタムフィールドテンプレートのmetakeyからmetavalueを取得する
 */
function get_cft_metavalue($metakey){

    global $wpdb;

    $res = $wpdb->get_results("
    SELECT option_value
    FROM jao_options
    WHERE
        option_name = 'custom_field_template_data'
    ");
    $lines = explode( "\n", $res[0]->option_value);
    $matchKey = 0;
    foreach( $lines as $key => $value){
        if( strpos( $value, $metakey)){
            $matchKey = $key;
        }
        if( $matchKey > 0 && $key > $matchKey){
            if( strpos( $value, 'value' ) === 0){
                $data = explode( '=', $value);
                break;
            }
        }
    }
    if( $data){
        $options = explode( '#', $data[1]);
        foreach( $options as $key => $opt){
            $options[$key] = trim( $opt);
        }
        return $options;
    }else{
        return false;
    }
}

/**
 * 最上位の親ページのID取得
 */
function ps_get_root_page( $cur_post, $cnt = 0 ) {
    if ( $cnt > 100 ) { return false; }
    $cnt++;
    if ( $cur_post->post_parent == 0 ) {
        $root_page = $cur_post;
    } else {
        $root_page = ps_get_root_page( get_post( $cur_post->post_parent ), $cnt );
    }
    return $root_page;

//    $post_data = get_post($post->ID, ARRAY_A);
//    $slug = $post_data['post_name'];
}

/**
 * 親ページの情報取得
 */
function get_parent_pages($ID) {
    $defaults = array(
        'include' => $ID, 'depth' => 0, 'child_of' => 0,
    );

    $r = wp_parse_args( $args, $defaults );
    extract( $r, EXTR_SKIP );
    $pages = get_pages($r);
    $output = '';

    $output["ID"] = $pages["0"]->ID;
    $output["post_title"] = $pages["0"]->post_title;
    $output["post_parent"] = $pages["0"]->post_parent;
    $output["href"] = walk_page_tree($pages, $r['depth'], $current_page, $r);

    return $output;
}

/**
 * 最初の画像のパスを出力
 */
function firstImgPath( $content, $noImg, $length ) {
    $html = preg_replace("/(\n|\r)/","",$content);
    preg_match_all("/\<img ([^\>]+)\>/i",$html,$match);

    if( count($match[1]) > 0) {
        $cnt = 0;
        foreach ($match[1] as $val) {
            preg_match( "/src\=\"([^\"]+)\"/i", $val, $match2);
            if( $match[1]) {
             $imgArray[$cnt]['imgPath'] = $match2[1];
                $imgArray[$cnt]['imgName'] = basename( $match2[1]);
                $cnt++;
            }
        }

        $imgSrc = $imgArray[0]['imgPath'];
//        print_r($imgArray);
//        list( $org_w, $org_h) = getimagesize( $_SERVER['DOCUMENT_ROOT'] . '/wp-content/uploads/' . $imgArray[0]['imgName']);
        list( $org_w, $org_h) = getimagesize( $imgSrc);
    }else{
        $imgSrc = '/wp-content/uploads/' . $noImg;
        list( $org_w, $org_h) = getimagesize( $_SERVER['DOCUMENT_ROOT'] . '/wp-content/uploads/' . $noImg);
    }
    if( $org_w > $org_h) {
        $width = $length;
        $height = round($org_h * $length / $org_w);
    }else{
        $height = round($length * 3 / 4);
        $width = round($org_w * $height / $org_h);
    }

    return 'src="'.$imgSrc.'" width="'.$width.'" height="'.$height.'" ';
}

/**
 * 2つ目の画像のパスを出力
 */
function secondImgPath( $content, $noImg, $length ) {
    $html = preg_replace("/(\n|\r)/","",$content);
    preg_match_all("/\<img ([^\>]+)\>/i",$html,$match);

    if( count($match[1]) > 0) {
        $cnt = 0;
        foreach ($match[1] as $val) {
            preg_match( "/src\=\"([^\"]+)\"/i", $val, $match2);
            if( $match[1]) {
             $imgArray[$cnt]['imgPath'] = $match2[1];
                $imgArray[$cnt]['imgName'] = basename( $match2[1]);
                $cnt++;
            }
        }

        $imgSrc = $imgArray[0]['imgPath'];
//        print_r($imgArray);
//        list( $org_w, $org_h) = getimagesize( $_SERVER['DOCUMENT_ROOT'] . '/wp-content/uploads/' . $imgArray[0]['imgName']);
        list( $org_w, $org_h) = getimagesize( $imgSrc);
    }else{
        $imgSrc = '/wp-content/uploads/' . $noImg;
        list( $org_w, $org_h) = getimagesize( $_SERVER['DOCUMENT_ROOT'] . '/wp-content/uploads/' . $noImg);
    }

    if( $org_w > $org_h) {
        $width = $length;
        $height = round($org_h * $length / $org_w);
    }else{
        $height = round($length * 3 / 4);
        $width = round($org_w * $height / $org_h);
    }

    return 'src="'.$imgSrc.'" width="'.$width.'" height="'.$height.'" ';
}

/**
 * すべての画像のパスを出力
 */
function allImgPath( $content) {
    $html = preg_replace("/(\n|\r)/","",$content);
    preg_match_all("/\<img ([^\>]+)\>/i",$html,$match);

    if( count($match[1]) > 0) {
        $cnt = 0;
        foreach ($match[1] as $val) {
            preg_match( "/src\=\"([^\"]+)\"/i", $val, $match2);
            if( $match[1]) {
             $imgArray[$cnt]['imgPath'] = $match2[1];
                $imgArray[$cnt]['imgName'] = basename( $match2[1]);
                $cnt++;
            }
        }

//        $imgSrc[] = $imgArray[0]['imgPath'];
    }

    return $imgArray;
}

/**
 * get_the_term_listで分類にリンクをつけない
 */
function get_the_term_list_nolink( $id = 0, $taxonomy, $before = '', $sep = '', $after = '' ) {
    $terms = get_the_terms( $id, $taxonomy );
    if ( is_wp_error( $terms ) )
        return $terms;
    if ( empty( $terms ) )
        return false;
    foreach ( $terms as $term ) {
        $term_names[] =  $term->name ;
    }
    return $before . join( $sep, $term_names ) . $after;
}

/**
 * カスタム投稿のタイプ一覧を取得し、タイトルをリンクを付けて置換する
 */
function get_replace_links( $type, $content) {
    $args = array(
        'numberposts' => -1, // 無制限
        'offset'      => 0,
        'orderby'     => 'menu_order',
        'order'       => 'ASC',
        'post_type'   => $type,
        'post_parent' => 0, //最上位のみ
        'post_status' => 'publish'
    );
    $array= get_posts( $args );

    if( $array){
        foreach( $array as $key => $val){
            $link = get_link_url( $val->ID, $val->post_title, '');
//            print $content.">".$val->post_title.">".$link[1]."<br />\n";
            $content = str_replace( trim( $val->post_title), $link[1], $content);

        }
    }
    return $content;
}
