<?php
	$post_title = wp_kses_post($instance['widget_title']);
	$allpostsbtn = wp_kses_post($instance['allpostsbtn']);
	$allpostsurl = sow_esc_url($instance['allpostsurl']);
	$EventHeading = (!empty($post_title))? $post_title : __('Upcoming Events','framework');
?>
<div id="ajax_events"> 
        	<!-- Events Listing -->
            <div class="listing events-listing">
            <header class="listing-header">
            	<div class="row">
                	<div class="col-md-6 col-sm-6">
          				<h3><?php _e('All events', 'framework'); ?></h3>
                  </div>
                  <div class="listing-header-sub col-md-6 col-sm-6">
                    <?php 
						if(get_query_var('calendar'))
						{
							$currentEventTime = esc_attr(get_query_var('calendar'));
						}
						else
						{
							$currentEventTime = date_i18n('Y-m');
						}
						$prev_month = date_i18n('Y-m', strtotime('-1 month', strtotime($currentEventTime)));
						$next_month = date_i18n('Y-m', strtotime('+1 month', strtotime($currentEventTime)));
						
						$event_category = imic_get_term_category(get_the_ID(),'imic_advanced_event_list_taxonomy');
						$today = date_i18n('Y-m-d');				  
						$before_week = date_i18n('Y-m-d', strtotime("-7 days"));
						$currentTime = date_i18n('Y-m-d');
						$events = imic_recur_events('','',$event_category,$currentEventTime);
				  ?>
                  	<h5><?php echo date_i18n('F', strtotime($currentEventTime)); ?></h5>
                    	<nav class="next-prev-nav">
                    		<a href="javascript:" class="upcomingEvents" rel="<?php echo esc_attr($event_category); ?>" id="<?php echo esc_attr($prev_month); ?>"><i class="fa fa-angle-left"></i></a>
                    		<a href="javascript:" class="upcomingEvents" rel="<?php echo esc_attr($event_category); ?>" id="<?php echo esc_attr($next_month); ?>"><i class="fa fa-angle-right"></i></a>
                     	</nav>
                  </div>
              </div>
            </header>
            <section class="listing-cont">
              <ul>
              	<?php
                                $this_month_last = strtotime(date('Y-m-t 23:59'));
	                            $google_events = getGoogleEvent($this_month_last);
								if(!empty($google_events)) $new_events = $google_events+$events;
								else $new_events = $events;
				                ksort($new_events);
                                 if(!empty($new_events))
								 {
									foreach($new_events as $key=>$value) {
									if(preg_match('/^[0-9]+$/',$value))
									{
									  $eventStartTime =  strtotime(get_post_meta($value, 'imic_event_start_tm', true));
									  $eventStartDate =  strtotime(get_post_meta($value, 'imic_event_start_dt', true));
									  $eventEndTime   =  strtotime(get_post_meta($value, 'imic_event_end_tm', true));
									  $eventEndDate   =  strtotime(get_post_meta($value, 'imic_event_end_dt', true));
									  
									  $evstendtime = $eventStartTime.'|'.$eventEndTime;
									  $evstenddate = $eventStartDate.'|'.$eventEndDate;
									  
									  $event_dt_out = imic_get_event_timeformate( $evstendtime,$evstenddate,$value,$key);
			                          $event_dt_out = explode('BR',$event_dt_out);
									  
									   if($eventStartTime!='') 
									   { 
										 $eventStartTime = date_i18n(get_option('time_format'),$eventStartTime);
									   }
									   $date_converted=date_i18n('Y-m-d',$key );
									   $custom_event_url = imic_query_arg($date_converted,$value);
									   $event_title=get_the_title($value);
									   $stime = ''; 
										 if($eventStartTime!='') 
										 { 
											$stime = ' | '.$eventStartTime;
										 }
									 } 
									  else
									  {
										 $google_data =(explode('!',$value));
										 $event_title=$google_data[0];
									   $custom_event_url=$google_data[1];
									    $options = get_option('imic_options');
									   $eventTime =$key;
									   if($eventTime!='') { $eventTime = date_i18n( get_option( 'time_format' ),$key); }
									 $eventEndTime =$google_data[2];
								  if($eventEndTime!='')
								   {
									   $eventEndTime = ' - '.date_i18n( get_option( 'time_format' ),strtotime($eventEndTime));
									}
								   $eventAddress=$google_data[3];
								  
							$event_dt_out = imic_get_event_timeformate($key.'|'.strtotime($google_data[2]),$key.'|'.$key,$value,$key);
						    $event_dt_out = explode('BR',$event_dt_out);
									} 
						 if($key>date_i18n('U')) {
			 ?>
                    <li id="<?php echo date_i18n('y-n-d',$key); ?>" class="item event-item event-id">	
                      <div class="event-date"> <span class="date"><?php echo date_i18n('d',$key); ?></span>
                       <span class="month"><?php echo imic_global_month_name($key); ?></span> </div>
                      <div class="event-detail">
                      <h4>
                      <a href="<?php echo esc_url($custom_event_url); ?>">
					   <?php echo esc_attr($event_title); ?> </a><?php echo imicRecurrenceIcon($value); ?>
                      </h4>
                     <span class="event-dayntime meta-data">
					   <?php echo ''.$event_dt_out[1].',&nbsp;&nbsp;'.$event_dt_out[0] ?>
                     </span> </div>
                      <div class="to-event-url">
                        <div><a href="<?php echo esc_url($custom_event_url); ?>" class="btn btn-default btn-sm"><?php _e('Details','framework'); ?></a></div>
                      </div>
                    </li> 
                                  <?php }
				 }
			}
                else{ ?>
			<li class="item event-item">	
                      <div class="event-detail">
                        <h4><?php _e('Sorry, there are no events for this month.','framework'); ?></h4>
                      </div>
                    </li>  
				<?php }?>
              </ul>
            </section>
          </div>
        </div>