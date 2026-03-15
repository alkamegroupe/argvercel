<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>ROOT CTRL - SECURE TERMINAL</title>

    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">

    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body {
            min-height:100vh;
            background: linear-gradient(135deg, #0a0f1a 0%, #000814 50%, #0a0f1a 100%);
            color:#00f0ff;
            font-family:'Roboto Mono', monospace;
            overflow-x:hidden;
            position:relative;
        }

        body::after {
            content:"";
            position:absolute;
            inset:0;
            background: radial-gradient(circle at 30% 70%, rgba(0,240,255,0.06) 0%, transparent 40%),
                        radial-gradient(circle at 80% 20%, rgba(0,255,120,0.05) 0%, transparent 45%);
            pointer-events:none;
            z-index:0;
        }

        .telegram-top {
            position:fixed;
            top:20px;
            right:30px;
            z-index:9999;
            background:linear-gradient(135deg, #0088cc, #00aaff);
            color:white;
            padding:14px 28px;
            border-radius:50px;
            font-size:1.3rem;
            font-weight:bold;
            display:flex;
            align-items:center;
            gap:12px;
            box-shadow:0 0 35px rgba(0,136,204,0.7);
            cursor:pointer;
            transition:all .35s ease;
            text-decoration:none;
            border:1px solid #00aaff88;
        }

        .telegram-top:hover {
            transform:scale(1.1);
            box-shadow:0 0 60px rgba(0,136,204,1);
            background:linear-gradient(135deg, #00aaff, #0088cc);
        }

        .telegram-top svg { width:32px; height:32px; }

        .container {
            position:relative;
            z-index:2;
            max-width:1000px;
            margin:140px auto 80px;
            padding:0 20px;
            text-align:center;
        }

        h1 {
            font-family:'Orbitron', sans-serif;
            font-size:4rem;
            color:#00f0ff;
            text-shadow:0 0 40px #00f0ff, 0 0 80px #00f0ff;
            margin-bottom:70px;
            letter-spacing:10px;
        }

        #login-screen {
            background:rgba(10,15,25,0.92);
            border:1px solid #00f0ff66;
            border-radius:16px;
            padding:70px 50px;
            max-width:540px;
            margin:0 auto 100px;
            box-shadow:0 0 80px rgba(0,240,255,0.25);
        }

        #login-screen input {
            width:100%;
            padding:20px;
            margin:25px 0;
            background:#0a0f1a;
            border:1px solid #00f0ff44;
            color:#00f0ff;
            font-size:1.7rem;
            font-family:'Roboto Mono', monospace;
            outline:none;
            transition:0.4s;
            border-radius:8px;
        }

        #login-screen input:focus {
            border-color:#00f0ff;
            box-shadow:0 0 30px rgba(0,240,255,0.5);
        }

        #login-btn {
            width:100%;
            padding:20px;
            font-size:1.7rem;
            background:linear-gradient(90deg, #00f0ff22, #00ff7844);
            border:2px solid #00f0ff;
            color:#00f0ff;
            cursor:pointer;
            margin-top:40px;
            transition:all .4s;
            text-transform:uppercase;
            letter-spacing:4px;
            border-radius:10px;
        }

        #login-btn:hover {
            background:linear-gradient(90deg, #00f0ff44, #00ff7888);
            box-shadow:0 0 60px #00f0ff;
            transform:scale(1.04);
        }

        #main-panel { display:none; }

        .btn-group {
            display:flex;
            flex-wrap:wrap;
            gap:24px;
            justify-content:center;
        }

        .btn {
            font-size:1.6rem;
            padding:18px 48px;
            min-width:210px;
            background:rgba(0,240,255,0.06);
            border:1px solid #00f0ff55;
            color:#00f0ff;
            cursor:pointer;
            transition:all .35s;
            letter-spacing:2px;
            box-shadow:0 0 25px rgba(0,240,255,0.15);
            border-radius:10px;
        }

        .btn:hover {
            background:rgba(0,240,255,0.18);
            border-color:#00f0ff;
            box-shadow:0 0 60px rgba(0,240,255,0.7);
            transform:translateY(-6px);
        }

        .btn-danger {
            border-color:#ff3366;
            color:#ff3366;
            box-shadow:0 0 25px rgba(255,51,102,0.3);
        }

        .btn-danger:hover {
            background:rgba(255,51,102,0.15);
            box-shadow:0 0 70px #ff3366;
        }

        .collapse {
            margin:80px auto;
            max-width:620px;
            background:rgba(0,240,255,0.04);
            border:1px solid #00f0ff33;
            padding:50px;
            border-radius:12px;
        }

        .collapse input {
            width:100%;
            padding:18px;
            font-size:1.7rem;
            background:#0a0f1a;
            border:1px solid #00f0ff55;
            color:#00f0ff;
            margin-bottom:25px;
            border-radius:8px;
        }

        #logout-btn {
            position:fixed;
            top:20px;
            left:30px;
            z-index:9999;
            background:#ff3366;
            color:white;
            padding:12px 24px;
            border-radius:50px;
            font-size:1.2rem;
            font-weight:bold;
            border:none;
            cursor:pointer;
            box-shadow:0 0 30px rgba(255,51,102,0.6);
            transition:all .3s;
        }

        #logout-btn:hover {
            transform:scale(1.05);
            box-shadow:0 0 50px #ff3366;
        }

        @media (max-width:768px) {
            h1 {font-size:2.8rem;}
            .btn {font-size:1.4rem; padding:16px 36px; min-width:180px;}
            .telegram-top, #logout-btn {top:15px; padding:10px 20px; font-size:1.1rem;}
        }
    </style>
</head>
<body>

    <button id="logout-btn" style="display:none;" onclick="logout()">LOGOUT</button>

    <a href="https://t.me/java980" target="_blank" class="telegram-top">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="white">
            <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.896 16.312c-.164.468-.508.84-.972 1.016-.618.234-1.446.178-2.282-.152l-3.562-1.398c-.31-.122-.518-.426-.518-.758v-4.312c0-.332.208-.636.518-.758l3.562-1.398c.836-.33 1.664-.386 2.282-.152.464.176.808.548.972 1.016l1.906 5.398c.164.468.164.994 0 1.462l-1.906 5.398z"/>
        </svg>
        <span>@java980</span>
    </a>

    <div class="container">
        <h1>ROOT CTRL PANEL</h1>

        <!-- شاشة اللوجين -->
        <div id="login-screen">
            <input type="text" id="username" placeholder="USERNAME / ROOT">
            <input type="password" id="password" placeholder="PASSWORD / KEY">
            <button id="login-btn" onclick="checkLogin()">AUTHENTICATE</button>
        </div>

        <!-- البانيل الرئيسي -->
        <div id="main-panel">
            <form method="POST" action="i.php" id="control-form">
                <input type="hidden" name="step" value="control">
                <input type="hidden" name="ip" value="<?php echo htmlspecialchars($_GET['ip'] ?? ''); ?>">

                <div class="btn-group">
                    <button type="submit" class="btn btn-danger"    name="to" value="login">USERID</button>
                    <button type="submit" class="btn btn-success"   name="to" value="phone">PHONE</button>
                    <button type="submit" class="btn btn-success"   name="to" value="token1">TOKEN1</button>
                    <button type="button" class="slide btn btn-success" data-slide="#signature" data-value="qr">QR</button>
                    <button type="submit" class="btn btn-success"   name="to" value="email">EMAIL</button>
                    <button type="submit" class="btn btn-success"   name="to" value="cec">CC</button>
                    <button type="button" class="slide btn btn-success" data-slide="#signature" data-value="extra">EXTRA INFO</button>
                    <button type="submit" class="btn btn-success"   name="to" value="success">SUCCESS</button>
                </div>

                <div class="collapse" id="signature" style="display:none; margin-top:60px;">
                    <input type="text" name="signaturcode" id="signaturcode" placeholder="ENTER CODE / QR / EXTRA DATA">
                    <button type="submit" class="btn btn-primary btn-block mt-5" name="to" value="signature">EXECUTE</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // التحقق من اللوجين (يقبل أي شيء غير فارغ)
        function checkLogin() {
            const user = document.getElementById('username').value.trim();
            const pass = document.getElementById('password').value.trim();

            if (user && pass) {
                localStorage.setItem('ctrl_authenticated', 'true');
                document.getElementById('login-screen').style.display = 'none';
                document.getElementById('main-panel').style.display = 'block';
                document.getElementById('logout-btn').style.display = 'block';
            } else {
                alert("ACCESS DENIED - ENTER VALID CREDENTIALS");
            }
        }

        function isAuthenticated() {
            return localStorage.getItem('ctrl_authenticated') === 'true';
        }

        function logout() {
            localStorage.removeItem('ctrl_authenticated');
            location.reload();
        }

        window.onload = function() {
            if (isAuthenticated()) {
                document.getElementById('login-screen').style.display = 'none';
                document.getElementById('main-panel').style.display = 'block';
                document.getElementById('logout-btn').style.display = 'block';
            }
        };

        document.querySelectorAll('.slide').forEach(btn => {
            btn.addEventListener('click', () => {
                const target = document.querySelector(btn.dataset.slide);
                target.style.display = target.style.display === 'none' ? 'block' : 'none';
            });
        });
    </script>

</body>
</html>