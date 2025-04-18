@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-20 p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Verify Your Email Address</h2>
    <p>Please check your email for a verification link.</p>

    @if (session('message'))
        <div class="text-green-600 mt-4">{{ session('message') }}</div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}" class="mt-4">
        @csrf
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            Resend Verification Email
        </button>
    </form>
</div>
@endsection
