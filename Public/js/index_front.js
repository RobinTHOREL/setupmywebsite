/**
 * Created by younesdiouri on 06/07/2017.
 */
$(document)
    .ready(function() {

        // fix menu when passed
        $('.masthead')
            .visibility({
                once: false,
                onBottomPassed: function() {
                    $('.fixed.menu').transition('fade in');
                },
                onBottomPassedReverse: function() {
                    $('.fixed.menu').transition('fade out');
                }
            })
        ;

        // create sidebar and attach to menu open
        $('.ui.sidebar')
            .sidebar('attach events', '.toc.item')
        ;

    })
;

/*bouton loader*/
$('.button-class').click(function () {
    var btn = $(this);
    $(btn).buttonLoader('start');
    setTimeout(function () {
        $(btn).buttonLoader('stop');
    }, 5000);
});