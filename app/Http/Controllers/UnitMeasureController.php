<?php

namespace App\Http\Controllers;

use App\Models\UnitMeasure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnitMeasureController extends Controller
{
    public function all()
    {
        return response()->json([
            'status' => true,
            'data' => UnitMeasure::latest()->get()
        ]);
    }

    public function index()
    {
        $this->data['unit_measures'] = UnitMeasure::latest()->get();
        return view('unit-measures.list', $this->data);
    }

    public function create()
    {
        return view('unit-measures.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ]);
        }

        $UnitMeasure = new UnitMeasure();
        $UnitMeasure->fill([
            'name' => $request->name,
            'is_default' => $request->is_default,
            'notes' => $request->notes
        ]);
        $UnitMeasure->save();

        return response()->json([
            'status' => true,
            'message' => 'Record Saved successfully'
        ]);
    }

    public function edit(Request $request)
    {
        $this->data['unit_measure'] = UnitMeasure::find($request->id);
        return view('unit-measures.edit', $this->data);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ]);
        }

        $UnitMeasure = UnitMeasure::find($request->id);
        $UnitMeasure->fill([
            'name' => $request->name,
            'is_default' => $request->is_default,
            'notes' => $request->notes
        ]);
        $UnitMeasure->save();

        return response()->json([
            'status' => true,
            'message' => 'Record saved successfully'
        ]);
    }

    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first()
            ]);
        }
        $UnitMeasure = UnitMeasure::find($request->id);
        if (!$UnitMeasure) {
            return response()->json([
                'status' => false,
                'message' => 'Record not found'
            ]);
        }
        $UnitMeasure->delete();

        return response()->json([
            'status' => true,
            'message' => 'Record deleted successfully'
        ]);

    }
}
