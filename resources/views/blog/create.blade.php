@extends('layouts.header')

@section('content')
<div class="w-1/2 m-auto text-left">
    <div class="py-15">
        <h1 class="text-6xl">
            Create Post
        </h1>
    </div>
</div>
@if ($errors->any())
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-xl text-red-700 bg-red-100 px-5 py-6 sm:rounded sm:border sm:border-red-400 sm:mb-6"
                role="alert">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif
   </main>
<div class="form-group">
    <span>
<div class="w-1/2 m-auto pt-20">
    <form
        action="/blog"
        method="POST"
        enctype="multipart/form-data">
        @csrf

        <input
            type="text"
            name="title"
            placeholder="Title..."
            class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">

        <textarea
            name="description"
            placeholder="Description..."
            class="py-20 bg-transparent block border-b-2 w-full h-90 text-3xl outline-none"></textarea>

        <div class="bg-grey-lighter pt-15">
            <label class="w-48 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                <span class="mt-2 text-xl leading-normal">
                    Select a file
                </span>
                <input
                    type="file"
                    name="image"
                    class="hidden">
            </label>
        </div>
        <div class="w-1/4 m-auto pt-20">
        <button
            type="submit"
            class="btn">
            Submit Post
        </button>
        </div>
    </form>
</div>
    </span>
</div>

@endsection
