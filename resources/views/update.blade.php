@extends('layouts.app')
@section('content')
    @include('partials.header')
    <div class="main">
        <h2 class="main_head">Update data of {{ $update -> text }}</h2>
        <form class="main_form" method="post" action="{{ route('update', $update->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="form_section">
                <label for="text">Text:</label>
                <input class="input_section @error('text') is-invalid @enderror" id="text" type="text" name="text" value="{{ $update -> text }}" required>
                @error('text')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form_section">
                <label for="number">Number:</label>
                <input class="input_section @error('number') is-invalid @enderror" id="number" type="number" name="number" value="{{ $update -> number }}" required>
                @error('number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form_section">
                <label for="image">Image:</label>
                <div class="file_input_section">
                    <input class="input_section_2 @error('image') is-invalid @enderror" id="image" type="file" name="image">
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div>
                <button class="button" type="submit">Update</button>
            </div>
        </form>
        <div class="link_section">
            <a class="link" href="{{ route('view') }}">View 1st table datas</a>
        </div>
        <div class="update_link_section">
            <a class="link" href="{{ route('view2') }}">View 2nd table datas</a>
        </div>
        <div class="update_link_section">
            <a class="link" href="{{ route('welcome') }}">Add data in 1st table</a>
        </div>
        <div class="update_link_section">
            <a class="link" href="{{ route('add2') }}">Add data in 2nd table</a>
        </div>
    </div>
    @include('partials.footer')
@endsection