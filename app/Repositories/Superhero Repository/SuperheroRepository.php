<?php

class SuperheroRepository
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


}
