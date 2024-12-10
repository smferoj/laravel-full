@extends('admin.admin_dashboard')
@section('admin')
<div class="container rounded bg-light shadow-lg mt-5 mb-5">

    @include('_message')
    <div class="row">
        <!-- Profile Section -->
        <div class="col-md-4 border-right bg-white p-4">
            <div class="d-flex flex-column align-items-center text-center">
                <img 
                    src="{{ $getRecord->photo ? asset('upload/' . $getRecord->photo) : asset('assets/others/placeholder.jpg') }}" 
                    alt="Profile Photo" 
                    class="rounded-circle shadow-lg mb-4" 
                    style="width: 150px; height: 150px; object-fit: cover;">
                <span class="font-weight-bold text-primary">{{ Auth::user()->name }}</span>
                <span class="text-black-50">{{ Auth::user()->email }}</span>
            </div>
        </div>

        <!-- Form Section -->
        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="col-md-8 bg-white p-4">
            @csrf
            <h4 class="text-primary mb-4">Profile Settings</h4>
            
            <div class="row g-3">
                <!-- Name -->
                <div class="col-md-4">
                    <label class="form-label text-secondary">Name</label>
                    <input 
                        type="text" 
                        class="form-control border-primary shadow-sm" 
                        name="name" 
                        placeholder="Write your name" 
                        value="{{ $getRecord->name }}" 
                        required>
                </div>

                <!-- Username -->
                <div class="col-md-4">
                    <label class="form-label text-secondary">Username</label>
                    <input 
                        type="text" 
                        class="form-control border-primary shadow-sm" 
                        name="username" 
                        placeholder="Write your username" 
                        value="{{ $getRecord->username }}" 
                        required>
                </div>

                <!-- Password -->
                <div class="col-md-4">
                    <label class="form-label text-secondary">Password</label>
                    <input 
                        type="password" 
                        class="form-control border-primary shadow-sm" 
                        name="password" 
                        placeholder="Write your password">
                </div>

                <!-- Phone -->
                <div class="col-md-6">
                    <label class="form-label text-secondary">Phone</label>
                    <input 
                        type="text" 
                        class="form-control border-primary shadow-sm" 
                        name="phone" 
                        placeholder="Enter phone number" 
                        value="{{ $getRecord->phone }}" 
                        required>
                </div>

                <!-- Address -->
                <div class="col-md-6">
                    <label class="form-label text-secondary">Address</label>
                    <textarea 
                        class="form-control border-primary shadow-sm" 
                        name="address" 
                        placeholder="Enter address">{{ $getRecord->address }}</textarea>
                </div>

                <!-- Photo -->
                <div class="col-md-6">
                    <label class="form-label text-secondary">Photo</label>
                    <input 
                        type="file" 
                        class="form-control border-primary shadow-sm" 
                        name="photo">
                </div>

                <!-- Current Photo -->
                <div class="col-md-6 d-flex justify-content-center">
                    <img 
                        src="{{ $getRecord->photo ? asset('upload/' . $getRecord->photo) : asset('assets/others/placeholder.jpg') }}" 
                        alt="Current Photo" 
                        class="rounded-circle shadow-lg" 
                        style="width: 100px; height: 100px; object-fit: cover;">
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center mt-4">
                <button class="btn btn-primary profile-button shadow" type="submit">Update Profile</button>
            </div>
        </form>
    </div>
</div>
@endsection
