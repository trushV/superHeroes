<?php

namespace App\Repositories\ImagesRepository\Contracts;

/**
 * Interface ImageRepositoryInterface
 * @package App\Repositories\ImagesRepository\Contracts
 */
interface ImageRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @param string $id
     * @return mixed
     */
    public function findImageById(string $id);

    /**
     * @param array $superhero
     */
    public function createImage(array $superhero):void;

    /**
     * @param string $id
     */
    public function destroyImageById(string $id):void;


    /**
     * @param string $id
     * @param array $superhero
     */
    public function updateImageById(string $id, array $superhero):void;
}
