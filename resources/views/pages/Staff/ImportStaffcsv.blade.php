<!doctype html>
<html>
<head>
    <title>Import CSV Data to MySQL database with Laravel</title>
</head>
<body>
@if(Session::has('message'))
    <p >{{ Session::get('message') }}</p>
@endif

<h1>Import Staff</h1>

<!-- Form -->
<form method='post' action='/uploadFile' enctype='multipart/form-data' >
    {{ csrf_field() }}
    <input type='file' name='file' >
    <input type='submit' name='submit' value='Import'>
</form>
</body>
</html>