/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */

$(".cart-header-button, .add_to_cart_button").click(function() {
    $(".mini-cart-inner").load(" .mini-cart-inner > *");
});

$(".add_to_cart_button").click(function(){
    setTimeout(
        function() 
        {
          $(".mini-cart-inner").load(" .mini-cart-inner > *");
        }, 2000);
});

jQuery(function($){
            $(document).on('click', 'a.remove', function(e){
            setTimeout(function() {e.preventDefault();
            var url = this.href;
            $.get(url, function(html){
                $(".mini-cart-inner").load(" .mini-cart-inner > *");
            });
            $(this).closest("li").remove();}, 100);
        });
     });

var windowWidth = $(window).width();

if (windowWidth > 900) {
    $(window).scroll(function() {
        var distanceFromTop = $(this).scrollTop();
        if (distanceFromTop >= 93) {
            $('#navigation').addClass('fixed');
            $('#navigation-search-input').removeClass('search-none');
            $('#search-button-nav').removeClass('search-none');
            $('#navigation .site-title').css("display","block");
            $('.scrolled-icons').css("display","flex");
            $('#content').css("margin-top", "50px");
            $('.site-title').css("width", "10%");
            $('#sec-nav-container').css("width", "70%");
            $('#sec-nav-container').css("margin", "0");
            $('#nav-phone-container').css("display", "none");
        } else {
            $('#navigation').removeClass('fixed');
            $('#navigation-search-input').addClass('search-none');
            $('#search-button-nav').addClass('search-none');
            $('#navigation .site-title').css("display","none");
            $('.scrolled-icons').css("display","none");
            $('#content').css("margin-top", "0px");
            $('.site-title').css("width", "initial");
            $('#sec-nav-container').css("width", "1155px");
            $('#sec-nav-container').css("margin", "auto");
            $('#nav-phone-container').css("display", "flex");
        }
    });
}
else {
    $(".searchbutton").on("click", function () {
        $("#header-search-container").addClass("open-search-container");
        $("#header-search-input").addClass("open-header-search-input");
        $(".searchbutton").addClass("open-searchbutton");
        $(".search-title").addClass("open-search-title");
    });
    $(".search-title").on("click", function () {
        $("#header-search-container").removeClass("open-search-container");
        $("#header-search-input").removeClass("open-header-search-input");
        $(".searchbutton").removeClass("open-searchbutton");
        $(".search-title").removeClass("open-search-title");
    });
}
 
function addArrows () {
    var secnav = document.getElementById('sec-nav-container');
    var as = document.getElementById('sec-nav-container').getElementsByTagName('a');

    for (i = 0; i < as.length; i++) {
        var p = as[i].parentElement;
        var p2 = p.parentElement;
        if (p.classList.contains('menu-item-has-children') && p2.classList.contains('menu')) {
            var ico = document.createElement('i');
            ico.setAttribute("class", "material-icons");
            ico.innerText = "arrow_drop_down";
            as[i].appendChild(ico);
        }
    }
}
addArrows();

function changeNavStyles() {
    var navdropdowns = document.getElementsByClassName('sub-menu');

    for (i = 0; i < navdropdowns.length; i++) {
        var lis = navdropdowns[i].getElementsByTagName("li");
        var ok = 0;
        for (j = 0; j < lis.length; j++) {
            if (lis[j].children.length > 1) {
                ok = 1;
            }
        }
        if (ok == 0) {
            var ul = navdropdowns[i].childNodes[0];
            navdropdowns[i].style.height = 'auto';
            navdropdowns[i].style.left = 'initial';
            navdropdowns[i].style.right = 'initial';
            navdropdowns[i].style.width = '190px';
            for (j = 0; j < lis.length; j++) {
                if (j < lis.length - 1) {
                    lis[j].style.borderBottom = '1px solid #d3d3d3';
                }
                lis[j].style.marginLeft = '20px';
                lis[j].style.width = '130px';
            }
            ul.style.paddingTop = '8px';
            ul.style.maxHeight = 'initial';
        }
    }
}

$(function() {
    $('.nav-burger').on('click', function() {
        $('.nav').toggleClass('open');
        $('.mask').toggleClass('active-mask');
    });
});

$(function openCart () {
    $('.cart-header-button').on('click', function() {
        $('#slide-cart-container').toggleClass('open');
        $('.mask').toggleClass('active-mask');
    });
});

$(document).mouseup(function(e) {
    var container = $(".open");

    if (!container.is(e.target) // if the target of the click isn't the container...
        &&
        container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        $('.nav').removeClass('open');
        $('#slide-cart-container').removeClass('open');
        $('.mask').removeClass('active-mask');
    }
});

$(function() {
    $('.menu-item-has-children a').on('click', function() {
        $(this).closest('li').find('.sub-menu').toggleClass('nav-dropped-down');
    });
});

if (windowWidth > 900){
    changeNavStyles();
}

function removeLinks() {
    var navmenu = document.getElementById("navigation");
    var items = navmenu.getElementsByClassName("menu-item-has-children");

    for (var i = 0; i < items.length; i++) {
        var anchors = items[i].getElementsByTagName("a");
        anchors[0].removeAttribute("href");
        console.log(anchors[0]);
    }
}

if (windowWidth <= 900) removeLinks();