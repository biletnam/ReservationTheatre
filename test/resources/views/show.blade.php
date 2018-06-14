@extends('template')
@section('titre')
    <title>{{ trans('show.titre') }}</title>
@endsection
<style>
    #display-on-click
    {
        display: block;

    }
</style>
@section('header')
    @if (auth()->check())

        <div class="row">

        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">    {{ trans('show.logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
            </div>

    <div class="btn-group pull-left">

        <button id='btnAddProfile' onclick="change()">Detail</button>


    </div>

@endif
    <button id="btn1">Use External API(Desactivate Cross on nav)</button>

    <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
            {!! Form::open(array('route' => 'queries.search', 'class'=>'form navbar-form navbar-right searchform')) !!}
            {!! Form::text('search', null,
                                   array('required',
                                        'class'=>'form-control',
                                        'placeholder'=>trans('Show.searchBar'))) !!}
            {!! Form::submit(trans('Show.search'),array('class'=>'btn btn-default')) !!}
            {!! Form::close() !!}

        </div>
    </div>

@auth
    @if(\Illuminate\Support\Facades\Auth::User()->role->name =="admin")
        <div class="row btn-info btn">

        <a href="{{ route('showExport') }}" onclick="event.preventDefault(); document.getElementById('export-form').submit();">    {{ trans('show.export') }}
        </a>

        <form id="export-form" action="{{ route('showExport') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
    </div>
<br/>
    <br/>
<div class="row btn-add-new btn btn-info" >
    {{ trans('show.import') }}

    <form action="{{ route('showImport') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="importShows" />
        <br /><br />
        <input class="btn-info" type="submit" value="     {{ trans('show.save') }}
                " />
    </form>
</div>
@endif
@endauth

@endsection

@section('contenu')


    <body>
    <main role="main">
        {!! $links !!}
        <div class="container">
        <?php  $i=0 ?>


            <div class="col-zm-12">
                    <div class="row">
                @foreach($shows as $show)
                @if ($i==3)
                            <div class="row">

                                @endif
        <div class="col-sm-4">
            <p class="card-text">{{$show->title}}</p>

            <div class="card-body" >
                <img src="{{ asset('img/'.$show->poster_url) }}" style="width:150px; height:150px">

                <div class="card-price">{{$show->price}}

                </div>

                <div class="card-info">{{$show->category->name}}</div>

                <div>
                    @auth
                @if($show->bookable==1)

                <a class="btn btn-info" href="{{ route('showID',$show->id) }}" >  {{ trans('show.book') }}
                </a>
                    @endif
                </div>
@endauth


            </div>
            </div>
                                @if($i==3)
                            </div>
                    <br>
                            @endif
                <?php $i++ ?>
                @endforeach

                </div>

            </div>
        </div>
    </main>
    </body>
    <footer class="text-muted">
        <div class="col-md-offset-0">

        <p class="float-right">
            <br>
            <a href="#">Back to top</a>
        </p>
        <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
        <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
        </div>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous">
        </script>
    <script>
        $(document).ready(function(){
            $("#btn1").click(function() {


                $.ajax({
                    url: "https://api.theatredelaville-paris.com/events",
                    dataType: 'json',
                    success: function(results){
                        $.ajax({
                            type: "POST",
                            url: 'http://localhost:8000/shows',
                            data: ({Imgname:results}),
                            success: function (data) {
                                {
                                    $("#btn1").html('Save');

                                }

                            },
                            error: function (data, textStatus, errorThrown) {
                                {
                                 $("#btn1").html==='save' ;
                                }

                            },
                        });                    }
                });

            });
        });



    </script>

    <script>
        function change()
        {

            $("#btnAddProfile").html('Save');


        }
    </script>





    </body>
    </html>

@endsection

