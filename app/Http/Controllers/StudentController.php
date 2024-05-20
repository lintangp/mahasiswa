<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller {
    public function index(Request $request)
    {
    if ($request->has('nrp')) {
        $nrp = $request->query('nrp');
        $data = Student::where('nrp', $nrp)->first();

        if (!$data) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        return response()->json(['data' => [$data]]);
    }

    $data = Student::all();
    return response()->json(['data' => $data]);
}


    public function show($id)
    {
        $data = Student::find($id);

        if (!$data) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        return response()->json($data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nrp' => 'required|max:15',
            'nama' => 'required|max:70',
            'email' => 'required|max:90',
            'jurusan' => 'required|max:30',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $validatedData = $validator->validated();
        $data = Student::create($validatedData);

        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $data = Student::find($id);

        if (!$data) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nrp' => 'required|max:15',
            'nama' => 'required|max:70',
            'email' => 'required|max:90',
            'jurusan' => 'required|max:30',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $validatedData = $validator->validated();
        $data->update($validatedData);

        return response()->json($data, 201);
    }

    public function destroy($id)
    {
        $data = Student::find($id);

        if (!$data) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        $data->delete();

        return response()->json(['message' => 'Data deleted']);
    }

}
