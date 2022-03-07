<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;
use App\Models\NewsType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(News::get(), Response::HTTP_OK);
    }

    public function listByType($id)
    {
        $news = News::where('type_id', $id)->get();
        return response()->json($news, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth()->id();

        News::create($data);

        return response()->json([
            'message' => "News successfully created."
        ], Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewsRequest  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, $id)
    {
        $news = News::find($id);

        if(!$news) {
            return response()->json(['error' => 'News Not Found'], Response::HTTP_NOT_FOUND);
        }

        $news->update($request->all());
        return response()->json(['message'=> "News successfully updated."], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);

        if(!$news) {
            return response()->json(['error' => 'News Not Found'], Response::HTTP_NOT_FOUND);
        }
 
        $news->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
