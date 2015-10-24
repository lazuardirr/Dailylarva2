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
<script>
    //    TODO:
    //    Idea: the search result of movie id should be clickable and automaticaly assign value to
    //          the respective form field.
    //    How: Research if the json data fetch earlier still accessable or not. If not, then pass json data
    //         to some container such as html element or cookies or something that can be selected by jQuery
    //         since we will aproach the Idea above with jQuery.
    //    Note: .clickable method need to be expanded so it could also serve as assign function or we could
    //           always code a new jQuery.
    $('#search').click(function () {
        var q = $("#movie_title").val();
        $("#resultTable").remove();
        $("#result-panel").addClass("hidden")
        $.getJSON("http://dailylarva.localhost/movies/json/" + q, function (data) {
            var items = ["<tr><th>Movie Title</th><th>Movie ID</th></tr>"];
            console.log(data);
            $.each(data["results"], function (key, val) {
                items.push(
                        "<tr class=\"clickable-row btn-link\" data-href=\"\" id=\"" + val["id"] + "\">" +
                        "<td>" + val["title"] + "</td>" +
                        "<td>" + val["id"] + "</td>" +
                        "</tr>")
                //items.push( "<li id='" + key + "'>" + val["title"] + " = " + val["id"] + "</li>");
            });
            $("<table/>", {
                "id": "resultTable",
                "class": "table table-striped table-bordered table-hover",
                html: items.join("")
            }).appendTo("#result-container");
            $("#result-panel").removeClass("hidden")
        });
    });
</script>
<script>
    jQuery(document).ready(function ($) {
        $(".clickable-row").click(function () {
            window.document.location = $(this).data("href");
        })
    })
</script>
</body>
</html>
