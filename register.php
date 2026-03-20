<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhoneHub — Register</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700;800&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
 
        body {
            min-height: 100vh;
            font-family: 'DM Sans', sans-serif;
            background: #0c0c18;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
 
        body::before {
            content: '';
            position: fixed;
            top: -200px; right: -150px;
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(139,92,246,0.14) 0%, transparent 65%);
            pointer-events: none;
        }
        body::after {
            content: '';
            position: fixed;
            bottom: -200px; left: -150px;
            width: 550px; height: 550px;
            background: radial-gradient(circle, rgba(99,102,241,0.10) 0%, transparent 65%);
            pointer-events: none;
        }
 
        .card {
            background: #13131f;
            border: 1px solid rgba(99,102,241,0.22);
            border-radius: 20px;
            padding: 50px 44px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 30px 80px rgba(0,0,0,0.55);
            position: relative;
            z-index: 1;
        }
 
        .brand { text-align: center; margin-bottom: 34px; }
        .brand .icon { font-size: 2.4rem; display: block; margin-bottom: 12px; }
        .brand h1 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.9rem;
            font-weight: 800;
            color: #fff;
            letter-spacing: -0.03em;
        }
        .brand h1 span { color: #6366f1; }
        .brand p { color: #6b7280; font-size: 0.9rem; margin-top: 6px; }
 
        .msg-error {
            background: rgba(239,68,68,0.1);
            border: 1px solid rgba(239,68,68,0.3);
            color: #fca5a5;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 0.88rem;
            margin-bottom: 20px;
            text-align: center;
        }
        .msg-success {
            background: rgba(34,197,94,0.1);
            border: 1px solid rgba(34,197,94,0.3);
            color: #86efac;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 0.88rem;
            margin-bottom: 20px;
            text-align: center;
        }
 
        .form-group { margin-bottom: 18px; }
        .form-group label {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            color: #9ca3af;
            text-transform: uppercase;
            letter-spacing: 0.07em;
            margin-bottom: 8px;
        }
        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 13px 16px;
            background: #1e1e30;
            border: 1px solid rgba(99,102,241,0.2);
            border-radius: 10px;
            color: #f3f4f6;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.95rem;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .form-group input::placeholder { color: #4b5563; }
        .form-group input:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99,102,241,0.15);
        }
 
        .btn-submit {
            width: 100%;
            padding: 14px;
            background: #6366f1;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-family: 'Outfit', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            margin-top: 8px;
            transition: background 0.2s;
        }
        .btn-submit:hover { background: #4f46e5; }
 
        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 26px 0;
        }
        .divider hr { flex: 1; border: none; border-top: 1px solid rgba(255,255,255,0.07); }
        .divider span { color: #4b5563; font-size: 0.78rem; letter-spacing: 0.05em; }
 
        .footer-text { text-align: center; font-size: 0.9rem; color: #6b7280; }
        .footer-text a { color: #818cf8; text-decoration: none; font-weight: 600; }
        .footer-text a:hover { color: #a5b4fc; }
    </style>
</head>
<body>
 
<div class="card">
    <div class="brand">
        <span class="icon">📱</span>
        <h1>Phone<span>Hub</span></h1>
        <p>Create your account</p>
    </div>
 
    <?php if (!empty($_GET['error'])): ?>
        <div class="msg-error"><?php echo htmlspecialchars($_GET['error']); ?></div>
    <?php endif; ?>
    <?php if (!empty($_GET['success'])): ?>
        <div class="msg-success"><?php echo htmlspecialchars($_GET['success']); ?></div>
    <?php endif; ?>
 
    <form action="functions/signup.php" method="POST">
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="Choose a username" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="psw" placeholder="Create a password" required>
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="cpsw" placeholder="Retype your password" required>
        </div>
        <button type="submit" class="btn-submit">Create Account</button>
    </form>
 
    <div class="divider"><hr><span>ALREADY A MEMBER?</span><hr></div>
    <p class="footer-text">Have an account? <a href="index.php">Sign in</a></p>
</div>
 
</body>
</html>
 