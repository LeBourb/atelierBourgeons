
<?php

    add_action('admin_menu', 'register_google_shoppping_submenu_page',99);
    
    function register_google_shoppping_submenu_page() {
        add_submenu_page( 'woocommerce', 'Google Shopping', 'Google Shopping', 'manage_options', 'google-shopping-submenu-page', 'google_shopping_submenu_page_callback' ); 
    }
    function google_shopping_submenu_page_callback() {
        echo '<h3>Google Shopping</h3>';
        test_button_google_shopping_generate_xml();
    }

    function test_button_google_shopping_generate_xml() {

  // This function creates the output for the admin page.
  // It also checks the value of the $_POST variable to see whether
  // there has been a form submission. 

  // The check_admin_referer is a WordPress function that does some security
  // checking and is recommended good practice.


  // Start building the page

  echo '<div class="wrap">';

  echo '<h2>Generate Google</h2>';

  // Check whether the button has been pressed AND also check the nonce
  if (isset($_POST['test_button']) && check_admin_referer('test_button_clicked')) {
    // the button has been pressed AND we've passed the security check
    test_button_action();
  }

  echo '<form action="admin.php?page=google-shopping-submenu-page" method="post">';

  // this is a WordPress security feature - see: https://codex.wordpress.org/WordPress_Nonces
  wp_nonce_field('test_button_clicked');
  echo '<input type="hidden" value="true" name="test_button" />';
  submit_button('Update Google Merchant');
  echo '</form>';

  echo '</div>';

}

function test_button_action()
{
  echo '<div id="message" class="updated fade"><p>'
    .'Google Merchant XML a été mis à jour' . '</p></div>';


    require_once 'class-wc-gmcf-simplexml.php';
    require_once 'class-wc-gmcf-xml.php';
    $feed = new WC_GMCF_XML;
    echo '<div id="message" class="updated fade"><p>' . $feed->render() . '</p></div>';
    exit;
  
}  