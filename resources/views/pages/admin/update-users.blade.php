@extends('layouts.app-layout')

@section('title','Edit Job Page')

@section('content')
    <div class="mx-auto md:w-1/2 lg:w-3/4 sm:w-full rounded">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">

            @include('partials.alerts')

            <form action="{{ url('/admin/users/'.$user->id) }}" method="POST">
                @method('PUT')
                @csrf
            
                <div class="flex justify-between">
                    <h5>Edit User</h5>
                    <a href="{{ url('/admin') }}">Back</a>
                </div>
                <div class="space-y-4">
            
                    <!-- Name -->
                    <div class="form-group">
                        <label for="name" class="block text-sm font-semibold">Name</label>
                        <input type="text" id="name" name="name" value="{{ $user->name }}" class="w-full px-4 py-2 border rounded-lg" required maxlength="255">
                        @error('name')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
            
                    <!-- Email -->
                    <div class="form-group">
                        <label for="email" class="block text-sm font-semibold">Email</label>
                        <input type="email" id="email" name="email" value="{{ $user->email }}" class="w-full px-4 py-2 border rounded-lg" required maxlength="255">
                        @error('email')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
            
                    <!-- Password -->
                    <div class="form-group">
                        <label for="password" class="block text-sm font-semibold">Password</label>
                        <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg" minlength="8">
                        @error('password')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
            
                    <!-- Role -->
                    <div class="form-group">
                        <label for="role" class="block text-sm font-semibold">Role</label>
                        <select id="role" name="role" class="w-full px-4 py-2 border rounded-lg" required>
                            <option value="Company" {{ $user->role == 'Company' ? 'selected' : '' }}>Company</option>
                            <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                            <option value="Applicant" {{ $user->role == 'Applicant' ? 'selected' : '' }}>Applicant</option>
                        </select>
                        @error('role')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
            
                    <!-- Status -->
                    <div class="form-group">
                        <label for="status" class="block text-sm font-semibold">Status</label>
                        <select id="status" name="status" class="w-full px-4 py-2 border rounded-lg" required>
                            <option value="Pending" {{ $user->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Active" {{ $user->status == 'Active' ? 'selected' : '' }}>Active</option>
                        </select>
                        @error('status')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
            
                    <!-- Submit Button -->
                    <div class="form-group">
                        <button type="submit" class="px-6 py-3 text-white bg-blue-600 hover:bg-blue-700 rounded-lg text-lg font-semibold">Submit</button>
                    </div>
            
                </div>
            </form>            
            
        </div>    
    </div>
@endsection