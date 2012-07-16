<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Simplexi board</title>
        
        <link rel="stylesheet" href="<?php echo base_url();?>public/css/redmond/jquery-ui-1.7.3.custom.css" type="text/css" media="all" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>public/css/board.css" />
	
        <script src="<?php echo base_url();?>public/js/jquery-1.3.2.min.js"></script>
        <script src="<?php echo base_url();?>public/js/jquery-ui-1.7.3.custom.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    $('document').ready(function() 
    {
        $( "#dialog" ).dialog({
            autoOpen: false
	});
        $( "#dialog_success" ).dialog({
            autoOpen: false
	});
        
        $('#btn_submit').click(function() {
            var writer = $("#writer").val();
            var subject = $("#subject").val();
            var message = $("#message").val();
            var error = false;
            var require = new Array();
            
            if (writer == "") {
                require.push("writer");
                error = true;
            }
            
            if (subject == "") {
                require.push("subject");
                error = true;
            }
            
            if (message == "") {
                require.push("message");
                error = true;
            }
            
            if (require.length > 0) {
                $( "#dialog" ).dialog( "open" );
               // alert("Please input required field [" +require.join(', ')+ "]");
            }
            
            if (error == false) {
                
                $('#dialog_success').dialog("open");
                $('form').submit();
            }
        });
        
        $('#btn_cancel').click(function() {
            window.location.href="<?php echo site_url() ?>/view/index/<?php echo $id?>";
        });
    });
    </script>
</head>

<body>
<div id="wrap">
	<div id="content">
		<h2>Board Modify</h2>
        <form action="<?php echo site_url();?>/modify/update/<?php echo $id; ?>" method="post" enctype="multipart/form-data">
			<ul class="board_detail">
				<li>
					<dl>
						<dt>Writer</dt>
						<dd><input type="text" name="writer" id="writer" maxlength="15" value="<?php echo $writer ?>"/></dd>
					</dl>
				</li>
				<li>
					<dl>
						<dt>Subject</dt>
						<dd><input type="text" name="subject" id="subject" value="<?php echo $subject ?>"/></dd>
					</dl>
				</li>
				<li>
					<dl>
						<dt>Message</dt>
						<dd class="message"><textarea rows="8" cols="40" name="message" id="message"><?php echo $message ?></textarea></dd>
					</dl>
				</li>
				<li>
					<dl>
						<dt>File</dt>
						<dd><input type="file" class="fileupload" name="fileupload" id="fileupload" /></dd>
					</dl>
				</li>
				<li class="submit">
					<input type="button" value="Submit" id="btn_submit"/>
					<input type="button" value="Cancel" id="btn_cancel"/>
				</li>
			</ul>
        </form>   
	</div>
    
                <div id="dialog" title="Notice">
			<p>Fields with asterisk (*) are mandatory</p>
		</div>
                <div id ="dialog_success" title="Success">
                        <p>Updating was successful.</p>
                </div>
</div>
</body>
</html>