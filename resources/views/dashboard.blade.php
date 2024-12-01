@extends('layouts.admin')

@section('title', 'Feed Page')

@section('content')
<h1>Feed</h1>
<div class="feed">
    @foreach ($posts as $post) {{-- Fixed variable naming --}}
        <div class="card" style="border: 1px solid #ddd; padding: 10px; margin: 10px; width: 300px;">
            <h3>{{ $post['Username'] }}</h3>
            <p style="color: gray; font-size: 0.8em;">Posted on {{ $post['date'] }}</p>
            <p>{{ $post['content'] }}</p>
            <button type="button" onclick="alert('Liked post from {{ $post['Username'] }}!')">Like</button>
        </div>
    @endforeach
</div>
@endsection
