@extends('layouts.app')

@section('content')
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .form-container label,
        .form-container input,
        .form-container textarea {
            display: block;
            margin-bottom: 10px;
        }

        .form-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>

    <div class="container">
        <div class="form-container">
            <h1>Create Book</h1>
            <form action="{{ route('books.store') }}" method="POST">
                @csrf

                <label for="name">Name:</label>
                <input type="text" id="name" name="name">

                <label for="description">Description:</label>
                <textarea id="description" name="description"></textarea>

                <label for="pages">Pages:</label>
                <input type="number" id="pages" name="pages">

                <label for="authorFirstName">Author First Name:</label>
                <input type="text" id="authorFirstName" name="authorFirstName">

                <label for="authorLastName">Author Last Name:</label>
                <input type="text" id="authorLastName" name="authorLastName">

                <label for="authorAge">Author Age:</label>
                <input type="number" id="authorAge" name="authorAge">

                <label for="authorCountry">Author Country:</label>
                <input type="text" id="authorCountry" name="authorCountry">

                <label for="publisherName">Publisher Name:</label>
                <input type="text" id="publisherName" name="publisherName">

                <label for="publisherCountry">Publisher Country:</label>
                <input type="text" id="publisherCountry" name="publisherCountry">

                <label for="rating">Rating:</label>
                <input type="number" id="rating" name="rating">

                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
@endsection
