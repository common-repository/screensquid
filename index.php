<?php

/*
Plugin Name: ScreenSquid - Visitor Recording
Plugin URI: http://www.screensquid.com
Description: ScreenSquid records the screens of your website visitors.
Author: ScreenSquid
Version: 4.2
License: GPL
Author URI: http://www.screensquid.com
*/

add_action('admin_menu', 'squid_admin_menu');

function squid_admin_menu() {
  
  $svg_logo = 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz48IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4iICJodHRwOi8vd3d3LnczLm9yZy9HcmFwaGljcy9TVkcvMS4xL0RURC9zdmcxMS5kdGQiPjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiIHdpZHRoPSIzNnB4IiBoZWlnaHQ9IjM0cHgiIHZpZXdCb3g9IjAgMCAzNiAzNCIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgMzYgMzQiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxwYXRoIGZpbGw9Im5vbmUiIGQ9Ik0xOC4yODksMTEuMjQ3Ii8+PHBhdGggZmlsbD0ibm9uZSIgZD0iTTE4LjU5NywxMS4yNDciLz48cGF0aCBmaWxsPSJub25lIiBkPSJNMzUuODEzLDEyLjg0NmMwLDAtMy45NzctMC40ODItNS42MTIsMi4zNDRjLTEuNTYxLDIuNywwLjM5OSw0LjI4MS0wLjA5Myw3LjgyMmMtMC40MDQsMi45MS0yLjM2OSw0LjEyMi00LjA3MSw0LjMwMWMxLjMyOS0xLjg3MSwwLjk1NC00Ljc5LDAuNjI5LTYuMjQ0Yy0wLjM2NS0xLjY0MSwxLjY2MS0zLjI5NywxLjY2MS0zLjI5N3MtMi4yODktMC4yNzgtMy4yMywxLjM1Yy0wLjg5NywxLjU1NCwwLjIyOSwyLjQ2NC0wLjA1Myw0LjUwMmMtMC4yMTQsMS41NDItMS4xOSwyLjI1LTIuMTA5LDIuNDM0Yy0wLjY4OC0wLjc4NS0xLjE0OS0xLjgxNS0xLjIzNC0yLjgyMWMtMC4yMjUtMi42NCwwLjg2My00LjM2NywxLjkyLTYuMjdjLTAuMDgxLDAuMDEyLTAuMTYyLDAuMDIyLTAuMjQ2LDAuMDIyYy0wLjg3NywwLTEuNjctMC42NDUtMi4yMzYtMS42NzljLTAuNjk3LDEuNjY4LTEuODE2LDIuNzUxLTMuMDgxLDIuNzUxYy0yLjExNCwwLTMuODI5LTMuMDMtMy44MjktNi43NjdjMC0zLjczNiwxLjcxNS02Ljc2NiwzLjgyOS02Ljc2NmMxLjMyMSwwLDIuNDg0LDEuMTgyLDMuMTczLDIuOTc5YzAuNTU4LTAuOTM5LDEuMzEyLTEuNTE3LDIuMTQ0LTEuNTE3YzAuNDksMCwwLjk1MSwwLjIwNiwxLjM2NCwwLjU2MmMtMS41MzgtNC4yMzgtNS4yMzUtNC44NjktNi41NzItNC45NTFWMS41OTRjMCwwLTAuMDkxLTAuMDA0LTAuMjQ5LDBjLTAuMTU1LTAuMDA0LTAuMjQyLDAtMC4yNDIsMHYwLjAwOWMtMS43MDYsMC4xMDQtNy4yNjYsMS4wNzQtNy4yNjYsOS4zMTljMCw1LjY0Niw0LjE1LDcuMzksMy43MzEsMTIuMzE1Yy0wLjA4MywwLjk4Ny0wLjUyOSwxLjk5OC0xLjE5NCwyLjc3NmMtMC44NjMtMC4yMzctMS43MzItMC45NDctMS45MzEtMi4zODljLTAuMjgzLTIuMDM4LDAuODQ1LTIuOTQ4LTAuMDUzLTQuNTAyYy0wLjk0MS0xLjYyNy0zLjIzLTEuMzUtMy4yMy0xLjM1czIuMDI2LDEuNjU2LDEuNjYsMy4yOTdjLTAuMzI2LDEuNDU5LTAuNzAxLDQuMzksMC42NDMsNi4yNmMtMS43NTEtMC4wOS0zLjg4MS0xLjI3NS00LjMwMy00LjMxN2MtMC40OTEtMy41NDEsMS40NjktNS4xMjItMC4wOTMtNy44MjJjLTEuNjM0LTIuODI3LTUuNjEyLTIuMzQ0LTUuNjEyLTIuMzQ0czMuNTIsMi44NzYsMi44ODQsNS43MjZjLTAuODU1LDMuODM5LTEuOTU5LDEzLjU2Nyw3LjUsMTMuODI5YzMuNzM0LDAuMTAzLDYuNjY3LTEuMDg5LDcuNTA3LTMuMTc0YzAuODQyLDIuMDg1LDMuNzcyLDMuMjc3LDcuNTA3LDMuMTc0YzkuNDYxLTAuMjYyLDguMzU2LTkuOTksNy41MDEtMTMuODI5QzMyLjI5MywxNS43MjMsMzUuODEzLDEyLjg0NiwzNS44MTMsMTIuODQ2eiIvPjxwYXRoIGZpbGw9Im5vbmUiIGQ9Ik0yMi43OTMsMTMuOTE0YzAuMTc2LDAuMTg4LDAuMzc2LDAuMzMsMC41OSwwLjQxMmMwLjU2NCwwLjIxNiwxLjExNi0wLjAzOSwxLjQ2NS0wLjQxMmMwLjQ2Ni0wLjQ5NywwLjc3Mi0xLjMyNSwwLjc3Mi0yLjI2M2MwLTAuNjYyLTAuMTUyLTEuMjY5LTAuNDA1LTEuNzQ0Yy0wLjEwNi0wLjE5OS0wLjIyOS0wLjM3NC0wLjM2Ny0wLjUyMWMtMC4zNDktMC4zNzItMC45MDEtMC42MjctMS40NjUtMC40MTFjLTAuMjE0LDAuMDgyLTAuNDE0LDAuMjI0LTAuNTksMC40MTFjLTAuMTM3LDAuMTQ3LTAuMjYsMC4zMjItMC4zNjcsMC41MjFjLTAuMjUzLDAuNDc2LTAuNDA1LDEuMDgzLTAuNDA1LDEuNzQ0QzIyLjAyMSwxMi41ODgsMjIuMzI3LDEzLjQxNywyMi43OTMsMTMuOTE0eiIvPjxwYXRoIGZpbGw9Im5vbmUiIGQ9Ik0xNy40ODYsMTQuNGMwLjIxMywwLjIyNywwLjQ1MSwwLjQwMSwwLjcwNiwwLjUxM2MwLjc2LDAuMzI5LDEuNTI4LDAuMDAxLDIuMDExLTAuNTEzYzAuNjE4LTAuNjU5LDEuMDI0LTEuNzU2LDEuMDI0LTIuOTk4YzAtMC41NDItMC4wNzgtMS4wNTgtMC4yMTQtMS41MTljLTAuMTgtMC41OTgtMC40Ni0xLjEwOS0wLjgxLTEuNDhDMTkuNzIsNy44ODksMTguOTUyLDcuNTYsMTguMTkyLDcuODljLTAuMjU1LDAuMTExLTAuNDkzLDAuMjg3LTAuNzA2LDAuNTEzYy0wLjM0OSwwLjM3Mi0wLjYyOSwwLjg4Mi0wLjgwOCwxLjQ4Yy0wLjEzOSwwLjQ2MS0wLjIxNiwwLjk3Ny0wLjIxNiwxLjUxOUMxNi40NjIsMTIuNjQ1LDE2Ljg2NiwxMy43NDIsMTcuNDg2LDE0LjR6Ii8+PC9zdmc+';

  add_menu_page('ScreenSquid Visitor Session Recording', 'ScreenSquid', 'administrator','squid_options', 'squid_overview', $svg_logo);
  add_action( 'admin_init', 'register_squidsettings' );
 }

