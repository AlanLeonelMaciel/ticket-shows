<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/stats-icons.css'); ?>">
</head>
<body class="d-flex flex-column min-vh-100 m-0 p-0">
    <?php $this->load->view('components/navbar'); ?>
    <main class="flex-grow-1 w-100 pt-5 mt-5">
        <?php $this->load->view($inner_view_path); ?> 
    </main>
    <?php $this->load->view('components/footer'); ?>
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.js'); ?>"></script>
</body>
</html>
