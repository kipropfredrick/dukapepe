<!DOCTYPE html>
<html>
<body>

<h1>The form element</h1>

<form action="{{route('brand')}}" method="POST">
@csrf
  <label for="fname">Brand Name</label>
  <input type="text" id="fname" name="fname"><br><br>
  <input type="submit" value="Submit">
</form>
</body>
</html>
