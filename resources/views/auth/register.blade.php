<?php
// Redirect to another page
header("Location: login");
exit; // Make sure to exit after redirecting to prevent further execution
?>
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>أنشاء حساب</title>

    <link rel="stylesheet" href="{{ asset('rlogin/css/material-design-iconic-font.min.css') }}">

    <link rel="stylesheet" href="{{ asset('rlogin/css/style.css') }}">
    <meta name="robots" content="noindex, follow">
    <script nonce="fb4cc246-7ea1-4097-a2d7-2c5b09360664">
        (function(w, d) {
            ! function(dg, dh, di, dj) {
                dg[di] = dg[di] || {};
                dg[di].executed = [];
                dg.zaraz = {
                    deferred: [],
                    listeners: []
                };
                dg.zaraz.q = [];
                dg.zaraz._f = function(dk) {
                    return async function() {
                        var dl = Array.prototype.slice.call(arguments);
                        dg.zaraz.q.push({
                            m: dk,
                            a: dl
                        })
                    }
                };
                for (const dm of ["track", "set", "debug"]) dg.zaraz[dm] = dg.zaraz._f(dm);
                dg.zaraz.init = () => {
                    var dn = dh.getElementsByTagName(dj)[0],
                        dp = dh.createElement(dj),
                        dq = dh.getElementsByTagName("title")[0];
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
                                ...dv[1],
                                ...dw[1]
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
                        <h2 class="form-title ">أنشاء حساب</h2>
                        <form method="POST" action="{{ route('register') }}" class="register-form" id="register-form">
                            @csrf

                            @error('emailx')
                                <span class="invalid-feedback" role="alert">
                                    <strong
                                        style="color: red;font-size: 1.9rem;padding-top: 1px;margin-bottom: 6px;display: block;">
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror

                            <div class="form-group">
                                <label for="name">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                    </svg></label>
                                <input type="text" name="name" :value="old('name')" required autofocus
                                    autocomplete="name" id="name" placeholder="الاسم الكامل" required
                                    oninput="setCustomValidity('')"
                                    oninvalid="this.setCustomValidity('الرجاء إدخال الاسم الكامل  ')" />
                            </div>





                            <div class="form-group">
                                <label for="email">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                                    </svg>
                                </label>
                                <input type="email" name="email" :value="old('email')" required
                                    autocomplete="username" id="email" placeholder="البريد الالكتروني" required
                                    oninput="setCustomValidity('')"
                                    oninvalid="this.setCustomValidity('الرجاء إدخال البريد الالكتروني ')" />
                            </div>


                            <div class="form-group">
                                <label for="password">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-person-fill-lock" viewBox="0 0 16 16">
                                        <path
                                            d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5v-1a1.9 1.9 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4m7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1" />
                                    </svg></label>
                                <input type="password" name="password" required autocomplete="new-password"
                                    id="password" placeholder="كلمة المرور" required oninput="setCustomValidity('')"
                                    oninvalid="this.setCustomValidity('الرجاء إدخال  كلمة االمرور   ')" />
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-person-fill-lock" viewBox="0 0 16 16">
                                        <path
                                            d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5v-1a1.9 1.9 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4m7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1" />
                                    </svg>
                                </label>
                                <input type="password" name="password_confirmation" required autocomplete="new-password"
                                    id="password_confirmation" placeholder="تأكييد كلمة االمرور" required
                                    oninput="setCustomValidity('')"
                                    oninvalid="this.setCustomValidity('الرجاء إدخال تأكييد كلمة االمرور   ')" />
                            </div>
                            <div class="form-group">
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>
                                    لدي حساب بالفعل
                                    <a href="{{ route('login') }}" class="term-service">تسجيل الدخول</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit"
                                    value="انشاء حساب" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{ asset('rlogin/image/ibnh.jpg') }}" alt="logo" class="img"></figure>
                        <a href="#" class="signup-image-link">
                            جامعة بغداد / كلية التربية للعلوم الصرففة - ابن الهيثم
                            <br>
                            نظام أَكَادِيمَا فْلُو
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
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
        integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
        data-cf-beacon='{"rayId":"83278eb7b96d2e45","version":"2023.10.0","token":"cd0b4b3a733644fc843ef0b185f98241"}'
        crossorigin="anonymous"></script>


    @livewireScripts
</body>

</html>
