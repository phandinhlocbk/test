@extends('user.user_master')
@section('user')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Task Detail</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Task {{ $task->task_name }} Detail</h4>
                            <p class="card-title-desc"></p>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Label</th>
                                        <th>Task</th>
                                        <th>Task Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $task->label }}</td>
                                        <td>{{ $task->task_name }}</td>
                                        <td>{{ $task->task_description }}</td>
                                        <td>
                                            <a href="{{ route('task.edit', $task->id) }}" class="btn btn-info sm"
                                                title="Edit Data"> <i class="fas fa-edit"></i> </a>
                                            <a href="{{ route('task.delete', $task->id) }}" class="btn btn-danger sm"
                                                title="Delete Data"> <i class="fas fa-trash-alt" id="delete"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
