<?php

namespace App\Repositories\SuperheroRepository\Contracts;

/**
 * Interface SuperheroRepositoryInterface
 */
interface SuperheroRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @param string $id
     * @return mixed
     */
    public function findSuperheroById(string $id);

    /**
     * @param array $superhero
     * @return string
     */
    public function createSuperhero(array $superhero):string;

    /**
     * @param string $id
     */
    public function destroySuperheroById(string $id):void;

    /**
     * @param string $id
     */
    public function updateSuperheroById(string $id, array $superhero):void;
}
