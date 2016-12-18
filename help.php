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
   
 require 'header-about.php';
?>
    <section>
        <nav class="help-nav">
            <div>
                <ul>
                    <li id="nav-item-frequent-questions">
                        <a href="#frequent-questions"><?php _e( 'Frequent Questions', 'atelierbourgeons' );?></a>
                        <!--<ul class="level2">
                            <li class="nav-item-sub">
                                <a>Garments</a>
                            </li>
                            <li class="nav-item-sub">
                                <a class="active">Garments</a>
                            </li>
                        </ul>-->
                    </li>
                    
                    <li id="nav-item-returns"><a href="#returns"><?php _e( 'Returns', 'atelierbourgeons' );?></a></li>
                    <li id="nav-item-shipping"><a href="#shipping"><?php _e( 'Shipping', 'atelierbourgeons' );?></a></li>
                    <li id="nav-item-legal"><a href="#legal"><?php _e( 'Legal Notices', 'atelierbourgeons' );?></a></li>
                    <li id="nav-item-cookie"><a href="#cookie"><?php _e( 'Cookies', 'atelierbourgeons' );?></a></li>
                </ul>
            </div>
        </nav>
        <article id="frequent-questions" class="help-txt">
            <h1 id="garments-questions">Garments Questions</h1>
            <h2>Why do things sell out so fast?</h2>
            <p>We regularly use deadstock fabrics and rare materials, which restricts our manufacturing runs. We have a collection of <a href="/essentials">Essentials</a> that we try to always keep in stock. The best way to make sure you are in the know about our releases is to sign up for our newsletter.</p>
            <h2>Do you restock sold out items?</h2>
            <p>We try to always keep garments from our <a href="/essentials">Essentials collection</a> in stock.</p>
            <p>When demand is strong enough for a <a href="/limited">Limited product</a> that sells out, we will likely remake it. The best way to let us know that you want to bring a product back is to click into the sold out product, select your size, click the “Notify Me” button, and enter your email. You will then be alerted the moment the product is available to purchase.</p>
            <h2>How much stretch can I expect from raw denim? Should I order the same size in pants and denim?</h2>
            <p>Raw denim is stiff because it has not been washed. While it won't flatter your hips and butt&nbsp;at first, it will mold to your body over time.</p>
            <p>Out of the box, your denim should fit snugly at the waist because it will stretch-out up to 1" over the first month of consistent wear. That said, we recommend you purchase one waist size smaller than you typically wear.</p>
        </article>
        <article id="returns" class="help-txt">
            
        </article>
        <article id="shipping" class="help-txt">
            
        </article>
    </section>
        
<?php
    require 'footer-about.php';
?>