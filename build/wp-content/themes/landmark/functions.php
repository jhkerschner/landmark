<?php
require_once dirname(__FILE__) . '/lib/core.php';
require_once dirname(__FILE__) . '/lib/custom_post_types.php';
require_once dirname(__FILE__) . '/lib/events.php';
require_once dirname(__FILE__) . '/lib/analytics.php';

if(is_admin()) :
	require_once dirname(__FILE__) . '/lib/admin_acf.php';
endif;