<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - PerpusKu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');

        * {
            font-family: 'Quicksand', sans-serif;
        }

        /* Watery Lavender Background */
        .watery-bg {
            background: linear-gradient(145deg, #f0e6ff 0%, #d9c9ff 30%, #c2b0ff 60%, #e6d9ff 100%);
            background-size: 400% 400%;
            animation: waterFlow 15s ease infinite;
            position: relative;
        }

        @keyframes waterFlow {
            0% { background-position: 0% 0%; }
            25% { background-position: 50% 25%; }
            50% { background-position: 100% 50%; }
            75% { background-position: 50% 75%; }
            100% { background-position: 0% 100%; }
        }

        /* Water Ripple Effect */
        .water-ripple {
            position: fixed;
            inset: 0;
            background: radial-gradient(circle at 30% 50%, rgba(255, 255, 255, 0.3) 0%, transparent 30%),
                        radial-gradient(circle at 70% 80%, rgba(200, 180, 255, 0.4) 0%, transparent 40%),
                        radial-gradient(circle at 10% 20%, rgba(230, 210, 255, 0.5) 0%, transparent 50%),
                        radial-gradient(circle at 90% 40%, rgba(180, 150, 255, 0.3) 0%, transparent 45%);
            animation: rippleMove 20s infinite alternate;
            z-index: 1;
            pointer-events: none;
        }

        @keyframes rippleMove {
            0% { transform: scale(1) rotate(0deg); opacity: 0.4; }
            50% { transform: scale(1.2) rotate(5deg); opacity: 0.6; }
            100% { transform: scale(0.9) rotate(-5deg); opacity: 0.5; }
        }

        /* Floating Bubbles */
        .bubble {
            position: fixed;
            background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.8), rgba(230, 210, 255, 0.3));
            border-radius: 50%;
            filter: blur(5px);
            animation: bubbleFloat 15s infinite ease-in-out;
            z-index: 2;
            pointer-events: none;
        }

        @keyframes bubbleFloat {
            0%, 100% {
                transform: translateY(0) translateX(0) scale(1);
                opacity: 0.3;
            }
            25% {
                transform: translateY(-30px) translateX(15px) scale(1.1);
                opacity: 0.5;
            }
            50% {
                transform: translateY(0) translateX(30px) scale(0.9);
                opacity: 0.4;
            }
            75% {
                transform: translateY(30px) translateX(-15px) scale(1.2);
                opacity: 0.6;
            }
        }

        .bubble-1 {
            width: 300px;
            height: 300px;
            top: 10%;
            left: 5%;
            animation-delay: 0s;
        }

        .bubble-2 {
            width: 400px;
            height: 400px;
            bottom: 10%;
            right: 5%;
            animation-delay: -3s;
        }

        .bubble-3 {
            width: 200px;
            height: 200px;
            top: 40%;
            right: 20%;
            animation-delay: -6s;
        }

        .bubble-4 {
            width: 350px;
            height: 350px;
            bottom: 30%;
            left: 15%;
            animation-delay: -9s;
        }

        .bubble-5 {
            width: 150px;
            height: 150px;
            top: 70%;
            right: 35%;
            animation-delay: -12s;
        }

        /* Wave Lines */
        .wave-lines {
            position: fixed;
            inset: 0;
            background: repeating-linear-gradient(
                transparent 0px,
                transparent 20px,
                rgba(210, 190, 255, 0.1) 20px,
                rgba(210, 190, 255, 0.1) 22px
            );
            animation: waveMove 8s infinite linear;
            z-index: 3;
            pointer-events: none;
        }

        @keyframes waveMove {
            from { background-position: 0 0; }
            to { background-position: 0 40px; }
        }

        /* Diagonal Water Lines */
        .water-lines {
            position: fixed;
            inset: 0;
            background: repeating-linear-gradient(
                45deg,
                transparent 0px,
                transparent 30px,
                rgba(240, 230, 255, 0.15) 30px,
                rgba(240, 230, 255, 0.15) 32px
            );
            animation: waterLinesMove 12s infinite linear;
            z-index: 3;
            pointer-events: none;
        }

        @keyframes waterLinesMove {
            from { background-position: 0 0; }
            to { background-position: 60px 60px; }
        }

        /* Glass Card for Lavender Theme */
        .glass-card-lavender {
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            box-shadow: 0 20px 50px rgba(150, 120, 255, 0.15),
                        0 0 0 1px rgba(255, 255, 255, 0.4) inset;
            position: relative;
            z-index: 10;
        }

        /* Lavender Glass Button */
        .glass-button-lavender {
            background: rgba(255, 255, 255, 0.35);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            box-shadow: 0 4px 15px rgba(170, 140, 250, 0.2);
            transition: all 0.4s ease;
            color: #4a3b6e;
        }

        .glass-button-lavender:hover {
            background: rgba(255, 255, 255, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 8px 30px rgba(170, 140, 250, 0.3);
            transform: translateY(-2px);
            color: #3a2b5e;
        }

        /* Glass Input */
        .glass-input-lavender {
            background: rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            transition: all 0.3s ease;
            color: #3a2b5e;
        }

        .glass-input-lavender:focus {
            background: rgba(255, 255, 255, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 0 3px rgba(200, 180, 255, 0.3);
        }

        .glass-input-lavender::placeholder {
            color: rgba(74, 59, 110, 0.5);
            font-weight: 400;
        }

        /* Tab Navigation */
        .tab-glass-lavender {
            background: rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.4);
        }

        .tab-active-lavender {
            background: rgba(255, 255, 255, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.7);
            box-shadow: 0 4px 15px rgba(170, 140, 250, 0.15);
            color: #3a2b5e;
        }

        /* Text Colors */
        .text-lavender-dark {
            color: #4a3b6e;
        }

        .text-lavender-soft {
            color: #6b5b8e;
        }

        /* Watery Shine Effect */
        .water-shine {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(125deg,
                rgba(255, 255, 255, 0.3) 0%,
                transparent 30%,
                transparent 70%,
                rgba(230, 210, 255, 0.2) 100%
            );
            pointer-events: none;
            z-index: 5;
        }
    </style>
</head>
<body class="watery-bg min-h-screen flex items-center justify-center p-4 relative overflow-hidden">

    <!-- Water Ripple Effects -->
    <div class="water-ripple"></div>

    <!-- Floating Bubbles -->
    <div class="bubble bubble-1"></div>
    <div class="bubble bubble-2"></div>
    <div class="bubble bubble-3"></div>
    <div class="bubble bubble-4"></div>
    <div class="bubble bubble-5"></div>

    <!-- Wave and Water Lines -->
    <div class="wave-lines"></div>
    <div class="water-lines"></div>

    <!-- Additional Watery Glow -->
    <div class="fixed inset-0 bg-gradient-to-b from-transparent via-[#f0e6ff]/20 to-transparent z-[4] pointer-events-none"></div>
    <div class="fixed inset-0 bg-gradient-to-r from-[#e6d9ff]/10 via-transparent to-[#d9c9ff]/10 z-[4] pointer-events-none"></div>

    <div class="max-w-md w-full relative z-10" x-data="{ role: 'user', showPassword: false }">

        <!-- Logo Section -->
        <div class="text-center mb-10 relative">
            <div class="absolute inset-0 bg-white/30 rounded-full blur-3xl"></div>
            <div class="relative glass-button-lavender w-24 h-24 rounded-3xl flex items-center justify-center mx-auto mb-5 transform hover:scale-110 transition-transform duration-300">
                <i class="fas fa-book-open text-4xl text-[#4a3b6e]"></i>
            </div>
            <h1 class="text-5xl font-bold tracking-tight text-[#4a3b6e] mb-2">
                perpus<span class="text-[#7b68b0]">ku</span>
            </h1>
            <p class="text-[#6b5b8e] text-sm font-medium tracking-widest uppercase">lavender library experience</p>
        </div>

        <!-- Main Glass Card -->
        <div class="glass-card-lavender rounded-3xl overflow-hidden shadow-xl transform hover:scale-[1.01] transition-all duration-500">

            <!-- Water Shine Overlay -->
            <div class="water-shine"></div>

            <!-- Tab Navigation -->
            <div class="flex p-1.5 m-6 rounded-2xl tab-glass-lavender">
                <button @click="role = 'user'"
                        :class="role === 'user' ? 'tab-active-lavender' : 'text-[#6b5b8e] hover:bg-white/20'"
                        class="flex-1 py-3.5 text-sm font-medium rounded-xl transition-all duration-300">
                    <i class="fas fa-user mr-2"></i>
                    <span class="hidden sm:inline">Anggota</span>
                </button>
                <button @click="role = 'admin'"
                        :class="role === 'admin' ? 'tab-active-lavender' : 'text-[#6b5b8e] hover:bg-white/20'"
                        class="flex-1 py-3.5 text-sm font-medium rounded-xl transition-all duration-300">
                    <i class="fas fa-user-shield mr-2"></i>
                    <span class="hidden sm:inline">Administrator</span>
                </button>
            </div>

            <div class="p-8 pt-2">
                @if($errors->any())
                <div class="bg-white/40 backdrop-blur-sm text-[#4a3b6e] p-4 rounded-2xl text-sm mb-6 flex items-start gap-3 border border-white/60 shadow-lg">
                    <i class="fas fa-exclamation-circle mt-0.5 text-lg"></i>
                    <span class="font-medium">{{ $errors->first() }}</span>
                </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <!-- Email/Username Field -->
                    <div class="mb-6">
                        <label class="block text-xs font-semibold text-[#4a3b6e] uppercase tracking-wider mb-2">
                            <i class="fas fa-envelope mr-1"></i> Email / Username
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-user text-[#6b5b8e]"></i>
                            </div>
                            <input type="text"
                                   name="login_id"
                                   value="{{ old('login_id') }}"
                                   required
                                   class="glass-input-lavender w-full pl-11 pr-4 py-4 text-[#4a3b6e] rounded-2xl outline-none text-sm"
                                   placeholder="Masukkan email atau username">
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div class="mb-6">
                        <label class="block text-xs font-semibold text-[#4a3b6e] uppercase tracking-wider mb-2">
                            <i class="fas fa-lock mr-1"></i> Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-key text-[#6b5b8e]"></i>
                            </div>
                            <input :type="showPassword ? 'text' : 'password'"
                                   name="password"
                                   required
                                   class="glass-input-lavender w-full pl-11 pr-12 py-4 text-[#4a3b6e] rounded-2xl outline-none text-sm"
                                   placeholder="••••••••">
                            <button type="button"
                                    @click="showPassword = !showPassword"
                                    class="absolute inset-y-0 right-0 pr-4 flex items-center text-[#6b5b8e] hover:text-[#4a3b6e] transition-colors">
                                <i :class="showPassword ? 'fas fa-eye-slash' : 'fas fa-eye'" class="text-lg"></i>
                            </button>
                        </div>

                        <!-- Forgot Password -->
                        <div class="mt-2 text-right">
                            <a href="#" class="text-xs text-[#6b5b8e] hover:text-[#4a3b6e] transition-colors">
                                Lupa password?
                            </a>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                            class="glass-button-lavender w-full font-bold py-4 rounded-2xl text-lg tracking-wide relative overflow-hidden group">
                        <span class="absolute inset-0 bg-gradient-to-r from-white/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>
                        <span class="relative flex items-center justify-center">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            <span x-show="role === 'user'">Masuk sebagai Anggota</span>
                            <span x-show="role === 'admin'">Masuk sebagai Admin</span>
                        </span>
                    </button>
                </form>

                <!-- User Registration Section -->
                <div x-show="role === 'user'"
                     x-transition:enter="transition-all duration-500 ease-out"
                     x-transition:enter-start="opacity-0 transform translate-y-4"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     class="mt-8 text-center">
                    <p class="text-sm text-[#6b5b8e] mb-4 font-medium">Belum memiliki akun?</p>
                    <a href="{{ route('register') }}"
                       class="glass-button-lavender inline-flex items-center justify-center w-full py-4 font-semibold rounded-2xl group">
                        <span>Daftar Akun Baru</span>
                        <i class="fas fa-arrow-right ml-2 text-sm group-hover:translate-x-2 transition-transform"></i>
                    </a>
                </div>

                <!-- Admin Info Section -->
                <div x-show="role === 'admin'"
                     x-transition:enter="transition-all duration-500 ease-out"
                     x-transition:enter-start="opacity-0 transform translate-y-4"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     class="mt-8 text-center">
                    <div class="glass-input-lavender p-4 rounded-2xl border border-white/40">
                        <p class="text-sm text-[#4a3b6e] leading-relaxed">
                            <i class="fas fa-shield-alt mr-2 text-[#7b68b0]"></i>
                            Akses administrator terbatas. Hubungi pengembang untuk informasi lebih lanjut.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center mt-8 space-x-4">
            <a href="#" class="text-xs text-[#6b5b8e] hover:text-[#4a3b6e] transition-colors">Tentang</a>
            <span class="text-[#6b5b8e]/50">•</span>
            <a href="#" class="text-xs text-[#6b5b8e] hover:text-[#4a3b6e] transition-colors">Bantuan</a>
            <span class="text-[#6b5b8e]/50">•</span>
            <a href="#" class="text-xs text-[#6b5b8e] hover:text-[#4a3b6e] transition-colors">Kebijakan Privasi</a>
        </div>
        <p class="text-center mt-4 text-xs text-[#6b5b8e] font-medium">
            &copy; 2024 PerpusKu. Floating on lavender dreams <i class="fas fa-water text-[#7b68b0] mx-1"></i>
        </p>
    </div>

    <!-- Success Message -->
    @if(session('success'))
    <div class="fixed bottom-4 right-4 glass-button-lavender text-[#4a3b6e] px-6 py-4 rounded-2xl shadow-lg flex items-center gap-3 animate-slideUp z-20 border border-white/60">
        <i class="fas fa-check-circle text-xl text-[#7b68b0]"></i>
        <span class="text-sm font-medium">{{ session('success') }}</span>
    </div>
    @endif

    <style>
        @keyframes slideUp {
            from {
                transform: translateY(100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .animate-slideUp {
            animation: slideUp 0.5s ease-out;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(230, 210, 255, 0.3);
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(170, 140, 250, 0.5);
            border-radius: 20px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(150, 120, 240, 0.7);
        }

        /* Selection Color */
        ::selection {
            background: rgba(200, 180, 255, 0.5);
            color: #4a3b6e;
        }
    </style>
</body>
</html>
