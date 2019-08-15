<?php

namespace App\Http\Controllers;

use App\Repositories\SuperheroRepository\SuperheroRepository;

class HomeController extends Controller
{
    protected $superHeroesRepository;

    /**
     * HomeController constructor.
     * @param $superHeroes
     */
    public function __construct(SuperheroRepository $superHeroesRepository)
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
