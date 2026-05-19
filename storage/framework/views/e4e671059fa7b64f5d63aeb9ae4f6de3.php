<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — BIG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Inter', sans-serif;
            background: #0a0a0a;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .bg-grid {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
            background-size: 40px 40px;
        }

        .bg-accent {
            position: absolute;
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(232,255,0,0.08) 0%, transparent 70%);
            top: -200px; right: -200px;
            pointer-events: none;
        }

        .login-wrapper {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .login-brand {
            text-align: center;
            margin-bottom: 32px;
        }

        .login-brand .logo {
            font-size: 48px;
            font-weight: 800;
            color: #fff;
            letter-spacing: -2px;
            line-height: 1;
        }

        .login-brand .logo span { color: #e8ff00; }

        .login-brand .tagline {
            font-size: 11px;
            color: #555;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-top: 8px;
        }

        .login-card {
            background: #141414;
            border: 1px solid #222;
            border-radius: 16px;
            padding: 36px;
        }

        .login-card h1 {
            font-size: 22px;
            font-weight: 700;
            color: #fff;
            margin-bottom: 6px;
        }

        .login-card .subtitle {
            font-size: 13px;
            color: #555;
            margin-bottom: 28px;
        }

        .form-label {
            font-size: 12px;
            font-weight: 600;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }

        .form-control {
            background: #0a0a0a;
            border: 1px solid #2a2a2a;
            border-radius: 10px;
            color: #fff;
            font-size: 14px;
            padding: 12px 16px;
            transition: all 0.2s;
        }

        .form-control:focus {
            background: #0a0a0a;
            border-color: #e8ff00;
            box-shadow: 0 0 0 3px rgba(232,255,0,0.1);
            color: #fff;
        }

        .form-control::placeholder { color: #444; }

        .form-control.is-invalid {
            border-color: #ef4444;
            background: #0a0a0a;
        }

        .invalid-feedback { color: #ef4444; font-size: 12px; }

        .btn-login {
            width: 100%;
            background: #e8ff00;
            border: none;
            border-radius: 10px;
            color: #000;
            font-weight: 700;
            font-size: 15px;
            padding: 13px;
            cursor: pointer;
            transition: all 0.2s;
            margin-top: 8px;
        }

        .btn-login:hover {
            background: #d4eb00;
            transform: translateY(-1px);
        }

        .btn-login:active { transform: translateY(0); }

        .form-check-input {
            background-color: #1a1a1a;
            border-color: #333;
        }

        .form-check-input:checked {
            background-color: #e8ff00;
            border-color: #e8ff00;
        }

        .form-check-label {
            color: #666;
            font-size: 13px;
        }

        .demo-box {
            margin-top: 20px;
            background: rgba(232,255,0,0.05);
            border: 1px solid rgba(232,255,0,0.15);
            border-radius: 10px;
            padding: 14px 16px;
            font-size: 12px;
            color: #888;
        }

        .demo-box strong { color: #e8ff00; }

        .login-footer {
            text-align: center;
            margin-top: 24px;
            font-size: 12px;
            color: #333;
        }

        .login-footer a {
            color: #555;
            text-decoration: none;
        }

        .login-footer a:hover { color: #999; }

        @media (max-width: 480px) {
            .login-card { padding: 24px 20px; }
            .login-brand .logo { font-size: 40px; }
        }
    </style>
</head>
<body>
    <div class="bg-grid"></div>
    <div class="bg-accent"></div>

    <div class="login-wrapper">
        <div class="login-brand">
            <div class="logo">B<span>I</span>G</div>
            <div class="tagline">Admin Panel</div>
        </div>

        <div class="login-card">
            <h1>Welcome back</h1>
            <p class="subtitle">Sign in to manage your content</p>

            <form action="<?php echo e(route('admin.login.post')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input
                        type="email"
                        name="email"
                        class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        value="<?php echo e(old('email')); ?>"
                        placeholder="admin@big.dk"
                        autofocus
                        required
                    >
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <div style="position:relative;">
                        <input
                            type="password"
                            name="password"
                            id="passwordInput"
                            class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="••••••••"
                            required
                            style="padding-right:44px;"
                        >
                        <button type="button" onclick="togglePass()" style="position:absolute;right:12px;top:50%;transform:translateY(-50%);background:none;border:none;color:#555;cursor:pointer;font-size:16px;">
                            <i class="bi bi-eye" id="eyeIcon"></i>
                        </button>
                    </div>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                </div>

                <button type="submit" class="btn-login">
                    Sign In →
                </button>
            </form>

            <div class="demo-box">
                <strong>Demo Credentials</strong><br>
                Email: <strong>admin@big.dk</strong><br>
                Password: <strong>password</strong>
            </div>
        </div>

        <div class="login-footer">
            <a href="<?php echo e(route('home')); ?>">← Back to website</a>
        </div>
    </div>

    <script>
    function togglePass() {
        const input = document.getElementById('passwordInput');
        const icon = document.getElementById('eyeIcon');
        if (input.type === 'password') {
            input.type = 'text';
            icon.className = 'bi bi-eye-slash';
        } else {
            input.type = 'password';
            icon.className = 'bi bi-eye';
        }
    }
    </script>
</body>
</html>
<?php /**PATH C:\Users\Md Zainal Abedin\Desktop\big-architecture\resources\views/auth/login.blade.php ENDPATH**/ ?>