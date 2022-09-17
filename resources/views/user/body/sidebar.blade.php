@php
$id = Auth::user()->id;
$userData = App\Models\User::find($id);
@endphp
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                @if ($userData->profile_image)
                    <img src="{{ url('upload/user_images/' . $userData->profile_image) }}" alt=""
                        class="avatar-md rounded-circle">
                @else
                    <img class="rounded-circle" src="{{ url('upload/no_image.jpg') }}">
                @endif
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1"></h4>
            </div>
        </div>    
          <!--- Sidemenu -->
            <div id="sidebar-menu">
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">Menu</li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-layout-3-line"></i>
                            <span>Task</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{route('task.create')}}">Create Task</a></li>
                            <li><a href="{{route('task.show')}}">All Tasks</a></li>
                        </ul>
                    </li>
                </ul>
           </div>
        <!-- Sidebar -->
    </div>
</div>
