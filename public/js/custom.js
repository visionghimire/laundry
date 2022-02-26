/* HTML document is loaded. DOM is ready.
-------------------------------------------*/
$(function(){
        
    /* start typed element */
    //http://stackoverflow.com/questions/24874797/select-div-title-text-and-make-array-with-jquery
    var subElementArray = $.map($('.sub-element'), function(el) { return $(el).text(); });    
    $(".element").typed({
        strings: subElementArray,
        typeSpeed: 30,
        contentType: 'html',
        showCursor: false,
        loop: true,
        loopCount: true,
    });
    /* end typed element */

    /* Smooth scroll and Scroll spy (https://github.com/ChrisWojcik/single-page-nav)    
    ---------------------------------------------------------------------------------*/ 
    $('.templatemo-nav').singlePageNav({
        offset: $(".templatemo-nav").height(),
        filter: ':not(.external)',
        updateHash: false
    });

    /* start navigation top js */
    $(window).scroll(function(){
        if($(this).scrollTop()>58){
            $(".templatemo-nav").addClass("sticky");
        }
        else{
            $(".templatemo-nav").removeClass("sticky");
        }
    });
    
    /* Hide mobile menu after clicking on a link
    -----------------------------------------------*/
    $('.navbar-collapse a').click(function(){
        $(".navbar-collapse").collapse('hide');
    });
    /* end navigation top js */

    $('body').bind('touchstart', function() {});

    /* wow
    -----------------*/
    new WOW().init();
    
  
    
});

/* start preloader */
$(window).load(function(){
	$('.preloader').fadeOut(1000); // set duration in brackets    
});
/* end preloader */

function dateChange() {
    var today = new Date();
    var dateToday = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    var dateTomorrow = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate()+1;
    var dateChoosen = document.getElementById("pickup_date").value;
   
    var dateTodayVal =  dateToInt(dateToday);
    var dateChoosenVal = dateToInt(dateChoosen);
    if(dateChoosenVal == dateTodayVal){
        var options = document.forms['order_form']['time_slot'].options;
       if(today.getHours() <= 12 ){
      options[0].disabled = true;
      options.selectedIndex = 1;
       }
       if(today.getHours() > 12 && today.getHours() <=15){
        options[0].disabled = true;
        options[1].disabled = true;
        options.selectedIndex = 2;
         }
         if(today.getHours() > 15 && today.getHours() <=24){
            options[0].disabled = true;
            options[1].disabled = true;
            options[2].disabled = true;
            options.selectedIndex = 3;
             }
    }
    else{
        var options = document.forms['order_form']['time_slot'].options;
    for (var i=0, iLen=options.length; i<iLen; i++) {
      options[0].disabled = false;
      options[1].disabled = false;
      options[2].disabled = false;
    }
    }
}

function dateToInt(stringDate){
    return parseInt(stringDate.split("-")[0]) + parseInt(stringDate.split("-")[1]) + parseInt(stringDate.split("-")[2]);
}