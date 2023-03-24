<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Types\UserRole;
use App\Models\Pet;
use App\Models\PetAppointment;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use DateTime;

class AppointmentController extends Controller
{
    //GET appointments list
    //done
    public function index($pet_id)
    {
        if (
            Auth::user()->id ==
            DB::table('pets')
                ->where('id', $pet_id)
                ->first()->owners_id
        ) {
            $appointment = PetAppointment::where('pet_id', $pet_id)->get();
            return response()->json($appointment);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
    //done
    public function showAll()
    {
        $loggedUser = Auth::User();
        if ($loggedUser->role_id === UserRole::ADMINISTRATOR) {
            $appointment = PetAppointment::all();
            return response()->json($appointment);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
    //GET appointment by appointment ID
    public function detail(int $pet_id, int $id)
    {
        $this->AuthPet($pet_id);
        $appointment = DB::table('PetAppointment')
            ->where('pet_id', $pet_id)
            ->where('id', $id)
            ->get();
        return response()->json($appointment);
    }

    public function store(Request $request, int $pet_id) {
        $owners_id = DB::table('pets')->where('id', $pet_id)->first()->owners_id;

        $this->AuthUser($owners_id);

        $input = $this->validateRegistration($request);

        $object = json_decode(json_encode($input), false);

        $appointment = $this->createAppointment(
                $object,
                $pet_id,
                $owners_id
            );
            //add input to database
            $appointment->save();
            //respond
            return response()->json($appointment, JsonResponse::HTTP_CREATED);
    }

    public function createAppointment(object $data, int $pet_id, int $owners_id) {
        try {
            return PetAppointment::create([
                'title' => $data->title,
                'pet_id' => $pet_id,
                'date' => DateTime::createFromFormat('j. n. Y', $data->date),
                'owners_id' => $owners_id,
                'doctor_id' => $data->doctor_id,
                'start' => $data->start,
                'end' => $data->end,
                'allDay' => !$data->start && !$data->end
            ]);
        } catch (\Exception $ex) {
            throw new HttpResponseException(
                response()->json(
                    [
                        'errors' =>
                            "Error creating appointment: " . $ex->getMessage(),
                    ],
                    JsonResponse::HTTP_UNPROCESSABLE_ENTITY
                )
            );
        }
    }

    //TODO Authentication
    public function remove(int $pet_id, int $id)
    {
        try {
            $this->AuthUser(
                DB::table('pets')
                    ->where('id', $pet_id)
                    ->first()->owners_id
            );
        } catch (\Exception $e) {
            return response()->json("non-existent pet or appointment", 404);
        }

        PetAppointment::where('id', $id)
            ->where('pet_id', $pet_id)
            ->delete();
        return response()->json("Deleted", JsonResponse::HTTP_OK);
    }

    //TODO Authentication
    public function update(Request $request, int $pet_id, int $id)
    {
        // verify user
        $this->AuthPet($pet_id);
        PetAppointment::where('pet_id', $pet_id)
            ->where('id', $id)
            ->FirstOrFail();
        $input = $this->validateRegistration($request, $id);
        $date = DateTime::createFromFormat('j. n. Y', $request->date);
        PetAppointment::where('id', $id)
            ->where('pet_id', $pet_id)
            ->update([
                'date' => $date,
                'title' => $request->title,
                'doctor_id' => $request->doctor_id
            ]);
        return response()->json(
            PetAppointment::find($id),
            JsonResponse::HTTP_OK
        );
    }
    protected function validateRegistration(Request $request)
    {
        $input = json_decode($request->getContent(), true);

        $validator = Validator::make((array) $input, [
            'date' => 'required',
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            throw new HttpResponseException(
                response()->json(
                    ['errors' => $validator->errors()],
                    JsonResponse::HTTP_UNPROCESSABLE_ENTITY
                )
            );
        }

        return $input;
    }

    /**
     * @throws AuthenticationException
     */
    public function AuthUser(int $id) {
        $requestUser = User::Find($id);
        $loggedUser = Auth::User();

        if (
            $requestUser->id !== $loggedUser->id &&
            $loggedUser->role_id !== UserRole::ADMINISTRATOR
        ) {
            throw new AuthenticationException();
        }
    }

    public function AuthPet(int $pet_id)
    {
        $requestUser = Pet::Find($pet_id);
        $loggedUser = Auth::User();

        if (
            $requestUser->owners_id === $loggedUser->id ||
            $loggedUser->role_id === UserRole::ADMINISTRATOR
        ) {
            //logged user is authorized
            return;
        } else {
            // return unauthorized
            throw new AuthenticationException();
        }
    }
}
