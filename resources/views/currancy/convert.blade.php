@extends('layouts.master')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Convert</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Currency</span>
            </div>
        </div>


    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">

                <div class="d-flex justify-content-between">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 mt-5 pt-5">
                                <form action="{{ route('convert.curr') }}" class="border rounded m-5 p-5" method="get">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mb-4">
                                            <div class="row">
                                                <h3 class="col-md-5 p-0 m-0 text-end"
                                                    style="color: #f6c113;">Fetch Currency Exchange Rates </h3>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-5 mb-3">
                                                    <select class="form-select" name='currency_from'
                                                        aria-label="Default select example" required>
                                                        <option value=""
                                                            @if (Request::get('currency_from') == null) none @endif>Select Currency
                                                        </option>
                                                        <option value="USD"
                                                            @if (Request::get('currency_from') == 'USD') ? selected : none @endif>
                                                            USD</option>
                                                        <option value="EUR"
                                                            @if (Request::get('currency_from') == 'EUR') ? selected : none @endif>EUR
                                                        </option>
                                                        <option value="GBP"
                                                            @if (Request::get('currency_from') == 'GBP') ? selected : none @endif>GBP
                                                             </option>
                                                        <option value="EGP"
                                                            @if (Request::get('currency_from') == 'EGP') ? selected : none @endif>EGP
                                                           </option>
                                                        <option value="JPY"
                                                            @if (Request::get('currency_from') == 'JPY') ? selected : none @endif>Japan
                                                            Yen</option>
                                                        <option value="NZD"
                                                            @if (Request::get('currency_from') == 'NZD') ? selected : none @endif>
                                                            NZD</option>
                                                    </select>
                                                </div>
                                                <h4 class="col-md-2 text-center m-0 p-0">To</h4>
                                                <div class="col-md-5 mb-3">
                                                    <select class="form-select" name='currency_to'
                                                        aria-label="Default select example" required>
                                                        <option value=""
                                                            @if (Request::get('currency_to') == null) none @endif>Select Currency
                                                        </option>
                                                        <option value="USD"
                                                            @if (Request::get('currency_to') == 'USD') ? selected : none @endif>
                                                            USD</option>
                                                        <option value="EUR"
                                                            @if (Request::get('currency_to') == 'EUR') ? selected : none @endif>Euro
                                                        </option>
                                                        <option value="GBP"
                                                            @if (Request::get('currency_to') == 'GBP') ? selected : none @endif>
                                                            GBP</option>
                                                        <option value="EGP"
                                                            @if (Request::get('currency_to') == 'EGP') ? selected : none @endif>
                                                            EGP</option>
                                                        <option value="JPY"
                                                            @if (Request::get('currency_to') == 'JPY') ? selected : none @endif>
                                                            Japan Yen</option>
                                                        <option value="NZD"
                                                            @if (Request::get('currency_to') == 'NZD') ? selected : none @endif>NZD
                                                            </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="amount" class="form-label">Amount</label>
                                                        <input type="number" class="form-control" id="amount"
                                                            value="{{ Request::get('amount') }}" name="amount" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="date" class="form-label">Date</label>
                                                        <input type="date" class="form-control" name='date'
                                                            value="{{ Request::get('date') }}" id="date">
                                                        <span class=" d-block">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="amount" class="form-label">Converted Amount</label>
                                                    <input type="number" class="form-control" value="{{ $converted }}"
                                                        id="amount" name="amount" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-12 d-flex justify-content-center mt-4">
                                               {{-- <button type="submit"class="btn btn-info" >Submit</button>--}}
                                               <a href="under_construction"class="btn btn-info">Submit</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>






    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <style type="text/css">
        body {
            background: #d2d2d2;
        }

        form {
            background: #fff;
        }
    </style>
@endsection
