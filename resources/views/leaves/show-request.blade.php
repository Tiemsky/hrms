@extends('layouts.app')
    @section('content')
        @livewire('leave.show-request', ['user' => $user, 'leave' => $leave])
    @endsection
