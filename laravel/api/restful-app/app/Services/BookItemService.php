<?php

namespace App\Services;

use App\Http\Requests\BookItemRequest;
use App\Models\BookItem;
use App\Repositories\BookItemRepository;
use Symfony\Component\HttpKernel\Exception\HttpException;

class BookItemService
{
    protected $bookItemRepository;

    public function __construct(BookItemRepository $bookItemRepository)
    {
        $this->bookItemRepository = $bookItemRepository;
    }

    public function getAll()
    {
        return $this->bookItemRepository->getAll();
    }

    public function getById($id)
    {
        $book = $this->bookItemRepository->getById($id);
        if (!$book) {
            throw new HttpException(404, "Book Item not found by ID: " . $id);
        }
        return $book;
    }

    public function delete($id)
    {
        $book = $this->bookItemRepository->getById($id);
        if (!$book) {
            throw new HttpException(404, "Book Item not found by ID: " . $id);
        }
        $book = $this->bookItemRepository->delete($id);
    }

    public function update(BookItemRequest $bookItemRequest, $id)
    {
        $bookToFind = $this->personRepository->getById($id);
        if (!$bookToFind) {
            throw new HttpException(404, "Person not found by ID: " . $id);
        }
        $bookItem = new BookItem();
        $bookToFind = $bookItemRequest->only($bookItem->getFillable());
        $bookItem = $this->personRepository->update($bookToFind, $id);
        return $bookItem;
    }

    public function save(BookItemRequest $bookItemRequest)
    {
        $bookItem = new BookItem();
        $bookItem = $bookItemRequest->only($bookItem->getFillable());
        $result = $this->personRepository->save($bookItem);
        return $result;
    }
}
