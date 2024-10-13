<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<pre><?php echo $this->session->userdata('user_id'); ?></pre>
	<pre><?php echo $this->session->userdata('email'); ?></pre>
	<pre><?php echo $this->session->userdata('role'); ?></pre>
	<pre><?php echo $this->session->userdata('logged_in'); ?></pre>
</body>
</html>