<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskAddRequest;
use App\Http\Requests\TaskEditRequest;
use App\Models\Task;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function create()
    {
        return view('user.task_page.create_task');
    }

    public function store(TaskAddRequest $request)
    {
        $validated = $request->validated();
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->tasks()->create($validated);

        return redirect()->route('user.dashboard');
    }

    public function show(Request $request)
    {
        $startDate = $request->startdate;
        $endDate = $request->enddate;
        $keywords = $request->keywords;
        $sortBy = $request->input('sortby');
        $sortType = $request->input('sorttype');
        if ($sortType == 'asc') {
            $sortType = 'desc';
        } else {
            $sortType = 'asc';
        }
        $tasks = auth()->user()->tasks()->status($request->status)
                ->priority($request->priority)
                ->label($keywords)->name($keywords)->descript($keywords)
                ->startdate($startDate)->enddate($endDate);
        if ($sortBy != null && $sortBy != null) {
            $tasks = $tasks->orderBy($sortBy, $sortType);
        }
        $tasks = $tasks->paginate(1);

        //$tasks = $user->tasks()->get();
        //dd($tasks);
        return view('user.task_page.all_task', compact('tasks', 'sortType'));
    }

    public function edit($id)
    {
        $task = auth()->user()->tasks->where('id', $id)->firstOrFail();

        return view('user.task_page.edit_task', compact('task'));
    }

    public function update(TaskEditRequest $request)
    {
        DB::beginTransaction();
        $validated = $request->validated();
        $task = auth()->user()->tasks->where('id', $request->id)->firstOrFail();
        try {
            $task->fill($validated)->save();
        } catch (Exception $e) {
            DB::rollback();

            return $e;
        }
        DB::commit();

        return redirect()->route('task.show');
    }

    public function delete($id)
    {
        auth()->user()->tasks->where('id', $id)->firstOrfail()->delete();

        return redirect()->route('task.show');
    }

    public function detail($id)
    {
        $task = auth()->user()->tasks->where('id', $id)->firstOrFail();

        return view('user.task_page.task_detail', compact('task'));
    }
}
