<form action="week8_simpanhero.php" method="POST">
	<h1> Input Hero</h1>
	<p> Nama Hero : <input type="text" name="name"></p>
	<p>Tipe: 
		<select name="type">
			<option value = "Strength">Strength</option>
			<option value = "Agility">Agility</option>
			<option value = "Intelligence">Intelligence</option>
		</select>
	<p>Strength : <input type="text" name="strength"></p>
	<p>Agility : <input type="text" name="agility"></p>
	<p>Intelligence : <input type="text" name="intelligence"></p>
	<p>Damage : <input type="text" name="damage"></p>
	<p>Armor : <input type="text" name="armor"></p>
	<p>Ranged : <input type="checkbox" name="is_ranged"></p>
	<p><input type="submit" value="Simpan"></p>
</form>

