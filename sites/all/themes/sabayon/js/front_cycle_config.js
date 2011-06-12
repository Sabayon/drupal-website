jQuery(document).ready(function() {
	jQuery('div#slides div.region div.content').cycle({
		fx: 'fade',
		speed: '2500',
		timeout: '5000'
	});

	jQuery('div#slides div.region div.content').click(function() {
		jQuery('div#slides div.region div.content').cycle('next');
	});
});
