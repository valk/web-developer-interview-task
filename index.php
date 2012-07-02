<?php
    require_once('bootstrap.php');

    $fields = array(
        // @TODO: refactor html_class to HTML attributes array
        new FormFieldInput(array('name' => 'full_name', 'html_class' => 'name', 'value' => 'From',)),
//        new FormFieldInput(array('name' => 'last_name', 'html_class' => 'name', 'value' => 'From (last name)',)),
//        new FormFieldInput(array('name' => 'password', 'html_class' => 'password', 'value' => 'Password',)),
        new FormFieldSelect(array('name' => 'recipient', 'html_class' => 'recipient name', 'value' => 'To',
            'options' => array(
                'sales' => 'Sales',
                'support' => 'Support',
                'manage' => 'Manage',
            ))),
        new FormFieldTextarea(array('name' => 'message', 'html_class' => 'message', )),
        new FormFieldSubmit(array('name' => 'submit', 'html_class' => 'submit', 'value' => '',)),
    );
    
    $form = new MessageForm($fields);
    
    // Below is the HTML template which will be sent to the client.
?>
    
<!DOCTYPE html>
<html>
    <head>
        <title>Gui-Test</title>
        <link href="main.css" media="screen" rel="stylesheet" type="text/css" />
        <script src="js/jquery-1.6.2.min.js"></script>
        <script src="js/main.js"></script>
            
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div class="page_wrapper">
            <div class="header">
                <span class="item">I...</span>
                <span class="item">Like...</span>
                <span class="item">Messaging!</span>
            </div>
            
            <div class="slogan">
                It's nice to hear you! 
            </div>
            
            
            <? print $form->render(); ?>
            
        </div>
    </body>
</html>
    