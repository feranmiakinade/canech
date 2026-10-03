<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title>CANECH Admin — Login</title>
 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@400;500;600;700;800&display=swap" rel="stylesheet">
 
    <style>
        :root {
            --bg: #F7F7F5;
            --text: #0e0e0f;
            --muted: #6a6a66;
            --accent: #B6FF00;
            --line: #E6E6E2;
            --line-strong: #D2D2CD;
            --glass-bg: rgba(255,255,255,0.7);
            --glass-border: rgba(14,14,15,0.08);
            --glass-highlight: rgba(255,255,255,0.9);
            box-sizing: border-box;
        }
 
        *, *::before, *::after { box-sizing: inherit; }
        * { margin: 0; padding: 0; }
 
        body {
            font-family: 'Inter Tight', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            -webkit-font-smoothing: antialiased;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
 
        :focus-visible { outline: 2px solid var(--text); outline-offset: 2px; }
 
        /* faint engineering grid, same as the public site */
        body::before {
            content: "";
            position: fixed;
            inset: 0;
            z-index: 0;
            pointer-events: none;
            background-image:
                linear-gradient(to right, rgba(14,14,15,0.045) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(14,14,15,0.045) 1px, transparent 1px);
            background-size: 72px 72px;
            -webkit-mask-image: radial-gradient(ellipse at 50% 35%, #000 15%, transparent 70%);
            mask-image: radial-gradient(ellipse at 50% 35%, #000 15%, transparent 70%);
        }
 
        .login-card {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 400px;
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            border-radius: 2px;
            padding: 36px;
            -webkit-backdrop-filter: blur(16px) saturate(160%);
            backdrop-filter: blur(16px) saturate(160%);
            box-shadow:
                inset 0 1px 0 var(--glass-highlight),
                0 18px 44px rgba(14,14,15,0.06);
        }
 
        .brand {
            font-size: 20px;
            font-weight: 800;
            letter-spacing: 0.14em;
            margin-bottom: 8px;
        }
        .brand span { color: var(--accent); -webkit-text-stroke: 0.5px var(--text); }
 
        .subtitle {
            color: var(--muted);
            font-size: 13.5px;
            margin-bottom: 30px;
        }
 
        label {
            display: block;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.6px;
            text-transform: uppercase;
            margin-bottom: 9px;
        }
 
        input {
            width: 100%;
            padding: 14px;
            border: 1px solid var(--line-strong);
            border-radius: 2px;
            background: rgba(255,255,255,0.8);
            color: var(--text);
            font: inherit;
            font-size: 15px;
            outline: none;
            transition: border-color .15s ease, box-shadow .15s ease, background .15s ease;
        }
        input::placeholder { color: #9a9a95; }
        input:hover { border-color: #b9b9b3; }
        input:focus {
            border-color: var(--text);
            background-color: #fff;
            box-shadow: 0 0 0 3px rgba(182,255,0,0.5);
        }
 
        .error {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 18px;
            padding: 13px 16px;
            background: rgba(179,38,30,0.08);
            border: 1px solid #b3261e;
            border-radius: 2px;
            color: #7d1a15;
            font-size: 13.5px;
            line-height: 1.5;
        }
        .error::before {
            content: "!";
            flex-shrink: 0;
            display: grid;
            place-items: center;
            width: 18px;
            height: 18px;
            font-size: 12px;
            font-weight: 800;
            color: #fff;
            background: #b3261e;
            border-radius: 50%;
        }
 
        button {
            width: 100%;
            margin-top: 22px;
            padding: 14px;
            border: 1px solid var(--accent);
            border-radius: 2px;
            background: var(--accent);
            color: var(--text);
            font: inherit;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: background .15s ease, color .15s ease, border-color .15s ease;
        }
        button:hover { background: var(--text); color: var(--accent); border-color: var(--text); }
 
        .footnote {
            margin-top: 24px;
            text-align: center;
            font-size: 12px;
            color: var(--muted);
        }
 
        @media (max-width: 480px) {
            .login-card { padding: 28px 24px; }
        }
    </style>
</head>
 
<body>
 
<div class="login-card">
 
    <div class="brand">CANECH<span>.</span></div>
 
    <div class="subtitle">Admin access</div>
 
    @if($errors->any())
        <div class="error" role="alert">
            {{ $errors->first('password') }}
        </div>
    @endif
 
    <form method="POST" action="{{ route('admin.authenticate') }}">
 
        @csrf
 
        <label for="password">Password</label>
 
        <input
            type="password"
            id="password"
            name="password"
            placeholder="Enter admin password"
            autocomplete="current-password"
            required
            autofocus
        >
 
        <button type="submit">Sign in</button>
 
    </form>
 
    <p class="footnote">CANECH internal tools</p>
 
</div>
 
</body>
</html>