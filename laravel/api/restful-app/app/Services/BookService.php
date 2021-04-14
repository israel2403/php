<?php

namespace App\Services;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Repositories\BookRepository;
use Symfony\Component\HttpKernel\Exception\HttpException;

class BookService {
    protected $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function getAll()
    {
        return $this->bookRepository->getAll();
    }

    public function getById($id)
    {
        $book = $this->bookRepository->getById($id);
        if (!$book) {
            throw new HttpException(404, "Book not found by ID: " . $id);
        }
        return $book;
    }

    public function delete($id)
    {
        $book = $this->bookRepository->getById($id);
        if (!$book) {
            throw new HttpException(404, "Book not found by ID: " . $id);
        }
        $book = $this->bookRepository->delete($id);
    }

    public function update(BookRequest $bookRequest, $id)
    {
        $bookToFind = $this->bookRepository->getById($id);
        if (!$bookToFind) {
            throw new HttpException(404, "Book not found by ID: " . $id);
        }
        $book = new Book();
        $dataBook = $bookRequest->only($book->getFillable());
        $book = $this->bookRepository->update($dataBook, $id);
        return $book;
    }

    public function save(BookRequest $bookRequest)
    {
        $book = new Book();
        $dataBook = $bookRequest->only($book->getFillable());
        $result = $this->personRepository->save($dataBook);
        return $result;
    }
}
