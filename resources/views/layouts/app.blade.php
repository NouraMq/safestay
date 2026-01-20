<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafeStay - تجربة سكن استثنائية</title>
    <link rel="icon" type="image/png" href="{{asset('images/logo1.png')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<!-- Bootstrap Icons (OK – لا يؤثر على التصميم) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<!-- Bootstrap JS (Carousel only) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


    <link rel="stylesheet" href="{{asset('css/app.css')}}">
@stack('styles')
</head>
<body>
    <div class="bg-animated"></div>
    
  <nav class="navbar">
        <div class="nav-container">
            <a href="#" class="logo">
                <div class="logo-icon">
                    <img src="images/logo1.png" alt="SafeStay Logo">
                </div>
                <span class="logo-text">SafeStay</span>
            </a>
            <ul class="nav-links">
                <li><a href="/">الرئيسية</a></li>
                <li><a href="/accommodations">السكنات</a></li>
                <li><a href="/transports">النقل</a></li>
                <li><a href="/bookings">حجوزاتي</a></li>
                <li><button class="btn-login" onclick="openModal()">تسجيل الدخول</button></li>
            </ul>
        </div>
    </nav>
   
    <!-- Login/Register Modal -->
    <div class="modal" id="authModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">مرحباً بك</h3>
                <button class="modal-close" onclick="closeModal()">×</button>
            </div>
            <div class="modal-body">
                <div class="tabs">
                    <button class="tab active" onclick="switchTab('login')">تسجيل الدخول</button>
                    <button class="tab" onclick="switchTab('register')">إنشاء حساب</button>
                </div>
                
                <!-- Login Form -->
                <div class="tab-content active" id="loginTab">
                    <form action="#" method="POST">
                        <div class="form-group">
                            <label class="form-label">البريد الإلكتروني</label>
                            <input type="email" class="form-input" placeholder="example@email.com" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">كلمة المرور</label>
                            <input type="password" class="form-input" placeholder="••••••••" required>
                        </div>
                        <button type="submit" class="btn-submit">تسجيل الدخول</button>
                    </form>
                </div>
                
                <!-- Register Form -->
                <div class="tab-content" id="registerTab">
                    <form action="#" method="POST">
                        <div class="form-group">
                            <label class="form-label">الاسم الكامل</label>
                            <input type="text" class="form-input" placeholder="أدخل اسمك الكامل" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">البريد الإلكتروني</label>
                            <input type="email" class="form-input" placeholder="example@email.com" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">رقم الهاتف</label>
                            <input type="tel" class="form-input" placeholder="96812345678" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">كلمة المرور</label>
                            <input type="password" class="form-input" placeholder="••••••••" required>
                        </div>
                        <button type="submit" class="btn-submit">إنشاء حساب</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @yield('content')

    <footer>
        <div class="footer-content">
            <div class="footer-grid">
                <div class="footer-section">
                    <div class="footer-logo">
                        <div class="footer-logo-icon">
                            <img src="images/logo.png" alt="SafeStay Logo">
                        </div>
                        <span class="footer-logo-text">SafeStay</span>
                    </div>
                    <p class="footer-description">
                        منصة آمنة وموثوقة لحجز السكن الطلابي ووسائل النقل، نوفر لك تجربة استثنائية ومريحة.
                    </p>
                  
                </div>
                
                <div class="footer-section">
                    <h4>روابط سريعة</h4>
                    <ul class="footer-links">
                        <li><a href="#">الرئيسية</a></li>
                        <li><a href="#">السكنات</a></li>
                        <li><a href="#">النقل</a></li>
                        <li><a href="#">حجوزاتي</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4>عن SafeStay</h4>
                    <ul class="footer-links">
                        <li><a href="#">من نحن</a></li>
                        <li><a href="#">رؤيتنا</a></li>
                        <li><a href="#">الوظائف</a></li>
                        <li><a href="#">اتصل بنا</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4>المساعدة والدعم</h4>
                    <ul class="footer-links">
                        <li><a href="#">مركز المساعدة</a></li>
                        <li><a href="#">الأسئلة الشائعة</a></li>
                        <li><a href="#">شروط الاستخدام</a></li>
                        <li><a href="#">سياسة الخصوصية</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>© 2026 SafeStay. جميع الحقوق محفوظة</p>
            </div>
        </div>
    </footer>


    <script>
        function openModal() {
            document.getElementById('authModal').classList.add('active');
        }
        
        function closeModal() {
            document.getElementById('authModal').classList.remove('active');
        }
        
        function switchTab(tab) {
            document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
            event.target.classList.add('active');
            
            document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
            document.getElementById(tab + 'Tab').classList.add('active');
            
            if (tab === 'login') {
                document.querySelector('.modal-title').textContent = 'مرحباً بك';
            } else {
                document.querySelector('.modal-title').textContent = 'إنشاء حساب جديد';
            }
        }
        
        document.getElementById('authModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>