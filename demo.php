<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<h1>Multi insert</h1>
	<div class="form-group">
		<form name="add_name" id="add_name">
			<table class="table table-bordered" id="feild">
				<tr>
					<td><input type="text" name="name[]" id="name" placeholder="eenter name" class="form-control name_list">
						<input type="hidden" name="test" id="" value="20" class="form-control name_list"></td>
					<td><button type="button" name="add" id="add_feild">Add more</button></td>
				</tr>
			</table>
			<input type="button" name="submit" value="submit" id="click1">
		</form>
	</div>
</div>
<script type="text/javascript">
	
$(document).ready(function(){
	var i = 1;
    $("#add_feild").click(function(){
       i++;
      // alert("hello");
       $('#feild').append('<tr id="row'+i+'"><td><input type="text" name="name[]" id="name" placeholder="eenter name" class="form-control name_list"></td><td><button type ="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">delete</button></td></tr>');
    });


	
    $(document).on('click', '.btn_remove', function(){
    	var button_id = $(this).attr('id');
    	$('#row'+button_id+'').remove();
    });

 $("#click1").click(function(){
    	$.ajax({
    		url:"api.php",
    		method:"POST",
    		data:$('#add_name').serialize(),
    		success:function(data)
    		{
    			alert(data);
    			$('#add_name')[0].reset();
    		}
    	});
    });

});
	
</script>
<script type="text/javascript">
	$(document).ready(function(){
    // $('#click1').click(function(){
    // 	$.ajax({
    // 		url: "api.php",
    // 		method: "POST",
    // 		data: $('#add_name').serialize();
    // 		success: function(data)
    // 		{
    // 			alert(data);
    // 			$('#add_name')[0].reset();
    // 		}
    // 	})
    // })
});
</script>
</body>
</html>
