<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Name Input Form</title>
    <link rel="stylesheet" href="styles.css">
    
</head>
<style>
    body {
    background-color: #f2f2f2;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    }

    .container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
    }

    h1 {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    text-align: center;
    margin-bottom: 20px;
    }

    form {
    display: flex;
    flex-direction: column;
    }

    label {
    font-weight: bold;
    margin-bottom: 10px;
    color: #333;
    }

    input[type="text"] {
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 15px;
    font-size: 16px;
    }

    input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    }

    input[type="submit"]:hover {
    background-color: #45a049;
    }

</style>
<body>
    
    <div class="container">
        @if ($errors->has('name'))
            <p style="color:red;">{{ $errors->first('name')}}</p>
        @endif
        <a href="{{ route('viewList')}}" class="create-button">List</a>
        <h1>Create View Form</h1>
        <form action="{{ url('/view/create')}}" method="post">
            @csrf
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name')}}" placeholder="Enter your full name">

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
