<?php

/**
 * Meta Data
 */

/* Title */
if ( is_home() || is_front_page() ) {
	$header_title = get_bloginfo( 'name' );
} elseif ( is_page() || is_single() ) {
	$header_title = get_the_title();
} elseif ( is_archive() ) {
	$header_title = get_the_archive_title();
} else {
	$header_title = '';
}

/* Description */
if ( is_home() || is_front_page() ) {
	$header_description = get_bloginfo( 'description' );
} elseif ( is_page() || is_single() ) {
	if( has_excerpt() ) {
		$header_description = get_the_excerpt();
	} else {
		$header_description = '';	
	}
} else {
	$header_description = '';
}

/* Keywords */
if ( is_home() || is_front_page() ) {
	$header_keywords = '';
} else {
	$header_keywords = '';
}

/* OG Type */
if ( is_home() || is_front_page() ) {
	$header_og_type = 'website';
} elseif ( is_page() || is_single() ) {
	$header_og_type = 'article';
} else {
	$header_og_type = '';
}

/* OG Image */
if ( is_home() || is_front_page() ) {
	$header_og_image = ''; // URL
} elseif ( is_page() || is_single() ) {
	if( has_post_thumbnail() ) {
		$header_og_image = esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full'));
	} else {
		$header_og_image = ''; // URL
	}
} else {
	$header_og_image = '';
}

/* OG URL */
if ( is_home() || is_front_page() ) {
	$header_url = esc_url( home_url('/') );
} elseif ( is_page() || is_single() ) {
	$header_url = wp_get_canonical_url();
} else {
	$header_url = '';
}

/* Twitter card */
if ( is_home() || is_front_page() ) {
	$twitter_card = 'summary_large_image';
} elseif ( is_page() || is_single() ) {
	$twitter_card = 'summary_large_image';
} else {
	$twitter_card = 'summary';
}

?>

	<meta itemprop="name" content="<?php echo $header_title; ?>">
	<meta itemprop="description" content="<?php echo $header_description; ?>">
	<meta name="description" content="<?php echo $header_description; ?>">
	<meta name="keywords" content="<?php echo $header_keywords; ?>">

	<meta property="og:title" content="<?php echo $header_title; ?>">
	<meta property="og:description" content="<?php echo $header_description; ?>">
	<meta property="og:type" content="<?php echo $header_og_type; ?>">
	<meta property="og:image" content="<?php echo $header_og_image; ?>">
	<meta property="og:url" content="<?php echo $header_url; ?>">
	<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>">
	<meta property="og:locale" content="ja_JP">

	<meta name="twitter:card" content="<?php echo $twitter_card; ?>">
	<meta name="twitter:title" content="<?php echo $header_title; ?>">
	<meta name="twitter:description" content="<?php echo $header_description; ?>">
	<meta name="twitter:image" content="<?php echo $header_og_image; ?>">

<?php if(is_attachment()): ?>
	<meta name="robots" content="noindex" />
<?php endif; ?>