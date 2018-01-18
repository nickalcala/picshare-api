<?php
namespace Picshare\Application\Transformers;

/**
 * Class Transformer
 * 
 * @package Picshare\Application\Transformers
 * @author Nick B. Alcala<nick@niceprogrammer.com> 01-18-2018
 * @copyright 2018 Nice Programmer<http://niceprogrammer.com>
 */
abstract class Transformer
{

    /**
     * Transform an array of models.
     * 
     * @param $models array
     * @return mixed
     */
    public function transformArray($models)
    {
        return array_map([$this, 'transform'], $models);
    }

    /**
     * Transform a single model.
     * 
     * @param $model
     * @return mixed
     */
    public abstract function transform($model);

}