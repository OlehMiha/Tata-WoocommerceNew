
// swiper
jQuery(document).ready(function($){
$(document).ready(function(){
    var swiper = new Swiper('.swiper-container1', {
        slidesPerView: 'auto',
        loop:true,
        nextButton: '.swiper-button-next1',
        prevButton: '.swiper-button-prev1',
        spaceBetween: 60,
        breakpoints: {
            889: {
                spaceBetween: 15
            }
        }
    });
    var swiper = new Swiper('.swiper-container2', {
        nextButton: '.swiper-button-next2',
        prevButton: '.swiper-button-prev2',
        spaceBetween: 0,
        loop:true,
        speed:1000,
        pagination: '.swiper-pagination2',
        paginationClickable: true,
        autoplay: 5000,
        autoplayDisableOnInteraction: false
    });
    var swiper = new Swiper('.swiper-container3', {
        nextButton: '.swiper-button-next3',
        prevButton: '.swiper-button-prev3',
        spaceBetween: 20,
        slidesPerView: 'auto',
        loop:true,
        observer: true,
        observeParents: true,
        speed:1000
    });
    var galleryTop = new Swiper('.gallery-top', {
        nextButton: '.swiper-button-next4',
        prevButton: '.swiper-button-prev4',
        spaceBetween: 10,
    });
    var galleryThumbs = new Swiper('.gallery-thumbs', {
        nextButton: '.swiper-button-next4',
        prevButton: '.swiper-button-prev4',
        spaceBetween: 10,
        centeredSlides: true,
        slidesPerView: 'auto',
        touchRatio: 0.2,
        slideToClickedSlide: true
    });
    galleryTop.params.control = galleryThumbs;
    galleryThumbs.params.control = galleryTop;
});

// tabs
(function($) {
    $(function() {
        $('ul.tabs_caption').on('click', 'li:not(.active)', function() {
            $(this)
                .addClass('active').siblings().removeClass('active')
                .closest('div.wrap_tabs').find('div.tabs_content').removeClass('active').eq($(this).index()).addClass('active');
        });
        var tabIndex = window.location.hash.replace('#tab','')-1;
        if (tabIndex != -1) $('ul.tabs_caption li').eq(tabIndex).click();
        $('a[href*=#tab]').click(function() {
            var tabIndex = $(this).attr('href').replace(/(.*)#tab/, '')-1;
            $('ul.tabs_caption li').eq(tabIndex).click();
        });
    });
})(jQuery);

// formstyler
$(function() {
    var _dropdown;
    var settings = {autoReinitialise: true};
    $('.formstyler, input[type="checkbox"], input[type="radio"], select, input[type="number"]').styler({
        selectSearch: true,
        onFormStyled: function(){
            _dropdown = $('.jq-selectbox__dropdown');
            _dropdown.find('ul').wrap('<div class="scroll-pane" />');
        },
        onSelectOpened: function(){
            var _ul = $(this).find('.jq-selectbox__dropdown ul');
            var height = _ul.height();
            var _srollPane = _dropdown.find('.scroll-pane');
            _srollPane.height(height);
            _ul.css('max-height', 'none');
            $(".scroll-pane").mCustomScrollbar({
                scrollInertia:400
            });
        }
    });
});

// mCustomScrollbar
$(window).on("load",function(){
    $(".tp_scroll").mCustomScrollbar({
        scrollInertia:400
    });
});

// footer прижать к низу
$(function() {
    $("body").css({padding:0,margin:0});
    var f = function() {
        $(".wrap_content").css({position:"relative"});
        var h1 = $("body").height();
        var h2 = $(window).height();
        var d = h2 - h1;
        var h = $(".wrap_content").height() + d;
        var ruler = $("<div>").appendTo(".wrap_content");
        h = Math.max(ruler.position().top,h);
        ruler.remove();
        $(".wrap_content").height(h);
    };
    setInterval(f,1000);
    $(window).resize(f);
    f();
});

// mob nav open/close
$(document).ready(function(){
    $('.close_mob_nav, .overlay').click(function (){
        $('.wrap_mob_nav, .overlay').removeClass('open_panel');
        $(this).parents('body').removeClass('body_panel');
        $(this).parents('html').removeClass('body_panel');
    });
    $('.open_mob_nav').click(function (e){
        $('.wrap_mob_nav, .overlay').toggleClass('open_panel');
        e.preventDefault();
        $(this).parents('body').toggleClass('body_panel');
        $(this).parents('html').toggleClass('body_panel');
    });
});

// одинаковая высота product
// $(document).ready(function(){
//     jQuery(function($){
//         var max_col_height = 0;
//         $('.product').each(function(){
//             if ($(this).height() > max_col_height) {
//                 max_col_height = $(this).height();
//             }
//         });
//         $('.product').height(max_col_height);
//     });
// });

// wrap_filter
$(document).ready(function(){
    $('.title_filter').click(function(){
        $(this).parents('.wrap_filter').find('.item_filter').slideToggle(400);
        $(this).parents('.wrap_filter').find('.title_filter').toggleClass('is_open');
    });
});

// wrap_checkout
$(document).ready(function(){
    $('.title_checkout').click(function(){
        $(this).parents('.item_checkout').find('.checkout').slideToggle(400);
        $(this).parents('.item_checkout').toggleClass('is_open');
    });

    $('.title_checkout a').click(function(e){
        e.preventDefault();
    });


});

// range
$(document).ready(function(){
    var range = document.getElementById('range');
    noUiSlider.create(range, {
        start: [0, 200 ], // Handle start position
        step: 10, // Slider moves in increments of '10'
        margin: 10, // Handles must be more than '20' apart
        connect: true, // Display a colored bar between the handles
        behaviour: 'tap-drag', // Move handle on tap, bar is draggable
        range: { // Slider can select '0' to '100'
            'min': 0,
            'max': 200
        }
    });
    var valueInput5 = document.getElementById('value-input5'),
        valueInput6 = document.getElementById('value-input6');
    // When the slider value changes, update the input and span
    range.noUiSlider.on('update', function( values, handle ) {
        if ( handle ) {
            valueInput5.value = Math.round(values[handle]);
        }
        else {
            valueInput6.value = Math.round(values[handle]);
        }
    });
    valueInput5.addEventListener('change', function(){
        range.noUiSlider.set([null, this.value]);
    });
    valueInput6.addEventListener('change', function(){
        range.noUiSlider.set([this.value, null]);
    });
});

// sidebar to modal
$(function() {
    $(window).resize(function(){
        if($(window).width() < 768) {
            $("#sidebar").prependTo("#modal_filter");
        }
        else if($(window).width() > 768){
            $("#sidebar").appendTo("#wrap_sidebar");
        }
    }).resize();
});





    (function($) {

        $(document).on('change', '.irs-bar', function() {
            var min = parseInt($(".slider_price_my_hidden").attr('data-min-now'));
            alert(min);
            $("#value-input6").val(min);
        });
        $(document).on('change', '.irs-to', function() {
            var max = $(".slider_price_my_hidden").attr('data-min-now');
            alert(max);
            $("#value-input5").val(max);
        });


        $(document).on('change', '#value-input6', function() {
            var min = parseInt($("#value-input6").val());
            alert(min);
            $(".slider_price_my_hidden").attr('data-min-now', min);
            if (woof_ajax_redraw) {
                woof_ajax_redraw = 0;
                woof_is_ajax = 0;
            }
            woof_submit_link(woof_get_submit_link());
        });


        $(document).on('change', '#value-input5', function() {
            var max = $("#value-input5").val();
            $(".slider_price_my_hidden").attr('data-min-now', max);
        });

    })(jQuery);



});