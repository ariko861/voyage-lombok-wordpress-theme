<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<meta name="viewport" content="width=device-width,initial-scale=1">

<link rel='stylesheet' href='<?php bloginfo('stylesheet_url'); ?>' type="text/css">

<!-- Insertion de JQuery, nous disposons de toutes les fonctions JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="shortcut icon" type="image/x-icon" href='<?php bloginfo('template_url'); ?>/favicon.ico' />


<style>
.fb-icon{background: url(<?php bloginfo('template_url'); ?>/images/if_social_style_1_facebook.png);}
a:hover .fb-icon {background: url(<?php bloginfo('template_url'); ?>/images/if_social_style_2_facebook.png);}
.inst-icon {background: url(<?php bloginfo('template_url'); ?>/images/if_social_style_1_instagram.png);}
a:hover .inst-icon {background: url(<?php bloginfo('template_url'); ?>/images/if_social_style_2_instagram.png);}
.call-to-action-button{background: url(<?php bloginfo('template_url'); ?>/images/call-to-action-1.png) no-repeat;}
a:hover .call-to-action-button {background: url(<?php bloginfo('template_url'); ?>/images/call-to-action-2.png) no-repeat;}

</style>

<?php wp_head(); ?>





<!-- Matomo -->
<script type="text/javascript">
  var _paq = _paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(["setDocumentTitle", document.domain + "/" + document.title]);
  _paq.push(["setCookieDomain", "*.voyage-lombok.com"]);
  _paq.push(["setDomains", ["*.voyage-lombok.com","*.www.voyage-lombok.com"]]);
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//voyage-lombok.com/piwik/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', '2']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//voyage-lombok.com/piwik/piwik.php?idsite=2&rec=1" style="border:0;" alt="" /></p></noscript>
<!-- End Matomo Code -->





</head>


<body>

    <div id="menu-container">
        <div id="logo"><img id="logo" src="<?php bloginfo('template_url'); ?>/voyagelombok-logo.png"/></div>
        <div class="social-media">
            <a target="_blank" href="https://www.facebook.com/Voyagelombok/">
                <i class="fb-icon"></i>
            </a>
            <a target="_blank" href="https://www.instagram.com/vlombok/">
                <i class="inst-icon"></i>
            </a>
        </div>
		<nav class="nav-main">
            <label for="drop" class="toggle">Aller à... 
                <div class="toggle-icon">
                    <div class="toggle-icon-line"></div>
                    <div class="toggle-icon-line"></div>
                    <div class="toggle-icon-line"></div>
                </div>
            </label>
			<input type="checkbox" id="drop" />
            <!-- Pour charger le menu Wordpress -->
            <?php wp_nav_menu( array( 
                'theme_location' => 'mainmenu',
                'container' => '', 
                'container_class' => ''
            )); ?>
					

        </nav>
    </div>
    







