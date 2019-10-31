<?php

namespace App\Http\Controllers\Api;

use App\History;
use App\Http\Controllers\Controller;
use App\Http\Resources\HistoryCollection;
use App\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use function MongoDB\BSON\toJSON;

class HistoryUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param User $user
     * @return AnonymousResourceCollection
     */
    public function index(User $user)
    {
        $his = History::where('teamA', '=', $user->id)->orWhere('teamB', '=' , $user->id)->where('is_done', '=' , '1')->get();;
        $response['history'] = array();
        foreach ($his as $hi){
            if ($hi->teamA == $user->id){
                $h = array();
                $h['game_id'] = $hi->game_id;
                $h['time_start'] = $hi->created_at;
                $h['status'] = $hi->resultA;
                $h['point'] = $hi->pointA;
                array_push($response['history'],$h);
            } elseif ($hi->teamB == $user->id) {
                $h = array();
                $h['game_id'] = $hi->game_id;
                $h['time_start'] = $hi->created_at;
                $h['status'] = $hi->resultB;
                $h['point'] = $hi->pointB;
                array_push($response['history'],$h);
            }
        }
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
