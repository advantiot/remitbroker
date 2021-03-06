@extends ('layouts.basepage')
@section ('body')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <img src={{url('assets/images/rblogo.png')}} alt="RemitBroker Logo" style="width:350px;"> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
               @section ('login_panel_title','Please Sign In')
               @section ('login_panel_body')
                <form role="form" method="POST" action="/login">
                {{ csrf_field() }}
                <fieldset>
                    <!-- Hide remitter id and master password, not used for validation currently -->
                    <!--
                    <div class="form-group">
                            <input class="form-control" placeholder="Remitter Id" name="remitter_id" value="" type="" autofocus>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Master Password" name="master_password" type="password" value="">
                    </div>
                    <hr />
                    -->
                    <div class="form-group">
                        <input class="form-control" placeholder="User Email" name="email" value="" type="email">
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="User Password" name="user_password" type="password" value="secret">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                    </div>
                </fieldset>
                </form>
                        
                {{-- Display errors generated by the validator --}}
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <div class="list-group" style="margin-bottom:0px;">
                                @foreach ($errors->all() as $error)
                                <span class="list-group-item">{{ $error }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>                    
                @endsection

                @section ('login_panel_footer')
                For authorized access only. Please do not share your access credentials with anyone, not even RemitBroker staff. If you have forgotten your user id or password please send an email to <a href="mailto:support@remitbroker.com">support@remitbroker.com</a> from your registered email id.
                @endsection

                @include('widgets.panel', array('as'=>'login', 'header'=>true, 'footer'=>true))
            </div>
        </div>
    </div>
@stop
