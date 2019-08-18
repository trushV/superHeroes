<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuperHeroValidation;
use App\Repositories\ImagesRepository\Contracts\ImageRepositoryInterface;
use App\Repositories\SuperheroRepository\Contracts\SuperheroRepositoryInterface;
use App\Services\FileServices\Contract\FileServicesInterface;

/**
 * Class SuperHeroController
 * @package App\Http\Controllers
 */
class SuperHeroController extends Controller
{

    /**
     * @var SuperheroRepositoryInterface
     */
    private $superHeroRepository;

    /**
     * @var FileServicesInterface
     */
    private $fileServices;

    /**
     * @var ImageRepositoryInterface
     */
    private $imageRepository;

    /**
     * SuperHeroController constructor.
     * @param SuperheroRepositoryInterface $superHeroRepository
     * @param FileServicesInterface $fileServices
     * @param ImageRepositoryInterface $imageRepository
     */
    public function __construct(SuperheroRepositoryInterface $superHeroRepository,
                                FileServicesInterface $fileServices,
                                ImageRepositoryInterface $imageRepository)
    {
        $this->superHeroRepository = $superHeroRepository;
        $this->fileServices = $fileServices;
        $this->imageRepository = $imageRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SuperHeroValidation $request)
    {
        $validate = $request->validated();
        $id = $this->save($validate);
        $hero = $this->superHeroRepository->findSuperheroById($id);
        return view('view',[
           'hero' => $hero
       ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hero = $this->superHeroRepository->findSuperheroById($id);
        return view('view',[
            'hero' => $hero
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hero = $this->superHeroRepository->findSuperheroById($id);
        return view('edit',[
            'hero' => $hero
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SuperHeroValidation $request
     * @param int $id
     * @return void
     */
    public function update(SuperHeroValidation $request,  $id)
    {
        $validated = $request->validated();
        $this->updateSuperhero($id,$validated);
        $hero = $this->superHeroRepository->findSuperheroById($id);
        return view("view",[
            'hero'=> $hero
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $images = $this->imageRepository->getImagesBySuperheroId($id);
        foreach ($images as $image)
        {
            $this->fileServices->deleteFile($image->path);
            $this->imageRepository->destroyImageById($image->id);
        }
        $this->superHeroRepository->destroySuperheroById($id);
        return redirect('/');
    }

    /**
     * ethod for updating info about hero
     *
     * @param string $id
     * @param array $data
     */
    private function updateSuperhero(string $id, array $data):void
    {
        if(isset($data['image'])){
            $images = $data['image'];
            unset($data['image']);
            $this->updateImages($images, $id);
        }
        if(isset($data['fileMulti'])){
            $images = $this->saveFiles($data['fileMulti']);
            $this->createImage($id, $images);
            unset($data['fileMulti']);
        }
        $this->superHeroRepository->updateSuperheroById($id,$data);
    }

    /**
     * Create new hero
     *
     * @param array $data
     * @return string
     */
    private function save(array $data):string
    {
            if(isset($data['fileMulti'])){
            $images = $this->saveFiles($data['fileMulti']);
            unset($data['fileMulti']);
        }
        $id = $this->superHeroRepository->createSuperhero($data);
        $this->createImage($id, $images);
        return $id;
    }

    /**
     * Save files
     *
     * @param array $data
     * @return array
     */
    private function saveFiles(array $data):array
    {
        $path = [];
        foreach($data as $file)
        {
            if($file){
                $path[] = $this->fileServices->save($file);
            }
        }
        return $path;
    }

    /**
     * @param string $id
     * @param array $data
     */
    private function createImage(string $id, array $data):void
    {
        foreach ($data as $image)
        {
            $this->imageRepository->createImage([
                'path'=>$image,
                'superhero_id' => $id
            ]);
        }
    }

    /**
     * @param array $images
     * @param string $heroId
     */
    private function updateImages(array $images, string $heroId):void
    {
        $id = $this->imageRepository->getImagesBySuperheroId($heroId);
        $delImages = $id->except($images);
        if($delImages){
            foreach ($delImages as $image)
            {
                $this->imageRepository->destroyImageById($image->id);
            }
        }
    }
}
