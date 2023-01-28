@extends('apps.app')

@section('content')
    @include('sections.info',['card1'=>'Xolati', 'card2'=>'Ishlagan soati', 'card3'=>"Ish vaqti",'card4'=>'Qarzdorlik'])
    @include('sections.chart')
    @include('sections.buttons')
@endsection