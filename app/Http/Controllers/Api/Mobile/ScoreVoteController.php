<?php

namespace app\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;
use App\Models\ScoreVote;
use App\Models\User;
use App\Models\Doctor;
use App\Types\DoctorStatus;
use App\Models\Score;
use App\Models\ScoreDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ScoreResource;
use Illuminate\Support\Facades\DB;

class ScoreVoteController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        /*
        APP sends request
        check if sent changes are recent
        PUT update
        return recent data
        */

        $validatedDate = $request->validate(['updated' => 'date']);
        if (array_key_exists('updated', $validatedDate)) {
            $whereArray[] = [
                'doctors.updated_at',
                '>',
                $validatedDate['updated'],
            ];
        }

        $input = json_decode($request->getContent());

        $validator = Validator::make((array) $input, [
            'score_id' => 'required|integer',
            'author_id' => 'integer',
            'value' => 'integer|required',
            'ip_address' => [],
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        // validate ip address
        if (
            ScoreVote::where([
                ['score_id', $input->score_id],
                ['ip_address', $_SERVER['REMOTE_ADDR']],
            ])->exists()
        ) {
            return response()->json("Request from same IP.", 401);
        }




        if (sizeof($doctors) > 0) {
            return DoctorResource::collection($doctors);
        }
        return response()->json((array)[]
        );
    }



    public function store(Request $request)
    {

        /*
        APP sends request
        check if sent changes are recent
        PUT update
        return recent data
        */
        // validate input

        $whereArray = [];

        $validatedDate = $request->validate(['updated' => 'date']);

        //return response()->json(array_key_exists('updated', $validatedDate));

        if (array_key_exists('updated', $validatedDate)) {
            $whereArray[] = [
                'score.updated_at',
                '<',
                $validatedDate['updated'],
            ];
        }

        //return response()->json($validatedDate);

        $user = Auth::user();


        $validator = Validator::make($request->all(), [
            'row.*.user_id' => 'required|integer',
            'row.*.score_item' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $input = json_decode($request->getContent());

        foreach($input as $vote)
        {
            //find target doctor
            $doctor = Doctor::Where('user_id', $vote->user_id)->whereIn('state_id', [
                DoctorStatus::NEW,
                DoctorStatus::UNPUBLISHED,
                DoctorStatus::INCOMPLETE,
                DoctorStatus::PUBLISHED,
                DoctorStatus::ACTIVE,
            ])->first();

            if ($doctor) $score = Score::create([
                'author_id' => $user->id,
                'user_id' => $doctor->user_id,
                'ip_address' => $_SERVER['REMOTE_ADDR'],
                'comment' => $vote->comment,
                'is_approved' => 0,
            ]);

            foreach ($vote->score_item as $item) {
                $validator = Validator::make((array) $item, [
                    'id' => 'required|integer',
                    'points' => 'required|integer',
                ]);
                if ($validator->validate()) {
                    ScoreDetail::create([
                        'score_id' => $score->id,
                        'score_item_id' => $item->id,
                        'points' => $item->points,
                    ]);
                }
            }
        }
        return ScoreResource::collection(
            Score::select(
                'id',
                'user_id',
                'author_id',
                'comment',
                'ip_address',
                'created_at',
                'updated_at',
                DB::raw(
                    "(SELECT SUM(value) FROM score_votes WHERE score_id = scores.id) AS voting"
                )
            )
            ->get()
        );
        // validate ip address
        /*
        ->where($whereArray)
        if (
            ScoreVote::where([
                ['score_id', $input->score_id],
                ['ip_address', $_SERVER['REMOTE_ADDR']],
            ])->exists()
        ) {
            return response()->json("Request from same IP.", 401);
        }*/

    }
}
