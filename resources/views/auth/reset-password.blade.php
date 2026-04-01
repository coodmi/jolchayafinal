<!DOCTYPE html>
<html lang="bn">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>নতুন পাসওয়ার্ড সেট করুন | জলজ্যোৎস্না</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body{min-height:100vh;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#0d3d29 0%,#1a7a4a 100%);background-size:200% 200%;animation:bgshift 18s ease infinite;padding:16px}
    @keyframes bgshift{0%{background-position:0% 50%}50%{background-position:100% 50%}100%{background-position:0% 50%}}
    .login-card{width:100%;max-width:460px;background:rgba(255,255,255,0.12);border:1px solid rgba(255,255,255,0.28);border-radius:18px;box-shadow:0 24px 64px rgba(0,0,0,.22);overflow:hidden;backdrop-filter:saturate(140%) blur(10px);-webkit-backdrop-filter:saturate(140%) blur(10px);transform:translateZ(0)}
    .login-head{padding:26px 24px 14px;background:linear-gradient(135deg,#0b3a28 0%,#106942 100%);color:#fff;text-align:center}
    .login-head h1{font-size:clamp(16px,2vw,20px);margin:0;font-weight:800;letter-spacing:.2px}
    .login-body{padding:24px;background:#d1d1d1;border:none;border-radius:0;box-shadow:none}
    .form-label{font-weight:700;color:#0f172a}
    .input-wrap{position:relative}
    .input-icon{position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#64748b}
    .form-control{height:48px;border-radius:12px;border:1px solid #e5e7eb;padding-left:44px;padding-right:44px;background:#ffffff;box-shadow:inset 0 0 0 0 rgba(0,0,0,0);transition:border-color .2s ease, box-shadow .2s ease, transform .08s ease}
    .form-control.email-input{padding-right:12px}
    .form-control:focus{border-color:#16a34a;box-shadow:0 0 0 4px rgba(22,163,74,.15)}
    .toggle-pass{position:absolute;right:12px;top:50%;transform:translateY(-50%);background:transparent;border:none;color:#64748b;padding:0;display:flex;align-items:center;justify-content:center;cursor:pointer}
    .btn-primary{background:#16a34a;border:none;border-radius:12px;box-shadow:0 10px 20px rgba(22,163,74,.25);font-weight:800;letter-spacing:.2px}
    .btn-primary:hover{background:#22c55e;transform:translateY(-1px);box-shadow:0 14px 26px rgba(34,197,94,.32)}
    .btn-primary:active{transform:translateY(0);box-shadow:0 8px 16px rgba(22,163,74,.24)}
    .brand{display:flex;flex-direction:column;gap:10px;align-items:center;justify-content:center;text-align:center}
    .brand img{height:52px}
    .info-text{color:#475569;font-size:14px;margin-bottom:20px;line-height:1.5}
    .alert{border-radius:12px;border:none;padding:12px 16px}
    .alert-danger{background:#fee2e2;color:#991b1b;border-left:4px solid #dc2626}
    @media (max-width:420px){.login-body{padding:18px} .login-head{padding:20px 18px 12px}}
  </style>
</head>
<body>
  <div class="login-card">
    <div class="login-head">
      <div class="brand">
        <img src="/images/Logo/jolchaya footer.png" alt="Logo" onerror="this.style.display='none'">
        <h1>নতুন পাসওয়ার্ড সেট করুন</h1>
      </div>
    </div>
    <div class="login-body">
      <p class="info-text">আপনার নতুন পাসওয়ার্ড সেট করুন।</p>
      
      <form method="POST" action="{{ route('password.update') }}" novalidate>
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        
        <div class="mb-3">
          <label for="email" class="form-label">ইমেইল</label>
          <div class="input-wrap">
            <span class="input-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16v16H4z" opacity=".08"/><path d="M22 6l-10 7L2 6"/></svg>
            </span>
            <input type="email" class="form-control email-input" id="email" name="email" value="{{ old('email', request()->email) }}" required autofocus>
          </div>
          @if ($errors->has('email'))
            <div class="alert alert-danger mt-2 py-2 px-3">{{ $errors->first('email') }}</div>
          @endif
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">নতুন পাসওয়ার্ড</label>
          <div class="input-wrap">
            <span class="input-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="10" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            </span>
            <input type="password" class="form-control" id="password" name="password" required>
            <button type="button" id="togglePassword" class="toggle-pass" aria-label="পাসওয়ার্ড দেখুন">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8"/>
                <circle cx="12" cy="12" r="3"/>
              </svg>
            </button>
          </div>
          @if ($errors->has('password'))
            <div class="alert alert-danger mt-2 py-2 px-3">{{ $errors->first('password') }}</div>
          @endif
        </div>

        <div class="mb-3">
          <label for="password_confirmation" class="form-label">পাসওয়ার্ড নিশ্চিত করুন</label>
          <div class="input-wrap">
            <span class="input-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="10" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            </span>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            <button type="button" id="togglePasswordConfirm" class="toggle-pass" aria-label="পাসওয়ার্ড দেখুন">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8"/>
                <circle cx="12" cy="12" r="3"/>
              </svg>
            </button>
          </div>
        </div>

        <button type="submit" class="btn btn-primary w-100 py-2 mt-2">পাসওয়ার্ড রিসেট করুন</button>
      </form>
    </div>
  </div>
  <script>
    (function(){
      function setupToggle(btnId, inputId) {
        var btn = document.getElementById(btnId);
        var input = document.getElementById(inputId);
        if(btn && input){
          var showing = false;
          btn.addEventListener('click', function(){
            showing = !showing;
            input.type = showing ? 'text' : 'password';
            btn.setAttribute('aria-label', showing ? 'পাসওয়ার্ড লুকান' : 'পাসওয়ার্ড দেখুন');
          });
        }
      }
      setupToggle('togglePassword', 'password');
      setupToggle('togglePasswordConfirm', 'password_confirmation');
    })();
  </script>
</body>
</html>
