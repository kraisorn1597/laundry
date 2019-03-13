<!doctype html>
<html>
    <head>
        <title>Create</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    </head>
    <body>
        <div class="container" style="margin-top: 40px">
            <form method="POST" action="{{ route('admin.create') }}">
                @csrf
            <div class="row">
                    <div class="col-md-8">
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
            </div>
            <div class="col-md-4">
                <input type="submit" name="submit" id="submit" value="Enter" class="btn btn-danger" style="margin-top: 15px">
            </div>
            </form>
        </div>
    </body>
</html>