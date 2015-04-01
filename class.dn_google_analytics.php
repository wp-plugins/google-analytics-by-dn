<?php

class DN_Google_Analytics {

	function __construct() {
        add_action( 'wp_head', array( $this, 'add_google_analytics' ), 1 );
    }

	public function add_google_analytics() {
		$options = get_option( 'dn_google_analytics_settings_option' );

		if ( ( $tracking_id = $options['tracking_id'] ) == null) { return; }

		?>

<!-- This website runs Google Analytics by DN -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','__gaTracker');

__gaTracker('create', '<?php echo $tracking_id ?>', 'auto');
__gaTracker('set', 'forceSSL', true);
<?php if ( isset( $options['anonymize_ip'] ) ) echo "__gaTracker('set', 'anonymizeIp', true);\n" ?>
<?php if ( is_404() ) : ?>
__gaTracker('send', 'pageview', '/404error/?url=' + document.location.pathname + document.location.search + '&from=' + document.referrer );
<?php else : ?>
__gaTracker('send', 'pageview');
<?php endif ?>

</script>
<!-- End Google Analytics by DN -->

	<?php

	}

}

?>
