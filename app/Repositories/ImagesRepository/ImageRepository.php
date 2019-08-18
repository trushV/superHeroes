<?php

namespace App\Repositories\ImagesRepository;

use App\Models\ImagesModel\Images;
use App\Repositories\ImagesRepository\Contracts\ImageRepositoryInterface;

class ImageRepository implements ImageRepositoryInterface
{
    /**
     * @var Images
     */
    private $images;

    /**
     * SuperheroRepository constructor.
     * @param $superhero
     */
    public function __construct(Images $images)
    {
        $this->images = $images;
    }


    public function getAll()
    {
        return $this->images->all();
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function findImageById(string $id)
    {
        return $this->images->where('id',$id)->first();
    }

    /**
     * @param array $superhero
     */
    public function createImage(array $image): void
    {
        $this->images->create($image);

    }

    /**
     * @param string $id
     */
    public function destroyImageById(string $id): void
    {
        $this->images->destroy($id);
    }

    public function destroyImageBySuperheroId(string $id): void
    {
        $deleteImage = $this->images->where('superhero_id',$id);
        foreach ($deleteImage as $item)
        {
            $item->delete();
        }
    }

    /**
     * @param string $id
     * @param array $data
     */
    public function updateImageById(string $id, array $data): void
    {
        $images = $this->images->find($id);
        $images->update($data);
    }


    public function getImagesBySuperheroId($heroId)
    {
        return $this->images->where('superhero_id',$heroId)->get();
    }
}
