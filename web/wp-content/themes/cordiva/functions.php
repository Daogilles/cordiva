<?php

require_once( get_template_directory() . '/includes/classes/Bootstrap.php' );
$bootstrap = new BootstrapSite();

/* Disable WordPress Admin Bar for all users but admins. */
show_admin_bar(false);

session_start();
