<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Log;

class TaskController extends Controller
{

    public function show($id) {
        $task = Task::find($id);
        return response()->json([
            'data' => $task
        ]);
    }

    public function list(Request $request) {
        $tasks = Task::latest()->paginate(5);
        return response()->json($tasks);
        //return request()->ajax() ? 
        //           response()->json($tasks,Response::HTTP_OK) 
        //           : abort(404);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => 'required|min:5|max:198',
            'category' => 'required|min:5|max:198'
        ]);
        if ($validator -> fails()) {
            return back()
                ->withInput()
                ->with('ErrorInsert', 'Favor de llenar todos los campos')
                ->withErrors($validator);
        }
        else {
            $task = Task::updateOrCreate(
                ['id' => $request->id],
                [
                    'name' => $request->name,
                    'category' => $request->category
                ]
            );
            return response()->json(['success' => 'Se guardaron los cambios correctamente'], 200);
        }
    }

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request) {
        $validator = Validator::make($request->all(),[
            'status' => 'required'
        ]);
        if ($validator -> fails()) {
            return back()
                ->withInput()
                ->with('ErrorInsert', 'Favor de llenar todos los campos')
                ->withErrors($validator);
        }
        else {
            $task = Task::where('id', $request->id)->update(['status'=>$request->status]);
            return response()->json(['success' => $task], 200);
        }
    }

    public function destroy($id) {
        Task::find($id)->delete();
        return response()->json(['success' => 'Eliminado correctamente'], 200);
    }
}
