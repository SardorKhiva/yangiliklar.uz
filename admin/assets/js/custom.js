// Bu skript bazadan menu dagi qatorni o'chirishda yordam beradi
// alert('Hello!');
let deleteBtns = document.querySelectorAll(".delete_btn");
deleteBtns.forEach(function (btn) {
    btn.addEventListener('click', function (e) {
        e.preventDefault();
        let id = btn.getAttribute('data-id');
        let confirmed = confirm("Rostdan ham siz menyu elementini o'chirmoqchimisiz?");

        if (confirmed) {
            window.location.href = "?acontroller=menu_delete&id=" + id;
        }
    })

    let success_alert = document.querySelector('.success_alert');
    if (success_alert) {
        setTimeout(function () {
            success_alert.style.display = "none"; // alertni yashirish

        }, 2000);  // 2000 ms = 2 soniya
    }
})