function register_squidsettings() {
  register_setting('squid-group', 'squid_code');
  register_setting('squid-group', 'squid_contact_enabled');

  register_setting('squid-group', 'squid_contact_color');
  register_setting('squid-group', 'squid_contact_text');
 } 

function squid_overview() { 

  $enabled = get_option('squid_contact_enabled');
  $text = get_option('squid_contact_text');
  $color = get_option('squid_contact_color');

  if (!isset($enabled)) {$enabled = 'on';}
  if (empty($text)) {$text = 'Contact Us';}
  if (empty($color)) {$color = '029acf';}

  ?>

  <div class="wrap">
    <h2>ScreenSquid Visitor Recording</h2>
    <hr />
    <form method="post" action="options.php">
      
      <h4>Setup</h4>

      <?php settings_fields( 'squid-group' ); ?>

      <p style="width: 70%;">Paste the ID from the <a href="https://www.screensquid.tv">ScreenSquid settings page</a> below. You can find it under "Wordpress Plugin."</p>
      
      <input type="text" name="squid_code" id="squid_code" value="<?php echo get_option('squid_code'); ?>"> 

      <p>If you're having trouble with setup, send us an email at <a href="mailto:support@screensquid.com">support@screensquid.com</a>.</p>
      
      <hr/>

      <h4>Contact Button</h4>

      <p>
      <input type="checkbox" name="squid_contact_enabled" id="squid_contact_enabled"
      <?php if($enabled == 'on') { ?>
      checked
      <?php } ?>
      > <label for="squid_contact_enabled">Enable Contact Button</label>

      </p>
      <p>

      <label>Button Text</label>
      <br />
      <input type="text" name="squid_contact_text" id="squid_contact_text" value="<?php echo $text ?>"> 

      </p><p>

      <label>Button Color (hex)</label>
      <br />
      #<input type="text" name="squid_contact_color" id="squid_contact_color" value="<?php echo $color ?>"> 

      </p>
      <hr />

      <input type="submit" class="button-primary" value="<?php _e('Update') ?>" />

    </form>
  </div>

<?php }

