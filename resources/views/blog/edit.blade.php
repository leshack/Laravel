@extends('layouts.header')

@section('content')
<div class="w-1/2 m-auto text-left">
    <div class="py-15">
        <h1 class="text-6xl">
            Update Post
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
<div class="w-1/2 m-auto pt-20">
    <div class="form-group">
        <span>
    <form
        action="/blog/{{ $post->slug }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input
            type="text"
            name="title"
            value="{{ $post->title }}"
            class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">

        <textarea
            name="description"
            placeholder="Description..."
            class="py-20 bg-transparent block border-b-2 w-full h-60 text-3xl outline-none">{{ $post->description }}</textarea>
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
