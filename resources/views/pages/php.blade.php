@extends('layouts.master')
@section('noidung')
<h2>PHP</h2>
@endsection
@for($i=1; $i<=10;$i++ )
 	{{$i . ""}}
@endfor