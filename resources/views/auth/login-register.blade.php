<div class="modal fade login-register" id="signModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content mx-auto">
            <div class="modal-header p-0">
                <span class="modal-title-login col-6 px-0 py-3 text-center">LOGIN
                </span>
                <span class="modal-title-register col-6 px-0 py-3 text-center">REGISTER
                </span>
                <button type="button" class="close-login position-relative" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-4 tab-pane" id="login">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input type="hidden" name="id" class="course-id">
                    <input type="hidden" name="error-login" class="input-error-login" @if( $errors->has('name') || $errors->has('password') ) value="error" @endif>
                    <div class="form-group">
                        <label for="recipient-name" class="form-label">Username:</label>
                        <input type="text" class="form-control form-input" id="recipient-name" name="name" value="{{ old('name') }}">
                        @error('name')
                            <span role="alert" class="text-danger">
                                <error>{{ $message }}</error>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-label">Password:</label>
                        <input type="password" class="form-control form-input" id="recipient-name" name="password">
                        @error('password')
                            <span role="alert" class="text-danger">
                                <error>{{ $message }}</error>
                            </span>
                        @enderror
                    </div>
                    <div class="remember_wrap row mt-n2">
                        <div class="remember col-6 d-flex align-items-center">
                            <input type="checkbox" name="checkRe" id="checkRe">
                            <label for="checkRe" class="mb-0 pl-1 label-rem">Remember me</label>
                        </div>
                        <div class="forgot col-6 d-flex justify-content-end"><a href="#">Forgot
                        password</a></div>
                    </div>
                    <div class="text-center mt-5">
                        <button class="btn btn-login">LOGIN</button>
                    </div>
                </form>
                <div class="modal-footer pb-3">
                    <span class="login-other mx-auto position-relative">Login with</span>
                    <button type="button" class="btn btn-google col-12 mx-auto border-none mt-n3">
                        <i class="fab fa-google-plus-g logo-sz"></i> Google
                    </button>
                    <button type="button" class="btn btn-face col-12 mx-auto border-none">
                        <i class="fab fa-facebook-f logo-sz"></i> Facebook
                    </button>
                </div>
            </div>
            <div class="modal-body px-4 tab-pane d-none" id="register">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <input type="hidden" name="error-register"  class="input-error-register" @if( $errors->has('name_register') || $errors->has('email_register') ||  $errors->has('password_register')) value="error" @endif>
                    <div class="form-group">
                        <label for="recipient-name" class="form-label">Username:</label>
                        <input type="text" class="form-control form-input" id="recipient-name" name="name_register" value="{{ old('name_register') }}">
                        @error('name_register')
                            <span role="alert" class="text-danger">
                                <error>{{ $message }}</error>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-label">Email:</label>
                        <input type="email" class="form-control form-input" id="recipient-name" name="email_register" value="{{ old('email_register') }}">
                        @error('email_register')
                            <span role="alert" class="text-danger">
                                <error>{{ $message }}</error>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-label">Password:</label>
                        <input type="password" class="form-control form-input" id="recipient-name" name="password_register">
                        @error('password_register')
                            <span role="alert" class="text-danger">
                                <error>{{ $message }}</error>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-label">Repeat Password:</label>
                        <input type="password" class="form-control form-input" id="recipient-name" name="password_confirmation">
                    </div>
                    <div class="text-center mt-5 pb-5">
                        <button class="btn btn-register">REGISTER</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
