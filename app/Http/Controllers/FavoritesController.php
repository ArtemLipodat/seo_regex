<?php

namespace App\Http\Controllers;

use App\Models\Favorites;
use App\Models\FavoritesAdded;
use App\Models\Posts;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use function MongoDB\BSON\toJSON;

class FavoritesController extends Controller {

    public function index($id = null) {
        if ($id) {
            return view('favorite');
        } else {
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $favoriteAdded = [];
        $favorite = [];

        $isFavorite = DB::table('favorites')->select('id')->where([
            ['user_id', '=', $request->input('user_id')],
            ['post_id', '=', $request->input('post_id')]
        ])->first();

        if ($isFavorite) {
            return \response(['favorite' => $favorite, 'added' => $favoriteAdded]);
        } else{
            Favorites::create(
                [
                    'post_id' => $request->input('post_id'),
                    'user_id' => $request->input('user_id'),
                ]
            );
        }

        $oldValueAdded = FavoritesAdded::where('post_id', $request->input('post_id'))->first();

        if (!$oldValueAdded) {
            FavoritesAdded::create([
                'post_id' => $request->input('post_id'),
                'added' => 1,
            ]);
        } else {
           DB::table('favorites_addeds')->where('post_id', '=', $request->input('post_id'))->update(['added' => $oldValueAdded->added + 1]);
        }

        $favoriteAdded = [
            'post_id' => $request->input('post_id')
        ];

        return \response(['added' => $favoriteAdded]);
    }

    /**
     * Display the specified resource.
     *
     * @param Favorites $favorites
     * @return Response
     */
    public function show(Favorites $favorites, $id) {
        $favorite = $favorites::where('user_id', $id)->get();
        return $favorite->load('post');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Favorites $favorites
     * @return Response
     */
    public function edit(Favorites $favorites)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Favorites $favorites
     * @return Response
     */
    public function update(Request $request, Favorites $favorites) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Favorites $favorites
     * @return Response
     */
    public function destroy(Favorites $favorites)
    {
        //
    }
}
