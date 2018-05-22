<select name="type" id="type">
	<option value=""></option>
	<option value="Agility">Agility</option>
	<option value="Strength">Strength</option>
	<option value="Intelligence">Intelligence</option>
</select>

<select name="hero" id="hero">

</select>

<script src="jquery-2.1.4.min.js"></script>
	<script>
		$("#type").change(function() {
			$.post("Week13_ex1_Ajax.php" , {
				type: $("#type").val()
			})
			.done(function(data){
				alert(data);
				$("#hero").html(data);
			})
		});
	</script>

