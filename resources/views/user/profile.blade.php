@extends('layouts.app')
    @section('style')
    @endsection
    @section('content')
    @livewire('user.profile',['slug' => $slug])
    @endsection
