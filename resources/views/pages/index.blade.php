@extends('layouts.app-layout')

@section('title','Index Page')

@section('content')
    <div class="mx-auto md:w-1/2 lg:w-3/4 sm:w-full rounded">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <div class="mb-6">
                <form action="{{ route('jobs.index') }}" method="GET" class="flex items-center">
                    <input type="text" name="search" value="{{ request('search') }}" class="p-2 border rounded w-full" placeholder="Search jobs...">
                    <button type="submit" class="ml-2 p-2 bg-blue-500 text-white rounded">Search</button>
                </form>
            </div>

            @if ($jobs->count() > 0)
                <div class="container mx-auto p-6">
                    @foreach ($jobs as $job)
                        <a href="{{ url('/job/' . $job->id) }}">
                            <div class="bg-white rounded-lg shadow-md p-6 mb-4 hover:bg-gray-100 transition duration-300 ease-in-out">
                                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                                    <div>
                                        <h3 class="font-bold mb-5">Position</h3><hr>
                                        <h3 class="text-lg font-semibold text-gray-800">{{ $job->title }}</h3>
                                        <small class="text-gray-500">{{ $job->description }}</small>
                                    </div>
                                    
                                    <div>
                                        <h3 class="font-bold mb-5">Company</h3><hr>
                                        <p class="text-gray-800 font-medium">{{ $job->company_Name }}</p>
                                        <p class="text-gray-500">{{ $job->email }}</p>
                                    </div>
                                    
                                    <div>
                                        <h3 class="font-bold mb-5">Applications</h3><hr>
                                        <p class="text-gray-500">Applicants: {{ $job->number_applies }}</p>
                                        <p class="text-gray-500">Views: {{ $job->number_views }}</p>
                                    </div>
                                    
                                    <div>
                                        <h3 class="font-bold mb-5">Status</h3><hr>
                                        <span class="px-3 py-1 inline-block text-sm font-semibold text-green-600 bg-green-100 rounded-full">
                                            {{ $job->status }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <!-- Pagination -->
                <nav aria-label="Page navigation example">
                    <ul class="flex items-center -space-x-px h-10 text-base">
                        @if ($jobs->onFirstPage())
                            <li>
                                <span class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg cursor-not-allowed">
                                    <span class="sr-only">Previous</span>
                                    <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                    </svg>
                                </span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $jobs->previousPageUrl() }}" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700">
                                    <span class="sr-only">Previous</span>
                                    <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                    </svg>
                                </a>
                            </li>
                        @endif

                        <!-- Page numbers -->
                        @foreach ($jobs->getUrlRange(1, $jobs->lastPage()) as $page => $url)
                            <li>
                                <a href="{{ $url }}" class="flex items-center justify-center px-4 h-10 leading-tight {{ $page == $jobs->currentPage() ? 'text-blue-600 bg-blue-50 border-blue-300' : 'text-gray-500 bg-white border-gray-300 hover:bg-gray-100 hover:text-gray-700' }}">
                                    {{ $page }}
                                </a>
                            </li>
                        @endforeach

                        @if ($jobs->hasMorePages())
                            <li>
                                <a href="{{ $jobs->nextPageUrl() }}" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700">
                                    <span class="sr-only">Next</span>
                                    <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                    </svg>
                                </a>
                            </li>
                        @else
                            <li>
                                <span class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg cursor-not-allowed">
                                    <span class="sr-only">Next</span>
                                    <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                    </svg>
                                </span>
                            </li>
                        @endif
                    </ul>
                </nav>
            @else
                <p class="text-gray-500">No jobs available at the moment.</p>
            @endif
        </div>    
    </div>
@endsection
