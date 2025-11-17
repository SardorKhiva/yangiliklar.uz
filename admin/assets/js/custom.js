// custom.js

// Sahifa to'liq yuklangandan keyin ishga tushirish
document.addEventListener('DOMContentLoaded', function() {

    // ====================================================
    // 1. Menu elementini o'chirish mantiqi
    // ====================================================
    let deleteBtns = document.querySelectorAll(".delete_btn");
    deleteBtns.forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            let id = btn.getAttribute('data-id');
            let confirmed = confirm("Rostdan ham menyu elementini o'chirmoqchimisiz?");
            if (confirmed) {
                window.location.href = "?acontroller=menu_delete&id=" + id;
            }
        });
    });

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
            failed_alerts.forEach(function(alert) {
                alert.style.display = "none";
            });
        }, 3000);
    }

    // ====================================================
    // 3. Kategoriyani o'chirish mantiqi
    // ====================================================
    document.querySelectorAll('.delete_category_btn').forEach(btn => {
        btn.onclick = (e) => {
            e.preventDefault();
            const id = btn.dataset.id;
            if (confirm(`ID: ${id} - Kategoriyani o'chirmoqchimisiz?\n\nBu amalni qaytarib bo'lmaydi!`)) {
                window.location.href = btn.href;
            }
        };
    });

}); // DOMContentLoaded tugadi