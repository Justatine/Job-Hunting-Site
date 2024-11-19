@extends('layouts.app-layout')

@section('title','View Job Page')

@section('content')
    <div class="mx-auto md:w-1/2 lg:w-3/4 sm:w-full rounded">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">

            @include('partials.alerts')



                <div class="flex justify-between mb-5">
                    <h5>View Job</h5>
                    <a href="{{ auth()->user()->role === 'Admin' ? url('/admin') : url('/company') }}">Back</a>
                </div>

                <div class="space-y-4">
                    <!-- Title -->
                    <div class="form-group">
                        <label for="Title" class="block text-sm font-semibold">Job Title</label>
                        <input type="text" id="Title" name="title" value="{{ $job->title }}" class="w-full px-4 py-2 border rounded-lg" disabled required>
                        @error('Title')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
            
                    <!-- Description -->
                    <div class="form-group">
                        <label for="Description" class="block text-sm font-semibold">Job Description</label>
                        <textarea id="Description" name="description" rows="4" class="w-full px-4 py-2 border rounded-lg" disabled required>{{ $job->description }}</textarea>
                        @error('Description')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
            
                    <!-- Email -->
                    <div class="form-group">
                        <label for="Email" class="block text-sm font-semibold">Contact Email</label>
                        <input type="email" id="Email" name="email" value="{{ $job->email }}" class="w-full px-4 py-2 border rounded-lg" disabled required>
                        @error('Email')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
            
                    <!-- Company Name -->
                    <div class="form-group">
                        <label for="Company_Name" class="block text-sm font-semibold">Company Name</label>
                        <input type="text" id="Company_Name" name="company_Name" value="{{ $job->company_Name }}" class="w-full px-4 py-2 border rounded-lg" disabled required>
                        @error('Company_Name')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
            
                    <!-- Status -->
                    <div class="form-group">
                        <label for="Status" class="block text-sm font-semibold">Job Status</label>
                        <select id="Status" name="status" class="w-full px-4 py-2 border rounded-lg" disabled required>
                            <option value="Active" {{ $job->status == 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Inactive" {{ $job->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('Status')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
            
                </div>            
        </div>    
    </div>
@endsection