@extends('user.user_master')
@section('user')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">All Tasks</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Tasks</h4>
                        <form action="{{ route('task.show') }}" method="get" class="mb-3">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <select name="status" class="form-select">
                                            <option value="">
                                                All Status
                                            </option>
                                            <option value="1" {{ request()->status == '1' ? 'selected' : false }}>
                                                Pending</option>
                                            <option value="2" {{ request()->status == '2' ? 'selected' : false }}>
                                                On
                                                Process </option>
                                            <option value="3" {{ request()->status == '3' ? 'selected' : false }}>
                                                Done
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <select name="priority" class="form-select">
                                            <option value="">
                                                All Priority
                                            </option>
                                            <option value="1" {{ request()->priority == '1' ? 'selected' : false }}>
                                                Urgent</option>
                                            <option value="2" {{ request()->priority == '2' ? 'selected' : false }}>High
                                            </option>
                                            <option value="3" {{ request()->priority == '3' ? 'selected' : false }}>
                                                Medium</option>
                                            <option value="4" {{ request()->priority == '4' ? 'selected' : false }}>Low
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <input name="keywords" type="text" class="form-control" id="validationCustom04"
                                            placeholder="Search" value="{{ request()->keywords }}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="example-date-input" class="col-sm-2 col-form-label">Start
                                            Date</label>
                                        <input name="startdate" class="form-control" type="date"
                                            value="{{ request()->startdate }}" id="example-date-input">
                                    </div>
                                    <div class="col">
                                        <label for="example-date-input" class="col-sm-2 col-form-label">End Date</label>
                                        <input name="enddate" class="form-control" type="date"
                                            value="{{ request()->enddate }}" id="example-date-input">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <input type="submit" class="btn btn-primary waves-effect waves-light"
                                            class="form-control" value="Search" />
                                    </div>
                                </div>
                            </div>
                        </form>
                        <p class="card-title-desc"></p>
                        <table class="table mb-0" id="dtBasicExample"
                            class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th><a href="?sortby=label&sorttype={{ $sortType }}">Label</a></th>
                                    <th><a href="?sortby=task_name&sorttype={{ $sortType }}">Task</a></th>
                                    <th><a href="?sortby=task_description&sorttype={{ $sortType }}">Task
                                            Description</a></th>
                                    <th><a href="?sortby=start_date&sorttype={{ $sortType }}">Start Date</a></th>
                                    <th><a href="?sortby=end_date&sorttype={{ $sortType }}">End Date</a></th>
                                    <th><a href="?sortby=status&sorttype={{ $sortType }}">Status</a></th>
                                    <th><a href="?sortby=priority&sorttype={{ $sortType }}">Priority</a></th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $key => $task)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $task->label }}</td>
                                    <td><a href="{{ route('task.detail', $task->id) }}">{{ $task->task_name }}</a>
                                    </td>
                                    <td>{{ Illuminate\Support\Str::limit($task->task_description, 20) }}</td>
                                    <td>{{ $task->start_date->format('Y-m-d') }}</td>
                                    <td>{{ $task->end_date->format('Y-m-d') }}</td>
                                    <td>{{ $task->getStatus() }}</td>
                                    <td>{{ $task->getPriority() }}</td>
                                    <td>
                                        <a href="{{ route('task.edit', $task->id) }}" class="btn btn-info sm"
                                            title="Edit Data"> <i class="fas fa-edit"></i> </a>
                                        <a href="{{ route('task.delete', $task->id) }}" class="btn btn-danger sm"
                                            title="Delete Data"> <i class="fas fa-trash-alt" id="delete"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$tasks->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
