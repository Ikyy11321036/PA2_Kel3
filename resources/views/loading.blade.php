<!DOCTYPE html>
<html>
<head>
    <style>
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6); /* Warna gelap dengan opacity 60% */
            z-index: 9999; /* Menempatkan overlay di atas elemen lain */
            display: none; /* Menyembunyikan overlay secara default */
        }
        
        .loading {
            width: 120px;
            height: 120px;
            position: relative;
            margin: 300px auto;
            background-color: #eee;
            animation: spin 2s linear infinite;
            animation-direction: reverse;
            z-index: 10000; /* Menempatkan elemen loading di atas overlay */
            display: none; /* Menyembunyikan loading secara default */
        }
        
        .shape {
            display: block;
            position: absolute;
            height: 20px;
            width: 40px;
            background-color: #eee;
            mix-blend-mode: exclusion;
            -webkit-backface-visibility: visible;
        }
        
        .shape.shape-1{
            animation: spin1 2s ease-in-out infinite;
            animation-fill-mode: forwards;
        }
        
        .shape.shape-2{
            animation: spin2 2s ease-in-out infinite;
            animation-fill-mode: forwards;
        }
        
        .shape.shape-3{
            animation: spin3 2s ease-in-out infinite;
            animation-fill-mode: forwards;
        }
        
        .shape.shape-4{
            animation: spin4 2s ease-in-out infinite;
            animation-fill-mode: forwards;
        }
        
        .shape.shape-1{
            top: 20px;
            left: 40px;
        }
        
        .shape.shape-2{
            right: 20px;
            top: 40px;
            width: 20px;
            height: 40px;
        }
        
        .shape.shape-3{
            bottom: 20px;
            left: 40px;
        }
        
        .shape.shape-4{
            left: 20px;
            top: 40px;
            width: 20px;
            height: 40px;
        }
        
        @keyframes spin {
            100% {
                transform: rotate(90deg);
            }
        }
        
        @keyframes spin1 {
            25% {
                transform: rotate(90deg) translate(30px, -10px) scaleX(1);
            }
            100% {
                transform: rotate(90deg) translate(30px, -10px) scaleX(2);
            }
        }
        
        @keyframes spin2 {
            15% {
                transform: rotate(0deg) translate(0px) scaleY(1);
            }
            50% {
                transform: rotate(90deg) translate(10px, 30px) scaleY(1);
            }
            100% {
                transform: rotate(90deg) translate(10px, 30px) scaleY(2);
            }
        }
        
        @keyframes spin3 {
            40% {
                transform: rotate(0deg) translate(0px) scaleX(1);
            }
            75% {
                transform: rotate(90deg) translate(-30px, 10px) scaleX(1);
            }
            100% {
                transform: rotate(90deg) translate(-30px, 10px) scaleX(2);
            }
        }
        
        @keyframes spin4 {
            65% {
                transform: rotate(0deg) translate(0px) scaleY(1);
            }
            100% {
                transform: rotate(90deg) translate(-10px, -30px) scaleY(2);
            }
        }
    </style>
    <script>
        window.addEventListener("beforeunload", function() {
            // Saat halaman akan dimuat ulang
            showOverlayAndLoading();
        });

        function showOverlayAndLoading() {
            document.querySelector(".overlay").style.display = "block"; // Menampilkan overlay
            document.querySelector(".loading").style.display = "block"; // Menampilkan loading
            
            
        }
    </script>
</head>
<body>
    <div class="overlay"></div>
    <div class="loading">
        <span class="shape shape-1"></span>
        <span class="shape shape-2"></span>
        <span class="shape shape-3"></span>
        <span class="shape shape-4"></span>
    </div>
</body>
</html>
