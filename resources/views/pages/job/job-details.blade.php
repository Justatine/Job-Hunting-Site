@extends('layouts.app-layout')

@section('title','Job Details Page')

@section('content')
<div class="mx-auto md:w-1/2 lg:w-3/4 sm:w-full rounded">
    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">

        @include('partials.alerts')

        <!-- Job Title -->
        <div class="flex justify-between">
            <h1 class="text-3xl font-semibold text-gray-800">{{ $job->title }}</h1>
            
            <div>
                @if (Auth::check())
                    <form action="{{ url('/job/'.$job->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Apply
                        </button>
                    </form>
                @else
                    <p>Login to apply</p>
                @endif
            </div>
        </div>
        

        <!-- Company Name -->
        <p class="text-lg text-gray-600">Company: <span class="font-semibold">{{ $job->company_Name }}</span></p>

        <!-- Job Description -->
        <div class="mt-4">
            <h3 class="text-xl font-semibold text-gray-700">Job Description</h3>
            <p class="text-gray-600 mt-2">{{ $job->description }}</p>
        </div>

        <!-- Job Status -->
        <div class="mt-4">
            <p class="text-lg font-semibold text-gray-700">Status: 
                <span class="{{ $job->status == 'Active' ? 'text-green-600' : 'text-red-600' }}">
                    {{ $job->status }}
                </span>
            </p>
        </div>

        <!-- Contact Email -->
        <div class="mt-4">
            <p class="text-lg text-gray-600">Contact Email: <a href="mailto:{{ $job->email }}" class="text-blue-500 hover:underline">{{ $job->email }}</a></p>
        </div>

        <!-- Number of Impressions -->
        <div class="mt-4">
            <p class="text-lg text-gray-600">Number of Impressions: {{ $job->number_impressions }}</p>
        </div>

        <!-- Number of Applies -->
        <div class="mt-4">
            <p class="text-lg text-gray-600">Number of Applies: {{ $job->number_applies }}</p>
        </div>

        <!-- Number of Views -->
        <div class="mt-4">
            <p class="text-lg text-gray-600">Number of Views: {{ $job->number_views }}</p>
        </div>

        <!-- Back Button -->
        <div class="mt-6">
            <a href="{{ url('/') }}" class="px-6 py-3 bg-gray-800 text-white rounded-lg hover:bg-gray-700">Back</a>
        </div>
    </div>    
</div>
@endsection
