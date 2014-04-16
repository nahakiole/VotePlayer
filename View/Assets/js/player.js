/**
 * Created by Robin on 16.04.14.
 */

jQuery(function($){
    $('audio').mediaelementplayer({success: function(mediaElement, originalNode) {

        // call the play method
        mediaElement.play();

        mediaElement.addEventListener('ended', function(e) {


            mediaElement.play();
        }, false);
    }});

    // add event listener


});
