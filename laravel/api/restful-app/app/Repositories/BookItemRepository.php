<?php

namespace App\Repositories;

use App\Models\BookItem;
use Illuminate\Support\Facades\DB;

class BookItemRepository
{
    protected $bookItem;

    public function __construct(BookItem $bookItem)
    {
        $this->bookItem = $bookItem;
    }

    public function getAll()
    {
        return $this->bookItem->all();
    }

    public function getById($id)
    {
        return  DB::table('book_item')
            ->where('id', $id)
            ->first();
    }

    public function save($data)
    {
        $book = new $this->book;
        $book->code = $data['code'];
        $book->format = $data['format'];
        $book->book_shelf = $data['book_shelf'];
        $book->save();
        return $book->fresh();
    }

    public function update($data, $id)
    {

        $book = $this->book->find($id);

        $book = new $this->book;
        $book->code = $data['code'];
        $book->format = $data['format'];
        $book->book_shelf = $data['book_shelf'];

        $book->update();

        return $book;
    }


    public function delete($id)
    {
            $book = $this->book->find($id);
            $book->delete();
            return $book;
    }
}
