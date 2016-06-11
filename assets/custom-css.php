<?php
    header("Content-type: text/css; charset: UTF-8");
 $absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
 $wp_load = $absolute_path[0] . 'wp-load.php';
 require_once($wp_load);?>
<?php 
	$lineheight = (get_option('xen_bc_height')-2);
	$arrow = ($lineheight / 2);
	// Get the CSS ?>
	 .breadcrumb {
            background-color: <?php echo get_option('xen_background_color'); ?>;
            padding:0;
            height: <?php echo get_option('xen_bc_height');?>px;
		}
     .breadcrumb .crust a.crumb {
     		color: <?php echo get_option('xen_font_color'); ?>;
		}    
     .breadcrumb .crust:last-child a.crumb {
            font-weight: 700;
            color: <?php echo get_option('xen_font_color'); ?>;
            background-color: <?php echo get_option('xen_active_color'); ?>;
        }
     .breadcrumb .crust:last-child .arrow span {
            border-left-color: <?php echo get_option('xen_active_color'); ?>;
        }
     .breadcrumb .crust.firstVisibleCrumb a.crumb,.breadcrumb .crust:first-child a.crumb {
            background-color: <?php echo get_option('xen_trail_color'); ?>;
            padding-left: 10px;
        }
     .breadcrumb .crust .arrow span {
     		 border-left-color: <?php echo get_option('xen_trail_color'); ?>;
    		-moz-border-right-colors: <?php echo get_option('xen_trail_color'); ?>;
        }   
      .breadcrumb .crust a.crumb, .breadcrumb .crust > a {           
			background-color: <?php echo get_option('xen_trail_color'); ?>;
            line-height: <?php echo $lineheight ?>px;
            }
      .breadcrumb .crust:hover a.crumb {
            background-color: <?php echo get_option('xen_hover_color'); ?>;
        }
        
        .breadcrumb .crust:hover .arrow span {
            border-left-color: <?php echo get_option('xen_hover_color'); ?>;
        }
      .breadcrumb .crust .arrow,  .breadcrumb .crust .arrow span
        {
            border-top-width: <?php echo $arrow; ?>px;
            border-bottom-width: <?php echo $arrow; ?>px;
            border-left-width: 12px;
        }
         .breadcrumb .crust .arrow span
            {
                top: -<?php echo $arrow; ?>px;
                left: -13px;
            }      	
	<?php echo get_option('xen_custom_css'); 
?>