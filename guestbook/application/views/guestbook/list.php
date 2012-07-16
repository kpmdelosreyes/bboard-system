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
    $(document).ready(function()
    {        
        
       $('#btn_delete').click(function() {
           var check = $("input[name='delete[]']:checked");
           if (check.size() > 0) {
               var val = "";
               $.each(check, function() {
                   val += $(this).val() + "-";
               });
               $.ajax({
                   url: '<?php echo site_url();?>/lists/delete',
                   type: 'POST',
                   data: {'post': val},
                   success : function(response) {
                       if (response == 1) {
                          
                          alert('Deleted successfully.');
                          
                          $('#div_list').load('<?php echo site_url();?>/lists/reload_list');
                       }
                   }
               });
               
           }
       }); 
       
       $('#btn_search').click(function() {
            var type = $('#search_type').val();
            var query = $('#search_query').val();
            $('#div_list').load('<?php echo site_url();?>/lists/search', {search_type: type, search_query: query});
       });
    });  
    </script>
</head>

<body>
<div id="wrap">
	<div id="content">
		<h2>Board List</h2>
		<div class="search">
			<form>
				<select name="search_type" id="search_type">
					<option value="subject">subject</option>
					<option value="message">message</option>
				</select>
				<input type="text" value="" name="search_query" id="search_query"/>
				<input type="button" value="Search" id="btn_search"/>
			</form>
		</div>
                        
        <div id="div_list">
                <p align="right">Today: <?php echo date('Y-m-d')?> / Total:  <?php echo count($data)?></p>
		<table class="board_list">
		<caption>&nbsp;</caption>
		<thead>
			<tr>
				<th>No</th>
				<th>Subject</th>
				<th>Writer</th>
				<th>Date</th>
			</tr>
		</thead>
		<tbody>
            <?php foreach ($data as $val): ?>    
			<tr>
				<td><?php echo $val['id']?></td><!--post index. retrieved from db-->
				<td class="subject">
					<input type="checkbox" id="" name="delete[]" value="<?php echo $val['id']?>" title="delete" />
					<a href="<?php echo site_url()?>/view/index/<?php echo $val['id']?>"><?php echo $val['subject']?></a>
				</td><!--subject or post title. retrieved from db-->
				<td><?php echo $val['writer']?></td><!--writer's name. retrieved from db-->
                                <td><?php echo date('d/m/Y', strtotime($val['registerTime']))?></td><!--written date. retrieved from db. Timestamp in DB. display format:dd/mm/yyyy-->
			</tr>
            <?php endforeach;?>
		</tbody>
		</table>
        <div style="float:right; margin:20px 20px;">
            <input type="button" name="btn_delete" id="btn_delete" value="Delete"/>
            <input type="button" name="btn_write" id="btn_write" value="Write" onclick="window.location.href='<?php echo site_url()?>/write'"/>
        </div>
        <!--    
		<div class="paging">
			&lt; prev 
			<strong>1</strong>
			<a href="#">2</a> 
			<a href="#">3</a> 
			<a href="#">4</a> 
			<a href="#">5</a> 
			<a href="#"> next</a> &gt;
		</div>
        -->
        </div>    
	</div>
                
</div>
</body>
</html>

