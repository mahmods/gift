/*
Main Javascript file (main.js)
Table of Contents :
- Top loader - pace 1.0.0 minified (line 8)
- Scrolling - Slim scroll 1.3.1 minified (line 10)
- Custom Code - 1.1 (line 12)
*/
// Slimscroll 
!function(e){jQuery.fn.extend({slimScroll:function(i){var o={width:"auto",height:"250px",size:"7px",color:"#000",position:"right",distance:"1px",start:"top",opacity:.4,alwaysVisible:!1,disableFadeOut:!1,railVisible:!1,railColor:"#333",railOpacity:.2,railDraggable:!0,railClass:"slimScrollRail",barClass:"slimScrollBar",wrapperClass:"slimScrollDiv",allowPageScroll:!1,wheelStep:20,touchScrollStep:200,borderRadius:"7px",railBorderRadius:"7px"},r=e.extend(o,i);return this.each(function(){function o(t){if(h){var t=t||window.event,i=0;t.wheelDelta&&(i=-t.wheelDelta/120),t.detail&&(i=t.detail/3);var o=t.target||t.srcTarget||t.srcElement;e(o).closest("."+r.wrapperClass).is(x.parent())&&s(i,!0),t.preventDefault&&!y&&t.preventDefault(),y||(t.returnValue=!1)}}function s(e,t,i){y=!1;var o=e,s=x.outerHeight()-M.outerHeight();if(t&&(o=parseInt(M.css("top"))+e*parseInt(r.wheelStep)/100*M.outerHeight(),o=Math.min(Math.max(o,0),s),o=e>0?Math.ceil(o):Math.floor(o),M.css({top:o+"px"})),v=parseInt(M.css("top"))/(x.outerHeight()-M.outerHeight()),o=v*(x[0].scrollHeight-x.outerHeight()),i){o=e;var a=o/x[0].scrollHeight*x.outerHeight();a=Math.min(Math.max(a,0),s),M.css({top:a+"px"})}x.scrollTop(o),x.trigger("slimscrolling",~~o),n(),c()}function a(){window.addEventListener?(this.addEventListener("DOMMouseScroll",o,!1),this.addEventListener("mousewheel",o,!1),this.addEventListener("MozMousePixelScroll",o,!1)):document.attachEvent("onmousewheel",o)}function l(){f=Math.max(x.outerHeight()/x[0].scrollHeight*x.outerHeight(),m),M.css({height:f+"px"});var e=f==x.outerHeight()?"none":"block";M.css({display:e})}function n(){if(l(),clearTimeout(p),v==~~v){if(y=r.allowPageScroll,b!=v){var e=0==~~v?"top":"bottom";x.trigger("slimscroll",e)}}else y=!1;return b=v,f>=x.outerHeight()?void(y=!0):(M.stop(!0,!0).fadeIn("fast"),void(r.railVisible&&E.stop(!0,!0).fadeIn("fast")))}function c(){r.alwaysVisible||(p=setTimeout(function(){r.disableFadeOut&&h||u||d||(M.fadeOut("slow"),E.fadeOut("slow"))},1e3))}var h,u,d,p,g,f,v,b,w="<div></div>",m=30,y=!1,x=e(this);if(x.parent().hasClass(r.wrapperClass)){var C=x.scrollTop();if(M=x.parent().find("."+r.barClass),E=x.parent().find("."+r.railClass),l(),e.isPlainObject(i)){if("height"in i&&"auto"==i.height){x.parent().css("height","auto"),x.css("height","auto");var H=x.parent().parent().height();x.parent().css("height",H),x.css("height",H)}if("scrollTo"in i)C=parseInt(r.scrollTo);else if("scrollBy"in i)C+=parseInt(r.scrollBy);else if("destroy"in i)return M.remove(),E.remove(),void x.unwrap();s(C,!1,!0)}}else{r.height="auto"==r.height?x.parent().height():r.height;var S=e(w).addClass(r.wrapperClass).css({position:"relative",overflow:"hidden",width:r.width,height:r.height});x.css({overflow:"hidden",width:r.width,height:r.height});var E=e(w).addClass(r.railClass).css({width:r.size,height:"100%",position:"absolute",top:0,display:r.alwaysVisible&&r.railVisible?"block":"none","border-radius":r.railBorderRadius,background:r.railColor,opacity:r.railOpacity,zIndex:90}),M=e(w).addClass(r.barClass).css({background:r.color,width:r.size,position:"absolute",top:0,opacity:r.opacity,display:r.alwaysVisible?"block":"none","border-radius":r.borderRadius,BorderRadius:r.borderRadius,MozBorderRadius:r.borderRadius,WebkitBorderRadius:r.borderRadius,zIndex:99}),R="right"==r.position?{right:r.distance}:{left:r.distance};E.css(R),M.css(R),x.wrap(S),x.parent().append(M),x.parent().append(E),r.railDraggable&&M.bind("mousedown",function(i){var o=e(document);return d=!0,t=parseFloat(M.css("top")),pageY=i.pageY,o.bind("mousemove.slimscroll",function(e){currTop=t+e.pageY-pageY,M.css("top",currTop),s(0,M.position().top,!1)}),o.bind("mouseup.slimscroll",function(e){d=!1,c(),o.unbind(".slimscroll")}),!1}).bind("selectstart.slimscroll",function(e){return e.stopPropagation(),e.preventDefault(),!1}),E.hover(function(){n()},function(){c()}),M.hover(function(){u=!0},function(){u=!1}),x.hover(function(){h=!0,n(),c()},function(){h=!1,c()}),x.bind("touchstart",function(e,t){e.originalEvent.touches.length&&(g=e.originalEvent.touches[0].pageY)}),x.bind("touchmove",function(e){if(y||e.originalEvent.preventDefault(),e.originalEvent.touches.length){var t=(g-e.originalEvent.touches[0].pageY)/r.touchScrollStep;s(t,!0),g=e.originalEvent.touches[0].pageY}}),l(),"bottom"===r.start?(M.css({top:x.outerHeight()-M.outerHeight()}),s(0,!0)):"top"!==r.start&&(s(e(r.start).position().top,null,!0),r.alwaysVisible||M.hide()),a()}}),this}}),jQuery.fn.extend({slimscroll:jQuery.fn.slimScroll})}(jQuery);
// Custom script code
$(document).ready(function(){
	// Disable cache
	$.ajaxSetup({ cache: false });
	// Cart products
	function cart(){
		//$("#cart-content").html('<div class="loading"></div>');
		$.getJSON('api/cart', function (data){
			//$("#cart-header").html(data.header);
			if (data.count > 0){
				if ($(".cart-counter").length) {
					$( ".cart-counter" ).html(data.count);
				}
				var cart = '';
				$.each(data.products, function(index,elem){
					//cart += 'data-id="'+elem.id+'" class="remove-cart icon-trash"></i></h6><p>'+elem.price+' x '+elem.quantity+'<b>'+elem.total+'</b><br>'+elem.options+'</p></div><div class="clearfix"></div></div>';
					cart += `
					<!-- Cart Item -->
					<li class="table-style">
						<a href="#" class="image"><img src="assets/products/${elem.images}" alt=""></a>
						<div class="info">
							<a href="product-single.html"><h3>${elem.title}</h3></a>
							<span class="qty">x${elem.quantity}</span>
							<a href="javascript:void(0);" data-id=${elem.id} class="remove-item remove-cart ti-close-a"></a>
						</div>
					</li>
					`
				});
				//cart += data.coupon;
				//cart += '<div class="btn-clear"></div><button class="cart-btn cart-checkout bg">'+checkout+'</button>';
				$("#cart-content ul").html(cart);
			} else {
				$("#cart-content ul").html('<div class="empty-cart"><i class="icon-basket"></i><h5>'+empty_cart+'</h5></div>');
				$( ".cart-counter ul" ).remove();
			}
		});
	};
	cart();
	// Cart show/hide
	$("body").on('click','.toggle-cart',function() {
		$("#cart").toggle("300");
		$("#cart").toggleClass("cart-open");
	});
	// Load cart
	$("body").on('click','.load-cart',function() {
		cart();
	});
	// Cart scrolling
	/* $('#cart-content').slimScroll({
        height: 'auto',
		scrollTo : 0,
    }); */
	// Apply coupon code
	$("body").on('click','#apply',function() {
        var code = $("#code").val();
		$("#apply").html('<div class="loading"></div>');
		$.ajax({ 
				url: 'api/coupon?code='+code,
				type: 'get',
				crossDomain: true,
			}).done(function(response) {
				if (response == 'success'){
					cart();
				} else {
					$("#apply").html('Invalid !');
				}
			}).fail(function() {
				$("#apply").html('Failed !');
			});
    });
	// Cart checkout
	$("body").on('click','.cart-checkout',function() {
		$("#cart-content").html('<div class="loading"></div>');
		$.ajax({ 
				url: 'api/checkout',
				type: 'get',
				crossDomain: true,
			}).done(function(response){
				fields = JSON.parse(response);
				$("#cart-header").html(fields.header);
				delete fields.header;
				html = '';
				$.each(fields, function(index,field){
					html += field;
				});
				
				html += '<div class="btn-clear"></div><button class="cart-btn cart-payment bg">'+continue_to_payment+'</button></div>';
				$("#cart-content").html(html);
			}).fail(function() {
				console.log('Failed');
			});
	});
	// Cart payment
	$("body").on('click','.cart-payment',function() {
		$(".cart-payment").html('<div class="loading"></div>');
		$.ajax({ 
				url: 'api/payment',
				type: 'post',
				data: $("#customer").serialize(),
				crossDomain: true,
			}).done(function(response){
				fields = JSON.parse(response);
				if (fields.error == 'true'){
					$('#cart-content').slimScroll({
						height: 'auto',
						scrollTo : 0,
					});
					$("#errors").html('<div class="alert alert-warning">'+fields.message+'</div>');
					$(".cart-payment").html(continue_to_payment);
				}else{
				$("#cart-header").html(fields.header);
				delete fields.header;
				html = '';
				$.each(fields, function(index,field){
					html += field;
				});
				$("#cart-content").html(html);
				}
			}).fail(function() {
				console.log('Failed');
			});
	});
	// Add to cart
	$("body").on('click','.add-cart',function() {
		var id = $(this).data('id');
		var quantity = $(".quantity").val();
		var options = $(".options").serialize();
		$(".add-cart").html('<div class="loading"></div>');
		$.ajax({ 
				url: 'api/add?id='+id+'&q='+quantity+'&'+options,
				type: 'get',
			   crossDomain: true,
			}).done(function(response) {
				if (response == 'unavailable'){
					$(".add-cart").html('Stock unavailable');
				} else if (response == 'updated') {
					$(".add-cart").html('Updated');
					cart();
				} else {
					$(".add-cart").html('Success');
					cart();
				}
			}).fail(function() {
				console.log('Failed');
			});
	});
	// Add to cart
	$("body").on('click','.add-cart-fast',function() {
		var id = $(this).data('id');
		var quantity = 1;
		//var options = $(".options").serialize();
		//$(".add-cart").html('<div class="loading"></div>');
		$.ajax({ 
				url: 'api/add?id='+id+'&q='+quantity,
				type: 'get',
			   crossDomain: true,
			}).done(function(response) {
				if (response == 'unavailable'){
					//$(".add-cart").html('Stock unavailable');
				} else if (response == 'updated') {
					//$(".add-cart").html('Updated');
					cart();
				} else {
					//$(".add-cart").html('Success');
					cart();
				}
			}).fail(function() {
				console.log('Failed');
			});
	});
	// Remove from cart
	$("body").on('click','.remove-cart',function() {
		var id = $(this).data('id');
		$.ajax({ 
				url: 'api/remove?id='+id+'',
				type: 'get',
			   crossDomain: true,
			}).done(function(responseData) {
				cart();
			}).fail(function() {
				console.log('Failed');
			});
	});
	// Product review
	$("body").on('click','#submit-review',function(e) {
		e.preventDefault();
		var btn = $("#submit-review").html();
		$("#submit-review").html('<div class="loading"></div>');
		var product = $(this).data('product');
		$.ajax({ 
				url: 'api/review?product='+product,
				type: 'post',
				data: $("#review").serialize(),
				crossDomain: true,
			}).done(function(response){
				if (response == 'success'){
					$("#response").html('<div class="alert alert-success">'+response+'</div>');
					$("#submit-review").html(btn);
				} else {
					$("#response").html('<div class="alert alert-warning">'+response+'</div>');
					$("#submit-review").html(btn);
				}
			}).fail(function() {
				console.log('Failed');
			});
	});
	// Products listing
	function listing(){
		$("#listing").html('<div class="loading"></div>');
		$.ajax({ 
				url: 'api/products',
				type: 'get',
				data: $("#search").serialize(),
				crossDomain: true,
			}).done(function(response) {
				data = JSON.parse(response);
				var listing = '';
				$.each(data.products, function(index,elem){
					listing += '<div class="col-md-3"><div class="product" id="'+elem.id+'"><div class="pi"><img src="'+elem.images+'"/></div><h5>'+elem.title+'</h5><b>'+elem.price+'</b></div><div class="bg view"><h5>'+elem.title+'</h5><p>'+elem.text+'</p><a href="'+elem.path+'" data-title="'+elem.title+'" class="smooth"><i class="icon-eye"></i>Details</a></div></div>';
				});
				$("#listing").html(listing);
			}).fail(function() {
				console.log('Failed');
			});
	}
	// Search products
	$("body").on('submit','#search',function(e) {
		e.preventDefault();
		listing();
	});
	// Search modal
	$("#search-input").on('keyup', function(){
		var query = $("#search-input").val();
		$("#search-results").html('<div class="search-item"><div class="loading"></div></div>');
		$.ajax({ 
				url: 'api/products',
				type: 'get',
				data: 'search='+query,
				crossDomain: true,
			}).done(function(response) {
				data = JSON.parse(response);
				var listing = '';
				var count = 0;
				$.each(data.products, function(index,elem){
					listing += '<div class="search-item" id="'+elem.id+'"><div class="search-image"><img src="'+elem.images+'"/></div><a href="'+elem.path+'" data-title="'+elem.title+'" class="smooth"><h6>'+elem.title+'</h6></a><b>'+elem.price+'</b></div>';
					count++;
				});
				if (count == 0){
					$("#search-results").html('<div class="search-item search-not-found"><h6>Nothing found</h6></div>');
				} else {
					$("#search-results").html(listing);
				}
			}).fail(function() {
				console.log('Failed');
			});
	});
	// Search modal toggle button
	$("body").on('click','.search-toggle',function() {
        $('.search-modal').toggle();
    });
	// Search modal toggle button
	$("body").on('click','#search-results a',function() {
        $('.search-modal').hide();
    });
	// Newsletter subscribe
	$("body").on('click','#subscribe',function() {
        var email = $("#email").val();
		$("#subscribe").html('<div class="loading"></div>');
		if (!validateEmail(email)){
			$("#subscribe").html('Invalid !');
		}else{
		$.ajax({ 
				url: 'api/subscribe?email='+email+'',
				type: 'get',
				crossDomain: true,
			}).done(function(responseData) {
				$("#subscribe").html('Success !');
			}).fail(function() {
				$("#subscribe").html('Failed !');
			});
		}
    });
	// Validating emails
	function validateEmail(email) {
	  var re = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  return re.test(email);
	}
});