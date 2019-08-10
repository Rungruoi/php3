
	<form action="{{route('postForm')}}" method="POST" accept-charset="utf-8">
	@csrf		
		<input type="text" name="Hoten">
		<input type="submit" value="Submit">
	</form>
