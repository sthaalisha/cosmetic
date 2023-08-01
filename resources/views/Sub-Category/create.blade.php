@extends('layouts.app')
@section('content')
    <h2 class="font-bold text-4xl text-blue-700">Add Sub-Category</h2>
    <hr class="h-1 bg-blue-200">
    <form action="{{ route('Sub-Category.store') }}" method="POST" class="mt-5">
        @csrf

        <select name="category_id" id="" class="w-full rounded-lg border-gray-300 my-2">
            <option selected disabled>Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
            <p class="text-red-600 text-xs -mt-2">{{ $message }}</p>
        @enderror

        <input type="text" placeholder="Sub-Category Name" name="name" class="w-full rounded-lg border-gray-300 my-2"
            value="{{ old('name') }}">
        @error('name')
            <p class="text-red-600 text-xs -mt-2">{{ $message }}</p>
        @enderror

        <input type="text" placeholder="Priority" name="priority" class="w-full rounded-lg border-gray-300 my-2"
            value="{{ old('priority') }}">
        @error('priority')
            <p class="text-red-600 text-xs -mt-2">{{ $message }}</p>
        @enderror
        <div class="flex">
            <input type="submit" class="bg-blue-600 text-white px-4 py-2 mx-2 rounded-lg" value="Add Sub-Category">

            <a href="{{ route('Sub-Category.index') }}" class="bg-red-600 text-white px-10 py-2 mx-2 rounded-lg">Exit</a>
        </div>

    </form>
@endsection
