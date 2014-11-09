
<!--Photo Pravite Page-->
<div class="content-photo-private" style="display: none;">
    <div class="title-photo">
        <h3>Private Photos <span>(<?php echo count($private) ?> Photos)</span></h3>
        <!--<p>
            <a href="#" class="private-photo">Upload</a>
            <a href="#"  class="close-icon close-photo"></a>
        </p>-->

    </div>
    <ul>
        <?php if(!empty($private)){
            foreach($private as $photo){ ?>
                <li class="per-photo">
                    <a href="/uploads/photo/<?php echo $photo->photo ?>" rel="content-photo-private" class="photo">
                        <img class="img-photo" src="/uploads/photo/<?php echo $photo->photo ?>">
                    </a>
                </li>
            <?php }

        } ?>
    </ul>
</div>
<!--End Photo Pravite Page-->

<!--Photo Page-->
<div class="content-photo" style="display: none;">
    <div class="title-photo">
        <h3>Photos <span>(<?php echo count($photos)?> Photos)</span></h3>
       <!-- <p>
            <a href="#" class="public-photo">Upload</a>
            <a href="#"  class="close-icon close-photo"></a>
        </p>-->

    </div>
    <ul>
        <?php if(!empty($photos)){
            foreach($photos as $photo){ ?>
                <li class="per-photo">
                    <a href="/uploads/photo/<?php echo $photo->photo ?>" rel="content-photo" class="photo">
                        <img class="img-photo" src="/uploads/photo/<?php echo $photo->photo ?>" />
                    </a>
                </li>
           <?php }

        } ?>
    </ul>
</div>
<script type="text/javascript">
    $(function(){
        $('.photo').fancybox({
            nextEffect	: 'fade',
            prevEffect	: 'fade'
        });
    });
</script>

<!--End Photo Page-->
<!-- Modal Upload Public Photo--->
<div class="modal fade" id="public_photo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content special-border">
            <div class="modal-header header-report">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <span>Upload Photo</span>

            </div>

            <div class="modal-footer footer-report footer-upgarde photo-up">
                <form method="post" id="form-photo">
                    <div style="width: 50%; float: left;">
                        <input type="file" id="photos" name="photos" style="display: none;">
                        <label for="photos" class="btn btn-primary my-report-1">From My Computer </label>
                    </div>
                </form>
                <div style="width: 50%; float: left;">
                    <a type="button" class="btn btn-primary my-report-1">From Facbook</a>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal Upload Public Photo--->
<div class="modal fade" id="private_photo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content special-border">
            <div class="modal-header header-report">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <span>Upload Photo</span>

            </div>

            <div class="modal-footer footer-report footer-upgarde private-up">
                <form method="post" id="form-private">
                    <div style="width: 50%; float: left;">
                        <input type="file" id="private" name="photos" style="display: none;">
                        <label for="private" class="btn btn-primary my-report-1">From My Computer </label>
                    </div>
                </form>
                <div style="width: 50%; float: left;">
                    <a type="button" class="btn btn-primary my-report-1">From Facbook</a>
                </div>

            </div>
        </div>
    </div>
</div>