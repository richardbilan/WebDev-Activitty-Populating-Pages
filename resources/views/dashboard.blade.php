@extends('layouts.admin')

    @section('title', 'Feed Page')

    @section('content')
    <h1>Feed</h1>

    <!-- Form to specify range of months -->
    <form method="GET" action="{{ route('dashboard') }}" style="margin-bottom: 20px;">
        <label for="start_month" style="font-weight: bold;">Start Month:</label>
        <select id="start_month" name="start_month" required style="margin: 0 10px; padding: 5px;">
            @foreach (range(1, 12) as $month)
                <option value="{{ $month }}" {{ request('start_month') == $month ? 'selected' : '' }}>
                    {{ $month }}
                </option>
            @endforeach
        </select>

        <label for="end_month" style="font-weight: bold;">End Month:</label>
        <select id="end_month" name="end_month" required style="margin: 0 10px; padding: 5px;">
            @foreach (range(1, 12) as $month)
                <option value="{{ $month }}" {{ request('end_month') == $month ? 'selected' : '' }}>
                    {{ $month }}
                </option>
            @endforeach
        </select>

        <button type="submit" style="padding: 5px 10px; background-color: #007bff; color: white; border: none; border-radius: 3px;">Submit</button>
    </form>

    <!-- Display posts -->
    @if (isset($posts) && count($posts) > 0)
        <div class="feed">
            @foreach ($posts as $post)
                <div class="card" style="border: 1px solid #ddd; padding: 10px; margin: 10px; width: 300px;">
                    <h3>{{ $post['Username'] }}</h3>
                    
                    <!-- Mapping the month number to the respective month name -->
                    @php
                        $monthNames = [
                            1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
                            5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
                            9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
                        ];
                        $monthName = $monthNames[$post['month']];
                    @endphp
                    
                    <p style="color: gray; font-size: 0.8em;">Month: {{ $monthName }}</p>
                    <p>{{ $post['content'] }}</p>
                    <button 
                        type="button" 
                        style="padding: 5px 10px; background-color: #3b40ad ; color: white; border: none; border-radius: 3px;"
                        onclick="alert('Continue{{ $post['Username'] }}!')"
                    >
                        continue
                    </button>
                </div>
            @endforeach
        </div>
    @else
        <p>Please submit the form to view posts.</p>
    @endif
    @endsection
