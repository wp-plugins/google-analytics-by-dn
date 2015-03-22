<?php

add_action( 'wp_head', 'dn_ga_track', 1 );

function dn_ga_track() {

if (get_option( 'dn_ga_tracking_id' ) != null) {
	$id = esc_attr( get_option( 'dn_ga_tracking_id' ) );
} else {
	return;
}

?>

<!-- Google Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', '" . $id . "', 'auto');
ga('send', 'pageview');
</script>
<!-- End Google Analytics -->

<?php

}

?>