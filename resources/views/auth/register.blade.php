<form id="sing_up_form" action="{{ route('register') }}" method="post" class="form">
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
                <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <span class="error">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input_block">
                <span>repeat password</span>
                <input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
            </div>
            <div class="checkbox_block">
                <input type="checkbox" class="custom-checkbox" id="is_admin" name="is_admin" value="yes">
                <label for="is_admin">Is admin</label>
            </div>
            <div class="form__button">
                <button type="submit">Sing up</button>
            </div>
        </form>

