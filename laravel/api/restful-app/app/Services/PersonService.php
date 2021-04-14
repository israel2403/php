<?php

namespace App\Services;

use App\Http\Requests\PersonRequest;
use App\Models\Person;
use App\Repositories\PersonRepository;
use Symfony\Component\HttpKernel\Exception\HttpException;

class PersonService
{
    protected $personRepository;

    public function __construct(PersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    public function getAll()
    {
        return $this->personRepository->getAll();
    }

    public function getById($id)
    {
        $person = $this->personRepository->getById($id);
        if(!$person){
            throw new HttpException(404,"Person not found by ID: " . $id);
        }
        return $this->personRepository->getById($id);
    }

    public function delete($id)
    {
        $person = $this->personRepository->getById($id);
        if (!$person) {
            throw new HttpException(404,"Person not found by ID: " . $id);
        }
        $person = $this->personRepository->delete($id);
    }

    public function update(PersonRequest $personRequest, $id)
    {
        $personToFind = $this->personRepository->getById($id);
        if (!$personToFind) {
            throw new HttpException(404, "Person not found by ID: " . $id);
        }
        $person = new Person();
        $dataPerson = $personRequest->only($person->getFillable());
        $person = $this->personRepository->update($dataPerson, $id);
        return $person;
    }

    public function save(PersonRequest $personRequest)
    {
        $person = new Person();
        $dataPerson = $personRequest->only($person->getFillable());
        $result = $this->personRepository->save($dataPerson);
        return $result;
    }
}
