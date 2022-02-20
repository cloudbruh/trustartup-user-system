<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * @OA\Get(
     *      path="/users",
     *      tags={"User"},
     *      summary="Get list of users",
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/User"),
     *             )
     *          )
     *      )
     *  )
     */

    public function show()
    {
        return response()->json(User::get());
    }

    /**
     * @OA\Get(
     *      path="/users/{id}",
     *      tags={"User"},
     *      summary="Get user by ID",
     *      @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="User id",
     *         required=true,
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\JsonContent(ref="#/components/schemas/User"),
     *      ),
     *      @OA\Response(response=404, description="Not Found")
     *  )
     */

    public function get($id)
    {
        return response()->json(User::findOrFail($id));
    }

    /**
     * @OA\Post(
     *      path="/users",
     *      tags={"User"},
     *      summary="Create user",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/User")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\JsonContent(ref="#/components/schemas/User"),
     *      )
     *  )
     */

    public function create(Request $request)
    {
        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    /**
     * @OA\Put(
     *      path="/users",
     *      tags={"User"},
     *      summary="Update user",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/User")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\JsonContent(ref="#/components/schemas/User"),
     *               ),
     *      @OA\Response(response=404, description="Not Found")
     *  )
     */

    public function update(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->update($request->all());
        return response()->json($user, 200);
    }

    /**
     * @OA\Delete(
     *      path="/users",
     *      tags={"User"},
     *      summary="Delete user",
     *      @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="User id",
     *         required=true,
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *      ),
     *      @OA\Response(response=404, description="Not Found")
     *  )
     */

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return response()->json([
            'message' => 'Deleted Successfully',
        ], 200);
    }

    /**
     * @OA\Post(
     *      path="/attempt",
     *      tags={"User"},
     *      summary="Get user by email with password",
     *      @OA\Parameter(
     *         name="email",
     *         in="query",
     *         description="email",
     *         required=true,
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\JsonContent(ref="#/components/schemas/User"),
     *      ),
     *      @OA\Response(response=404, description="Not Found")
     *  )
     */

    public function attempt(Request $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();
        return response()->json([
            'id' => $user->id,
            'password' => $user->password,
            'roles' => $user->roles,
        ], 200);
    }
}
