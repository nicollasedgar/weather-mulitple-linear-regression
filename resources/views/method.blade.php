@extends('layout.main')

@section('container')

<main class="main-content position-relative border-radius-lg ">
    @include('layout.navbar')
    <div class="container-fluid py-4">
        @dd($totalkali, $totalkalilagi)

        @include('layout.footer')
    </div>
</main>

@endsection