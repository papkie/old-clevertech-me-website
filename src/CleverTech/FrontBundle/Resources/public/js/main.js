/*!
 * Start Bootstrap - Agnecy Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
    
    $(".portfolio-link").click(function () {
        $.ajax('/portfolio/details/'+$(this).data('id')).done(
            function (data) {
                var project = data.project;
                $(".project-name").text(project.name);
                $(".project-short-desc").text(project.shortDescription);
                $(".project-desc").text(project.description);
                $(".project-date").text(project.done);
                $(".project-client").html('').append('<a href="'+project.clientUrl+'" target="_blank">'+project.clientName+'</a>');
                $(".project-image").attr('src', project.image);
                $('#modal').modal('show');
            }
        );
    });
});

// Highlight the top nav as scrolling occurs
$('body').scrollspy({
    target: '.navbar-fixed-top'
});

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $('.navbar-toggle:visible').click();
});