/*price range*/

$('#sl2').slider();

var RGBChange = function () {
	$('#RGB').css('background', 'rgb(' + r.getValue() + ',' + g.getValue() + ',' + b.getValue() + ')')
};

/*scroll to top*/

$(document).ready(function () {
	$(function () {
		$.scrollUp({
			scrollName: 'scrollUp', // Element ID
			scrollDistance: 300, // Distance from top/bottom before showing element (px)
			scrollFrom: 'top', // 'top' or 'bottom'
			scrollSpeed: 300, // Speed back to top (ms)
			easingType: 'linear', // Scroll to top easing (see http://easings.net/)
			animation: 'fade', // Fade, slide, none
			animationSpeed: 200, // Animation in speed (ms)
			scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
			//scrollTarget: false, // Set a custom target element for scrolling to the top
			scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
			scrollTitle: false, // Set a custom <a> title if required.
			scrollImg: false, // Set true to use image
			activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
			zIndex: 2147483647 // Z-Index for the overlay
		});
	});

	$('#js-catalog').dcAccordion({
		'speed': 300
	});

	let productsEgualHeight = function () {
		let itemHeight = 0;
		let productName = $('.features_items .single-products .product-name');

		productName.each(function () {
			if ($(this).height() > itemHeight) {
				itemHeight = $(this).height();
			}
		});

		productName.each(function () {
			$(this).height(itemHeight);
		});
	};
	productsEgualHeight();

	let cartAjax = function () {
		$('#js-clear-cart').on('click', function () {
			$.ajax({
				url: '/cart/clear',
				type: 'GET',
				success: function (res) {
					showCart(res);
				},
				error: function () {
					alert('error');
				}
			});
		});

		$('#js-show-cart').on('click', function (e) {

			$.ajax({
				url: '/cart/show',
				type: 'GET',
				success: function (res) {
					showCart(res);
				},
				error: function () {
					alert('error');
				}
			});

			return false;
		});

		$('#js-cart .modal-body').on('click', '.del-item', function () {
			let id = $(this).data('id');

			$.ajax({
				url: '/cart/del-item',
				data: {id: id},
				type: 'GET',
				success: function (res) {
					showCart(res);
				},
				error: function () {
					alert('error');
				}
			});
		});

		function showCart(res) {
			$('#js-cart .modal-body').html(res);
			$('#js-cart').modal();
		}


		$('.add-to-cart').on('click', function (e) {
			e.preventDefault();

			let id = $(this).data('id');
			let qty = $('#js-product-qty').val();

			$.ajax({
				url: '/cart/add',
				data: {id: id, qty: qty},
				type: 'GET',
				success: function (res) {
					showCart(res);
				},
				error: function () {
					alert('error');
				}
			});
		});
	};
	cartAjax();
});
