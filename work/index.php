
<html>
<head>
<link rel="stylesheet" type="text/css" href="http://www.mercurysolutions.co/app/webroot/css/common/bootstrap.min.css"/>

<style>
.hide{
display:none;
}
</style>
</head>
<body>
	<div class="questions" id="question-div">
		<form action="" method="POST" id="question-form">
			<div align="center" id="div-1" class="question">
				<p>Question 1 : <input type="hidden" name="question[]" value="1" id="1" />A</p>
				<label class="radio-inline" data-id="1" ><input type="radio" required name="a-1" value="A1">A1</label>
				<label class="radio-inline" data-id="1" ><input type="radio" required name="a-1" value="A2">A2</label><hr />
			</div>
			<div align="center" id="div-2" class="question hide">
				<p>Question 2 : <input type="hidden" name="question[]" value="2" id="2" />B</p>
				<label class="radio-inline" data-id="2" ><input type="radio" required name="a-2" value="B1">B1</label>
				<label class="radio-inline" data-id="2" ><input type="radio" required name="a-2" value="B2">B2</label><hr />
			</div>
			<div align="center" id="div-3" class="question hide">
				<p>Question 3 : <input type="hidden" name="question[]" value="3" id="3" />C</p>
				<label class="radio-inline" data-id="3" ><input type="radio" required name="a-3" value="C1">C1</label>
				<label class="radio-inline" data-id="3" ><input type="radio" required name="a-3" value="C2">C2</label><hr />
			</div>
			<div align="center" id="div-4" class="question hide">
				<p>Question 4 : <input type="hidden" name="question[]" value="4" id="4" />D</p>
				<label class="radio-inline" data-id="4" ><input type="radio" required name="a-4" value="D1">D1</label>
				<label class="radio-inline" data-id="4" ><input type="radio" required name="a-4" value="D2">D2</label><hr />
			</div>
			<div align="center" id="div-5" class="question hide">
				<p>Question 5 : <input type="hidden" name="question[]" value="5" id="5" />E</p>
				<label class="radio-inline" data-id="5" ><input type="radio" required name="a-5" value="E1">E1</label>
				<label class="radio-inline" data-id="5" ><input type="radio" required name="a-5" value="E2">E2</label><hr />
			</div>
			<div class="button hide" id="next">Next</div>
			<div class="button hide" id="prev">Prev</div>
			<button type="submit" id="submit" class="btn btn-primary btn-sm pull-right  hide">Submit</button>
		</form>
	</div>
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>

	var maxq = 6;
    	$('.radio-inline').click(function(e) {
            var id = parseInt($(this).data('id'));
			if(id==1) $('.button').addClass('hide');
			if(id!=(maxq-1)){$('#next').removeClass('hide');}
			var next = (id+1);
			var prev = (id-1);
			$('#next').data('id',next);
			$('#prev').data('id',prev);
		});
		$('#next').click(function(e) {
			var id = $(this).data('id');
			$('.button').addClass('hide');
			//$('#next').removeClass('hide');
			if(id==(maxq-1)) {$('#submit,#prev').removeClass('hide');}
			else {$('.button').addClass('hide');$('#prev').removeClass('hide');}
			$('.question').addClass('hide');
			$('#div-'+id).removeClass('hide');
			var next = id+1;
			var prev = id-1;
			$('#next').data('id',next);
			$('#prev').data('id',prev);
		});
		$('#prev').click(function(e) {
			var id = $(this).data('id');
			$('#prev').removeClass('hide');
			if(id==1)$('.button').addClass('hide');
			$('.question').addClass('hide');
			$('#div-'+id).removeClass('hide');
			var next = id+1;
			var prev = id-1;
			$('#next').data('id',next);
			$('#prev').data('id',prev);
		});

</script>
</html>