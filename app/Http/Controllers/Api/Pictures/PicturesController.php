<?php
namespace App\Http\Controllers\Api\Pictures;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Auth;
use Picshare\Application\Interfaces\Services\IPictureService;
use Picshare\Domain\Pictures\Picture;

/**
 * Class PicturesController
 * 
 * @package App\Http\Controllers\Api\Pictures
 * @author Nick B. Alcala<nick@niceprogrammer.com> 01-18-2018
 * @copyright 2018 Nice Programmer<http://niceprogrammer.com>
 */
class PicturesController extends ApiController
{

    /**
     * @var IPictureService
     */
    private $pictureService;

    /**
     * PicturesController constructor.
     * @param IPictureService $pictureService
     */
    public function __construct(IPictureService $pictureService)
    {
        $this->pictureService = $pictureService;
    }

    /**
     * Show 10 pictures at a time.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->success($this->pictureService->getTenLatest(\Request::query('page')));
    }

    /**
     * Upload a new picture.
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        $request = \Request::all();
        $validator = \Validator::make($request, [
            'title' => 'required',
            'description' => 'required',
            'file' => 'required|image'
        ]);

        if ($validator->fails()) {
            return $this->unprocessable($validator->messages());
        }

        $picture = new Picture([
            'user_id' => Auth::user()->id,
            'title' => $request['title'],
            'description' => $request['description']
        ]);

        $this->pictureService->upload(
            $picture,
            \Request::file('file')
        );

        return $this->success(true);
    }

}