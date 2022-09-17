@php
$id = Auth::guard('admin')->user()->id;
$adminData = App\Models\Admin::find($id);
@endphp
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                @if ($adminData->profile_image)
                <img src="{{ url('upload/user_images/' . $adminData->profile_image) }}" alt=""
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
                        <span>Users</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.users')}}">All Users</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
