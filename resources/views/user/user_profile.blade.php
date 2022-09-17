@extends('user.user_master')
@section('user')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card"><br><br>
                        <center>
                            <img class="rounded-circle avatar-xl"
                                src="{{ !empty($user->profile_image) ? url('upload/user_images/' . $user->profile_image) : url('upload/no_image.jpg') }}"
                                alt="Card image cap">
                        </center>
                        <div class="card-body">
                            <h4 class="card-title">Name: {{ $user->name }} </h4>
                            <hr>
                            <h4 class="card-title">Email: {{ $user->email }}</h4>
                            <hr>
                            <a href="{{ route('user.edit.profile') }}"
                                class="btn btn-info btn-rounded waves-effect waves-light"> Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
