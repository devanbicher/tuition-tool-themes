<?php
/**
 * @file
 * Adaptivetheme implementation to display a single Drupal page.
 *
 * Available variables:
 * 
 * Adaptivetheme supplied variables:
 * - $site_logo: Themed logo - linked to front with alt attribute.
 * - $site_name: Site name linked to the homepage.
 * - $site_name_unlinked: Site name without any link.
 * - $hide_site_name: Toggles the visibility of the site name.
 * - $visibility: Holds the class .element-invisible or is empty.
 * - $primary_navigation: Themed Main menu.
 * - $secondary_navigation: Themed Secondary/user menu.
 * - $primary_local_tasks: Split local tasks - primary.
 * - $secondary_local_tasks: Split local tasks - secondary.
 * - $tag: Prints the wrapper element for the main content.
 * - $is_mobile: Mixed, requires the Mobile Detect or Browscap module to return
 *   TRUE for mobile.  Note that tablets are also considered mobile devices.
 *   Returns NULL if the feature could not be detected.
 * - $is_tablet: Mixed, requires the Mobile Detect to return TRUE for tablets.
 *   Returns NULL if the feature could not be detected.
 * - *_attributes: attributes for various site elements, usually holds id, class
 *   or role attributes.
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Core Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * Adaptivetheme Regions:
 * - $page['leaderboard']: full width at the very top of the page
 * - $page['menu_bar']: menu blocks placed here will be styled horizontal
 * - $page['secondary_content']: full width just above the main columns
 * - $page['content_aside']: like a main content bottom region
 * - $page['tertiary_content']: full width just above the footer
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see adaptivetheme_preprocess_page()
 * @see adaptivetheme_process_page()
 */
?>

<div id="page-wrapper">
  <div id="page" class="container <?php print $classes; ?>">
    <div id="emergencyalert">
      <script type="text/javascript" src="https://s3.amazonaws.com/widgets.omnilert.net/1397c767b627776244abee8c6f1e1f96-1691"></script>
    </div>

    <!-- !Leaderboard Region -->
    <?php print render($page['leaderboard']); ?>

    <header<?php print $header_attributes; ?>>


      <!-- !Header Region -->

<?php /*print render($page['header']); */?>

    <div class = "header-title">
    <h1>
    <a href = "/"> Graduate Tuition & Aid Tool</a>
    </h1>
    </div>
    <div class = "dept-and-links">
    <div class = "header-dept">
    <h2>
        <?php print $page['header-dept'];?>
    </h2>
    </div>
    <div class = "header-nav">
<?php //if ($primary_navigation): print $primary_navigation; //REMOVE THIS AFTER FINAL TESTING endif;?>
         <?php //print theme('links', array('links' => menu_navigation_links('menu-graduate-admin-menu'))); ?>
         <?php print $page['custom-header-menu']; ?> 
    </div>
    </div>
    </header>

    <!-- !Navigation -->
    <?php print render($page['menu_bar']); ?>
    <?php if ($secondary_navigation): print $secondary_navigation; endif; ?>

    <!-- !Breadcrumbs -->
    <?php if ($breadcrumb): print $breadcrumb; endif; ?>

    <!-- !Messages and Help -->
    <?php print $messages; ?>
    <?php print render($page['help']); ?>

    <!-- !Secondary Content Region -->
    <?php print render($page['secondary_content']); ?>

    <!-- !Highlighted region -->
    <?php print render($page['highlighted']); ?>

    <div id="columns" class="columns clearfix">
      <main id="content-column" class="content-column" role="main">
        <div class="content-inner">
          <<?php print $tag; ?> id="main-content">

            <?php print render($title_prefix); // Does nothing by default in D7 core ?>

            <!-- !Main Content Header -->
            <?php if ($title || $primary_local_tasks || $secondary_local_tasks || $action_links = render($action_links)): ?>
              <header<?php print $content_header_attributes; ?>>

                <?php if ($title): ?>
                  <h1 id="page-title">
                    <?php if($title == 'User login'): ?>
                        You Must Be Logged in to use this site. Please Log in below.
                    <?php else: ?>
                        <?php print $title; ?>
                    <?php endif; ?>              
                  </h1>
                  <h1 id="dept-for-content">
                        <?php if(isset($node)): print print_bundle_type($node->type); endif; ?>
                  </h1>
                <?php endif; ?>

                <?php if ($primary_local_tasks || $secondary_local_tasks || $action_links): ?>
                  <div id="tasks">

                    <?php if ($primary_local_tasks): ?>
                      <ul class="tabs primary clearfix"><?php print render($primary_local_tasks); ?></ul>
                    <?php endif; ?>

                    <?php if ($secondary_local_tasks): ?>
                      <ul class="tabs secondary clearfix"><?php print render($secondary_local_tasks); ?></ul>
                    <?php endif; ?>

                    <?php if ($action_links = render($action_links)): ?>
                      <ul class="action-links clearfix"><?php print $action_links; ?></ul>
                    <?php endif; ?>

                  </div>
                <?php endif; ?>

              </header>
            <?php endif; ?>

            <!-- !Main Content -->
            <?php if ($content = render($page['content'])): ?>
              <div id="content" class="region">
              <?php if(isset($node)): //there might be an issue with seeing this box in revisions.?>
                    <?php if(is_an_entry($node->type)): ?>
                        <?php print process_entry_content($content,$node->type); ?>
                    <?php else:?> 
                        <?php print $content; ?>
                    <?php endif; ?>
               <?php else:?> 
                    <?php print $content; ?>
                <?php endif; ?>
              </div>
	      <?php endif; //end of if content?>

            <?php if(isset($node)): ?>
                <?php if(is_an_entry($node->type)): ?>
		    <?php if(property_exists($node,'is_current')): ?>
			<?php if($node->is_current): ?>
                           <div class="aid-stats">
                              <?php $tbl = get_aid_counts($node); ?>
                                 <?php printf($tbl[0],
                                              $tbl[1],$tbl[2],$tbl[3],$tbl[4],
                                              $tbl[5],$tbl[6],$tbl[7],$tbl[8],
                                              $tbl[9],$tbl[10],$tbl[11],$tbl[12]); ?>
                           </div>
		         <?php endif; //end of if $node->is_cuurent ?>
		       <?php endif; //end of if $node has the property is_current ?>
		    <?php endif; //end of if this node is an entry type?>
            <?php endif;// end of if $node is set for aid counts?>

            <!-- !Feed Icons -->
            <?php print $feed_icons; ?>

            <?php print render($title_suffix); // Prints page level contextual links ?>

          </<?php print $tag; ?>><!-- /end #main-content -->

          <!-- !Content Aside Region-->
          <?php print render($page['content_aside']); ?>

        </div><!-- /end .content-inner -->
      </main><!-- /end #content-column -->

      <!-- !Sidebar Regions -->
      <?php $sidebar_first = render($page['sidebar_first']); print $sidebar_first; ?>
      <?php $sidebar_second = render($page['sidebar_second']); print $sidebar_second; ?>

    </div><!-- /end #columns -->

    <!-- !Tertiary Content Region -->
    <?php print render($page['tertiary_content']); ?>

    <!-- !Footer -->
      <footer<?php print $footer_attributes; ?>>
         <?php if($footer = render($page['footer'])): ?>
             <?php print $footer; ?>
         <?php endif; ?>

      </footer>
  </div>
</div>
