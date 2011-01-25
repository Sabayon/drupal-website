<?php
/**
 * @file
 * Theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
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
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlight']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 * - $page['bottom']: Items to appear at the bottom of the page below the footer.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see zen_preprocess_page()
 * @see template_process()
 */
?>
<div id="sab_global_menu">
	<div id="sab_global_menu_inner" class="inside">
		<ul>
			<li><a style="color:#FFF" accesskey="h" href="http://sabayon.org">Home</a></li>
			<li><a accesskey="f" href="http://forum.sabayon.org">Forums</a></li>
			<li><a accesskey="w" href="http://wiki.sabayon.org">Wiki</a></li>
			<li><a accesskey="b" href="http://bugs.sabayon.org">Bugs</a></li>
			<li><a accesskey="p" href="http://planet.sabayon.org">Blog</a></li>
			<li><a accesskey="a" href="http://packages.sabayon.org">Packages</a></li>
			<li><a accesskey="g" href="http://gitweb.sabayon.org">Git</a></li>
			<li><a accesskey="d" href="http://sabayon.org/mirrors">Download</a></li>
		</ul>
	</div>
</div>
<div id="page-wrapper"><div id="page">
	<div id="top_wrapper"><!--top wrapper start -->
	<div class="inside">

  <div id="header"><div class="section">

    <?php if ($site_name || $site_slogan): ?>
      <div id="name-and-slogan">
        <?php if ($site_name): ?>
          <?php if ($title): ?>
            <h1 id="title" class="title">
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?></a>
            </h1>
          <?php else: /* Use h1 when the content title is empty */ ?>
            <h1 id="site-name">
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
            </h1>
          <?php endif; ?>
        <?php endif; ?>

        <?php if ($site_slogan): ?>
          <div id="site-slogan"><?php print $site_slogan; ?></div>
        <?php endif; ?>
      </div> <!-- /#name-and-slogan -->
    <?php endif; ?>

    <?php print render($page['header']); ?>

  </div></div> <!-- /.section, /#header -->
	</div></div><!-- top wrapper end -->

	<div id="mid_wrapper"><div class="inside"><!-- mid wrapper start -->
  <div id="main-wrapper"><div id="main" class="<?php if ($main_menu || $page['navigation']) { print 'with-navigation'; } ?>">

    <div id="content" class="column"><div class="section">
      <?php print render($page['highlight']); ?>
      <?php print $breadcrumb; ?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <h1 class="title" id="page-title"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php if ($tabs): ?>
        <div class="tabs"><?php print render($tabs); ?></div>
      <?php endif; ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      <?php print $feed_icons; ?>
    </div></div> <!-- /.section, /#content -->

    <?php if ($page['navigation'] || $main_menu): ?>
      <div id="navigation"><div class="section ">

        <?php print theme('links__system_main_menu', array(
          'links' => $main_menu,
          'attributes' => array(
            'id' => 'main-menu',
            'class' => array('links', ''),
          ),
          'heading' => array(
            'text' => t('Main menu'),
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        )); ?>

        <?php print render($page['navigation']); ?>

      </div></div> <!-- /.section, /#navigation -->
    <?php endif; ?>

    <?php print render($page['sidebar_first']); ?>

    <?php print render($page['sidebar_second']); ?>

  </div></div> <!-- /#main, /#main-wrapper -->
  </div></div> <!-- end mid wrapper -->

	<div id="footer_wrapper"><div class="inside"><!-- footer wrapper start -->

      <?php print theme('links__system_secondary_menu', array(
        'links' => $secondary_menu,
        'attributes' => array(
          'id' => 'secondary-menu',
          'class' => array('links'),
        ),
        'heading' => array(
          'text' => t('Secondary menu'),
          'level' => 'h2',
          'class' => array('element-invisible'),
        ),
      )); ?>

	<div id="footer_menu_wrapper">
		<div id="fm1" class="footer_menu first">
			<?php print render($page['footer_first']); ?>
		</div>
		<div id="fm2" class="footer_menu twospace">
			<?php print render($page['footer_second']); ?>
		</div>
		<div id="fm3" class="footer_menu">
			<?php print render($page['footer_third']); ?>
		</div>
		<div id="fm4" class="footer_menu twospace">
			<?php print render($page['footer_fourth']); ?>
		</div>
		<div id="fm5" class="footer_menu">
			<?php print render($page['footer_fifth']); ?>
		</div>
		<div id="fm6" class="footer_menu last">
			<?php print render($page['footer_sixth']); ?>
		</div>
	</div>

	<div id="sp0nsors">
		<h2>Sponsors</h2>
		<div id="uob" class="col_mid">
			<?php print render($page['footer_two_one']); ?>
			<img src="http://static.sabayon.org/site/img/footer/LogoUNIBS.png" alt="NLNet Foundation"/>
			<h3>University of Brescia</h3>
			<p>Housing our Entropy build server inside the Faculty Network Center at the Department of Electronics.</p>
		</div>
		<div id="umb" class="col_mid col_center">
			<?php print render($page['footer_two_two']); ?>
			<img src="http://static.sabayon.org/site/img/footer/bicocca.png" alt="NLNet Foundation"/>
			<h3>University of Milano-Bicocca</h3>
			<p>Housing our Entropy build servers and WWW inside DISCo</p>
		</div>
		<div id="nlnet" class="col_mid">
			<?php print render($page['footer_two_three']); ?>
			<img src="http://static.sabayon.org/site/img/footer/nlnet-160x60.png" alt="NLNet Foundation"/>
			<h3>NLNet Foundation</h3>
			<p>Financially supported the Entropy Project.</p>
		</div>
	</div>

	<div id="copyright">
		<?php print render($page['copyright']); ?>
		<p>&copy; 2004-2011 Sabayon Promotion (CF: 93018620224) - Trademarks are property of their respective owners. </p>
	</div>

	</div></div> <!-- footer wrapper end -->

</div></div> <!-- /#page, /#page-wrapper -->

<?php print render($page['bottom']); ?>
