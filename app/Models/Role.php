<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="Role",
 *     description="Role model",
 *     @OA\Xml(
 *         name="Role"
 *     )
 * )
 */
class Role extends Model
{
    /**
     * @OA\Property(
     *     title="type",
     *     description="APPLICANT or CREATOR or ADMIN or MODERATOR",
     *     example="APPLICANT"
     * )
     * @var string
     */
    private $type;

    /**
     * @OA\Property(
     *     title="created_at",
     *     description="created_at",
     *     example="2022-01-22T21:34:30.000000",
     *     format="datetime",
     *     type="string"
     * )
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="updated_at",
     *     description="updated_at",
     *     example="2022-01-22T21:34:30.000000",
     *     format="datetime",
     *     type="string"
     * )
     */
    private $updated_at;

    protected $fillable = [
        'user_id', 'type'
    ];

    protected $hidden = [
        'user_id', 'id'
    ];
}
