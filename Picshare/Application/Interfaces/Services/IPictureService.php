<?php
namespace Picshare\Application\Interfaces\Services;

use Illuminate\Http\UploadedFile;
use Picshare\Domain\Pictures\Picture;

/**
 * Class IPictureService
 * 
 * @package Picshare\Application\Interfaces\Services
 * @author Nick B. Alcala<nick@niceprogrammer.com> 01-18-2018
 * @copyright 2018 Nice Programmer<http://niceprogrammer.com>
 */
interface IPictureService
{

    /**
     * Get latest 10 pictures.
     *
     * @param int $page
     * @return \Picshare\Domain\Pictures\Picture[]
     */
    public function getTenLatest($page = 0);

    /**
     * Upload a photo.
     *
     * @param Picture $picture
     * @param UploadedFile $file
     * @return mixed
     */
    public function upload(Picture $picture, UploadedFile $file);
    
}