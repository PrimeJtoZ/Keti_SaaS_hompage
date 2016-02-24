<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Bootstrap -->
        <link href="/static/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <style>
            body{
                padding-top:60px;
            }
        </style>
        <link href="/static/lib/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    </head>
    <body>
        <?php
            $error_msg = $this->session->flashdata('message');
        ?>
        
        <script type="text/javascript">
            var err_msg = '<?= $error_msg ?>';
            if(err_msg.length > 1){
                window.alert(err_msg);
            }
        </script>