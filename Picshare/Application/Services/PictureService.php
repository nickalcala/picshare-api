<?php
namespace Picshare\Application\Services;

use Illuminate\Http\UploadedFile;
use Picshare\Application\Interfaces\Persistence\IPicturesRepository;
use Picshare\Application\Interfaces\Services\IPictureService;
use Picshare\Application\Transformers\PicturesTransformer;
use Picshare\Domain\Pictures\Picture;

/**
 * Class PictureService
 * 
 * @package Picshare\Application\Services
 * @author Nick B. Alcala<nick@niceprogrammer.com> 01-18-2018
 * @copyright 2018 Nice Programmer<http://niceprogrammer.com>
 */
class PictureService implements IPictureService
{

    /**
     * @var IPicturesRepository
     */
    private $picturesRepository;

    /**
     * @var PicturesTransformer
     */
    private $picturesTransformer;

    /**
     * PictureService constructor.
     * @param IPicturesRepository $picturesRepository
     * @param PicturesTransformer $picturesTransformer
     */
    public function __construct(
        IPicturesRepository $picturesRepository,
        PicturesTransformer $picturesTransformer
    )
    {
        $this->picturesRepository = $picturesRepository;
        $this->picturesTransformer = $picturesTransformer;
    }

    /**
     * Get latest 10 pictures.
     *
     * @param int $page
     * @return \Picshare\Domain\Pictures\Picture[]
     */
    public function getTenLatest($page = 0)
    {
        return $this->picturesTransformer->transformArray(
            $this->picturesRepository->getTenLatest(5 * ($page - 1))
        );
    }

    /**
     * Upload a photo.
     *
     * @param Picture $picture
     * @param UploadedFile $file
     * @return mixed
     */
    public function upload(Picture $picture, UploadedFile $file)
    {
        $picture->filename = $file->store(date('Y'), 'pictures');
        $picture->save();
    }
}