<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            color: #636b6f;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }


    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
@foreach($categories as $category)
        <strong>{{$category->name}}</strong>
    <br>
    @foreach($category->show as $show )
        {{$show->title}}
        <br>
    @endforeach
@endforeach

</div>
</body>
</html>
