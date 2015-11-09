@extends('adminlte')

@section('title')
    Create New Movie
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-body">
                    {!! Form::open(['url' => 'movies', 'role' => 'form']) !!}
                    @include('pages.partials.form', ['pages' => 'movies', 'submitButtonText' => 'Add Movies'])
                    {!! Form::close() !!}

                    @include('errors.list')
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="input-group">
                        {!! Form::text('movie_title', null, ['id' => 'movie_title', 'class' => 'form-control', 'placeholder' => 'Search for title...']) !!}
                        <span class="input-group-btn">
                        {!! Form::button('Go!', ['id' => 'search', 'class' => 'btn btn-default']) !!}
                        </span>
                    </div>
                </div>
                <div class="box-body hidden" id="result-panel">
                    <div class="box" style="margin-top:5px;">
                        <div class="box-header with border">
                            <h3 class="panel-title">Result</h3>
                        </div>
                        <div class="panel-body" id="result-container">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-javascript')
    <script>
        var cache;
        function clearContainer() {
            $("#resultTable").remove();
            $("#result-panel").addClass("hidden");
        }
        function setContainer(items) {
            $("<div/>", {
                "id": "resultTable",
                "class": "col-sm-12 col-md-12",
                html: items.join("")
            }).appendTo("#result-container");
            $("#result-panel").removeClass("hidden");
        }
        function generateResult(data) {
            var items = [""];
            $.each(data["results"], function (key, val) {
                items.push(
                        "<a class=\"thumbnail col-md-3 btn btn-link\" data-title=\"" + val["title"] + "\" onClick=\"setFormData(" + val["id"] + "," + " \'" + val["original_title"] + "\', \'" + val["original_language"] + "\', \'movie\')\">" +
                        "<img src=\"http://image.tmdb.org/t/p/w300" + val["poster_path"] + "\">" +
                        "<div class=\"caption\">" +
                        val["title"] +
                        "</div>" +
                        "</a>"
                )
            });
            return items;
        }
        $('#search').click(function () {
            var q = $("#movie_title").val();
            clearContainer();
            $.getJSON("{{ url() }}/movies/json/" + q, function (data) {
                console.log(data);
                var items = generateResult(data);
                setContainer(items);
            });
        });
        function setFormData(id, title, lang, channel) {
            $("#id").val(id);
            $("#title").val(title);
            $("#language").val(lang);
            $("#channel").val(channel);
        }
    </script>
    <script>
        jQuery(document).ready(function ($) {
            $(".clickable-row").click(function () {
                window.document.location = $(this).data("href");
            })
        })
    </script>
@stop