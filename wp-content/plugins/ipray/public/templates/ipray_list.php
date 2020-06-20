<?php // Don't load directly
if ( ! defined('ABSPATH') ) { die(_("Don't load directly")); }
?>
<!-- prayer submit form -->
<?php require "ipray_alertform.php"; ?>        
<!-- prayer submit form end -->
<!-- prayer newsletter --> 
<?php require "ipray_newsletter.php";?>
<!-- prayer newsletter end --> 
      <!-- prayer container --> 
<div class="ipray-main-container">
<div id="ipray-notifications" data-requesturi="<?php echo base64_encode($_SERVER['REQUEST_URI']) ?>" data-sending-text="<?php echo $default_sending_msg ?>" data-success-msg="<?php echo $prayer_success_msg ?>" data-error-msg="<?php echo $prayer_error_msg ?>"></div>
<?php if($prayer_pagination == 0 || $prayer_pagination == 2 ) { ?>
      <div class="ipray-results-pagination"></div>
<?php } ?>
            <div class="ipray-search-results">
                  <div class="ipray-results-page" data-msg-data-not-found="<?php echo $data_not_found_msg ?>">
                  </div>
                    <div class="ipray-loading" style='text-align: center; display: none;'>
                        <img src="<?php echo IPRAY__LOADER ?>" alt="<?php echo $default_loading_msg ?>" />
                     </div>    
            </div>  
<?php if($prayer_pagination == 1 || $prayer_pagination == 2 ) { ?>              
       <div class="ipray-results-pagination"></div>
<?php } ?>
</div>
 <!-- prayer container end --> 
<form name="ipraylistHiddenForm" id="ipraylistHiddenForm" method="get" action="<?php echo getIprayAjaxUrl() ?>">
    <?php IpraypopulateHiddenFormFields($hidden_fields) ?>
</form>
<script type="text/javascript">
<!--
    $Jq(document).ready(function(){
		IGlobal.init();
	})
// -->
</script>
