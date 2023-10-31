/**
 * Flexible format
 *
 * @package    format_flexible
 * @version    See the value of '$plugin->version' in the version.php file.
 * @copyright  &copy; 2019 G J Barnard in respect to modifications of standard topics format.
 * @author     G J Barnard - {@link http://about.me/gjbarnard} and
 *                           {@link http://moodle.org/user/profile.php?id=442195}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later.
 */

/* jshint ignore:start */
define(['jquery', 'core/log', 'mod_videofile/video'], function ($, log, videojs) {


    log.debug('Video tracking AMD');
    return {
        init: function (cmid, courseid) {

            $(document).ready(function(){
                var v = $('.vjs-tech').attr('id');
                var myPlayer = videojs(v);
                myPlayer.ready(function() {
                    myPlayer.on("play", function (e) {
                    });

                    myPlayer.on("pause", function (e) {
                        var videoplayed = myPlayer.currentTime();
                        var videoduration = myPlayer.duration();
                        var percentplayed = Math.round((videoplayed / videoduration) * 100);
                        saveVideoPlayed(cmid, courseid, percentplayed)
                    });
                });

            });           
        }
    }

    function saveVideoPlayed(cmid, courseid,percentplayed) {

        $.ajax({
            url: M.cfg.wwwroot + '/mod/videofile/ajax_bridge.php',
            method: 'post',
            data: {
                'action': 'savecompletion',
                'cmid': cmid,
                'courseid': courseid,
                'completionpercent': percentplayed,
            },
            success: function (result) {
                if (result) {
                    console.log(result);
                }
            }
        });
    }

});