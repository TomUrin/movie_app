@extends('layouts.app')

@section('content')

<div class="bg-gray-50 py-16 px-4 sm:px-6 lg:px-8">
    <div class="text-center">
        <h2 class="text-4xl leading-10 tracking-tight font-bold text-gray-900">Welcome to the News Portal</h2>
    </div>
    <div class="mt-12 grid gap-5 max-w-lg mx-auto lg:grid-cols-3 lg:max-w-none">
        @foreach ($news as $new)
        <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
            <div class="flex-shrink-0">
                <img class="h-48 w-full object-cover"
                    src="https://images.unsplash.com/photo-1602526430780-782d6b1783fa?ixid=MXwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80"
                    alt="blog image">
            </div>
            <div class="flex-1 p-6 flex flex-col justify-between">
                <div class="flex-1">
                    <a href="/news/{{ $new->id }}">
                        <h3 class="mt-2 text-xl leading-7 font-semibold text-gray-900">{{ $new->title }}</h3>
                    </a>
                    <p class="mt-3 text-base leading-6 text-gray-500">
                        @if (strlen($new->text) > 200)
                        {{ substr($new->text, 0, 200) }}...
                        @else
                        {{ $new->text }}
                        @endif
                    </p>
                </div>
                <div class="mt-6 flex items-center">
                    <div class="ml-3">
                        <div class="flex text-sm leading-5 text-gray-500">
                            <time>
                                {{ $new->created_at }}
                            </time>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection