//side bar item//
$(document).ready(function(){


    //icon desktob $mobile

    $(".MobileToggle a").click(function () {
        var viewport = ($(this).attr('id') === "MobileSite") ?
            'width=device-width, initial-scale=1.0' :
            'width=1200';
        $("meta[name=viewport]").attr('content', viewport);
        $(".MobileToggle").toggle();
        return false;
    });

});

//slider-logo//
$(document).ready(function() {
    var owl = $("#owl-demo");
    owl.owlCarousel({
        autoPlay: 1500,
        items : 13, //10 items above 1000px browser width
        itemsDesktop : [1000,4], //5 items between 1000px and 901px
        itemsDesktopSmall : [900,3], // 3 items betweem 900px and 601px
        itemsTablet: [600,2], //2 items between 600 and 0;
        itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
        pagination:false
    });
    $(".next").click(function(){
        owl.trigger('owl.next');
    })
    $(".prev").click(function(){
        owl.trigger('owl.prev');
    })
});
//coming soon page//
$(document).ready(function() {
    var owl = $("#owl-demo1");
    owl.owlCarousel({
        autoPlay: 1500,
        items : 1, //10 items above 1000px browser width
        itemsDesktop : [1000,1], //5 items between 1000px and 901px
        itemsDesktopSmall : [900,1], // 3 items betweem 900px and 601px
        itemsTablet: [600,1], //2 items between 600 and 0;
        itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
        pagination:false
    });
    $(".next").click(function(){
        owl.trigger('owl.next');
    })
    $(".prev").click(function(){
        owl.trigger('owl.prev');
    })
});
$(document).ready(function() {
    var owl = $("#owl-demo2");
    owl.owlCarousel({
        autoPlay: 1500,
        items : 1, //10 items above 1000px browser width
        itemsDesktop : [1000,1], //5 items between 1000px and 901px
        itemsDesktopSmall : [900,1], // 3 items betweem 900px and 601px
        itemsTablet: [600,1], //2 items between 600 and 0;
        itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
        pagination:false
    });
    $(".next").click(function(){
        owl.trigger('owl.next');
    })
    $(".prev").click(function(){
        owl.trigger('owl.prev');
    })
});

$(document).ready(function() {
    var owl = $("#owl-demo3");
    owl.owlCarousel({
        autoPlay: 2500,
        items : 1, //10 items above 1000px browser width
        itemsDesktop : [1000,1], //5 items between 1000px and 901px
        itemsDesktopSmall : [900,1], // 3 items betweem 900px and 601px
        itemsTablet: [600,1], //2 items between 600 and 0;
        itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
        pagination:false
    });
    $(".next").click(function(){
        owl.trigger('owl.next');
    })
    $(".prev").click(function(){
        owl.trigger('owl.prev');
    })
});
//fixed menu

