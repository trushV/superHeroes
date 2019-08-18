<?php

namespace App\Http\Controllers;

use App\Repositories\SuperheroRepository\Contracts\SuperheroRepositoryInterface;

class HomeController extends Controller
{
    protected $superHeroesRepository;

    /**
     * HomeController constructor.
     * @param SuperheroRepositoryInterface $superHeroesRepository
     */
    public function __construct(SuperheroRepositoryInterface $superHeroesRepository)
    {
        $this->superHeroesRepository = $superHeroesRepository;
    }


    public function index(){
        $heroes = $this->superHeroesRepository->getPaginate(5);
        return view('home',[
            'heroes' => $heroes
        ]);
    }
}
