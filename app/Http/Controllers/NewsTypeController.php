<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsTypeRequest;
use App\Http\Requests\UpdateNewsTypeRequest;
use App\Models\NewsType;
use Illuminate\Http\Response;

class NewsTypeController extends Controller
{
    /**
     * Display a listing of the news types of logged journalist.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(NewsType::get(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNewsTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsTypeRequest $request)
    {
        $data = $request->only('name');
        $data['user_id'] = Auth()->id();

        NewsType::create($data);

        return response()->json([
            'message' => "News Type successfully created."
        ], Response::HTTP_CREATED);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewsTypeRequest  $request
     * @param  \App\Models\NewsType  $newsType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsTypeRequest $request, $id)
    {
        $newsType = NewsType::find($id);

        if(!$newsType) {
            return response()->json(['error' => 'News Type Not Found'], Response::HTTP_NOT_FOUND);
        }

        $newsType->update($request->all());
        return response()->json(['message'=> "News successfully updated."], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsType  $newsType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newsType = NewsType::find($id);

        if(!$newsType) {
            return response()->json(['error' => 'News Type Not Found'], Response::HTTP_NOT_FOUND);
        }

        if($newsType->news->count() > 0) {
            return response()->json(['error' => 'There are news related to this type'], Response::HTTP_METHOD_NOT_ALLOWED);
        }
 
        $newsType->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
