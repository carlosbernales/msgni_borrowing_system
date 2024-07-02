<div class="container-fluid">
    <div class="row no-gutter">
        <!-- The image half -->
        <div class="col-md-6 d-none d-md-flex bg-image"></div>

        <!-- The content half -->
        <div class="col-md-6 bg-light">
            <div class="login d-flex align-items-center py-5">
                <!-- Demo content-->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-xl-7 mx-auto">
                            <h3 class="display-4">Split page!</h3>
                            <p class="text-muted mb-4">Create a login split page using Bootstrap 4.</p>
                            <form method="POST" action="/account/loginAuth">
                                @csrf
                                <div class="form-group mb-3">
                                    <input id="inputEmail" name="email" type="email" placeholder="Email address" required autofocus class="form-control rounded-pill border-0 shadow-sm px-4 @error('email') is-invalid @enderror">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input id="inputPassword" name="password" type="password" placeholder="Password" required class="form-control rounded-pill border-0 shadow-sm px-4 text-primary @error('email') is-invalid @enderror">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input id="customCheck1" type="checkbox" checked class="custom-control-input">
                                    <label for="customCheck1" class="custom-control-label">Remember password</label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Sign in</button>
								<li><a href="/register">Register</a></li>

                                <div class="text-center d-flex justify-content-between mt-4">
                                    <p>Snippet by <a href="https://bootstrapious.com/snippets" class="font-italic text-muted"><u>Boostrapious</u></a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- End -->
            </div>
        </div><!-- End -->
    </div>
</div>
