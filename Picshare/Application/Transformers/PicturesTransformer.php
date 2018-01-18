<?php
namespace Picshare\Application\Transformers;

use Picshare\Domain\Pictures\Picture;

/**
 * Class PicturesTransformer
 * 
 * @package Picshare\Application\Transformers
 * @author Nick B. Alcala<nick@niceprogrammer.com> 01-18-2018
 * @copyright 2018 Nice Programmer<http://niceprogrammer.com>
 */
class PicturesTransformer extends Transformer
{

    /**
     * Transform a single model.
     *
     * @param $picture array
     * @return mixed
     */
    public function transform($picture)
    {
        return [
            'id' => $picture['id'],
            'user_id' => $picture['user_id'],
            'title' => $picture['title'],
            'description' => $picture['description'],
            'filename' => $picture['filename'],
            'created_at' => $picture['created_at'],
            'updated_at' => $picture['updated_at'],
        ];
    }
}