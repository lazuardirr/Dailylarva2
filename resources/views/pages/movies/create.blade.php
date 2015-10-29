@extends('adminlte')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title">
                Create New Movie
            </h3>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="input-group">
                        {!! Form::text('movie_title', null, ['id' => 'movie_title', 'class' => 'form-control', 'placeholder' => 'Search for title...']) !!}
                        <span class="input-group-btn">
                            {!! Form::button('Go!', ['id' => 'search', 'class' => 'btn btn-default']) !!}
                        </span>
                    </div>
                    <!-- /input-group -->

                    <div class="panel panel-default hidden" id="result-panel" style="margin-top:5px;">
                        <div class="panel-heading">
                            <h3 class="panel-title">Result</h3>
                        </div>
                        <div class="panel-body" id="result-container">
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i> Add New Movie
                            </div>
                        </div>
                        <div class="portlet-body form">
                            {!! Form::open(['url' => 'movies']) !!}
                            @include('pages.partials.form', ['pages' => 'movies', 'submitButtonText' => 'Add Movies'])
                            {!! Form::close() !!}

                            @include('errors.list')

                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
@endsection

@section('page-javascript')
    <script>
        //    TODO:
        //    Idea: the search result of movie id should be clickable and automaticaly assign value to
        //          the respective form field.
        //    How: Research if the json data fetch earlier still accessable or not. If not, then pass json data
        //         to some container such as html element or cookies or something that can be selected by jQuery
        //         since we will aproach the Idea above with jQuery.
        //    Note: .clickable method need to be expanded so it could also serve as assign function or we could
        //           always code a new jQuery.
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
                        "<a class=\"thumbnail col-md-3 btn btn-link\" data-title=\"" + val["title"] + "\"  id=\"key_" + key + "\" href=\"" + val["id"] + "\" onClick=\"setFormData()\">" +
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
            $.getJSON("http://dailylarva.localhost/movies/json/" + q, function (data) {
                console.log(data);
                var items = generateResult(data);
                setContainer(items);
            });
        });


        function setFormData() {
            $('#id').val($(this).attr("href"));
        }


        //        $('.thumbnail.btn.btn-link').click(function(){
        //            var selectedItem = $(this).attr('id');
        //            $("#id").val($('#'+selectedItem).attr('data-id'));
        //            $("#title").val($('#'+selectedItem).attr('data-title'));
        //
        //        });

        //        $('.thumbnail').click(function () {
        //            var data = cache[$(this).data("id")];
        //            $('#id').val("asdf");
        //            $('#title').val(data["title"]);
        //        })
    </script>
    <script>
        jQuery(document).ready(function ($) {
            $(".clickable-row").click(function () {
                window.document.location = $(this).data("href");
            })
        })
    </script>
@stop