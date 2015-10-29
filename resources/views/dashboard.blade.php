<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dailylarva</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('css/dailylarva.css')}}">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">Sidebar</div>
        <div class="col-md-10">
            @include('flash::message')

            @yield('content')
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
    $('div.alert').not('.alert-important').delay(3000).slideUp(300);
</script>

</body>
</html>
