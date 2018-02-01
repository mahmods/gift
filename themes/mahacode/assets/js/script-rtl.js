jQuery(document).ready(function ($) {
    "use strict";
    
    // Cart
    $(".cart-area .cart-btn").on("click", function(e) {
        e.preventDefault();
        $(this).siblings(".cart-dropdown").slideToggle(500);
    });
    
    $(".cart-area .cart-dropdown ul li .info .remove-item").on("click", function(e) {
        e.preventDefault();
        $(this).parent(".info").parent("li").remove();
    });
    
    $(".cart-table table tbody td .remove-item").on("click", function (e) {
        e.preventDefault();
        $(this).parent("td").parent("tr").remove();
    });
    
    $(".main-slider").slick({
        rtl:true,
        autoplay:true,
        autoplaySpeed:5000,
        speed:500,
        dots:true,
    });
    
    $(".carousel-slider").each(function(){
        var controlers = $(this).prev(".section-head");
        
        $(this).slick({
            rtl:true,
            autoplay:true,
            autoplaySpeed:7000,
            speed:500,
            slidesToShow:4,
            slidesToScroll:1,
            arrows:true,
            appendArrows:controlers,
            responsive:[
                {breakpoint:850,settings:{
                    slidesToShow:2,
                }},

                {breakpoint:490,settings:{
                    slidesToShow:1,
                }},
            ],
        });
    });
    
    $(".photo-slider").slick({
        rtl:true,
        autoplay:true,
        autoplaySpeed:5000, 
        speed:500, 
        asNavFor:".photo-thumbnails",
    });

    $(".photo-thumbnails").slick({
        rtl:true,
        asNavFor:".photo-slider",
        focusOnSelect:true,
        slidesToShow:3,
        slidesToScroll:1,
        responsive: [
            {
                breakpoint: 645,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll:1,
                }
            },
            {
                breakpoint: 485,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll:1,
                }
            },
        ]
    });
    
    $("[data-color]").each(function(){
        var color = $(this).attr("data-color");
        $(this).css({"background":color});
    });
    
    $(".zooming").each(function(){
        var zoomURL = $(this).attr("href");
        $(this).zoom({url: zoomURL});
    })
    
    // Stpes System
    $(".steps-system .step-content:first-of-type").addClass("active")
    
    $("body").on("click",".steps-system .step-content .prev-step",function(){
        var contentId = $(this).attr("href");
        $(contentId).addClass("active");
        $(contentId).siblings(".step-content").removeClass("active");
    });
    
    $("body").on("click",".steps-system .step-content .next-step",function(){
        var contentId = $(this).attr("href");
        $(contentId).addClass("active");
        $(contentId).siblings(".step-content").removeClass("active");
    });
    
    $("body").on("keyup","#card-name",function(){
        var nameValue = $(this).val();
        $("#gift-card h3").text(nameValue);
    });
    
    $("body").on("keyup","#card-input",function(){
        var messageValue = $(this).val();
        $("#gift-card p").text(messageValue);
    });
    
});