<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dailylarva</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('css/dailylarva.css')}}">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-3">Sidebar</div>
        <div class="col-md-9">
            @yield('content')
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function ($) {
        $(".clickable-row").click(function () {
            window.document.location = $(this).data("href");
        })
    })
</script>
</body>
</html>
