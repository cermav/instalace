<?php

namespace app\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PetAppointment;
use App\Models\PriceChart;
use App\Models\Record;
use App\Models\User;
use App\Types\UserRole;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class PriceChartController extends Controller {
    /**
     * @throws AuthenticationException
     */
    public function index() {
        $this->authorizeDoctor();
        $priceChart = PriceChart::where('doctor_id', Auth::user()->id)->get();

        return response()->json($priceChart);
    }

    /**
     * @throws AuthenticationException
     */
    public function store(Request $request) {
        $doctor_id = $this->authorizeDoctor();

        $object = json_decode($request->getContent(), false);

        foreach ($object as $item) {
            $chart = PriceChart::create([
                'doctor_id' => $doctor_id,
                'description' => $item->description,
                'price' => $item->price,
                'currency' => $item->currency,
                'display' => $item->display
            ]);

            $chart->save();
        }

        return response()->json([], Response::HTTP_OK);
    }
    public function update(Request $request) {
        $doctor_id = $this->authorizeDoctor();

        $object = json_decode($request->getContent(), false);

        foreach ($object as $item) {
            $chartItem = PriceChart::find($item->id);

            $chartItem->update([
                'doctor_id' => $doctor_id,
                'description' => $item->description,
                'price' => $item->price,
                'currency' => $item->currency,
                'display' => $item->display
            ]);
        }

        return response()->json([], Response::HTTP_OK);
    }

    public function delete(Request $request) {

    }

    /**
     * @throws AuthenticationException
     */
    protected function authorizeDoctor() {
        $loggedUser = Auth::User();

        if ($loggedUser->role_id !== UserRole::DOCTOR && $loggedUser->role_id
            !== UserRole::ADMINISTRATOR) {
            throw new AuthenticationException();
        }

        return $loggedUser->id;
    }
}
