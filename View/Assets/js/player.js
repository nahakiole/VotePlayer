/**
 * Created by Robin on 16.04.14.
 */

jQuery(function($){
    $('audio').mediaelementplayer({success: function(mediaElement, originalNode) {

        // call the play method
        mediaElement.play();

        mediaElement.addEventListener('ended', function(e) {

            mediaElement.src = 'Music/George Street Shuffle.mp3';
            mediaElement.play();
        }, false);
    }});

    // add event listener


});
