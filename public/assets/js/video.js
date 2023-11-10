$(document).ready(function () {
    $('.video_btn').magnificPopup({
        disableOn: 50,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });

});
jQuery(document).ready(function () {
    $("[data-youtube]").youtube_background();
});