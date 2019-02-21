<?php

namespace Repositories\SuperheroRepository;

use Repositories\SuperheroRepository\Contracts\SuperheroRepositoryInterface;

class SuperheroRepository implements SuperheroRepositoryInterface
{
    private $superhero;

    /**
     * SuperheroRepository constructor.
     * @param $superhero
     */
    public function __construct(Superhero $superhero)
    {
        $this->superhero = $superhero;
    }


    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function findSuperheroById(string $id)
    {
        // TODO: Implement findSuperheroById() method.
    }

    public function createSuperhero(array $superhero): void
    {
        // TODO: Implement createSuperhero() method.
    }

    public function destroySuperheroById(string $id): void
    {
        // TODO: Implement destroySuperheroById() method.
    }

    public function updateSuperheroById($id): void
    {
        // TODO: Implement updateSuperheroById() method.
    }
}
