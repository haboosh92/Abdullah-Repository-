<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ _('Sign In') }}</title>

    <link rel="stylesheet" href="{{ asset('rlogin/css/material-design-iconic-font.min.css') }}">

    <link rel="stylesheet" href="{{ asset('rlogin/css/style.css') }}">
    <meta name="robots" content="noindex, follow">
    <script nonce="fb4cc246-7ea1-4097-a2d7-2c5b09360664">
        (function(w, d) {
            ! function(dg, dh, di, dj) {
                dg[di] = dg[di] || {};
                dg[di].executed = [];
                dg.zaraz = {
                    deferred: []
                    , listeners: []
                };
                dg.zaraz.q = [];
                dg.zaraz._f = function(dk) {
                    return async function() {
                        var dl = Array.prototype.slice.call(arguments);
                        dg.zaraz.q.push({
                            m: dk
                            , a: dl
                        })
                    }
                };
                for (const dm of ["track", "set", "debug"]) dg.zaraz[dm] = dg.zaraz._f(dm);
                dg.zaraz.init = () => {
                    var dn = dh.getElementsByTagName(dj)[0]
                        , dp = dh.createElement(dj)
                        , dq = dh.getElementsByTagName("title")[0];
                    dq && (dg[di].t = dh.getElementsByTagName("title")[0].text);
                    dg[di].x = Math.random();
                    dg[di].w = dg.screen.width;
                    dg[di].h = dg.screen.height;
                    dg[di].j = dg.innerHeight;
                    dg[di].e = dg.innerWidth;
                    dg[di].l = dg.location.href;
                    dg[di].r = dh.referrer;
                    dg[di].k = dg.screen.colorDepth;
                    dg[di].n = dh.characterSet;
                    dg[di].o = (new Date).getTimezoneOffset();
                    if (dg.dataLayer)
                        for (const du of Object.entries(Object.entries(dataLayer).reduce(((dv, dw) => ({
                                ...dv[1]
                                , ...dw[1]
                            })), {}))) zaraz.set(du[0], du[1], {
                            scope: "page"
                        });
                    dg[di].q = [];
                    for (; dg.zaraz.q.length;) {
                        const dx = dg.zaraz.q.shift();
                        dg[di].q.push(dx)
                    }
                    dp.defer = !0;
                    for (const dy of [localStorage, sessionStorage]) Object.keys(dy || {}).filter((dA => dA
                        .startsWith("_zaraz_"))).forEach((dz => {
                        try {
                            dg[di]["z_" + dz.slice(7)] = JSON.parse(dy.getItem(dz))
                        } catch {
                            dg[di]["z_" + dz.slice(7)] = dy.getItem(dz)
                        }
                    }));
                    dp.referrerPolicy = "origin";
                    dp.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(dg[di])));
                    dn.parentNode.insertBefore(dp, dn)
                };
                ["complete", "interactive"].includes(dh.readyState) ? zaraz.init() : dg.addEventListener(
                    "DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);

    </script>

    @livewireStyles
</head>

</head>

<body>
    <div class="main p-0">

        <section class="signup">
            <div class="container">
                <div class="signup-content">


                    <div class="signup-form">
                        <h2 class="form-title ">{{ _('Sign In') }}</h2>
                        <form method="POST" action="{{ route('login') }}" class="register-form" id="register-form">
                            @csrf

                            <div class="form-group">
                                <label for="email">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                                    </svg>
                                </label>
                                <input type="email" name="email" :value="old('email')" required autocomplete="username" id="email" placeholder="Email" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please enter your email')" />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="password">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-lock" viewBox="0 0 16 16">
                                        <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5v-1a1.9 1.9 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4m7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1" />
                                    </svg></label>
                                <input type="password" name="password" required autocomplete="current-password" id="password" placeholder="Password" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Please enter your password')" />
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red">
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="remember_me" class="flex items-center">
                                    <input type="checkbox" id="remember_me" name="remember" />
                                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>
                            </div>


                            <div class="form-group">
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>
                                    @if (Route::has('password.request'))
                                    {{-- {{ _('Forgot Password ') }} --}}
                                    <a href="{{ route('password.request') }}" class="term-service">
                                        {{ _('Forgot Password ') }}
                                    </a>
                                    @endif
                            </div>
                            <div class="form-group form-button" style="display: flex">
                                <input type="submit" name="signup" id="signup" class="form-submit" value=" {{ __('Sign In') }}" />
                                {{-- <a href="{{ route('AuthGoogle') }}" class="form-submit" style="margin-left: 10px;background: white;border: 1px solid #845ad5;padding:
                                10px;display: flex;width: fit-content;border-radius: 13px;">
                                <img alt="Logo" src="{{ asset('assets/media/svg/brand-logos/google-icon.svg') }}" class="h-5px me-3">
                                <span style="margin-left: 15px;"> </span>
                                </a> --}}

                            </div>

                            <div class="form-group form-button" style="padding-bottom: 10px;">

                                <a href="{{ route('AuthGoogle') }}" class="term-service btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap wx-100" style="    background: white;border: 1px solid #845ad5;padding: 10px;display: flex;width: fit-content;border-radius: 13px;">
                                    <img alt="Logo" src="{{ asset('assets/media/svg/brand-logos/google-icon.svg') }}" class="h-5px me-3">
                                    <span style="margin-left: 15px;"> Sign in with google</span>
                                </a>
                                <br>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{ asset('rlogin/image/ibnh.jpg') }}" alt="logo" class="img"></figure>
                        <a href="#" class="signup-image-link">
                            {{ _('College of Education for Pure Sciences - Ibn Al-Haytham') }}
                            <br>
                            {{ _('Repository') }}
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');

    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317" integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA==" data-cf-beacon='{"rayId":"83278eb7b96d2e45","version":"2023.10.0","token":"cd0b4b3a733644fc843ef0b185f98241"}' crossorigin="anonymous"></script>


    @livewireScripts
</body>

</html>
