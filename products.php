<?php
/**
 * The template for displaying the about products page of Atelier Bourgeons.
 *
 * This page template will display
 *
 * Template name: Products
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
<div class="original">
    <p class="title">Collections Originales</p> 
    <div>        
        <div class="text-right">            
            <img src ="<?php echo get_site_url(); echo "/wp-content/themes/atelierbourgeons/img/about/Fabrics.jpg"; ?>" />
            <div><p>Tissus & Accessoires</p>

Dans un monde de consommation, on trouve beaucoup de matières premières de haute qualité abandonnées dans des entrepôts. On appelle cela des chutes car, dans le processus de fabrication industriel, elle ne sont pas rentables. 

Atelier Bourgeons donne vie à ces matières inutilisées : nous les achetons aux maisons (de création?) ou aux professionnels et nous les transformons. Chaque nouvelle matière est ensuite intégrée à un modèle de la collection et, associée à des accessoires vintage, devient une création originale et une pièce unique.
            </div>
        </div>
        <div class="separator"></div>
        <div class="text-left">
            <img src ="<?php echo get_site_url(); echo "/wp-content/themes/atelierbourgeons/img/about/Packaging.jpg"; ?>" />
            <div><p>Creation & Fabrication</p>

 Ce qui guide le processus de création de nos collections c’est l’idée d’offrir à chaque femme ‘‘un charme intemporel en parfaite harmonie avec le rétro et le moderne’’ pour leur permettre d’exprimer leur personnalité, loin des tendances qui les enferment. 


Chaque pièce est entièrement confectionnée au sein de l’atelier à la manière d’une maison de haute couture.
            </div>
        </div>
        <div class="separator"></div>
        <div class="text-right">
            <img src ="<?php echo get_site_url(); echo "/wp-content/themes/atelierbourgeons/img/about/Sewing.jpg"; ?>" />
            <div><p>Carte, Griffe, Emballage</p>

Les griffes sont fabriquées en coton organique en Italie.
La toile utilisée lors la création du patronage est ensuite recyclée pour fabriquer les étiquettes de compositions et de tailles.
Les produits utilisés pour l’emballage sont tous fabriqués à partir de matières recyclées. L’ensemble des emballages d’expédition sont recyclables, excepté le papier kraft imperméable et le ruban adhésif utilisés pour protéger les produits pendant le transport..
Nous proposons des rubans et des cartes pour vos emballages cadeau. Vous trouverez plus d’informations ici.
            </div>
        </div>
    </div>
</div>
<div class="about-right container">
    
    <div>
        <p class="title">Vintage & Seconde main  
Vetements customises</p>
        <li class="text">
        atelier Bourgeons propose en parallèle de ses collections originales des vêtements et accessoires de seconde main provenant de puces, magasins de recyclage et boutiques solidaires.
  <br>
Dans un processus de recréativité, chaque pièce est étudiée dans l’atelier et peut faire l’objet de retouches ou customisations selon les besoins.
<br>
Les détails et informations sont consultables sur la page de chaque articles de notre E-boutique.  
        </li>
    </div>
    <img src ="<?php echo get_site_url(); echo "/wp-content/themes/atelierbourgeons/img/about/Vintage.jpg"; ?>" />
</div>
<div class="about-left container">
    
    <img src ="<?php echo get_site_url(); echo "/wp-content/themes/atelierbourgeons/img/about/Tailor-made.jpg"; ?>" />

    <div>
        <p class="concept title">Vetement sur-mesure

</p>
        <li class="concept text">
        Il n’est pas toujours facile de trouver le vêtement que vous aimez à votre taille,  surtout lorsqu’il sera porté pour une occasion particulière comme un mariage. Nous vous proposons de créer ensemble dans notre atelier une pièce unique à votre goût et parfaitement ajustée à votre taille en 5 étapes. 


        </li>
    </div>
</div>
    <div class="cards-container">
        <p class="title">Les etapes de la creation sur-mesure</p>
        <div class="cards">
            <div class="card" >              
                
                        <h3>DESIGN</h3>               
                
                <span class="card-summary">
                    Vous nous décrivez le vêtement souhaité à l’aide d’images pour le style, d’informations sur les matières souhaités puis vous nous indiquez la formule* choisie pour le tissue.
                    Nous vous envoyons dans les deux semaines suivantes un croquis, modifiable deux fois gratuitement suivi d’un devis.
                </span>                
            </div>
            <div class="card" >              
                
                        <h3>MESURES</h3>               
                
                <span class="card-summary">
                    Nous prenons vos mesures dans notre atelier. Lors ce premier rendez-vous nous vous demanderons de régler 50% du devis.
                </span>                
            </div>
                 <div class="card" >              
                
                        <h3>1er ESSAYAGE</h3>               
                
                <span class="card-summary">
                    Nous vous faisons essayer un prototype en toile afin de vérifier ensemble les volumes et détails. A cette étape, il nous sera possible de faire d’importants ajustements.
                </span>                
            </div>
                 <div class="card" >              
                
                        <h3>2ème ESSAYAGE</h3>               
                
                <span class="card-summary">
                    Nous vous faisons essayer vos tenues avec le tissu finale. Ceci nous permettra d’effectuer les derniers ajustements avant la confection finale.
                </span>                
            </div>
                 <div class="card" >              
                
                        <h3>REMISE</h3>               
                
                <span class="card-summary">
                    Cet essayage final vous permettra de vérifier chaque finition avant de partir avec votre vêtement. Nous vous demanderons de régler la totalité du règlement avant de partir avec votre produit sur mesure.
                </span>                
            </div>
        </div>
        <p class="details">
        * Concernant la sélection des tissues, vous pouvez soit apporter votre tissue, soit l’acheter avec nous où nous laisser le soin de le sélectionner pour vous.
<br>
Cette démarche en 5 étapes est un exemple d’une création sur mesure, des ajustements pourront être apportés suivant besoins. De la premier consultation à la remise d’article, Il faudra compter minimum 1 mois. 
</p>
    </div>
    <div class="cards-container">
        <p class="title">Tarifs - Creation sur mesure</p>
        <div class="cards fee">
            Les tarifs comprennent :
            <ul>
            <li>la réalisation des croquis,</li>
            <li>la création du patronage et du prototype en toile,</li>
            <li>la confection du vêtement final.</li>            
            </ul>
            Le coût des tissus n’est pas inclus dans ce tarif.
            
            la réalisation des croquis, 
            la création du patronage et du prototype en toile,
            la confection du vêtement final.
            Le coût des tissus n’est pas inclus dans ce tarif.
        </div>
        <div class="price">
        <ul>
            <li><u>Robe de mariée</u></li>
            <li>Courte : à partir de 800€</li>
            <li>Longue : à partir de 1000€</li>
        </ul>
        <ul>
            <li><u>Robe de cocktail ・Robe quotidienne</u></li>
            <li>Courte : à partir de 400€</li>
            <li>Longue : à partir de 600€</li>
        </ul>
        <ul>
            <li><u>Haut</u></li>
            <li>Sans manches : a partir de 150€</li>
            <li>Avec manches : à partir de 250€</li>
        </ul>
        <ul>
            <li><u>Jupe</u></li>
            <li>Courte: à partir de 200€</li>
            <li>Longue: à partir de 300€</li>
        </ul>
        <ul>
            <li><u>Pantalon</u></li>
            <li>Court : à partir de 250€</li>
            <li>Long : à partir de 350€</li>
        </ul>
        </div>
        <div class="price">
        <ul>        
            <li><u>Jupe</u></li>
            <li>Courte : à partir de 200€</li>
            <li>Longue : à partir de 300€</li>
        </ul>
        <ul>
            <li><u>Pantalon</u></li>
            <li>Court : à partir de250€</li>
            <li>Long : à partir de 350€</li>
        </ul>
        </div>
        
    </div>
    <div class="about-left container">
    
    <img src ="<?php echo get_site_url(); echo "/wp-content/themes/atelierbourgeons/img/about/Gift.jpg"; ?>" />

    <div>
        <p class="concept title">Emballage cadeau</p>
        <li class="concept text">Pour  l’emballage de vos cadeaux, nous vous offrons un service de ruban et de petite carte. 
Vous pouvez les ajouter à votre panier lors de votre commande.</li>
    </div>
</div>
<?php  
    
//wp_footer(); 
get_footer();
?>
</div>
    </body>
    </html>