jQuery(function() {
    jQuery(function() {
            var e = jQuery("#search-toggle"),
                o = jQuery("#search-box");
            jQuery("#search-toggle").on("click", function() {
                "search-toggle" == jQuery(this).attr("id") && (o.is(":visible") ? e.removeClass("header-search-x").addClass("header-search") : e.removeClass("header-search").addClass("header-search-x"), o.slideToggle(300, function() {}))
            })
        }),
        function() {
            var e, o, r = jQuery(".main-navigation");
            if (r && (e = r.find(".menu-toggle"))) return o = r.find(".menu"), o && o.children().length ? void jQuery(".menu-toggle").on("click", function() {
                jQuery(this).toggleClass("on"), r.toggleClass("toggled-on")
            }) : void e.hide()
        }(), jQuery(document).ready(function() {
            jQuery(".go-to-top").hide(), jQuery(window).scroll(function() {
                var e = jQuery(window).scrollTop();
                e > 900 ? jQuery(".go-to-top").fadeIn() : jQuery(".go-to-top").fadeOut()
            }), jQuery(".go-to-top").click(function() {
                return jQuery("html,header,body").animate({
                    scrollTop: 0
                }, 700), !1
            })
        })
        jQuery('.post-gallery').slick({
          dots: false,
          infinite: true,
          speed: 500,
          autoplay: true,
          arrows: true,
        });

});
jQuery(window).on('load',function(e) {
    jQuery(".layer-slider").cycle({
        timeout: 4000,
        fx: 'fade',
        activePagerClass: "active",
        pager: ".slider-button",
        pause: 1,
        pauseOnPagerHover: 1,
        width: "100%",
        containerResize: 0,
        fit: 1,
        next: "#next2",
        prev: "#prev2",
        speed: 1000,
        after: function () {
            jQuery(this).parent().css("height", jQuery(this).height())
        },
        cleartypeNoBg: !0
    })
});

extendNav();
function extendNav() {
  jQuery('.nav-wrapper .dropdown').hover(function() {
    jQuery(this).children('.dropdown-menu').stop(true, true).show().addClass('animated-fast slfadeInDown');
    jQuery(this).toggleClass('open');
  }, function() {
    jQuery(this).children('.dropdown-menu').stop(true, true).hide().removeClass('animated-fast slfadeInDown');
    jQuery(this).toggleClass('open');
  });
}

