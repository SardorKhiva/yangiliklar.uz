<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Sahifa Topilmadi</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
        }

        .stars {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .star {
            position: absolute;
            width: 2px;
            height: 2px;
            background: white;
            border-radius: 50%;
            animation: twinkle 3s infinite;
        }

        @keyframes twinkle {
            0%, 100% {
                opacity: 0.3;
            }
            50% {
                opacity: 1;
            }
        }

        .container {
            text-align: center;
            color: white;
            z-index: 10;
            padding: 20px;
            max-width: 800px;
        }

        .error-code {
            font-size: 180px;
            font-weight: bold;
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
            animation: float 3s ease-in-out infinite;
            margin-bottom: 20px;
            line-height: 1;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        .glitch {
            position: relative;
            display: inline-block;
        }

        .glitch::before,
        .glitch::after {
            content: '404';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .glitch::before {
            animation: glitch-1 2s infinite;
            color: #00ffff;
            z-index: -1;
        }

        .glitch::after {
            animation: glitch-2 2s infinite;
            color: #ff00ff;
            z-index: -2;
        }

        @keyframes glitch-1 {
            0%, 100% {
                transform: translate(0);
            }
            33% {
                transform: translate(-2px, 2px);
            }
            66% {
                transform: translate(2px, -2px);
            }
        }

        @keyframes glitch-2 {
            0%, 100% {
                transform: translate(0);
            }
            33% {
                transform: translate(2px, -2px);
            }
            66% {
                transform: translate(-2px, 2px);
            }
        }

        h1 {
            font-size: 48px;
            margin-bottom: 20px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        p {
            font-size: 20px;
            margin-bottom: 40px;
            opacity: 0.9;
            line-height: 1.6;
        }

        .btn {
            display: inline-block;
            padding: 15px 40px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-size: 18px;
            font-weight: 600;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        .astronaut {
            position: absolute;
            width: 100px;
            height: 100px;
            animation: drift 20s infinite linear;
        }

        @keyframes drift {
            0% {
                transform: translate(-100px, 0) rotate(0deg);
            }
            100% {
                transform: translate(calc(100vw + 100px), 50vh) rotate(360deg);
            }
        }

        .planet {
            position: absolute;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            opacity: 0.3;
            animation: rotate 30s infinite linear;
        }

        .planet1 {
            top: 10%;
            left: 10%;
        }

        .planet2 {
            bottom: 10%;
            right: 10%;
            width: 100px;
            height: 100px;
        }

        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        @media (max-width: 768px) {
            .error-code {
                font-size: 120px;
            }

            h1 {
                font-size: 32px;
            }

            p {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
<div class="stars" id="stars"></div>
<div class="planet planet1"></div>
<div class="planet planet2"></div>

<div class="container">
    <div class="error-code glitch">404</div>
    <h1>Sahifa topilmadi</h1>
    <p>Afsuski, siz qidirayotgan sahifa kosmos kengliklarida yo'qolgan. Balki u hech qachon mavjud bo'lmagan yoki
        boshqa joyga ko'chib ketgan.</p>
    <a href="/" class="btn">Bosh sahifaga qaytish</a>
</div>

<script>
    // Yulduzlarni yaratish
    const starsContainer = document.getElementById('stars');
    for (let i = 0; i < 100; i++) {
        const star = document.createElement('div');
        star.className = 'star';
        star.style.left = Math.random() * 100 + '%';
        star.style.top = Math.random() * 100 + '%';
        star.style.animationDelay = Math.random() * 3 + 's';
        starsContainer.appendChild(star);
    }

    // Astronavt yaratish
    const astronaut = document.createElement('div');
    astronaut.className = 'astronaut';
    astronaut.innerHTML = '🚀';
    astronaut.style.fontSize = '60px';
    astronaut.style.top = Math.random() * 50 + '%';
    document.body.appendChild(astronaut);
</script>
</body>
</html>