$(document).ready(function(){

    $(window).bind('scroll', function () {
        if ($(window).scrollTop() > 100) {
            $('.mfix').addClass('tt');

        } else {
            $('.mfix').removeClass('tt');

        }
    });
//tabs video item-page//

    $('#camera').on('click',function(){
        $('#vediocam').addClass('hide');
        $('#vedioc').removeClass('hide');
    });

    $('#call').on('click',function(){
        $('#vedioc').addClass('hide');
        $('#vediocam').removeClass('hide');
    });
    //end item page//

// request-buy page //
    $('#bt0').on('click',function(){
        $('#how1').addClass('hide');
        $('#how2').addClass('hide');
        $('#how3').addClass('hide');
        $('#how4').addClass('hide');
        $('#how5').addClass('hide');
        $('#how0').removeClass('hide');
    });
    $('#bt1').on('click',function(){
        $('#how0').addClass('hide');
        $('#how2').addClass('hide');
        $('#how3').addClass('hide');
        $('#how4').addClass('hide');
        $('#how5').addClass('hide');
        $('#how1').removeClass('hide');
    });

    $('#bt2').on('click',function(){
        $('#how1').addClass('hide');
        $('#how0').addClass('hide');
        $('#how3').addClass('hide');
        $('#how4').addClass('hide');
        $('#how5').addClass('hide');
        $('#how2').removeClass('hide');
    });
    $('#bt3').on('click',function(){
        $('#how2').addClass('hide');
        $('#how0').addClass('hide');
        $('#how1').addClass('hide');
        $('#how4').addClass('hide');
        $('#how5').addClass('hide');
        $('#how3').removeClass('hide');
    });
    $('#bt4').on('click',function(){
        $('#how2').addClass('hide');
        $('#how0').addClass('hide');
        $('#how1').addClass('hide');
        $('#how3').addClass('hide');
        $('#how5').addClass('hide');
        $('#how4').removeClass('hide');
    });
    $('#bt5').on('click',function(){
        $('#how2').addClass('hide');
        $('#how0').addClass('hide');
        $('#how1').addClass('hide');
        $('#how3').addClass('hide');
        $('#how4').addClass('hide');
        $('#how5').removeClass('hide');
    });
    //---for div---//
    $('#bt0').on('click',function(){
        $('#par1').addClass('bod');
        $('#par2').removeClass('bod');
        $('#par3').removeClass('bod');
        $('#par4').removeClass('bod');
        $('#par5').removeClass('bod');
        $('#par6').removeClass('bod');
    });
    $('#bt1').on('click',function(){
        $('#par2').addClass('bod');
        $('#par1').removeClass('bod');
        $('#par3').removeClass('bod');
        $('#par4').removeClass('bod');
        $('#par5').removeClass('bod');
        $('#par6').removeClass('bod');
    });

    $('#bt2').on('click',function(){
        $('#par3').addClass('bod');
        $('#par2').removeClass('bod');
        $('#par1').removeClass('bod');
        $('#par4').removeClass('bod');
        $('#par5').removeClass('bod');
        $('#par6').removeClass('bod');
    });
    $('#bt3').on('click',function(){
        $('#par4').addClass('bod');
        $('#par2').removeClass('bod');
        $('#par3').removeClass('bod');
        $('#par1').removeClass('bod');
        $('#par5').removeClass('bod');
        $('#par6').removeClass('bod');
    });
    $('#bt4').on('click',function(){
        $('#par5').addClass('bod');
        $('#par2').removeClass('bod');
        $('#par3').removeClass('bod');
        $('#par4').removeClass('bod');
        $('#par1').removeClass('bod');
        $('#par6').removeClass('bod');
    });
    $('#bt5').on('click',function(){
        $('#par6').addClass('bod');
        $('#par2').removeClass('bod');
        $('#par3').removeClass('bod');
        $('#par4').removeClass('bod');
        $('#par5').removeClass('bod');
        $('#par1').removeClass('bod');
    });
    //End request-buy//

    //start help-center page//
    $('#help1').on('click',function(){
        $('#step4').addClass('hide');
        $('#step2').addClass('hide');
        $('#step3').addClass('hide');
        $('#step1').removeClass('hide');
    });
    $('#help2').on('click',function(){
        $('#step4').addClass('hide');
        $('#step1').addClass('hide');
        $('#step3').addClass('hide');
        $('#step2').removeClass('hide');
    });

    $('#help3').on('click',function(){
        $('#step4').addClass('hide');
        $('#step2').addClass('hide');
        $('#step1').addClass('hide');
        $('#step3').removeClass('hide');
    });
    $('#help4').on('click',function(){
        $('#step1').addClass('hide');
        $('#step2').addClass('hide');
        $('#step3').addClass('hide');
        $('#step4').removeClass('hide');
    });

    //End help-center page //







});
// sidebar//
function openNav() {
    document.getElementById("mySidenav").style.width = "270px";
    document.getElementById("btt").style.width = "350px";
    document.getElementById("btt").style.float = "left";
    document.getElementById("btt").style.backgroundColor = "#edab07";
    document.getElementById("btt").style.position= "absolute";
    document.getElementById("btt").style.color = "#fff";
    document.getElementById("textsp").style.color = "#fff";
    document.getElementById("textsp").style.float = "left";

}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("btt").style.width = "100%";
    document.getElementById("btt").style.position= "relative";
    document.getElementById("btt").style.backgroundColor = "#fff";
    document.getElementById("textsp").style.color = "#252265";
    document.getElementById("textsp").style.float = "center";
}

