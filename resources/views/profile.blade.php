@extends('layouts.app')

@section('content')
    <profile-component 
        :user="{{ auth()->user() }}"
        csrf-token="{{ csrf_token() }}" />
@endsection
