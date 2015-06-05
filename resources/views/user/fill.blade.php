
<form action="/fill" method="post">
	Name
	<input type="text" name="name">
	<br>
	Job
	<select name="job">
		<option value="student">Student</option>
		<option value="teacher">Teacher</option>
	</select>
	<br>
	
	<input type="submit" value="Send">

	<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>