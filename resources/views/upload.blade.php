@extends('layouts.app')
@section('title', 'Upload image')

@section('content')
    <div class="center">
        <h1>UPLOAD YOUR IMAGE</h1>
        <div class="tabs"></div>
        <div id="ajaxForm">
            @if(Session::has('success'))
                <p style="color: green; text-align: center;">{{ Session::get('success') }}</p>
            @endif
            <form id="sing_in_form" action="{{ route('add') }}" method="post" class="form" enctype="multipart/form-data">
                @csrf
                <div class="input_block">
                    <span>Upload image</span>
                    <label for="image" class="input-file">
                        <input id="image" type="file" name="image">
                        <span class="choose_file">Choose file</span>
                    </label>
                    <div style="display: flex; justify-content: center">
                        <img src="" id="inputImage">
                    </div>
                    @error('title')
                    <span class="error">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input_block">
                    <span>title</span>
                    <input id="title" type="text" placeholder="image title" class="input @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autofocus>
                    @error('title')
                    <span class="error">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input_block">
                    <span>Description</span>
                    <input id="description" placeholder="image description" type="text" class="input @error('description') is-invalid @enderror" name="description" required>
                    @error('description')
                    <span class="error">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form__button">
                    <button type="submit">Upload</button>
                </div>
            </form>
        </div>
    </div>
@endsection

