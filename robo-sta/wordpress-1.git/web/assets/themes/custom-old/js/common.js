// RollOver
$(function(){
	$.rollover = {
		init: function(){
			$('a img,input[type="image"]').not('[src*="_on."]')
				.bind('mouseover', this.over)
				.bind('mouseout',  this.out)
				.each(this.preload);
		},
		over : function(){
				this.setAttribute('src', this.getAttribute('src').replace('_off.', '_on.'));
		},
		out : function(){
				this.setAttribute('src', this.getAttribute('src').replace('_on.', '_off.'));
		},
	preload : function(){
			new Image().src = this.getAttribute('src').replace('_off.', '_on.');
		}
	};
	$.rollover.init();
});


//fancybox
$(function(){
	$("a[href$='jpg'],a[href$='gif'],a[href$='png']").attr('rel', 'gallery').fancybox({
		'overlayOpacity':	'0.5',
		'overlayColor'	:	'#000',
		'showCloseButton'	: false,
		'titlePosition' 		: 'inside',
		'titleFormat'		: formatTitle
	});
	function formatTitle(title, currentArray, currentIndex, currentOpts) {
		return '<div id="tip7-title"><span><a href="javascript:;" onclick="$.fancybox.close();"><img src="../img/fancybox/closelabel.gif" /></a></span>' + (title && title.length ? '<strong>' + title + '</strong>' : '' ) + '' + currentArray.length + ' 枚中の ' + (currentIndex + 1) + ' 枚目 ' + '</div>';
	}
});


//tab
$(function() {
	$(".tabdetail").css({
		display:"none"
	});
	$('.tabdetail:first').show();
	$('.tab li:first').addClass('active');

    $('.tab li').click(function() {
        $('.tab li').removeClass('active');
        $(this).addClass('active');
        $('.tabdetail').hide();

        $($(this).find('a').attr('href')).fadeIn();
        return false;
    });
});


//extension
$(function(){
	$("a[href$='.pdf']:not(:has('img'))").addClass("pdf");
	$("a[href$='.doc']:not(:has('img'))").addClass("doc");
	$("a[href$='.docx']:not(:has('img'))").addClass("doc");
	$("a[href$='.xls']:not(:has('img'))").addClass("xls");
	$("a[href$='.xlsx']:not(:has('img'))").addClass("xls");
	$("a[href$='.gif']:not(:has('img'))").addClass("img");
	$("a[href$='.jpg']:not(:has('img'))").addClass("img");
	$("a[href$='.jtd']:not(:has('img'))").addClass("jtd");
	$("a[href$='.ppt']:not(:has('img'))").addClass("ppt");
	$("a[href$='.pptx']:not(:has('img'))").addClass("ppt");
});


//addClass
$(function () {
	$("ul li:last-child").addClass("last");
	$("ul.topic_path li:last-child").addClass("selected");
	$("pre ul li:last-child").removeAttr('class');
	$("pre a").removeAttr('rel');
	$("pre div.tabarea div.tabdetail").removeAttr('style');
});