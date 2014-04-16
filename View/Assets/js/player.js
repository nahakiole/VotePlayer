/**
 * Created by Robin on 16.04.14.
 */

jQuery(function($){
    $('audio').mediaelementplayer({success: function(mediaElement, originalNode) {

        // call the play method
        mediaElement.play();

        mediaElement.addEventListener('ended', function(e) {

            mediaElement.src = 'http://www.youtube.com/watch?v=nOEw9iiopwI';
            mediaElement.play();
        }, false);
    }});

    // add event listener


});
