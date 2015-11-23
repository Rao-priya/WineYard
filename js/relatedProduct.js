$(function(){
    var scroller = $('#scroller div.innerScrollArea');
    var scrollerContent = scroller.children('ul');
    //scrollerContent.children().clone().appendTo(scrollerContent);
    var curX = 0;
    scrollerContent.children().each(function(){
        var $this = $(this);

        $this.css('left', curX);
        curX += $this.outerWidth(true);
        //alert(curX);
    });
    var fullW = curX;
    //alert(fullW);
    var viewportW = scroller.width();

    scroller.css('overflow-x', 'auto');
});
