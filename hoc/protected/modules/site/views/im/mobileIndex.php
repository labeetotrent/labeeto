
<!-- Status bar overlay for full screen mode (PhoneGap) -->
<div class="statusbar-overlay"></div>
<!-- Panels overlay-->
<div class="panel-overlay"></div>
<!-- Left panel with reveal effect-->
<div class="panel panel-left panel-reveal">
    <div class="content-block">
        <p>Left panel content goes here</p>
    </div>
</div>
<!-- Views -->
<div class="views">
    <!-- Your main view, should have "view-main" class -->
    <div class="view view-main">
        <!-- Top Navbar-->
        <div class="navbar">
            <div class="navbar-inner">
                <div class="left">
                    <a href="<?=$this->createUrl('/my_feed');?>" class="link external">
                        <i class="icon icon-back-blue"></i>
                        <span>Back</span>
                    </a>
                </div>
                <!-- We need cool sliding animation on title element, so we have additional "sliding" class -->
                <div class="center sliding">Messages</div>
                <div class="right">
                    <!--
                      Right link contains only icon - additional "icon-only" class
                      Additional "open-panel" class tells app to open panel when we click on this link
                    -->
                    <a href="#" class="link icon-only open-panel"><i class="icon icon-bars-blue"></i></a>
                </div>
            </div>
        </div>
        <!-- Pages container, because we use fixed-through navbar and toolbar, it has additional appropriate classes-->
        <div class="pages navbar-through toolbar-through">
            <!-- Page, "data-page" contains page name -->
            <div data-page="index" class="page">
                <!-- Scrollable page content -->
                <div class="page-content">
                    <div class="list-block media-list">
                        <ul>
                            <?php foreach($dialogs as $dialog): ?>
                                <li>
                                    <a href="<?=$this->createUrl('/im/mobileChat', ['user_id' => $dialog['id']]);?>" class="item-link item-content external">
                                        <div class="item-media"><img src="<?=Yii::app()->baseUrl?>/uploads/avatar/<?=$dialog['photo'];?>" width="80"></div>
                                        <div class="item-inner">
                                            <div class="item-title-row">
                                                <div class="item-title"><?=$dialog['username'];?></div>
                                                <div class="item-after"><?=$dialog['unreadMessages'];?></div>
                                            </div>
                                            <div class="item-subtitle"><?=date('d M', strtotime($dialog['created']));?></div>
                                            <div class="item-text"><?=$dialog['lastMessage'];?></div>
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <a href="<?=$this->createUrl('/im/about');?>">About app (test link)</a>
                </div>
            </div>
        </div>
        <!-- Bottom Toolbar-->
<!--        <div class="toolbar">-->
<!--            <div class="toolbar-inner">-->
<!--                <!-- Toolbar links -->-->
<!--                <a href="#" class="link">Link 1</a>-->
<!--                <a href="#" class="link">Link 2</a>-->
<!--            </div>-->
<!--        </div>-->
    </div>
</div>