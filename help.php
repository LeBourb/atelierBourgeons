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
                    
                    <li id="nav-item-cookie"><a href="#cookie"><?php _e( 'Cookies', 'atelierbourgeons' );?></a></li>
                    <li id="nav-item-standard-form-contract"><a href="#contract"><?php _e( 'Standard form contract', 'atelierbourgeons' );?></a></li>               
                </ul>
            </div>
        </nav>
        <?php global $post; echo $post->post_content; ?>
    </section>
        
<?php
    require 'footer-about.php';
?>