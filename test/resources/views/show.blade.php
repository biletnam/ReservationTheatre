@extends('template')
@section('titre')
    Les articles
@endsection
<style>
    #display-on-click
    {
        display: block;

    }
</style>
@section('header')
    <div class="row">

        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
            </div>

    <div class="btn-group pull-left">



    </div>


    <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">

        </div>
    </div>
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

                <div>
                @if($show->bookable==1)
                <div class="btn btn-info">Book </div>
                    @endif
                </div>



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
    </body>
    </html>

@endsection
<script>
    function myFunction() {

        document.getElementById('display-on-click').style.display = 'block';
    }

</script>