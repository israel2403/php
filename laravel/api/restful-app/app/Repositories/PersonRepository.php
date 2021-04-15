<?php

namespace App\Repositories;

use App\Models\Person;
use Illuminate\Support\Facades\DB;

class PersonRepository
{

    protected $person;

    protected $table = 'persons';

    public function __construct(Person $person)
    {
        $this->person = $person;
    }

    public function getAll()
    {
        return $this->person->all();
    }

    public function getById($id)
    {
        return  DB::table('persons')
        ->where('id', $id)
        ->first();
    }

    public function save($data)
    {
        $person = new $this->person;
        $person->name = $data['name'];
        $person->firstSurname = $data['firstSurname'];
        $person->secondSurname = $data['secondSurname'];
        $person->age = $data['age'];
        $person->save();
        return $person->fresh();
    }

    public function update($data, $id)
    {

        $person = $this->person->find($id);

        $person->name = $data['name'];
        $person->firstSurname = $data['firstSurname'];
        $person->secondSurname = $data['secondSurname'];
        $person->age = $data['age'];

        $person->update();

        return $person;
    }

    public function delete($id)
    {
            $person = $this->person->find($id);
            $person->delete();
            return $person;
    }
}
