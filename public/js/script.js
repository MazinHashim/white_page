$(function(){
    // $("ul li.nav-item").on("click", function(){
    //     if(!$(this).hasClass("active")){
    //         $(this).addClass("active");
    //         $(this).siblings().removeClass("active");
    //     }
    // });

    /*--/ Star Typed /--*/
	if ($('.text-slider').length == 1) {
        var typed_strings = $('.text-slider-items').text();
            var typed = new Typed('.text-slider', {
                strings: typed_strings.split(','),
                typeSpeed: 80,
                loop: true,
                backDelay: 1100,
                backSpeed: 30
            });
    }

    // Change Theme Color on Click
    var colorSpan = $(".dropdown-menu .color-span");
    colorSpan
         .eq(0).css("backgroundColor","#0078ff").end()
         .eq(1).css("backgroundColor","#e41b17").end()
         .eq(2).css("backgroundColor","#55ff23").end()
         .eq(3).css("backgroundColor","#b700ff").end()
         .eq(4).css("backgroundColor","orange").end()
         .eq(5).css("backgroundColor","#f52e81").end()
         .eq(6).css("backgroundColor","yellow");

    colorSpan.parent().on("click",function(){
        $("link[href*='theme']").attr("href","\\PHP_MVC/mvc/public/css/themes/"+$(this).attr("data-value"));
        console.log($("link[href*='theme']").attr("href"));
    });

    $("#account-form .input-group .input-group-append").on("click", function(){
        if($(this).prev().attr("type") === "password"){
            $(this).find("svg").removeClass("fa-eye-slash");
            $(this).find("svg").addClass("fa-eye");
            $(this).prev().attr("type","text");
        } else {
            $(this).find("svg").removeClass("fa-eye");
            $(this).find("svg").addClass("fa-eye-slash");
            $(this).prev().attr("type","password");
        }
    });
});