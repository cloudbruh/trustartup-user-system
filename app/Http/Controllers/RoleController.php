<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    /**
     * @OA\Post(
     *      path="/user/{id}/roles",
     *      tags={"User"},
     *      summary="Add role to the User",
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="User id",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *         )
     *     ),
     *      @OA\Parameter(
     *         name="type",
     *         in="query",
     *         description="Role type",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *         )
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *      ),
     *      @OA\Response(
     *          response=406,
     *          description="Something went wrong",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="message", type="string"),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="User not found",
     *      )
     *  )
     */
    public function add($id, Request $request)
    {
        $user = User::findOrFail($id);
        $roleType = $request->type;
        if ($user->roles()->where('type', $roleType)->count()) {
            return response()->json([
                'message' => 'User already has this role',
            ], 406);
        }
        $user->roles()->create([
            'type' => $roleType,
        ]);
        return response()->json(null, 200);
    }

    /**
     * @OA\Delete(
     *      path="/user/{id}/roles",
     *      tags={"User"},
     *      summary="Delete role from the User",
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="User id",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *         )
     *     ),
     *      @OA\Parameter(
     *         name="type",
     *         in="query",
     *         description="Role type",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *         )
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *      ),
     *      @OA\Response(
     *          response=406,
     *          description="Something went wrong",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="message", type="string"),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="User not found",
     *      )
     *  )
     */
    public function delete($id, Request $request)
    {
        $user = User::findOrFail($id);
        $role = $user->roles()->where('type', $request->type)->first();
        if (!$role) {
            return response()->json([
                'message' => 'User does not have this role',
            ], 406);
        }
        $role->delete();
        return response()->json(null, 200);
    }
}
