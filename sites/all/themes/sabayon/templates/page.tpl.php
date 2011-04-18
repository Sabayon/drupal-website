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
		<li><a style="color:#FFF" accesskey="h" href="<?php print $front_page ?>">Home</a></li>
			<li><a accesskey="f" href="http://forum.sabayon.org">Forums</a></li>
			<li><a accesskey="w" href="http://wiki.sabayon.org">Wiki</a></li>
			<li><a accesskey="b" href="http://bugs.sabayon.org">Bugs</a></li>
			<li><a accesskey="p" href="http://planet.sabayon.org">Blog</a></li>
			<li><a accesskey="a" href="http://packages.sabayon.org">Packages</a></li>
			<li><a accesskey="g" href="http://gitweb.sabayon.org">Git</a></li>
			<li><a accesskey="d" href="<?php print $base_path . 'download' ?>">Download</a></li>
		</ul>
	</div>
</div>
<div id="page-wrapper"><div id="page">
	<div id="top_wrapper"><!--top wrapper start -->
		<div class="inside">
			<div id="block1" class="top_block">
				<?php print render($page['top_summary']); ?>
			</div>
			<div id="slides">
				<?php print render($page['top_slides']); ?>
			</div>
			<?php if (!$is_front): ?>
				<?php print render($title_prefix); ?>
				<?php if ($title): ?>
					<h1 class="title" id="page-title"><?php print $title; ?></h1>
				<?php endif; ?>
				<?php print render($title_suffix); ?>
			<?php endif; ?>
		</div>
	</div><!-- top wrapper end -->

	<div id="mid_wrapper">
		<div class="inside"><!-- mid wrapper start -->
			<div id="content">
				<?php if ($is_front): ?>
					<div id="col1" class="col_mid">
						<?php print render($page['front_col_left']); ?>
					</div>
					<div id="col2" class="col_mid col_center">
						<?php print render($page['front_col_mid']); ?>
					</div>
					<div id="col3" class="col_mid">
						<?php print render($page['front_col_right']); ?>
					</div>
				<?php endif; ?>
					<div id="mid_content" class="two_col">
						<?php print render($page['content']); ?>
					</div>
					<div id="mid_content_right" class="col_mid">
						<?php print render($page['content_right']); ?>
					</div>
			</div><!-- /content -->
		</div><!-- /inside -->
	</div> <!-- /mid wrapper -->

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
		</div>
		<div id="umb" class="col_mid col_center">
			<?php print render($page['footer_two_two']); ?>
		</div>
		<div id="nlnet" class="col_mid">
			<?php print render($page['footer_two_three']); ?>
		</div>
	</div>

	<div id="copyright">
		<?php print render($page['copyright']); ?>
	</div>

	</div></div> <!-- footer wrapper end -->

</div></div> <!-- /#page, /#page-wrapper -->

<?php print render($page['bottom']); ?>
