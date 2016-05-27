/**
 * @package Live
 * @since   1.0.1
 */

// -----------------------------------------------------------------------------

'use strict';

// -----------------------------------------------------------------------------

(function($) {

	$(document).ready(function() {

		$('.demo-switcher').each(function() {

			var
				ds       = $(this),
				demos    = $('.demos', ds),
				index    = $('.tab .index', ds),
				url_demo = window.location.pathname.match(/\/([a-z]+)-.*?$/);

			if (url_demo === null) {
				ds.remove();
				return;
			}

			url_demo = url_demo[1];

			$('li', demos).each(function() {

				var
					li   = $(this),
					demo = $('a', li).attr('href').match(/^([a-z]+)-/)[1];

				if (demo == url_demo) {

					li.addClass('active');
					index.text( (li.index()+1) + '/' + $('li', demos).length );

					ds.one('mouseenter', function() {
						demos.scrollTop( Math.round(li.position().top - (demos.height()-22 - li.height()) / 2) );
					});

				}

			});

		});

	});

})(jQuery);