<?php
namespace Picshare\Persistence\Pictures;

use Picshare\Application\Interfaces\Persistence\IPicturesRepository;
use Picshare\Domain\Pictures\Picture;

/**
 * Class EloquentPicturesRepository
 *
 * @package Picshare\Persistence\Pictures
 * @author Nick B. Alcala<nick@niceprogrammer.com> 01-18-2018
 * @copyright 2018 Nice Programmer<http://niceprogrammer.com>
 */
class EloquentPicturesRepository implements IPicturesRepository
{
    /**
     * Get 10 latest pictures.
     *
     * @param $offset int
     * @return mixed
     */
    public function getTenLatest($offset = 0)
    {
        $query = Picture::latest();
        if ($offset > 0) {
            $query->skip($offset);
        }
        return $query->limit(5)->get()->toArray();
    }
}