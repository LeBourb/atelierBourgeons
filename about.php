<?php
/**
 * The template for displaying the about page of Atelier Bourgeons.
 *
 * This page template will display
 *
 * Template name: About
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
        <li class="<?php if(is_page("Help")) echo "current"; ?>"><a href="<?php echo get_pll_page_by_title("Help");  ?>">Aide</a></li>
    </ul>
<div class="about-right container">
    <div>
        <p class="title">a propos</p>
        <li class="text">
        atelier Bourgeons est une entreprise de création de vêtements artisanale et vente de vêtements customisés de seconde main. 
<br><br>
Chaque pièce originale est unique, depuis sa conception jusqu’à sa confection dans un atelier de la région parisienne. Elles sont réalisées à partir de tissus de fins de séries achetés auprès de grandes maisons. 
L’entreprise s’inscrit dans un mouvement pour promouvoir auprès du public une mode originale, durable et éthique pour tous.
<br><br>
Nous vous souhaitons une agréable visite ! 

        </li>
    </div>
    <img src ="<?php echo get_site_url(); echo "/wp-content/themes/atelierbourgeons/img/about/About.jpg"; ?>" />
</div>
<div class="about-left container">
    
    <img src ="<?php echo get_site_url(); echo "/wp-content/themes/atelierbourgeons/img/about/Concept.jpg"; ?>" />

    <div>
        <p class="title">Concept</p>
        <li class="text">
        ― Bourgeons ―
        <br>
Les bourgeons symbolisent la nature en devenir, 
ils grandissent discrètement
et un jour donnent naissance à une diversité d’arbres et de fleurs. 
Rien n’est aussi riche et autant source d’inspiration artistique que la nature.  
C’est pour la promouvoir que nous créons une marque, 
qui la respecte et respectent ceux qui en sont proches.
<br>
― Création de vêtements ―
<br>
La création de vêtements passent par une multitudes de processus,
ces processus font parti de l’histoire d’être vivants, 
et c’est en pensant à chaque histoire que nous sélectionnons les matières avec lesquelles nous travaillons.
Chaque matière ou tissu recyclé est ensuite appliqué sur un modèle de la collection pour créer une pièce unique par la créatrice dans son atelier.
Le projet s’inscrit dans une démarche éthique et écologique de créations originales pour femme s’étendant jusqu’aux choix d’emballages éco conçus.

        </li>
    </div>
</div>    
<div class="about-right container">
    
    

    <div>
        <p class="title">Creatrice</p>
        <li class="text">
        Née à Gifu au JAPON, est passionnée de mode depuis petite. C’est pendant  ses études à l’université que son intérêt pour la mode éthique et durable a débuté lorsqu’elle intégra une équipe de rédacteurs d’un site spécialisé. C’est à cette période qu’elle fit ses premières expériences dans la mode en temps qu’assistante styliste.
<br>
Elle s’installa en France 2013 pour y apprendre le modélisme à l’Académie Internationale de la Coupe de Paris et réalisa pendant deux ans avec une marque de prêt-à-porter femme une formation en alternance. Elle en sortit diplômée en tant que modéliste femme internationale.
<br>
Elle avait depuis longtemps comme projet de créer sa propre marque de créations artisanales et c’est tout naturellement qu’elle débuta fin 2015 la création de son entreprise et la réalisation de sa première collection de prêt-à-porter femmes.
<br>
Actuellement, elle est toujours rédactrice d’un site japonais de mode éthique《Fragment Magazine 》(http://www.fragmentsmag.com/)

        </li>
    </div>
    <img src ="<?php echo get_site_url(); echo "/wp-content/themes/atelierbourgeons/img/about/Creator.jpg"; ?>" />
</div>
    
<?php  
    
//wp_footer(); 
get_footer();
?>
</div>
    </body>
    </html>