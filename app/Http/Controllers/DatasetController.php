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
        $dataset->update($request->all());
        return response()->json($dataset, 200);
    }

    public function get($id)
    {
        return response()->json(Dataset::findOrFail($id));
    }

    public function getByUser($id, Request $request)
    {
        return response()->json(User::findOrFail($id)->datasets);
    }

    public function create($id, Request $request)
    {
        $user = User::findOrFail($id);
        $dataset = $user->datasets()->create($request->all());
        return response()->json($dataset, 201);
    }
}
