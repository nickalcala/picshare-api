<?php
namespace Picshare\Domain\Pictures;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Picture
 * 
 * @package Picshare\Domain\Pictures
 * @author Nick B. Alcala<nick@niceprogrammer.com> 01-18-2018
 * @copyright 2018 Nice Programmer<http://niceprogrammer.com>
 */
class Picture extends Model
{
    public $fillable = [
        'user_id',
        'title',
        'description',
    ];
}