function echosquidcode() {

  ?>

<!-- SceenSquid Satellite Uplink -->
<script id="screensquid">
var __squid_config = {
  "contactEnabled": <?php if(get_option("squid_contact_enabled") == 'on') { echo 'true'; } else { echo 'false'; } ?>,
  "contactColor": "<?php echo get_option("squid_contact_color"); ?>",
  "contactText": "<?php echo get_option("squid_contact_text"); ?>"
};
var __squid = [];
var __squid_id = '<?php echo get_option("squid_code"); ?>';
!function(s,q,u,i,d){s.ScreenSquidObject=u;s[u]||(s[u]=function(){
(s[u].q=s[u].q||[]).push(arguments)});s[u].l=+new Date;i=q.createElement('script');
d=q.scripts[0];i.src='https://www.screensquid.tv/embed/screensquid.js';
d.parentNode.insertBefore(i,d)}(window,document,'screensquid');
</script>
<!-- http://screensquid.com -->
    
  <?php

    global $current_user;
    get_currentuserinfo();

    if($current_user->ID || true) { ?>

      <script type="text/javascript">
        window.__squid.push(['identity', {
          data: {
            id: "<?php echo $current_user->ID; ?>",
            username: "<?php echo $current_user->user_login; ?>",
            level: "<?php echo $current_user->user_level; ?>",
            first_name: "<?php echo $current_user->user_firstname; ?>",
            last_name: "<?php echo $current_user->user_lastname; ?>",
            display_name: "<?php echo $current_user->display_name; ?>"
          },
          email: "<?php echo $current_user->user_email; ?>"
        }]);
      </script>

    <?php 
    }

}

add_action('wp_head', 'echosquidcode');

?>