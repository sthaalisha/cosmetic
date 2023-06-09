@extends('layouts.app')
@section('content')
@include('layouts.message')
<h2 class="font-bold text-4xl text-blue-700">Sub-Categories</h2>
<hr class="h-1 bg-blue-200">

<div class="my-4 text-right px-10">
<a href="{{route('Sub-Category.create')}}" class="bg-amber-400 text-black px-4 py-2 rounded-lg shadow-amber-300">Add Sub-Category</a>
</div>
<table id="myTable" class="display">
    <thead>
        <th>Order</th>
        <th>Sub-Category Name</th>
        <th>Category</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($sub_categories as $sub_category )
            
    
        <tr>
            <td>{{$sub_category->priority}}</td>
            <td>{{$sub_category->name}}</td>
            <td>{{$sub_category->category->name}}</td>
            <td>
                <a href="{{route('Sub-Category.edit',$sub_category->id)}}" class="bg-blue-600 text-white px-2 py-1 rounded hover:shadow-blue-400">Edit</a>
                <a onclick="showDelete('{{$sub_category->id}}')" class="bg-red-600 text-white px-2 py-1 rounded shadow hover:shadow-red-400 cursor-pointer">Delete</a>
             </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div id="deleteModal" class="fixed hidden left-0 top-0 right-0 bottom-0 bg-opacity-50 backdrop-blur-sm bg-blue-400">
        <div class="flex h-full justify-center items-center">
            <div class="bg-white p-4 rounded-lg">
                <form action="{{route('Sub-Category.destroy')}}" method="POST">
                    @csrf
                    <p class="font-bold text-2xl">Are you Sure to Delete?</p>
                    <input type="hidden" name="dataid" id="dataid" value="">
                    <div class="flex justify-center">
                        <input type="submit" value="Yes" class="bg-blue-600 text-white px-4 py-2 mx-2 rounded-lg cursor-pointer">
                        <a onclick="hideDelete()" class="bg-red-600 text-white px-4 py-2 mx-2 rounded-lg cursor-pointer">No</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


<script>
let table = new DataTable('#myTable');
</script>

<script>
        function showDelete(x)
        {
            // $('#dataid').val(x);
            document.getElementById('dataid').value = x;
            document.getElementById('deleteModal').style.display = "block";
        }
        function hideDelete()
        {
            document.getElementById('deleteModal').style.display = "none";
        }
    </script>
@endsection