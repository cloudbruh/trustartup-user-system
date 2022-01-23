<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * @OA\Info(
     *      version="1.0.0",
     *      title="User System API",
     *      description="",
     * )
     *
     * @OA\Tag(
     *     name="User",
     *     description="API Endpoints of User"
     * )
     *
     * @OA\Tag(
     *     name="Dataset",
     *     description="API Endpoints of Dataset"
     * )
     */
}
