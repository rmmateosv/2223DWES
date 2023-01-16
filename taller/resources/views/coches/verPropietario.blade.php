@extends('plantilla')

@section('titulo',"PÁGINA PARA VER EL PROPIETARIO DE UN COCHE")

@section('contenido')
    <h1>En esta página vamos a </h1>
    <h2>ver los datos de {{$dni}} prietario del vehículo {{$matricula}}</h2>
@endsection

@section('mensaje',"")