<?php 
//Determine what site the user is on and get the proper GAID
$gaid = '';
if(get_field('production_domain','option') != '' && get_domain() === get_field('production_domain','option')) :
	//Production GAID
	$gaid = get_field('google_analytics_production','option');
else :
	//Staging GAID
	$gaid = get_field('google_analytics_staging','option');;
endif;
?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', '<?php echo $gaid; ?>', 'auto');
  ga('send', 'pageview');

</script>