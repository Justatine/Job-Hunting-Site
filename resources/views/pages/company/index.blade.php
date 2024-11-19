@extends('layouts.app-layout')

@section('title','Admin Page')

@section('content')
    <div class="mt-2 w-full bg-gray-50 p-6 rounded">
        <div class="grid grid-cols-1 lg:grid-cols-1 gap-4">
            <div class="w-full lg:p-8 sm:p-0 text-justify">

                @include('partials.alerts')

                <div id="accordion-collapse-user" data-accordion="collapse">
                    <h2 id="accordion-collapse-heading-user">
                        <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-user" aria-expanded="false" aria-controls="accordion-collapse-body-user">
                            <span>Add a Job</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-user" class="hidden" aria-labelledby="accordion-collapse-heading-user">
                        <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                            <form action="{{ url('/company/jobs/store') }}" method="POST">
                                @csrf
                                <div class="space-y-4">
                
                                    <!-- Title -->
                                    <div class="form-group">
                                        <label for="Title" class="block text-sm font-semibold">Job Title</label>
                                        <input type="text" id="title" name="title" value="{{ old('Title') }}" class="w-full px-4 py-2 border rounded-lg" required>
                                        @error('Title')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </div>
                
                                    <!-- Description -->
                                    <div class="form-group">
                                        <label for="Description" class="block text-sm font-semibold">Job Description</label>
                                        <textarea id="Description" name="description" rows="4" class="w-full px-4 py-2 border rounded-lg" required>{{ old('Description') }}</textarea>
                                        @error('Description')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </div>
                
                                    <!-- Email -->
                                    <div class="form-group">
                                        <label for="Email" class="block text-sm font-semibold">Contact Email</label>
                                        <input type="email" id="Email" name="email" value="{{ old('Email') }}" class="w-full px-4 py-2 border rounded-lg" required>
                                        @error('Email')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </div>
                
                                    <!-- Company Name -->
                                    <div class="form-group">
                                        <label for="Company_Name" class="block text-sm font-semibold">Company Name</label>
                                        <input type="text" id="Company_Name" name="company_Name" value="{{ old('Company_Name') }}" class="w-full px-4 py-2 border rounded-lg" required>
                                        @error('Company_Name')
                                            <span class="text-red-500 text-xs">{{ $message }}</span>
                                        @enderror
                                    </div>
                
                                    <!-- Status -->
                                    <div class="form-group">
                                        <label for="Status" class="block text-sm font-semibold">Job Status</label>
                                        <select id="Status" name="status" class="w-full px-4 py-2 border rounded-lg" required>
                                            <option value="Active" {{ old('Status') == 'Active' ? 'selected' : '' }}>Active</option>
                                            <option value="Inactive" {{ old('Status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('Status')
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
                </div>
                
                <br>
                <table id="selection-table">
                    <thead>
                        <tr>
                            <th>
                                <span class="flex items-center">
                                    Title
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Email
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Company Name
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Status
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Impressions
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Applicants
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Views
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                                </span>
                            </th>
                            <th>
                                <span class="flex items-center">
                                    Action
                                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($jobs->count() > 0)
                            @foreach ($jobs as $job)
                                <tr>
                                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $job->title }}
                                    </td>
                                    <td>{{ $job->email }}</td>
                                    <td>{{ $job->company_Name }}</td>
                                    <td>{{ $job->status }}</td>
                                    <td>{{ $job->number_impressions }}</td>
                                    <td>{{ $job->number_applies }}</td>
                                    <td>{{ $job->number_views }}</td>
                                    <td class="flex gap-2">
                                        <a href="{{'/company/view/jobs/'.$job->id}}">
                                            <button class="btn btn-primary">View</button>
                                        </a>

                                        <a href="{{'/company/jobs/'.$job->id}}">
                                            <button class="btn btn-primary">Update</button>
                                        </a>

                                        <form action="{{ url('/company/jobs/'.$job->id) }}" method="POST" class="inline-block">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger delete-btn" value="{{ $job->id }}">
                                                Delete
                                            </button>
                                        </form>                                        
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center text-2xl font-bold italic">No post/s added</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>  
@endsection
