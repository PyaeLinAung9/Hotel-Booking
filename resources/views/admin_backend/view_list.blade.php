<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Information</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
    background-color: #f2f2f2;
    font-family: Arial, sans-serif;
    margin-left: 100px;
    margin-right: 100px;
    padding: 0;
    }

    table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    }

    th {
    background-color: #333;
    color: #fff;
    font-weight: bold;
    padding: 10px;
    text-align: left;
    }

    td {
    background-color: #fff;
    padding: 10px;
    border-bottom: 1px solid #ccc;
    }

    tr:nth-child(even) {
    background-color: #f2f2f2;
    }

    tr:last-child td {
    border-bottom: none;
    }

    @media screen and (max-width: 600px) {
    th, td {
        display: block;
    }

    th {
        text-align: center;
    }
    }
    .edit-button,
    .delete-button {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 4px;
    cursor: pointer;
    margin-right: 5px;
    }

    .delete-button {
    background-color: #f44336;
    }

    .edit-button:hover,
    .delete-button:hover {
    background-color: #45a049;
    }


</style>
<body>
    <div class="container">
        @if ( session('success') )
            <p style="color:green">{{ session('success') }}</p>
        @endif
        @if ( session('delete') )
            <p style="color:red">{{ session('delete') }}</p>
        @endif
        <h1>Player Information</h1>
        <a href="{{ route('viewPage')}}" class="create-button">Create</a>

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created_at</th>
                    <th>Created_by</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($viewData as $view)
                {{-- {{ dd($view)}} --}}
                    <tr>
                        <td>{{ $view->id }}</td>
                        <td>{{ $view->name }}</td>
                        <td>{{ $view->created_at }}</td>
                        <td>{{ $view->created_by }}</td>
                        <td>
                            <a href="{{ URL::to('view/edit')}}/{{ $view->id }}"  class="edit-button">Edit</a>
                            <a href="{{ URL::to('view/delete')}}/{{ $view->id }}" class="delete-button">Delete</a>
                        </td>
                    </tr>
                @endforeach
                <!-- Add more rows for other players if needed -->
            </tbody>
        </table>
    </div>
</body>
</html>
