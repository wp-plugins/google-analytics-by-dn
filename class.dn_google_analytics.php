<?php

class DN_Google_Analytics {

	function __construct() {
        add_action( 'wp_head', array( $this, 'add_google_analytics' ), 1 );
    }

	public function add_google_analytics() {
		$options = get_option( 'dn_google_analytics_settings_option' );

		if ($options['tracking_id'] != null) {
			$tracking_id = $options['tracking_id'];
		} else {
			return;
		}

		?>

<!-- Google Analytics -->
<script async src='//www.google-analytics.com/analytics.js'></script>
<script>
window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
ga('create', '<?php echo $tracking_id ?>', 'auto');
<?php if ( isset( $options['anonymize_ip'] ) ) echo "ga('set', 'anonymizeIp', true);\n" ?>
ga('send', 'pageview');
</script>
<!-- End Google Analytics -->

		<?php

	}

}

?>
