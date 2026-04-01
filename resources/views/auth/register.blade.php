<!DOCTYPE html>
<html lang="bn">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>রেজিস্টার করুন | জলজ্যোৎস্না</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body{min-height:100vh;display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#0d3d29 0%,#1a7a4a 100%);background-size:200% 200%;animation:bgshift 18s ease infinite;padding:20px}
    @keyframes bgshift{0%{background-position:0% 50%}50%{background-position:100% 50%}100%{background-position:0% 50%}}
    .register-card{width:100%;max-width:520px;background:rgba(255,255,255,0.12);border:1px solid rgba(255,255,255,0.28);border-radius:18px;box-shadow:0 24px 64px rgba(0,0,0,.22);overflow:hidden;backdrop-filter:saturate(140%) blur(10px);-webkit-backdrop-filter:saturate(140%) blur(10px);transform:translateZ(0);margin:20px auto}
    .register-head{padding:26px 24px 14px;background:linear-gradient(135deg,#0b3a28 0%,#106942 100%);color:#fff;text-align:center}
    .register-head h1{font-size:clamp(16px,2vw,20px);margin:0;font-weight:800;letter-spacing:.2px}
    .register-body{padding:24px;background:#d1d1d1;border:none;border-radius:0;box-shadow:none}
    .form-label{font-weight:700;color:#0f172a;font-size:14px}
    .input-wrap{position:relative;margin-bottom:1rem}
    .input-icon{position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#64748b;z-index:1}
    .form-control{height:48px;border-radius:12px;border:1px solid #e5e7eb;padding-left:44px;padding-right:12px;background:#ffffff;transition:border-color .2s ease, box-shadow .2s ease}
    .form-control:focus{border-color:#16a34a;box-shadow:0 0 0 4px rgba(22,163,74,.15)}
    .btn-primary{background:#16a34a;border:none;border-radius:12px;box-shadow:0 10px 20px rgba(22,163,74,.25);font-weight:800;letter-spacing:.2px;height:48px}
    .btn-primary:hover{background:#22c55e;transform:translateY(-1px);box-shadow:0 14px 26px rgba(34,197,94,.32)}
    .btn-primary:active{transform:translateY(0);box-shadow:0 8px 16px rgba(22,163,74,.24)}
    .brand{display:flex;flex-direction:column;gap:10px;align-items:center;justify-content:center;text-align:center}
    .brand img{height:52px}
    .helper{color:#64748b;font-size:14px}
    @media (max-width:576px){.register-body{padding:18px}.register-head{padding:20px 18px 12px}}
  </style>
</head>
<body>
  <div class="register-card">
    <div class="register-head">
      <div class="brand">
        <img src="/images/Logo/jolchaya footer.png" alt="Logo" onerror="this.style.display='none'">
      </div>
    </div>
    <div class="register-body">
      <form method="POST" action="{{ route('register.submit') }}" novalidate>
        @csrf
        
        <div class="input-wrap">
          <label for="name" class="form-label">নাম</label>
          <div class="position-relative">
            <span class="input-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
              </svg>
            </span>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
          </div>
        </div>

        <div class="input-wrap">
          <label for="email" class="form-label">ইমেইল</label>
          <div class="position-relative">
            <span class="input-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                <polyline points="22,6 12,13 2,6"></polyline>
              </svg>
            </span>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
          </div>
        </div>

        <div class="input-wrap">
          <label for="phone" class="form-label">মোবাইল নম্বর</label>
          <div class="position-relative">
            <span class="input-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
              </svg>
            </span>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
          </div>
        </div>

        <div class="input-wrap">
          <label for="password" class="form-label">পাসওয়ার্ড</label>
          <div class="position-relative">
            <span class="input-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
              </svg>
            </span>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
        </div>

        <div class="input-wrap">
          <label for="password_confirmation" class="form-label">পাসওয়ার্ড নিশ্চিত করুন</label>
          <div class="position-relative">
            <span class="input-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
              </svg>
            </span>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
          </div>
        </div>

        @if ($errors->any())
          <div class="alert alert-danger py-2 px-3 mb-3">
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <button type="submit" class="btn btn-primary w-100">রেজিস্টার করুন</button>
        
        <div class="text-center mt-3">
          <p class="mb-0 helper">ইতিমধ্যে অ্যাকাউন্ট আছে? <a href="{{ route('login') }}" style="color:#16a34a; font-weight:700; text-decoration:none;">লগইন করুন</a></p>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
