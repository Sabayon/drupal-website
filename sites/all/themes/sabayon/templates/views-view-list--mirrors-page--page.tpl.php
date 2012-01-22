<?php
/**
 * @file views-view-list.tpl.php
 * Default simple view template to display a list of rows.
 *
 * - $title : The title of this group of rows.	gMay be empty.
 * - $options['type'] will either be ul or ol.
 * @ingroup views_templates
 */
?>
<?php print $wrapper_prefix; ?>
	<?php if (!empty($title)) : ?>
		<h2><?php print $title; ?></h2>
		<?php $flagname = str_replace(' ', '-', $title); ?>
		<img alt="<?php print $flagname; ?>" src="https://static.sabayon.org/site/img/flags/<?php print $flagname; ?>.png" class="flag flag-<?php print strtolower($flagname); ?>"/>
	<?php endif; ?>
	<?php print $list_type_prefix; ?>
	 <?php foreach ($rows as $id => $row): ?>
		<li class="<?php print $classes_array[$id]; ?>"><?php print $row; ?></li>
	<?php endforeach; ?>
	<?php print $list_type_suffix; ?>
<?php print $wrapper_suffix; ?>
