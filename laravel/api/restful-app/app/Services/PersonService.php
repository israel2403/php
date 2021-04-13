<?php

namespace App\Services;

use App\Exceptions\EntityNotFoundException;
use App\Repositories\PersonRepository;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PersonService
{
    protected $personRepository;

    public function __construct(PersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    public function delete($id)
    {
        $person = $this->personRepository->getById($id);
        if (!$person) {
            throw new HttpException(404,"Person not found by ID: " . $id);
        }
        $person = $this->personRepository->delete($id);
    }

    public function update($data, $id)
    {
        $person = $this->personRepository->getById($id);
        if (!$person) {
            throw new HttpException(404, "Person not found by ID: " . $id);
        }
        $person = $this->personRepository->update($data, $id);
        return $person;
    }

    public function save($data)
    {
        request()->validate([
                    'name' => 'required',
                    'firstSurname'=> 'required',
                    'secondSurname'=> 'required',
                    'age'=> 'required',
                ]);
        $result = $this->personRepository->save($data);
        return $result;
    }
}
