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
// $('.add-cart-alert').on('click', function(e){
//     e.preventDefault();
// });

// $('.add-cart-alert').each(function(){
//     // var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
//     var idProduct = $(this).parent().parent().parent().find('.prod-card-id').html();
//     $(this).on('click', function(){
//         swal(idProduct, "đã được thêm vào giỏ !", "success");
//     });
// });

// Product Detail 
// $('.btn-add-to-card').on('click', function(e){
//     e.preventDefault();
// });

// $('.btn-add-to-card').each(function(){
//     // var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
//     var idProduct = $(this).parent().parent().parent().find('.prod-detail-id').html();
//     $(this).on('click', function(){
//         swal(idProduct, "đã được thêm vào giỏ !", "success");
//     });
// });

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



// -------------------------------------------------
// VUE JS ////////////////////////////////////////////
// ---------------------------------------------------
var prodMenu = new Vue({
    el: '#prodMenu',
    data: {
      message: 'Do you wanna build a Vue app?',
      isTopNone: 'none',
      isPantsNone: 'none',
      isDressNone: 'none',
      isSetNone: 'none',
      isAccessNone: 'none',
    },
    methods:{
        showTopMenu: function (){
            if(this.isTopNone == 'none'){
                this.isTopNone = 'block';
            }
            else{
                this.isTopNone = 'none';
            }
        },
        showPantsMenu: function (){
            if(this.isPantsNone == 'none'){
                this.isPantsNone = 'block';
            }
            else{
                this.isPantsNone = 'none';
            }
        },
        showDressMenu: function (){
            if(this.isDressNone == 'none'){
                this.isDressNone = 'block';
            }
            else{
                this.isDressNone = 'none';
            }
        },
        showSetMenu: function (){
            if(this.isSetNone == 'none'){
                this.isSetNone = 'block';
            }
            else{
                this.isSetNone = 'none';
            }
        },
        showAccessMenu: function (){
            if(this.isAccessNone == 'none'){
                this.isAccessNone = 'block';
            }
            else{
                this.isAccessNone = 'none';
            }
        }
    },
    computed:{

    }
});

var prodCart = new Vue({
    el: '#prodCart',
    data: {
        isShowCartCheckout: false,
        isShowBuyBtn: true,
        order: {
            sub_total: '',
            shipping_price: 0,
            total: 0,
        },
        receiver_city: 'Hà Nội',
    },
    methods: {
        showCartCheckout: function(){
            this.isShowCartCheckout = true;
            this.isShowBuyBtn = false;
        },

        hiddenCartCheckout: function(){
            this.isShowCartCheckout = false;
            this.isShowBuyBtn = true;
        },

        convertNumber: function($num){
            const formatter = new Intl.NumberFormat('de-DE', {
                style: 'currency',
                currency: 'VND',
                minimumFractionDigits: 0
            });
            return formatter.format($num);
        },

        shipingPriceConvert: function(){
            if(this.receiver_city == 'Hà Nội' || this.subTotal() >= 500000){
                return this.convertNumber(0);
            }
            else {
                this.order.shipingrice == 35000;
                return this.convertNumber(35000);
            }
        },

        shipingPrice: function(){
            if(this.receiver_city == 'Hà Nội' || this.subTotal() >= 500000){
                return 0;
            }
            else {
                return 35000;
            }
        },

        subTotal: function(){
            var str = this.$refs.cartSubTotal.innerText;
            var sub_total_str = str.slice(0, str.length - 2);
            var sub_total_edit = sub_total_str.replace('.','');
            var sub_total = Number(sub_total_edit);
            return sub_total;
        }

    }
});
// -----------------------------------------------------




// --------------------------------------------
$(document).ready(function(){

    $('#city').change(function(){
        if($(this).val() != '')
        {
            var city_id = $(this).val();
            // var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '/marchfashion/public/showDistrictsInCity?city_id',
                method:"GET",
                data:{
                    city_id: city_id
                    },
                success:function(data)
                {
                    $("#district").html('');
                    $.each(data, function(key, value){
                        $("#district").append(
                            '<option value="' + value.name + '">' + value.name + "</option>"
                        );
                    });
                }
            })
        }
    });
   
    // $('#city').change(function(){
    //  $('#district').val('');
    // });
 
});


// ---------------------------------------------
$(document).ready(function(e){
    		
    $('.question-row .img-check').click(function(e) {
    $('.question-row .img-check').not(this).removeClass('check')
        .siblings('input').prop('checked',false);
    $(this).addClass('check')
        .siblings('input').prop('checked',true);
    });
    
});