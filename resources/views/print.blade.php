@extends('layouts.my')
@section('content')
    <center>
        <h1> product_code </h1>
        <table class="table">
            <tr>
                <th>Id</th>
                <th>Product_name</th>
                <th>product_code</th>
            </tr>
            {{-- @foreach ($products as $product)
                <tr>
                    @if (is_object($product) && property_exists($product, 'id'))
                        <td>{{ $product->id }}</td>
                    @else
                        <td></td>
                    @endif

                    <td>{{ $product->Product_name }}</td>
                    <td>{!! DNS1D::getBarcodeHTML("$product->product_", 'PHARMA') !!} P -{{ $product->Product_name }}</td>
                </tr>
            @endforeach --}}

            @foreach ($products as $product)
    @if ($product->id == $id)
        <tr>
            @if (is_object($product) && property_exists($product, 'id'))
                <td>{{ $product->id }}</td>
            @else
                <td></td>
            @endif

            @if (isset($product->Product_name))
                <td>{{ $product->Product_name }}</td>
            @else
                <td></td>
            @endif

            @if (isset($product->product_code))
                <td>{!! DNS1D::getBarcodeHTML("$product->product_code", 'PHARMA') !!} P -{{ $product->product_code }}</td>
            @else
                <td></td>
            @endif
        </tr>
    @endif
@endforeach
    </center>
@endsection


{{-- -@extends('layouts.my')
@section('content')
<center>
<br><br>
<a href="{{ url('/prnpriview') }}" class="btnprn btn">Print Preview</a></center>
<script type="text/javascript">
$(document).ready(function(){
$('.btnprn').printPage();
});
</script>
<center>
<h1> List </h1>
<table class="table" >
<tr><th>Id</th><th>Product_name</th></tr>
 @foreach ($products as $student)
<tr><td>{{ $student->id }}</td>
<td>{{ $student->Product_name }}</td>
</tr>
@endforeach
</center>
@endsection --}}
