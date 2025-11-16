// custom.js:

// ====================================================
// 1. Menu elementini o'chirish mantiqi
// Bu funksiya tugmani bosishda ishga tushadi.
// ====================================================

// Sahifadagi barcha .delete_btn sinfiga ega elementlarni topish
let deleteBtns = document.querySelectorAll(".delete_btn");

deleteBtns.forEach(function (btn) {
    // Har bir tugmaga "click" voqeasi tinglovchisini biriktirish
    btn.addEventListener('click', function (e) {
        // Formaning standart harakatini bekor qilish
        e.preventDefault();

        // Tugmaning 'data-id' atributidan ID qiymatini olish
        let id = btn.getAttribute('data-id');

        // Foydalanuvchidan tasdiqlashni so'rash (1-talab bajarildi)
        let confirmed = confirm("Rostdan ham menyu elementini o'chirmoqchimisiz?");

        if (confirmed) {
            // Agar foydalanuvchi "OK" tugmasini bossa, o'chirish URL manziliga yo'naltirish
            window.location.href = "?acontroller=menu_delete&id=" + id;
        }
        // Agar "Bekor qilish" bosilsa, hech narsa bo'lmaydi (sahifada qoladi)
    });
});


// ====================================================
// 2. Alert xabarlarini avtomatik yashirish mantiqi
// Bu funksiya sahifa yuklanganda bir marta ishga tushadi.
// (2-talab bajarildi)
// ====================================================

// Muvaffaqiyat xabarlarini yashirish (.success_alert)
let success_alert = document.querySelector('.success_alert');
if (success_alert) {
    setTimeout(function () {
        // 3 soniyadan keyin alertni yashirish
        success_alert.style.display = "none";
    }, 3000); // 3000 ms = 3 soniya
}

// Xatolik xabarlarini yashirish (.failed_alert)
let failed_alerts = document.querySelectorAll('.failed_alert');
if (failed_alerts.length > 0) {
    setTimeout(function () {
        // Agar bir nechta xatolik xabarlari bo'lsa, ularning barchasini yashirish
        failed_alerts.forEach(function(alert) {
            alert.style.display = "none";
        });
    }, 3000); // 3000 ms = 3 soniya
}