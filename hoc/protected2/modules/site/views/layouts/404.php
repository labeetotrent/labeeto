<?php $this->renderPartial('../elements/header') ?>

<body>
	<header id="site-header" role="banner">
	    <div class="navigation-top-level">
	      <div class="layout-container">
	        <nav id="navigation-top-level-logged-out" role="navigation">
	          <ul class="site-nav-left">
	            <li class="first-tier nav-home">
	              <a href="http://www.howaboutwe.com/" title="Dashboard">
	                <span class="sprite haw-logo howaboutwe-site-nav">
	                  HowAboutWe…
	                </span>
	              </a>
	            </li>
	          </ul>
	          <ul class="site-nav-right">
	            <li class="first-tier nav-login">
	              <a href="http://www.howaboutwe.com/login">Login</a>
	            </li>
	          </ul>
	        </nav>
	      </div>
	    </div>
	</header>
    <section id="error">
        <?php echo $content ?>
    </section>
    <?php $this->renderPartial('../elements/footer') ?>
</body>
</html>