@extends('layouts.master')

@section('content')
<!-- Hello from Post file -->


<!-- If Else statement use-->
@if(12 < 25)
You are Eligible.
@else
You are not Eligible..!
@endif

@endsection


@section('scripts')
<script>
    @json('{{$bane}}')
    <scripts/>

@endsection