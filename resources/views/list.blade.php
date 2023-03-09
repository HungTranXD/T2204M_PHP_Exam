<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="row justify-content-between">
            <div class="rol">
                <h1 class="display-4">Book List - {{$data->total()}} books</h1>
            </div>
            <div class="row">
                <form class="form-inline" action="{{url('/')}}" method="get">
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="inputPassword2" class="sr-only">Search</label>
                        <input name="search" type="text" class="form-control" id="inputPassword2" placeholder="Search by title..." value="{{ app('request')->input('search') }}">
                        <input name="page" type="hidden"  value="1">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Published Year</th>
                    <th scope="col">Available</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $book)
                    <tr>
                        <th scope="row">{{$book->id}}</th>
                        <td>{{$book->title}}</td>
                        <td>{{$book->Author->name}}</td>
                        <td>{{$book->ISBN}}</td>
                        <td>{{$book->pub_year}}</td>
                        <td>{{$book->available}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {!! $data->appends( app("request")->input() )->links("pagination::bootstrap-4") !!}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>
</html>
