// custom.js

// Sahifa to'liq yuklangandan keyin ishga tushirish
document.addEventListener('DOMContentLoaded', function () {

    // ====================================================
    // 2. Alert xabarlarini avtomatik yashirish mantiqi
    // ====================================================

    // Muvaffaqiyat xabarlari
    let success_alert = document.querySelector('.success_alert');
    if (success_alert) {
        setTimeout(function () {
            success_alert.style.display = "none";
        }, 3000);
    }

    // Xatolik xabarlari
    let failed_alerts = document.querySelectorAll('.failed_alert');
    if (failed_alerts.length > 0) {
        setTimeout(function () {
            failed_alerts.forEach(function (alert) {
                alert.style.display = "none";
            });
        }, 3000);
    }


}); // DOMContentLoaded tugadi

// ====================================================
// 2. Elementlarni o'chirishning universal mantiq'i
// ====================================================

document.querySelectorAll('.delete_btn').forEach(btn => {
    btn.addEventListener('click', e => {
        e.preventDefault();

        const id = btn.dataset.id;
        const type = btn.dataset.type;
        const name = btn.dataset.name || '';

        // o'chiriladigan elementlar ro'yhati
        const messages = {
            news: "yangilikni",
            menu: "menyu elementini",
            category: "kategoriyani",
            author: "maullifni"
        };

        let text = messages[type] || "elementni";

        let confirmed = confirm(
            // `ID: ${id} ${name ? '(' + name + ')' : ''}\n\n` +
            `Rostdan ham ${text} o'chirmoqchimisiz?\n` +
            `Bu amalni qaytarib bo'lmaydi!`
        );

        if (confirmed) {
            window.location.href = btn.href;
        }
    })
})