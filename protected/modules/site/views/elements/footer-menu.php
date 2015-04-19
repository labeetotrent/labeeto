

<div class="footer-menu col-xs-12 col-sm-12">
    <div class="col-xs-3 footer-link <?=$this->activeFooter == 'inbox' ? 'active' : ''?>">
<a href="<?=$this->createUrl('/im/index');?>" class="external">
            <div class="row">

                <div class="col-xs-12 link-icon text-center">
                   <img src="<?=Yii::app()->themeManager->baseUrl?>/images/inbox-icon<?=$this->activeFooter == 'inbox' ? '-active' : ''?>.png">
                
</div>
<div class="col-xs-12 text text-center">
Inbox

</div>
<?php if (Chat::countNewMessages() > 0) : ?><span class="badge" id="navunread">&nbsp;</span><?php endif; ?>      

            </div>
        </a>
    </div>
    <div class="col-xs-3 footer-link <?=$this->activeFooter == 'fitmatch' ? 'active' : ''?>">
        <a href="<?=$this->createUrl('/fitmatch/index');?>" class="external">
            <div class="row">
                <div class="col-xs-12 link-icon text-center">
                    <img src="<?=Yii::app()->themeManager->baseUrl?>/images/fitmatch-icon<?=$this->activeFooter == 'fitmatch' ? '-active' : ''?>.png">
                </div>
                <div class="col-xs-12 text text-center">
                    Fitmatch
                </div>
            </div>
        </a>
    </div>
    <div class="col-xs-3 footer-link <?=$this->activeFooter == 'feed' ? 'active' : ''?>">
        <a href="/my_feed" class="external">
            <div class="row">
                <div class="col-xs-12 link-icon text-center">
                    <img src="<?=Yii::app()->themeManager->baseUrl?>/images/feed-icon<?=$this->activeFooter == 'feed' ? '-active' : ''?>.png">
                </div>
                <div class="col-xs-12 text text-center">
                    Feed
                </div>
            </div>
        </a>
    </div>
    <div class="col-xs-3 footer-link <?=$this->activeFooter == 'settings' ? 'active' : ''?>">
        <a href="/settings" class="external">
            <div class="row">
                <div class="col-xs-12 link-icon text-center">
                    <img src="<?=Yii::app()->themeManager->baseUrl?>/images/settings-icon<?=$this->activeFooter == 'settings' ? '-active' : ''?>.png">
                </div>
                <div class="col-xs-12 text text-center">
                    Settings
                </div>
            </div>
        </a>
    </div>
</div>
