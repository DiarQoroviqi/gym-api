@extends('layouts.app')
@section('content')
    <div class="flex bg-gray-100 border-b border-gray-300 py-4">
        <div class="container mx-auto">
            <router-link class="mr-4" to="/" exact>Test</router-link>
            <router-link class="mr-4" to="/example">Example</router-link>
            <router-link class="mr-4" to="/login">Login</router-link>
        </div>
    </div>
    <div class="container mx-auto py-2">
        <router-view></router-view>
    </div>
@endsection
