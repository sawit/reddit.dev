@extends('layouts.master')
        <head>
            <title>Saw It</title>
        </head>
@section('content')
        <div class="container">
            <form method="POST" action="{{ action('PostsController@store') }}">
                    {!! csrf_field() !!}
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
                    <input type="text" name="title"value="{{ old('title') }}" class="form-control" placeholder="Title" autofocus required>
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-link"></i></span>
                    <input type="text" name="url" value="{{ old('url') }}" class="form-control" placeholder="URL ex: http:://www.website.com" required>
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><span>
                    <textarea name="content" value="{{ old('content') }}" class="form-control" placeholder="Enter content here" required></textarea>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 controls">
                        <button type="submit" class="btn btn-primary pull-right">
                            <i class="glyphicon glyphicon-share-alt"></i>
                            Send
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </body>
</html>
@stop
