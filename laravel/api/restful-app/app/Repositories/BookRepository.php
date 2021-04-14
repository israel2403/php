<?php
namespace App\Repositories;

use App\Models\Book;
use Illuminate\Support\Facades\DB;

class BookRepository {

    protected $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function getAll()
    {
        return $this->book->all();
    }

    public function getById($id)
    {
        return  DB::table('books')
        ->where('id', $id)
        ->first();
    }

    public function save($data)
    {
        $book = new $this->book;
        $book->name = $data['name'];
        $book->author = $data['author'];
        $book->title = $data['title'];
        $book->publishing_house = $data['publishing_house'];
        $book->no_items = $data['no_items'];
        $book->save();
        return $book->fresh();
    }

    public function update($data, $id)
    {

        $book = $this->book->find($id);

        $book->name = $data['name'];
        $book->author = $data['author'];
        $book->title = $data['title'];
        $book->publishing_house = $data['publishing_house'];
        $book->no_items = $data['no_items'];

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
