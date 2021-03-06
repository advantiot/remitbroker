@extends('layouts.testenv_navframe')
@section('page_heading','Post Requests')
@section('section')

        <!-- /.row -->
        <div class="col-sm-12">
        <!-- /.row -->

        <div class="row"> <!-- START Table Row -->
            <div class="col-lg-12">
                <!-- Find a Partner -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Post Requests</h3>
                    </div>
            
                    <div class="panel-body">

                        @if (empty($partners))
                            <div class="alert alert-warning">
                                You are not configured for Send services or you do not have any active Pay partners.
                            </div>
                        @else 
                            <form role="form" method="POST" action="/testenv/posttxnposts">
                            {{ csrf_field() }}
                            <fieldset>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label>To Remitter:</label>
                                        <select class="form-control" name="to_remitter_id">
                                            @foreach($partners as $partner)
                                                <option value="{{ $partner->partner_id }}" @if (old('to_remitter_id') == $partner->partner_id) selected="selected" @endif>{{ $partner->partner_id }}:{{ $partner->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label>TxnPost Type:</label>
                                        <select class="form-control" name="txnpost_type">
                                            <option value="REQ_NEW" @if (old('txnpost_type') == 'REQ_NEW') selected="selected" @endif>New Request</option>
                                            <option value="REQ_MOD" @if (old('txnpost_type') == 'REQ_MOD') selected="selected" @endif>Modification Request</option>
                                            <option value="REQ_CAN" @if (old('txnpost_type') == 'REQ_CAN') selected="selected" @endif>Cancellation Request</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-2">
                                        <label>How Many?:</label>
                                        <input class="form-control" placeholder="" name="num_txn" value="10" type="text">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <button type="submit" name="submit" value="post" class="btn btn-success">Post</button>
                                        <button type="submit" name="submit" value="delete" class="btn btn-danger">Delete Unprocessed</button>
                                    </div>
                                </div>
                            </fieldset>
                            </form>
                        @endif
                    </div>
                </div> <!-- Panel -->
            </div> <!-- /.col-lg-4 -->
        </div> <!-- END Table Row -->
        
        <div class="row"> <!-- START Error/Success Messages Row -->
            <div class="col-lg-12">
                    {{-- Display errors generated by the validator --}}
                    @if (count($errors) > 0)
                        <div id="div-errors" class="alert alert-danger">
                            <div class="list-group" style="margin-bottom:0px;">
                                @foreach ($errors->all() as $error)
                                <span class="list-group-item">{{ $error }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
            </div>
        </div>

        @stop
