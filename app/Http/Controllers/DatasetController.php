<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use App\Models\User;
use Illuminate\Http\Request;

class DatasetController extends Controller
{

    /**
     * @OA\Get(
     *   tags={"Dataset"},
     *   path="/datasets",
     *   summary="Dataset show",
     *   @OA\Response(
     *      response=200,
     *      description="OK",
     *      @OA\MediaType(
     *         mediaType="application/json",
     *         @OA\Schema(
     *            type="array",
     *            @OA\Items(ref="#/components/schemas/Dataset"),
     *         )
     *      )
     *   )
     * )
     */
    public function show()
    {
        return response()->json(Dataset::all());
    }

    /**
     * @OA\Put(
     *   tags={"Dataset"},
     *   path="/datasets",
     *   summary="Dataset update",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(ref="#/components/schemas/Dataset")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(ref="#/components/schemas/Dataset")
     *   ),
     *   @OA\Response(response=404, description="Not Found"),
     * )
     */
    public function update(Request $request)
    {
        $dataset = Dataset::findOrFail($request->id);
        $dataset->update([
            'type' => $request->type,
            'content' => $request->content,
            'status' => $request->status,
            'comment' => $request->comment,
        ]);
        return response()->json($dataset, 200);
    }

    /**
     * @OA\Get(
     *   tags={"Dataset"},
     *   path="/datasets/{id}",
     *   summary="Dataset get by ID",
     *   @OA\Parameter(
     *      name="id",
     *      in="path",
     *      description="Dataset id",
     *      required=true,
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="OK",
     *     @OA\JsonContent(ref="#/components/schemas/Dataset")
     *   ),
     *   @OA\Response(response=404, description="Not Found"),
     * )
     */
    public function get($id)
    {
        return response()->json(Dataset::findOrFail($id));
    }

    /**
     * @OA\Get(
     *   tags={"Dataset"},
     *   path="users/{id}/datasets",
     *   summary="Get datasets of user",
     *   @OA\Parameter(
     *      name="id",
     *      in="path",
     *      description="User id",
     *      required=true,
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="OK",
     *      @OA\MediaType(
     *         mediaType="application/json",
     *         @OA\Schema(
     *            type="array",
     *            @OA\Items(ref="#/components/schemas/Dataset"),
     *         )
     *      )
     *   ),
     *   @OA\Response(response=404, description="Not Found")
     * )
     */
    public function getByUser($id)
    {
        return response()->json(User::findOrFail($id)->datasets);
    }

    /**
     * @OA\Post(
     *   tags={"Dataset"},
     *   path="users/{id}/datasets",
     *   summary="Create dataset for user",
     *   @OA\Parameter(
     *      name="id",
     *      in="path",
     *      description="User id",
     *      required=true,
     *   ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(ref="#/components/schemas/Dataset")
     *   ),
     *   @OA\Response(
     *     response=201,
     *     description="OK",
     *     @OA\JsonContent(ref="#/components/schemas/Dataset")
     *   ),
     *   @OA\Response(response=404, description="Not Found")
     * )
     */
    public function create($id, Request $request)
    {
        $user = User::findOrFail($id);
        $dataset = $user->datasets()->create([
            'type' => $request->type,
            'content' => $request->content,
        ]);
        return response()->json($dataset, 201);
    }
}
