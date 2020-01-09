<form method="POST" action="{{ route('login') }}">
                            @csrf
                            <!--        You can switch " data-color="orange" "  with one of the next bright colors: "blue", "green", "orange", "red", "azure"          -->

                                
                                       
                                    <div class="tab-pane" id="about">
		                            	<div class="row">

                                            <span class="info-text" style="color:red;"> @include('includes.messages')</span>
											<div class="col-sm-4 col-sm-offset-1">
												<div class="picture-container">
													<h6></h6>
                                                    <br>
                                                    <br>
												</div>
											</div>

											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label>Email <small>(required)</small></label>
													<input name="email" type="email" class="form-control" placeholder="Email address..." required autocomplete="email" autofocus>
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
												</div>

												<div class="form-group">
													<label>Password <small>(required)</small></label>
													<input name="password" type="password" class="form-control" required autocomplete="current-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
												</div>
                                                <div class="form-group">
                                                <button type="submit" class="btn btn-primary">
                                                        {{ __('Login') }}
                                                    </button>

                                                    @if (Route::has('password.request'))
                                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                                            {{ __('Forgot Your Password?') }}
                                                        </a>
                                                    @endif
                                                    <br>
                                                    <div class="form-check form-group">
                                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                        <label class="form-check-label" for="remember">
                                                            {{ __('Remember Me') }}
                                                        </label>
                                                    </div>
												</div>
											</div>
                
										</div>
		                            </div>

                
            



                                </form>