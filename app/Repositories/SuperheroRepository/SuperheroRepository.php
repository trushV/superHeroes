<?php

namespace App\Repositories\SuperheroRepository;

use App\Models\SuperheroModel\Superhero;
use App\Repositories\SuperheroRepository\Contracts\SuperheroRepositoryInterface;

/**
 * Class SuperheroRepository
 * @package App\Repositories\SuperheroRepository
 */
class SuperheroRepository implements SuperheroRepositoryInterface
{
    /**
     * @var Superhero
     */
    private $superhero;

    /**
     * SuperheroRepository constructor.
     * @param $superhero
     */
    public function __construct(Superhero $superhero)
    {
        $this->superhero = $superhero;
    }


    /**
     * @return Superhero[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function getAll()
    {
       return $this->superhero->all();
    }

    /**
     * @param int $count
     * @return mixed
     */
    public function getPaginate(int $count)
    {
        return $this->superhero->paginate($count);;
    }


    /**
     * @param string $id
     * @return mixed
     */
    public function findSuperheroById(string $id)
    {
        return $this->superhero->where('id',$id)->first();
    }

    /**
     * @param array $superhero
     */
    public function createSuperhero(array $superhero): void
    {
        $this->superhero->create($superhero);

    }

    /**
     * @param string $id
     */
    public function destroySuperheroById(string $id): void
    {
        $this->superhero->destroy($id);
    }

    /**
     * @param string $id
     * @param array $data
     */
    public function updateSuperheroById(string $id, array $data): void
    {
        $superhero = $this->superhero->find($id);
        $superhero->update($data);
    }

}
