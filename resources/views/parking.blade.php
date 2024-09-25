@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Parking Form</h2>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('submitForm') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label>Rate Type:</label>
            <div>
                <input type="radio" name="rate_type" value="hourly" required> Hourly
                <input type="radio" name="rate_type" value="daily"> Daily
                <input type="radio" name="rate_type" value="monthly"> Monthly
            </div>
        </div>

        <div class="form-group">
            <label>Vehicle Type:</label>
            <select name="vehicle_type" required>
                <option value="motorcycle">Motorcycle</option>
                <option value="car">Car</option>
            </select>
        </div>

        <div class="form-group">
            <label>Parking Spot:</label>
            <input type="text" name="parking_spot" required>
        </div>

        <div class="form-group">
            <label>Entry Date:</label>
            <input type="date" name="entry_date" required>
        </div>

        <div class="form-group hourly-fields" style="display: none;">
            <label>Entry Time:</label>
            <input type="time" name="entry_time">
        </div>

        <div class="form-group hourly-fields" style="display: none;">
            <label>Exit Time:</label>
            <input type="time" name="exit_time">
        </div>

        <div class="form-group daily-fields" style="display: none;">
            <label>Exit Date:</label>
            <input type="date" name="exit_date">
        </div>

        <div class="form-group monthly-fields" style="display: none;">
            <label>Duration:</label>
            <select name="duration">
                <option value="1">1 Month</option>
                <option value="2">2 Months</option>
                <option value="3">3 Months</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<x-dialog-modal wire:model.live="confirmingLogout">
    <x-slot name="title">
        {{ __('Log Out Other Browser Sessions') }}
    </x-slot>

    <x-slot name="content">
        {{ __('Please enter your password to confirm you would like to log out of your other browser sessions across all of your devices.') }}

        <div class="mt-4" x-data="{}" x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
            <x-input type="password" class="mt-1 block w-3/4"
                        autocomplete="current-password"
                        placeholder="{{ __('Password') }}"
                        x-ref="password"
                        wire:model="password"
                        wire:keydown.enter="logoutOtherBrowserSessions" />

            <x-input-error for="password" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-secondary-button wire:click="$toggle('confirmingLogout')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-secondary-button>

        <x-button class="ms-3"
                    wire:click="logoutOtherBrowserSessions"
                    wire:loading.attr="disabled">
            {{ __('Log Out Other Browser Sessions') }}
        </x-button>
    </x-slot>
</x-dialog-modal>


<script>
document.addEventListener('DOMContentLoaded', function() {
    const rateTypeInputs = document.querySelectorAll('input[name="rate_type"]');
    const hourlyFields = document.querySelectorAll('.hourly-fields');
    const dailyFields = document.querySelectorAll('.daily-fields');
    const monthlyFields = document.querySelectorAll('.monthly-fields');

    rateTypeInputs.forEach(input => {
        input.addEventListener('change', function() {
            hourlyFields.forEach(field => field.style.display = 'none');
            dailyFields.forEach(field => field.style.display = 'none');
            monthlyFields.forEach(field => field.style.display = 'none');

            if (this.value === 'hourly') {
                hourlyFields.forEach(field => field.style.display = 'block');
            } else if (this.value === 'daily') {
                dailyFields.forEach(field => field.style.display = 'block');
            } else if (this.value === 'monthly') {
                monthlyFields.forEach(field => field.style.display = 'block');
            }
        });
    });
});
</script>
@endsection