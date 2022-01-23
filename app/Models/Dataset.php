<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="Dataset",
 *     description="Dataset model",
 *     @OA\Xml(
 *         name="Dataset"
 *     )
 * )
 */
class Dataset extends Model
{

    /**
     * @OA\Property(
     *     title="id",
     *     description="id",
     *     example=1
     * )
     */

    public $id;

    /**
     * @OA\Property(
     *     title="user_id",
     *     description="user_id",
     *     example=1
     * )
     */

    public $user_id;

    /**
     * @OA\Property(
     *     title="type",
     *     description="type",
     *     example=1
     * )
     */

    public $type;

    /**
     * @OA\Property(
     *     title="content",
     *     description="content",
     *     example=1
     * )
     */

    public $content;

    /**
     * @OA\Property(
     *     title="status",
     *     description="status",
     *     example=1
     * )
     */

    public $status;

    /**
     * @OA\Property(
     *     title="comment",
     *     description="comment",
     *     example=1
     * )
     */

    public $comment;

    protected $fillable = [
        'user_id', 'type', 'content', 'status', 'comment'
    ];
}
