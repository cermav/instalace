<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use App\Models\Property;

class PropertyController extends Controller
{
    public function getPropertyByName()
    {
        $name = Input::get('name') ? Input::get('name') : "";
        $categoryId = Input::get('category_id')
            ? Input::get('category_id')
            : "";
        $properties = Property::where([
            ['name', 'like', $name . '%'],
            ['is_approved', '=', 1],
            ['show_on_registration', '=', 0],
            ['property_category_id', '=', $categoryId],
        ])->get();
        return response()->json($properties);
    }
}
