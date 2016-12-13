<?php
/**
 * The template for displaying the about products page of Atelier Bourgeons.
 *
 * This page template will display
 *
 * Template name: Help
 *
 * @package AtelierBourgeons
 */ 
   
    
?>

<html <?php language_attributes();  ?> ><?php /*storefront_html_tag_schema();*/ ?>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<style>                    
                    @font-face {
                        font-family: Modesty;
                        src: url(<?php echo get_site_url ()?>/wp-content/themes/atelierbourgeons/fonts/ModestyFreshStyle.ttf);
                    }
</style>
</head>
<body style="height:100%;width:100%;">
    <?php 
    get_header(); 
 ?>
    <ul id="inline-menu">
        <li class="<?php if(is_page("About")) echo "current"; ?>"><a href="<?php echo get_pll_page_by_title("About");  ?>">A Propos</a></li>
        <li class="<?php if(is_page("Products")) echo "current"; ?>"><a href="<?php echo get_pll_page_by_title("Products");  ?>">Nos Produits</a></li>
        <li class="<?php if(is_page("Aide")) echo "current"; ?>"><a href="<?php echo get_pll_page_by_title("Aide");  ?>">Aide</a></li>
    </ul>
    <section>
        <nav class="help-nav">
            <div>
                <ul>
                    <li id="nav-item-frequent-questions"><a>Frequent Questions</a></li>
                    <li id="nav-item-frequent-returns"><a>Returns</a></li>
                    <li id="nav-item-frequent-shipping"><a>Shipping</a></li>
                </ul>
            </div>
        </nav>
        <article id="item-frequent-questions" class="help-txt">
            
        </article>
        <article id="item-frequent-returns" class="help-txt">
            
        </article>
        <article id="item-frequent-shipping" class="help-txt">
            
        </article>
    </section>
        
<?php  
    
//wp_footer(); 
get_footer();
?>
</div>
    </body>
    </html>