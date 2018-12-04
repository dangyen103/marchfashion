// ------------Custome Home Top Carousel-----------------
$('.carousel').carousel({
    interval: 4000
  })
// -----------------------------------



// ----------------------------------------------
// Fixed Header When Scrolling
window.onscroll = function() {myFunction()};

var header = document.getElementById("header");

var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("fixed");
  } else {
    header.classList.remove("fixed");
  }
}
// --------------------------------------------------


// -----------------------------------------------
// Custome slick carousel
    $('.slick-carousel1').slick({
        dots: false,
        slidesToShow: 5,
        slidesToScroll: 5,
        infinite: true,
        autoplay: false,
        autoplaySpeed: 6000,
        arrows: true,
        appendArrows: $('.slick-carousel1'),
        prevArrow:'<button class="arrow-slick prev-slick"><i class="fa  fa-angle-left" aria-hidden="true"></i></button>',
        nextArrow:'<button class="arrow-slick next-slick"><i class="fa  fa-angle-right" aria-hidden="true"></i></button>',
        responsive: [
            {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
            }
            },
            {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
            },
            {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    $('.slick-carousel2').slick({
        dots: false,
        slidesToShow: 5,
        slidesToScroll: 5,
        infinite: true,
        autoplay: false,
        autoplaySpeed: 6000,
        arrows: true,
        appendArrows: $('.slick-carousel2'),
        prevArrow:'<button class="arrow-slick prev-slick"><i class="fa  fa-angle-left" aria-hidden="true"></i></button>',
        nextArrow:'<button class="arrow-slick next-slick"><i class="fa  fa-angle-right" aria-hidden="true"></i></button>',
        responsive: [
            {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
            }
            },
            {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
            },
            {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    $('.slick-carousel3').slick({
        dots: false,
        slidesToShow: 5,
        slidesToScroll: 5,
        infinite: true,
        autoplay: false,
        autoplaySpeed: 6000,
        arrows: true,
        appendArrows: $('.slick-carousel3'),
        prevArrow:'<button class="arrow-slick prev-slick"><i class="fa  fa-angle-left" aria-hidden="true"></i></button>',
        nextArrow:'<button class="arrow-slick next-slick"><i class="fa  fa-angle-right" aria-hidden="true"></i></button>',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });


    $('.slick3').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        dots: true,
        appendDots: $('.wrap-slick3-dots'),
        dotsClass:'slick3-dots',
        infinite: true,
        autoplay: false,
        autoplaySpeed: 6000,
        arrows: false,
        customPaging: function(slick, index) {
            var portrait = $(slick.$slides[index]).data('thumb');
            return '<img src=" ' + portrait + ' "/><div class="slick3-dot-overlay"></div>';
        },  
    });


// -----------------------------------------------



// ---------------------------------------------------
// Add cart alert
// ---------------------------------------
$('.add-cart-alert').on('click', function(e){
    e.preventDefault();
});

$('.add-cart-alert').each(function(){
    // var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
    var idProduct = $(this).parent().parent().parent().find('.prod-card-id').html();
    $(this).on('click', function(){
        swal(idProduct, "đã được thêm vào giỏ !", "success");
    });
});

// Product Detail 
$('.btn-add-to-card').on('click', function(e){
    e.preventDefault();
});

$('.btn-add-to-card').each(function(){
    // var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
    var idProduct = $(this).parent().parent().parent().find('.prod-detail-id').html();
    $(this).on('click', function(){
        swal(idProduct, "đã được thêm vào giỏ !", "success");
    });
});

// ---------------------------------------------------



// --------------------------------------------------------------
// *[ +/- num product ]
// --------------------------------------------------------------
$('.btn-num-product-down').on('click', function(e){
    e.preventDefault();
    var numProduct = Number($(this).next().val());
    if(numProduct > 1) {
        $(this).next().val(numProduct - 1);
    }
});

$('.btn-num-product-up').on('click', function(e){
    e.preventDefault();
    var numProduct = Number($(this).prev().val());
    $(this).prev().val(numProduct + 1);
});


// -----------------------------------------------------



// ------------------------------------------------------------------ 
//Go to top
if ($('#btn-goto-top').length) {
    var scrollTrigger = 100, // px
        backToTop = function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                document.getElementById("btn-goto-top").style.display = "block";
            } else {
                document.getElementById("btn-goto-top").style.display = "none";
            }
        };
    backToTop();
    $(window).on('scroll', function () {
        backToTop();
    });
    $('#btn-goto-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });
}




// ----------------------------------------------------------------
//Animate Elements On Scroll Using jQuery and Animate.css
var scrollOptions = {
    // delay the animation sequence until '100' pixels have come into view
    animateThreshold: 100,

    // The frequency of which the user scrolling is 'tested'.
    scrollPollInterval: 20
}
// $('.flipInX').AniView(scrollOptions);