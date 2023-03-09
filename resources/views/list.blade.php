<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book List</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
        }

        h1 {
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin-bottom: 30px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        form {
            margin-bottom: 30px;
        }

        label {
            margin-right: 10px;
        }

        input[type="text"] {
            padding: 5px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            padding: 5px 10px;
            border-radius: 3px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .pagination {
            display: flex;
            justify-content: center;
        }

        .pagination ul {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .pagination li {
            margin: 0 5px;
        }

        .pagination li a {
            padding: 5px 10px;
            border-radius: 3px;
            background-color: #f2f2f2;
            color: #007bff;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .pagination li.active a {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Book List</h1>

    <!-- Search form -->
    <form action="{{url('/')}}" method="get">
        <label for="search">Search:</label>
        <input type="text" id="search" name="search" value="{{ app("request")->input("search") }}">
        <input type="submit" value="Search">
    </form>

    <!-- Book table -->
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>ISBN</th>
            <th>Published Year</th>
            <th>Available</th>
        </tr>
        </thead>
        <tbody>
        <!-- Book rows -->
        @foreach($data as $book)
            <tr>
                <td>{{$book->id}}</td>
                <td>{{$book->title}}</td>
                <td>{{$book->Author->name}}</td>
                <td>{{$book->ISBN}}</td>
                <td>{{$book->pub_year}}</td>
                <td>{{$book->available}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="pagination">
        <ul>
            {!! $data->appends( app("request")->input() )->links("pagination::bootstrap-4") !!}
        </ul>
    </div>
</div>
</body>
</html>
