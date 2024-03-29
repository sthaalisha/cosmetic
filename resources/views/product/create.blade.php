@extends('layouts.app')
@section('content')

<h2 class="font-bold text-4xl text-blue-700">Add Product</h2>
<hr class="h-1 bg-blue-200">

<form action="{{route('product.store')}}" method="POST" class="mt-5" enctype="multipart/form-data">
    @csrf

    <select name="brand_id" id="" class="w-full rounded-lg border-gray-300 my-2">
        <option selected disabled>Select Brand</option>
        @foreach($brands as $brand)
        <option value="{{$brand->id}}">{{$brand->name}}</option>
        @endforeach
    </select>

    <select name="category_id" id="category_id" class="w-full rounded-lg border-gray-300 my-2">
        <option selected disabled>Select Category</option>
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>

    <select name="sub__category_id" id="sub_category_id" class="w-full rounded-lg border-gray-300 my-2">
        <option selected disabled>Select Sub-Category</option>
    </select>

    <input type="text" placeholder="Product Name" name="name" class="w-full rounded-lg border-gray-300 my-2" value="{{old('name')}}">
    @error('name')
    <p class="text-red-600 text-xs -mt-2">{{$message}}</p>
    @enderror

    <input type="number" placeholder="Price" name="price" min="1" class="w-full rounded-lg border-gray-300 my-2" value="{{old('price')}}">
    @error('price')
    <p class="text-red-600 text-xs -mt-2">{{$message}}</p>
    @enderror


    <input type="number" placeholder="Stock" name="stock" min="1" class="w-full rounded-lg border-gray-300 my-2" value="{{old('stock')}}">
    @error('stock')
    <p class="text-red-600 text-xs -mt-2">{{$message}}</p>
    @enderror


    <textarea placeholder="Desription" rows="8" name="description" class="w-full rounded-lg border-gray-300 my-2" value="">{{old('description')}}</textarea>
    @error('description')
    <p class="text-red-600 text-xs -mt-2">{{$message}}</p>
    @enderror


    <input type="file" name="photopath" class="w-full rounded-lg border-gray-300 my-2">
    @error('photopath')
    <p class="text-red-600 text-xs -mt-2">{{$message}}</p>
    @enderror

    <div class="flex">
        <input type="submit" class="bg-blue-600 text-white px-4 py-2 mx-2 rounded-lg" value="Add Product">

        <a href="{{route('product.index')}}" class="bg-red-600 text-white px-10 py-2 mx-2 rounded-lg">Exit</a>
    </div>
</form>


<script>
    $(document).ready(function() {
        $('#category_id').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: '/getSubCategories',
                    type: 'GET',
                    data: {
                        category_id: category_id
                    },
                    success: function(data) {
                        $('#sub_category_id').empty();
                        $('#sub_category_id').append('<option selected disabled>Select Sub-Category</option>');
                        $.each(data, function(index, sub_category) {
                            $('#sub_category_id').append('<option value="' + sub_category.id + '">' + sub_category.name + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            } else {
                $('#sub_category_id').empty();
                $('#sub_category_id').append('<option selected disabled>Select Sub-Category</option>');
            }
        });
    });
</script>
@endsection