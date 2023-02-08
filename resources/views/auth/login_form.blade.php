<form id="sing_in_form" action="{{ route('login') }}" method="post" class="form">
                @csrf
                <div class="input_block">
                    <span>email</span>
                    <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="error">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input_block">
                    <span>password</span>
                    <input id="password" placeholder="******" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="error">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input_block">
                    <input class="check-input" type="hidden" name="remember" id="remember" value="1">
                </div>
                <div class="form__button">
                    <button type="submit">Sing in</button>
                </div>
            </form>
