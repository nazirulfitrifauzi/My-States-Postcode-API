<?php

namespace App\Http\Controllers;

use App\Models\Postcode;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class StatePostcodeController extends Controller
{
    public function allState()
    {
        $data = Cache::rememberForever('all_states', function () {
            return State::all();
        });

        return $this->successResponse("Successfully fetched ", [
            'data' => $data,
        ], 200);
    }

    public function stateById($id)
    {
        $data = Cache::rememberForever("state_{$id}", function () use ($id) {
            return State::find($id);
        });

        return $this->successResponse("Successfully fetched ", [
            'data' => $data,
        ], 200);
    }

    public function allPostcode()
    {
        $data = Cache::rememberForever('all_postcodes', function () {
            return Postcode::with('states')->get();
        });

        return $this->successResponse("Successfully fetched ", [
            'data' => $data,
        ], 200);
    }

    public function postcodeByState($id)
    {
        $data = Cache::rememberForever("postcodes_by_state_{$id}", function () use ($id) {
            return Postcode::with('states')->where('state_id', $id)->get();
        });

        return $this->successResponse("Successfully fetched ", [
            'data' => $data,
        ], 200);
    }

    public function postcodeById($id)
    {
        $data = Cache::rememberForever("postcode_{$id}", function () use ($id) {
            return Postcode::with('states')->find($id);
        });

        return $this->successResponse("Successfully fetched ", [
            'data' => $data,
        ], 200);
    }
}
