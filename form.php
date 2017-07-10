<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Add new order</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container-fluid">
		<h1 class="text-center">Add new order</h1>
			<form action="controller/res.php"  method="POST" role="form"  data-toggle="validator"  id="myForm">
				<legend>Form title</legend>
			
				<div class="form-group">
				<div class="form-group has-feedback">
					<label for="name">Имя</label>
					<input type="text" class="form-control" id="name" placeholder="Your name" name="name" >
					<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
					</div>
					<div class="form-group has-feedback">
					<label for="phone">Телефон</label>
					<input type="tel" name="phone" pattern="8[0-9]{10}" class="form-control" id="phone" placeholder="89123456789" name="phone" data-error="Only 89123456789 format">
					<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
					</div>
					<div class="form-group has-feedback">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" placeholder="Input email (only .zone domain)" name="email" pattern="^[_A-z0-9]{1,}@[_A-z0-9]{1,}.zone$" data-error="Only .zone domain" >
				    <div class="help-block with-errors"></div>
					<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
					</div>
					<div class="form-group has-feedback">
					<label for="quest">Вопрос</label>
					<input type="text" class="form-control" id="quest" placeholder="Our question" name="quest">
					<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
					</div>
					<div class="form-group ">
					<label for="budget">Бюджет</label>
					<input type="number" class="form-control" id="budget" placeholder="Your budget" name="budget">
					<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
					</div>
					<div class="form-group">
					<label for="product">Продукт</label>
					<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
					<select name="product" id="input" class="form-control" required="true">
						<option selected disabled="">Chouse product</option>
						<option value="1">Продукт 1</option>
						<option value="2">Продукт 2</option>
						<option value="3">Продукт 3</option>
						<option value="4">Продукт 4</option>
					</select>
					</div>
				</div>
			
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
			<div id="results">вывод</div>
		</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<script src="js/validator.js"></script>
		<script type="text/javascript">
		
		$(function(){
			$('#myForm').validator({
				feedback: {
					success: 'glyphicon-thumbs-up',
					error: 'glyphicon-thumbs-down'
				}
			});

			$('#myForm').submit(function(e) {
        	var $form = $(this);
        	$.ajax({
          		type: $form.attr('method'),
          		url: $form.attr('action'),
          		headers: {'X-Alt-Referer': '<?php echo $_SERVER["HTTP_HOST"] ?>'},
          		data: $form.serialize() // Send the object.	
          		}).done(function(data) {
	    			console.log('success');
	    			if(data==1){
	    				$('#results').html("success");
	    			}
	        	}).fail(function(data){
	          		console.log('fail');
	          		$('#results').html(data);
	        	});
	        	e.preventDefault(); 
	        	
    	  	});
		
		});
		
		</script> 
		 
	</body>
</html>