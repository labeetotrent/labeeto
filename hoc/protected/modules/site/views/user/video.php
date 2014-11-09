<script type="text/javascript">
function popUpVideos(popurl,popwidth,popheight,move_x,move_y,aFile)
{
    bFile=encodeURIComponent(aFile);
    popup=window.open(popurl,'win','toolbar=0,location=0,directories=0,status=1,menubar=0,scrollbars=0,resizable=0,width='+popwidth+',height='+popheight);
    popup.moveTo(move_x,move_y);
    self.name="mainWin";
    
    setTimeout("popup.createPlayer(bFile)",750);
}
</script>
<div class="content-video" style="display: none;">
            <div class="title-photo">
                <h3>Videos <span>(<?php echo count($video) ?> Videos)</span></h3>
                <p>
                    <a href="#" data-toggle="modal" data-target="#UploadVideo">Upload</a>
                    <!--<a href="#">delete</a>-->
                    <a href="#" class="close-icon"></a>
                </p>
                
            </div>
            <?php foreach($video as $key=>$value) {?>
                <script type="text/javascript">
                    $(document).ready(function(){
                      $("#jquery_jplayer_<?php echo $value->id ?>").jPlayer({
                        ready: function () {
                          $(this).jPlayer("setMedia", {
                            m4v: "<?php echo "/uploads/video/". $value->video ?>",
                            ogv: "<?php echo "/uploads/video/". $value->video ?>",
                            flv: "<?php echo "/uploads/video/". $value->video ?>",
                            mov: "<?php echo "/uploads/video/". $value->video ?>",
                            poster: "http://www.jplayer.org/video/poster/Big_Buck_Bunny_Trailer_480x270.png",
                            width: "100%",
                            height: "100%",
                          });
                        },
                        play: function() { // To avoid multiple jPlayers playing together.
                			$(this).jPlayer("pauseOthers");
                		},
                        cssSelectorAncestor: "#jp_container_<?php echo $value->id ?>",
                        swfPath: "/js",
                        supplied: "ogv, m4v, oga, mp3, flv, 3g2, 3gp, 3gpp, asf, dat, divx, dv, f4v, flv, m2ts, mkv, mod, mov, mp4, mpe, mpeg, mpeg4, mpg, mts, nsv, ogm, ogv, qt, tod, ts, vob, wmv",
                        smoothPlayBar: true,
                        keyEnabled: true,
                        wmode:"window",
                        solution:"flash,html",
                        swfPath: "/themes/default/jPlayer/Jplayer.swf",
                        stretching: "fill",
                        
                      });
                    });
                  </script>
            <div class="post-video"> 
                <div class="content-post">
                    <h3 class="description_video">
                        <?php echo $value->description; ?>
                        <!--<span class="link_3">ICEBUCKET CHALLENGE</span> 
                        <span class="link_2">#ALSawareness </span>
                        <span class="link_1">#LOL</span>-->
                    </h3>
                    <span class="hour-post"><?php echo $value->date ?></span>
                    <div style="padding-left: 10px; cursor: pointer;" class="video_view_pop_up" data-id="<?php echo $value->id ?>">
		              <div id="jp_container_<?php echo $value->id ?>" class="jp-video ">
                            <div class="jp-type-single">
                              <div id="jquery_jplayer_<?php echo $value->id ?>" class="jp-jplayer"></div>
                              <div class="jp-gui">
                                <div class="jp-video-play">
                                  <a href="javascript:;" class="jp-video-play-icon" tabindex="1">play</a>
                                </div>
                                <div class="jp-interface">
                                  <div class="jp-progress">
                                    <div class="jp-seek-bar">
                                      <div class="jp-play-bar"></div>
                                    </div>
                                  </div>
                                  <div class="jp-current-time"></div>
                                  <div class="jp-duration"></div>
                                  <div class="jp-controls-holder">
                                    <ul class="jp-controls">
                                      <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
                                      <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
                                      <li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
                                      <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
                                      <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
                                      <li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
                                    </ul>
                                    <div class="jp-volume-bar">
                                      <div class="jp-volume-bar-value"></div>
                                    </div>
                                    <ul class="jp-toggles">
                                      <li><a href="javascript:;" class="jp-full-screen" tabindex="1" title="full screen">full screen</a></li>
                                      <li><a href="javascript:;" class="jp-restore-screen" tabindex="1" title="restore screen">restore screen</a></li>
                                      <li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
                                      <li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            
        </div>

<div class="modal fade" id="VideoView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content special-border" id="videopopup">
      
    </div>
  </div>
</div>