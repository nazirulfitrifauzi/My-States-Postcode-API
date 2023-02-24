<?php

namespace App\Http\Controllers;

use App\Models\Postcode;
use App\Models\State;
use Illuminate\Http\Request;

class StatePostcodeController extends Controller
{
    public function allState()
    {
        $data = State::all();

        return $this->successResponse("Successfully fetched ", [
            'data' => $data,
        ], 200);
    }

    public function stateById($id)
    {
        $data = State::find($id);

        return $this->successResponse("Successfully fetched ", [
            'data' => $data,
        ], 200);
    }

    public function allPostcode()
    {
        $data = Postcode::with('states')->get();

        return $this->successResponse("Successfully fetched ", [
            'data' => $data,
        ], 200);
    }

    public function postcodeByState($id)
    {
        $data = Postcode::with('states')->where('state_id', $id)->get();

        return $this->successResponse("Successfully fetched ", [
            'data' => $data,
        ], 200);
    }
}
