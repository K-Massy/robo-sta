// rollover _off, _on
// ----------------------------------------
$(function () {
    $.rollover = {
        init: function () {
            $('a img,input[type="image"]').not("[src*='_on.']")
                .bind('mouseover', this.over)
                .bind('mouseout',  this.out)
                .each(this.preload);
        },
        over : function () {
            this.setAttribute('src', this.getAttribute('src').replace('_off.', '_on.'));
        },
        out : function () {
            this.setAttribute('src', this.getAttribute('src').replace('_on.', '_off.'));
        },
        preload : function () {
            new Image().src = this.getAttribute('src').replace('_off.', '_on.');
        }
    };
    $.rollover.init();
});


// magnific popup
// ----------------------------------------
$(document).ready(function() {
    $("a[href$='jpg'],a[href$='jpeg'],a[href$='gif'],a[href$='png']").magnificPopup({
        type:'image',
        gallery:{
            enabled: true
        }
    });
});


// addClass
$(function () {
    $("ul li:last-child").addClass("last");
    $("ul.topic_path li:last-child").addClass("selected is_current");
});


// extension icons
$(function(){
    $("a[href$='.pdf']:not(:has('img'))").addClass("pdf");
    $("a[href$='.doc']:not(:has('img'))").addClass("doc");
    $("a[href$='.docx']:not(:has('img'))").addClass("doc");
    $("a[href$='.xls']:not(:has('img'))").addClass("xls");
    $("a[href$='.xlsx']:not(:has('img'))").addClass("xls");
    $("a[href$='.jtd']:not(:has('img'))").addClass("jtd");
    $("a[href$='.ppt']:not(:has('img'))").addClass("ppt");
    $("a[href$='.pptx']:not(:has('img'))").addClass("ppt");
});


// accordions
$(function(){
    var $accordionModule  = $('.accordion');
    var $accordionTrigger = $('.accordion_trigger');
    var $accordionContent = $('.accordion_content');

    $accordionTrigger.addClass('is_accordion_active');
    $accordionContent.addClass('is_accordion_hidden');
    $accordionTrigger.click(function(){
        $(this).toggleClass('is_accordion_hidden is_accordion_active');
        $(this).next().toggleClass('is_accordion_hidden is_accordion_active');
    });
});


// tabs
$(function() {

    var $tab = $('.tab');
    $tab.children('ul').find('a').addClass('noscroll'); // smoothScroll

    var className = {
        show : 'is_tab_active',
        hide : 'is_hidden'
    };

    $tab.each(function() {

        var $tabButton = $(this).find($('.tab_list > li'));
        var $tabPanel  = $(this).find($('.tab_panel'));

        // default
        $tabButton.eq(0).addClass(className.show);
        $tabPanel.addClass(className.hide);
        $tabPanel.eq(0).addClass(className.show).removeClass(className.hide);

        // click
        $tabButton.on('click', function(){
            // button
            $(this)
                .addClass(className.show)
                .siblings().removeClass(className.show);

            // panel
            $tabPanel.addClass(className.hide);
            var hash = $(this).find('a').attr('href');
            $(hash).addClass(className.show).removeClass(className.hide);
            return false;
        });
    });
});