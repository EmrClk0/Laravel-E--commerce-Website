@extends("layout.LoginRegister")

@section("tittle")
Register Page
@endsection



@section("content")
    <!-- Log In page -->
    <div class="container">
            <div class="row vh-100 ">
                <div class="col-12 align-self-center">
                    <div class="auth-page">
                                    

                                    @if($errors->any())
                                        @foreach($errors->all() as $error)
                                            <div class="alert alert-warning" role="alert">
                                            {{$error}}
                                            </div>
                                        @endforeach

                                        

                                    @endif

                                    @if(session("error"))
                                        <div class="alert alert-danger" role="alert">
                                            {{session("error")}}
                                        </div>

                                    @endif
                        <div class="card auth-card shadow-lg">
                            <div class="card-body">
                                <div class="px-3">
                                    <div class="auth-logo-box">
                                        <a href="../dashboard/analytics-index.html" class="logo logo-admin"><img src="../assets/images/logo-sm.png" height="55" alt="logo" class="auth-logo"></a>
                                    </div><!--end auth-logo-box-->

                                    
                                    
                                    <div class="text-center auth-logo-text">
                                        <h4 class="mt-0 mb-3 mt-5">Free Register for PLAYSTORE</h4>
                                        <p class="text-muted mb-0">Get your free PLAYSTORE account now.</p>  
                                    </div> <!--end auth-logo-text-->  
    
                                    
                                    <form class="form-horizontal auth-form my-4" method="post" action="{{route('registerAuthenication')}}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <div class="input-group mb-3">
                                                <span class="auth-form-icon">
                                                    <i class="dripicons-user"></i> 
                                                </span>                                                                                                              
                                                <input type="text" class="form-control" id="username" name="name" placeholder="Enter username" required >
                                                <small class="w-100">   Minimum 5 </small>
                                            </div>                                    
                                        </div><!--end form-group--> 
    
                                        <div class="form-group">
                                            <label for="useremail">Email</label>
                                            <div class="input-group mb-3">
                                                <span class="auth-form-icon">
                                                    <i class="dripicons-mail"></i> 
                                                </span>                                                                                                              
                                                <input type="email" class="form-control" id="useremail" name="email" placeholder="Enter Email" required>
                                            </div>                                    
                                        </div><!--end form-group-->
            
                                        <div class="form-group">
                                            <label for="userpassword">Password</label>                                            
                                            <div class="input-group mb-3"> 
                                                <span class="auth-form-icon">
                                                    <i class="dripicons-lock"></i> 
                                                </span>                                                       
                                                <input type="password" class="form-control" id="userpassword" name="password" placeholder="Enter password" required >
                                                <small class="w-100">Minimum 8 character. 1 uppercase character 1 lowercase character 1 number character is required </small>

                                            </div>                               
                                        </div><!--end form-group--> 
    
                                        <div class="form-group">
                                            <label for="conf_password">Confirm Password</label>                                            
                                            <div class="input-group mb-3"> 
                                                <span class="auth-form-icon">
                                                    <i class="dripicons-lock-open"></i> 
                                                </span>                                                       
                                                <input type="password" class="form-control" id="conf_password" name="password_confirm" placeholder="Enter Confirm Password" required >
                                            </div>  
                                            
                                            <div class="form-group">
                                                <label for="mo_number">Mobile Number</label>                                            
                                                <div class="input-group mb-3"> 
                                                    <span class="auth-form-icon">
                                                        <i class="dripicons-phone"></i> 
                                                    </span>                                                       
                                                    <input type="number" class="form-control" id="mo_number" name="phone_number" placeholder="Enter Mobile Number">
                                                </div>                               
                                            </div><!--end form-group--> 
                                        </div><!--end form-group--> 
            
                                        <div class="form-group row mt-4">
                                            <div class="col-sm-12">
                                                <div class="custom-control custom-switch switch-success">
                                                    <input type="checkbox" name='terms' class="custom-control-input" id="customSwitchSuccess" required>
                                                    <label class="custom-control-label text-muted" for="customSwitchSuccess">By registering you agree to the Frogetor <a href="#" class="text-primary">Terms of Use</a></label>
                                                </div>
                                            </div><!--end col-->                                             
                                        </div><!--end form-group--> 
            
                                        <div class="form-group mb-0 row">
                                            <div class="col-12 mt-2">
                                                <button class="btn btn-gradient-primary btn-round btn-block waves-effect waves-light" type="submit">Register <i class="fas fa-sign-in-alt ml-1"></i></button>
                                            </div><!--end col--> 
                                        </div> <!--end form-group-->                           
                                    </form><!--end form-->
                                </div><!--end /div-->
                                
                                <div class="m-3 text-center text-muted">
                                    <p class="">Already have an account ? <a href="{{route('loginPage')}}" class="text-primary ml-2">Log in</a></p>
                                </div>
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div><!--end auth-card-->
                </div><!--end col-->           
            </div><!--end row-->
        </div><!--end container-->
        <!-- End Log In page -->

@endsection