@extends('user.user_master')
@section('user')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Edit Task</h4>
                        <form method="post" action="{{ route('task.update') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $task->id }}">
                            @include('user.task_page.include.task_setting', [
                            'label' => $task->label,
                            'name' => $task->task_name,
                            'start' => $task->start_date->format('Y-m-d'),
                            'end' => $task->end_date->format('Y-m-d'),
                            'status' => $task->status,
                            'priority' => $task->priority,
                            'description' => $task->task_description,
                            ])
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Edit Task">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
