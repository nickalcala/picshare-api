<?php
namespace Picshare\Application\Interfaces\Persistence;

use Picshare\Domain\Pictures\Picture;

/**
 * Class IRepository
 * 
 * @package Picshare\Application\Interfaces\Persistence
 * @author Nick B. Alcala<nick@niceprogrammer.com> 01-18-2018
 * @copyright 2018 Nice Programmer<http://niceprogrammer.com>
 */
interface IPicturesRepository
{
    /**
     * Get 10 latest pictures.
     * 
     * @param $offset int
     * @return Picture[]
     */
    public function getTenLatest($offset = 0);
}