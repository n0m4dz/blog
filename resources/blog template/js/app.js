/**
 * @package Live
 * @since   1.0
 */

// -----------------------------------------------------------------------------

'use strict';

// -----------------------------------------------------------------------------

// Imports
document.write('<script src="js/jquery.smooth-scroll.min.js"></script>');
document.write('<script src="js/simple-lightbox.min.js"></script>');
document.write('<script src="js/stickyfill.min.js"></script>');

document.write('<script src="js/_addons.js"></script>');

// Variables
var Live;

// -----------------------------------------------------------------------------

(function($) {

	// -------------------------------------------------------------------------

	/**
	 * Live
	 *
	 * @since 1.0
	 *
	 * @param array config
	 */
	Live = function(config) {

		var _this = this;

		// Configuration
		if (typeof config == 'undefined') {
			config = {};
		}

		this.config = $.extend({}, {

			/**
			 * Debug mode
			 *
			 * @since 1.0
			 * @var bool
			 */
			debug: false,

			/**
			 * Simple icons path
			 *
			 * @since 1.0
			 * @var string
			 */
			simpleIconsPath: 'components/simple-icons',

			/**
			 * Simple lightbox options
			 *
			 * @since 1.0
			 * var array
			 */
			simpleLightboxOptions: {
				widthRatio:  0.9,
				heightRatio: 0.95
			}

		}, config);

		// jQuery
		$(document).ready(function() {

			// Initialization
			_this.init();

		});

	};

	Live.prototype = {

		// ---------------------------------------------------------------------

		/**
		 * Configuration
		 *
		 * @since 1.0
		 */
		config: {},

		// ---------------------------------------------------------------------

		/**
		 * Constructor
		 *
		 * @since 1.0
		 */
		constructor: Live,

		// ---------------------------------------------------------------------

		/**
		 * Initialization
		 *
		 * @since 1.0
		 */
		init: function() {

			var
				_this = this,
				root  = $('html');

			// JavaScript enabled
			root
				.removeClass('no-js')
				.addClass('js');

			// Touch device
			if ('ontouchstart' in document.documentElement) {
				root
					.removeClass('no-touch')
					.addClass('touch');
			}

			// DOM
			this.initDOM(root);

		},

		// ---------------------------------------------------------------------

		/**
		 * Page structure initialization
		 *
		 * @since 1.0
		 *
		 * @param object context
		 * @param bool   ajax
		 */
		initDOM: function(context, ajax) {

			if (typeof context == 'undefined') {
				context = $('html');
			}

			if (typeof ajax == 'undefined') {
				ajax = false;
			}

			var _this = this;

			// Body
			$('body', context).each(function() {

				var body = $(this);

				// Parallax background
				$('> .background-parallax', body).parallaxTransform();

			});

			// Holder
			$('.holder', context).each(function() {

				var
					holder  = $(this),
					sidebar = $('.holder-sidebar', holder);

				// Sticky content/sidebar
				$('.holder-content, .holder-sidebar', holder).Stickyfill();

				$(window).load(Stickyfill.rebuild);
				setInterval(function() {
					if (document.hasFocus()) {
						Stickyfill.rebuild();
					}
				}, 1000);

				// Widgets
				sidebar.bricks({
					columns:       2,
					minWidth:      270,
					optimizeSpace: true,
					precise:       false
				});

			});

			$('.holder-bricks', context).each(function() {

				var holder = $(this);

				holder.bricks({
					columns:  holder.getData('holder-columns', 2),
					minWidth: holder.getData('holder-min-width', 420),
					precise:  false
				});

			});

			// Header
			$('#header', context).each(function() {

				var
					header = $(this),
					main   = $('.main', header),
					nav    = $('nav', header);

				// Navigation
				$('a[href="#"]', nav).click(function(event) {
					event.preventDefault();
				});

				// Sub menu
				$('li:has(> ul)', nav).addClass('has-sub-menu');

				// Sub menu screen bumb
				$(document).on('mouseenter', '#header nav li.has-sub-menu', function() {

					var
						li = $(this),
						sub_menu = $('> ul', li);

					sub_menu.toggleClass('left', li.offset().left + li.width() + sub_menu.outerWidth(true) > $(window).width());

				});

				// Horizontal split
				if (main.is('.horizontal-align-center') && nav.length == 1) {

					var
						li      = $('> ul > li', nav),
						li_half = li.filter(function(index) { return index >= Math.floor(li.length / 2); }),
						sec_nav = $('<nav />');

					sec_nav
						.append('<ul />')
							.find('> ul')
							.append(li_half.clone());

					if (nav.is('[class]')) {
						sec_nav.addClass(nav.attr('class'));
					}

					nav.after(sec_nav);

					li_half.addClass('media-regular-none-important');

				}

			});

			// Footer
			$('#footer', context).each(function() {

				var
					footer = $(this),
					refresh;

				// Stick to bottom
				refresh = function() {
					footer.parent().css('padding-bottom', footer.outerHeight());
				};

				$(window)
					.resize(refresh)
					.load(refresh);

				refresh();

				// Back to top
				$('.end-note .back', footer).smoothScroll({
					speed:           'auto',
					autoCoefficient: 8
				});

			});

			// SVG images
			$('[data-svg]:not(:has(svg))', context).each(function() {

				var el = $(this);

				$.get(el.data('svg'), function(data) {
					var svg = $('svg', data).removeAttr('xmlns:a');
					el.append(svg);
				});

			});

			// Forms
			$('input[type="button"], input[type="reset"], input[type="submit"]', context).each(function() {
				var submit = $(this);
				submit
					.changeTag('button')
					.text(submit.val())
					.removeAttr('value');
			});

			$('button, .button', context).each(function() {

				var button = $(this);

				if (!button.is(':has(span)')) {

					button.wrapInner('<span />');
					$('span', button).attr('data-hover', button.text());

					if (button.is('[type="submit"], .spinner')) {
						$('<div />', {class: 'spinner'})
							.spinner()
							.appendTo(button);
					}

				}

			});

			// Gallery
			$('.gallery', context).each(function() {

				var
					gallery = $(this),
					columns = gallery.getData('gallery-columns', 4);

				gallery.bricks({
					columns:  columns,
					minWidth: gallery.getData('gallery-min-width', 600/columns)
				});

				$('a', gallery).simpleLightbox(_this.config.simpleLightboxOptions);

			});

			// Photostream
			$('.photostream', context).each(function() {

				var
					photostream = $(this),
					items       = $('.items', photostream);

				$('a', items).simpleLightbox(_this.config.simpleLightboxOptions);

			});

			// Slideshow
			$('.slideshow', context).each(function() {
				var slideshow = $(this);
				slideshow.slideshow(slideshow.getDataArray('slideshow'));
			});

			// Countdown timer
			$('.tag-countdown', context).countdown();

			// Broadcast
			$('.broadcast', context).each(function() {

				var broadcast = $(this);

				broadcast.broadcast($.extend({}, broadcast.getDataArray('broadcast'), {

					onEntry: function(el) {
						setTimeout(function() {
							el.closest('.bricks').bricks('refresh');
						}, 800);
					}

				}));

			});

			// Twitter
			$('.twitter', context).each(function() {

				var twitter = $(this);

				twitter.twitter($.extend({}, twitter.getDataArray('twitter'), {

					onUpdate: function(el) {
						el.imagesLoaded(function() {
							el.closest('.bricks').bricks('refresh');
						});
					}

				}));

			});

			// Share
			$('.share a[href]:not(:has(svg))', context).each(function() {

				var
					a    = $(this),
					icon = a.getData('icon', false);

				if (!icon || icon == 'auto') {

					var
						href = a.attr('href'),
						url;

					if (href.indexOf('mailto:') == 0) {
						icon = 'email';
					} else if (url = href.match(/[\.\/]([a-z0-9]+)\.(com|net|org|io|tv)\b/)) {
						icon = url[1];
					} else {
						return;
					}

					a.attr('data-icon', icon);

				}

				$.get(_this.config.simpleIconsPath + '/' + icon + '.svg', function(data) {
					var svg = $('svg', data).removeAttr('xmlns:a');
					a.append(svg, svg.clone());
				});

			});

			// Embed
			$('.embed', context).each(function() {

				var
					embed = $(this),
					ratio = embed.getData('embed-ratio', false),
					child = $('> iframe, > embed, > object', embed);

				if (ratio) {
					embed.css('padding-bottom', (100/parseFloat(ratio)) + '%');
				} else if (child.length > 0 && child.is('[width][height]')) {
					embed.css('padding-bottom', (100*child.attr('height')/child.attr('width')) + '%');
				}

			});

			// Contact form
			$('.contact-form', context).submit(function(event) {

				var
					cf      = $(this),
					data    = cf.serialize(),
					inputs  = $('input, textarea', cf),
					submit  = $('[type="submit"]', cf),
					message = $('.contact-form-message', cf);

				inputs.prop('disabled', true);
				submit.prop('disabled', true);
				message.text('');

				$.ajax({

					url:      cf.attr('action'),
					type:     'POST',
					data:     data,
					dataType: 'json',

					success: function(data) {
						if (data === null) {
							submit.addClass('error');
						} else {
							if (data.result) {
								inputs.val('');
							}
							message.text(data.message);
						}
					},

					error: function() {
						submit.addClass('error');
					},

					complete: function() {
						inputs.prop('disabled', false);
						submit.prop('disabled', false);
					}

				});

				event.preventDefault();

			});

			// Modal
			$('.modal[id]', context).each(function() {

				var
					overlay = $('.modal-overlay'),
					modal   = $(this),
					id      = modal.attr('id'),
					open,
					close;

				open = function() {
					overlay.addClass('visible');
					modal.addClass('opened');
				};

				close = function() {
					overlay.removeClass('visible');
					$('.modal[id]', context).removeClass('opened');
				};

				if (overlay.length == 0) {
					overlay = $('<div />', {class: 'modal-overlay'});
					overlay
						.click(close)
						.prependTo('body');
				}

				$('body').on('click', 'a[href="#' + id + '"]', function(event) {
					open();
					event.preventDefault();
				})

				$('.close', modal).click(close);

			});

			// Post loader
			$('.post-loader', context).each(function() {

				var
					pl          = $(this),
					posts_count = 0;

				pl.postLoader($.extend({}, pl.getDataArray('postLoader'), {

					onLoad: function(el) {

						var
							posts     = $('.post-loader-posts .box-post', el),
							new_posts = posts.filter(function(index) {
								return index >= posts_count;
							});

						posts_count = posts.length;

						_this.initDOM(new_posts, true);

					}

				}));

			});

			// Boxes
			(function() {

				var
					boxes = context.filter('.box-post, .box-page').add('.box-post, .box-page', context),
					posts = boxes.filter('.box-post');

				// Lazy show
				posts.lazyShow({
					forceHide: ajax
				});

				boxes.each(function() {

					var
						box              = $(this),
						featured_gallery = $('.featured-gallery', box),
						refresh;

					// Featured gallery
					$('a', featured_gallery).simpleLightbox(_this.config.simpleLightboxOptions);

					refresh = function() { // FF, IE bug
						featured_gallery
							.css('width', 'auto')
							.css('width', $('img:eq(0)', featured_gallery).width());
					};

					$(window)
						.resize(refresh)
						.load(refresh);

					// Images
					$('.box-content a:has(img)', box)
						.filter(function() {
							return $(this).parentsUntil('.box-content', '.gallery').length == 0;
						})
						.simpleLightbox(_this.config.simpleLightboxOptions);

				});

			})();

		},

	};

})(jQuery);