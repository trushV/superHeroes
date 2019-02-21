<?php

namespace Repositories\SuperheroRepository\Contracts;

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
     */
    public function createSuperhero(array $superhero):void;

    /**
     * @param string $id
     */
    public function destroySuperheroById(string $id):void;

    /**
     * @param string $id
     */
    public function updateSuperheroById($id):void;
}
