$(document).ready(function () {
    var winWidth = $(window).innerWidth();

    /*=====================+-+-+-+-+-+-+-+P R O D U C T    L I S T I N G   S C R I P T+-+-+-+-+-+-+-+==================================================*/
    if (winWidth <= 1023) {
        $('.select_category').bind('click', function () {
            $('.sub_category_hld ul').slideUp(300);
            if ($(this).hasClass('open_cat')) {
                $(this).removeClass('open_cat');
                $('.category_holder ul').slideUp(300);
            } else {
                $(this).addClass('open_cat');
                $('.category_holder ul').slideDown(300);
            }
        });

        $('.select_brand').bind('click', function () {
            $('.category_holder ul').slideUp(300);
            if ($(this).hasClass('open_Subcat')) {
                $(this).removeClass('open_Subcat');
                $('.sub_category_hld ul').slideUp(300);
            } else {
                $(this).addClass('open_Subcat');
                $('.sub_category_hld ul').slideDown(300);
            }
        });

        /* $('.category_holder li').each(function(){
             $(this).bind('click', function(){
                 var currCat = $(this).find('a').text();
                 $('.category_holder ul').css({'display':'none'});
                 $('.select_category span').empty();
                 $('.select_category span').append(currCat);
                 $('.select_category').removeClass('open_cat');
             });
         });*/

        $('.sub_category_hld li').each(function () {
            $(this).bind('click', function () {
                var currCat = $(this).find('a').text();
                $('.sub_category_hld ul').css({ 'display': 'none' });
                $('.select_brand span').empty();
                $('.select_brand span').append(currCat);
                $('.select_brand').removeClass('open_Subcat');
            });
        });

    }


    /*=====================+-+-+-+-+-+-+-+P R O D U C T    D E T A I L   S C R I P T+-+-+-+-+-+-+-+==================================================*/
    $('.sm_prod_slider').owlCarousel({
        autoplay: false,
        loop: false,
        items: 3,
        margin: 0,
        //center: true,
        stagePadding: 0,
        smartSpeed: 800,
        autoplayTimeout: 5000,
        dots: true,
        nav:true,
        mouseDrag: false,
        pagination: false,
        responsive: {
            0: {
                items: 1
            },
            375: {
                items: 1
            },
            550: {
                items: 2
            },
            800: {
                items: 2
            },
            900: {
                items: 3
            }
        }
    });




     var totalItems = $('.owl-item').length;
   
     if(totalItems<4){
        $(".owl-prev,.owl-next").hide();
     }

    /*if (winWidth >= 1024) {
        $('.category_holder ul').owlCarousel({
            margin: 0,
            loop: false,
            autoWidth: false,
            items: 4,
            nav: true,
            dots: false,
            mouseDrag: false
        })
    }*/

    var categoryArr = $('.category_holder').find('.owl-item');
	console.log(categoryArr);
    if( categoryArr.length <= 4){
        $('.category_holder .owl-nav').css({'display':'none'});
    }

    function settingActiveTabToLeft(i){
        var currTab = $(categoryArr[i]);
        currTab.bind('click', function(){
           var currIndex = $(this).index();
           console.log(currIndex);
        });
    }

    for(var i=0; i< categoryArr.length; i++){
        settingActiveTabToLeft(i);
    }

    var itemWidth = $('.owl-item').innerWidth();
   // alert(itemWidth);

    /*+++++++++++Scroll To Code++++++++++++*/
    var tabList = $('.product_graystrip').find('span');
    tabList.each(function () {
        $(this).bind('click', function () {
            var scrollPos = $(this).attr('scrollTo');
            var pluser = 0;
            if($('.product_graystrip').css("position") === "fixed"){
                pluser = 90;
            }else{
                pluser = 150;
            }
            $("html, body").animate({ scrollTop: ($(scrollPos).offset().top - pluser)}, { duration: 1200 });
        });
    });
    /*+++++++++++Scroll To Code++++++++++++*/

    /*Open Specifications On Mobile*/
    $('.res_specs_tl a').bind('click', function () {

        if ($(this).hasClass('open')) {
            $('.specs_list').slideUp(300);
            $(this).removeClass('open');
            TweenMax.to('.res_specs_tl img', 0.5, { rotation: 0, ease: Sine.easeInOut });
        } else {
            $('.specs_list').slideDown(300);
            $(this).addClass('open');
            TweenMax.to('.res_specs_tl img', 0.5, { rotation: 180, ease: Sine.easeInOut });
        }

    });


    if (winWidth <= 767) {
        $('.specs_list span').bind('click', function () {
            $('.specs_list').slideUp(300);
            $('.res_specs_tl a').removeClass('open');
            TweenMax.to('.res_specs_tl img', 0.5, { rotation: 0, ease: Sine.easeInOut });
        });
    }

    /*Open Specifications On Mobile*/


});


