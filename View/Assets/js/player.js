/**
 * Created by Robin on 16.04.14.
 */

jQuery(function ($) {


    // add event listener
    var addNextButton = function (me, music) {


        var $inner = $(music).parents('.mejs-audio')
        var next = '<div class="mejs-button mejs-next"><button type="button" title="Next" aria-label="Next"></button></div>';
        var prev = '<div class="mejs-button mejs-prev"><button type="button" title="Previous" aria-label="Previous"></button></div>';
        $inner.find('.mejs-play').after(next);
        $inner.find('.mejs-play').before(prev);
        $inner.find('.mejs-next').click(function () {
            playNextSong(me);
        });
        $inner.find('.mejs-prev').click(function () {
            playNextSong(me);
        });

    };

    var playNextSong = function (mediaElement) {
        console.log('Next Song');
        console.log(mediaElement.src);

        $.getJSON( fredyframework.offset+"/Music/JSON", function( data ) {
            mediaElement.src = fredyframework.offset+"/"+data.song;

            mediaElement.play();
        });
    };

    var main = function () {
        $('audio').mediaelementplayer({
                features: ["playpause", "current", "progress", "duration", "volume", "fontawesome"],
                success: function (mediaElement, originalNode) {

                    playNextSong(mediaElement);
                    mediaElement.pause();
                    mediaElement.addEventListener('ended', function (e) {
                        playNextSong(mediaElement);


                    }, false);

                    addNextButton(mediaElement, originalNode)
                }
            }
        );
    };

    main();

});
