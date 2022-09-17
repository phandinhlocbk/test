@extends('user.user_master')
@section('user')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> New Task</h4>
                        <form method="post" action="{{ route('task.store') }}" enctype="multipart/form-data">
                            @csrf
                            @include('user.task_page.include.task_setting', [
                            'label' => '',
                            'name' => '',
                            'start' => '',
                            'end' => '',
                            'status' => '',
                            'priority' => '',
                            'description' => '',
                            ])
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Insert New Task">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
