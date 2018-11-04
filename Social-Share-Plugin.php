<?php

/**
* Plugin Name: WP-Social-Share Plugin
* Plugin URI: https://www.rankgrain.com
* Description: A Plugin that helps us display social button on all post and pages
* Author: Muhammad Umair Ghufran
* Author URI: https://www.umairghufran.com
* Version: 1.0.0
* Licence: MIT-licence
*/


//
function Ex_social_share_menu_item(){

add_submenu_page( 'options-general.php', 'WP-Social-Share', 'WP-Social-Share', 'manage_options', 'WP-Social-Share', 'social_share_Page');
}

add_action('admin_menu', 'Ex_social_share_menu_item');

function social_share_Page(){

  ?>
    <div class="wrap">
      <center><h1>WELCOME</h1></center>
      <center><h1>WP-Social-Share Options</h1><center>
        <p style="color:red;">It's Powered by <a href="0">RANKGRAIN INC</a></p>
     <form method="post" action="options.php">
<?php
         settings_fields("social_share_config_section");

         do_settings_sections("WP-Social-Share");


    submit_button();

?>
     </form>
   </div>
   <?php
}

function social_share_settings()
{
    add_settings_section("social_share_config_section", "", null, "WP-Social-Share");

    add_settings_field("WP-Social-Share-facebook", "Do you want to display Facebook share button?", "social_share_facebook_checkbox", "WP-Social-Share", "social_share_config_section");
    add_settings_field("WP-Social-Share-twitter", "Do you want to display Twitter share button?", "social_share_twitter_checkbox", "WP-Social-Share", "social_share_config_section");
    add_settings_field("WP-Social-Share-linkedin", "Do you want to display LinkedIn share button?", "social_share_linkedin_checkbox", "WP-Social-Share", "social_share_config_section");
    add_settings_field("WP-Social-Share-reddit", "Do you want to display Reddit share button?", "social_share_reddit_checkbox", "WP-Social-Share", "social_share_config_section");
    add_settings_field("WP-Social-Share-pinterest", "Do you want to display pinterest share button?", "social_share_pinterest_checkbox", "WP-Social-Share", "social_share_config_section");

    register_setting("social_share_config_section", "WP-Social-Share-facebook");
    register_setting("social_share_config_section", "WP-Social-Share-twitter");
    register_setting("social_share_config_section", "WP-Social-Share-linkedin");
    register_setting("social_share_config_section", "WP-Social-Share-reddit");
    register_setting('social_share_config_section', 'WP-Social-Share-pinterest');
}

function social_share_facebook_checkbox()
{
   ?>
      <input type="checkbox" name="WP-Social-Share-facebook" value="1" <?php checked(1, get_option('WP-Social-Share-facebook'), true); ?> /> Check for Ye
  <?php
}

function social_share_twitter_checkbox()
{
   ?>
        <input type="checkbox" name="WP-Social-Share-twitter" value="1" <?php checked(1, get_option('WP-Social-Share-twitter'), true); ?> /> Check for Yes
   <?php
}

function social_share_linkedin_checkbox()
{
   ?>
        <input type="checkbox" name="WP-Social-Share-linkedin" value="1" <?php checked(1, get_option('WP-Social-Share-linkedin'), true); ?> /> Check for Yes
   <?php
}

function social_share_reddit_checkbox()
{
   ?>
        <input type="checkbox" name="WP-Social-Share-reddit" value="1" <?php checked(1, get_option('WP-Social-Share-reddit'), true); ?> /> Check for Yes
   <?php
}

function social_share_pinterest_checkbox()
{
   ?>
        <input type="checkbox" name="WP-Social-Share-pinterest" value="1" <?php checked(1, get_option('WP-Social-Share-pinterest'), true); ?> /> Check for Yes
   <?php
}


add_action("admin_init", "social_share_settings");




// display the social share button on cotent

fucntion add_social_share_button($content)
{

// linkedin - Social Share Buttons
  if(get_option("WP-Social-Share-linkedin") == 1){

    $html = $html . "<div class='WP-Social-Share-linkedin'><a target='_blank' href='https://linkedin.com/shareArticle?url=" . $url ."'>Linkedin</a></div>";
  }

 // Twitter - Social Share Buttons
   if(get_option("WP-Social-Share-twitter") == 1){

     $html = $html . "<div class='twitter'><a target="_blank" href='https://www.twitter.com/share?url=". $url ."'>Twitter</a></div>";
   }

 // pinterest - Social Share Buttons

 if(get_option("WP-Social-Share-pinterest")  == 1){

   $html = $html . "<div class='pinterest'><a target='_blank' href='https://www.pinterest.com/pin/?url=". $url ."'>Pinterest</a></div>";
 }


 if(get_option("WP-Social-Share-reddit") == 1){

   $html = $html  . "<div class='reddit'><a target='_blank' href='https;//www.reddit.com/submit?url". $url ."'>Reddit</a></div>";
 }


add_filter('the_content', 'add_social_share_button');


?>
