<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="User",
 *     description="User model",
 *     @OA\Xml(
 *         name="User"
 *     )
 * )
 */
class User extends Model
{
    use HasFactory;

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
     *     title="name",
     *     description="name",
     *     example="Ivan"
     * )
     */

    public $name;

     /**
     * @OA\Property(
     *     title="surname",
     *     description="surname",
     *     example="Hue"
     * )
     */

    public $surname;

     /**
     * @OA\Property(
     *     title="email",
     *     description="email",
     *     example="vaehu@gmail.com"
     * )
     */

    public $email;

     /**
     * @OA\Property(
     *     title="description",
     *     description="description",
     *     example="Developer in Google working around 20 hour a week"
     * )
     */

    public $description;

     /**
     * @OA\Property(
     *     title="media_id",
     *     description="media_id",
     *     example="1"
     * )
     */

    public $media_id;

    /**
     * @OA\Property(
     *     title="created_at",
     *     description="created_at",
     *     example="2022-01-22T21:34:30.000000"
     * )
     */
    public $created_at;

    /**
     * @OA\Property(
     *     title="updated_at",
     *     description="updated_at",
     *     example="2022-01-22T21:34:30.000000"
     * )
     */
    public $updated_at;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'description', 'password', 'media_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'confirmed_at' => 'datetime',
    ];

    protected $with = ['roles'];

    /**
    * @OA\Property(
     *     title="roles",
     *     description="roles",
     *     type="array",
     *      @OA\Items(ref="#/components/schemas/Role"),
    *
    * )
    */
    public $roles;

    public function roles()
    {
      return $this->hasMany('App\Models\Role');
    }

    public function datasets()
    {
      return $this->hasMany('App\Models\Dataset');
    }
}
