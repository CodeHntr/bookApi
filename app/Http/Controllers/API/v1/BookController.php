<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookCreateRequest;
use App\Http\Resources\BookCollection;
use App\Http\Resources\BookPaginateResource;
use App\Models\Author;
use App\Models\Book;
use App\Models\PublishingHouse;
use Illuminate\Http\Response;


class BookController extends Controller
{
    public function create()
    {
//        return view('books.create');
        return view('create');
    }


    public function store(BookCreateRequest $request): Response
    {
        $error = 0;
        $name = $request->name;
        $authorFirstName = $request->authorFirstName;
        $authorLastName = $request->authorLastName;
        $authorCountry = $request->authorCountry;
        $authorAge = $request->authorAge;
        $publisherName = $request->publisherName;
        $publisherCountry = $request->publisherCountry;
        $description = $request->description;
        $rating = $request->rating;
        $pages = $request->pages;
        $book = null;
        $author = Author::where('first_name', $authorFirstName)
            ->where('last_name', $authorLastName)
            ->where('country', $authorCountry)->first();
        if ($author) {
            $authorId = $author->id;
            $newAuthor = $author;
            $error = 1;
        } else {
            $newAuthor = Author::create([
                'first_name' => $authorFirstName,
                'last_name' => $authorLastName,
                'country' => $authorCountry,
                'age' => $authorAge
            ]);
            $authorId = $newAuthor->id;
        }
        $publisher = PublishingHouse::where('name', $publisherName)
            ->where('country', $publisherCountry)->first();
        if ($publisher) {
            $publisherId = $publisher->id;
            $newPublisher = $publisher;
            $error = 1;
        } else {
            $newPublisher = PublishingHouse::create([
                'name' => $publisherName,
                'country' => $publisherCountry
            ]);
            $publisherId = $newPublisher->id;
        }
        if ($error == 1) {
            $book = Book::where('name', $name)
                ->where('author_id', $authorId)
                ->where('description', $description)
                ->where('pages', $pages)
                ->where('publisher_id', $publisherId)
                ->whereStatus(1)
                ->first();
        }
        if ($book == null) {
            Book::create([
                'name' => $name,
                'author_id' => $newAuthor->id,
                'description' => $description,
                'pages' => $pages,
                'status' => 1,
                'publisher_id' => $newPublisher->id,
                'rating' => $rating
            ]);
            $response = $this->sendResponse(200);
        } else {
            $response = $this->sendResponse(400, errors: ['book' => 'exist. Duplicate error'], localError: 777);
        }
        return $response;
    }

    public function index()
    {
        $books = Book::whereStatus(1)->paginate(2);
        return $this->sendResponse(200, new BookPaginateResource($books));
    }

    public function show()
    {
    }

    public function delete(Book $book)
    {
    }
}
