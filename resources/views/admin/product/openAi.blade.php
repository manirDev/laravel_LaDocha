@extends('admin.admin_master')

@section('admin')

        <form action="{{route('admin.openAi.gen')}}" enctype="multipart/form-data" method="post">
            @csrf
            <label for="title">Product Title:</label>
            <input type="text" id="title" name="title">
            <button type="submit">Generate</button>
        </form>
@endsection
