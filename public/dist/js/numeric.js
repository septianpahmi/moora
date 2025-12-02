document.addEventListener("DOMContentLoaded", () => {
    // semua input dengan class .numeric-only
    const numericInputs = document.querySelectorAll(".numeric");

    numericInputs.forEach((input) => {
        // cegah penekanan tombol non-digit (tetap izinkan: backspace, delete, arrow, tab)
        input.addEventListener("keydown", (e) => {
            const allowedKeys = [
                "Backspace",
                "Delete",
                "ArrowLeft",
                "ArrowRight",
                "Tab",
                "Enter",
                "Home",
                "End",
            ];

            // jika ctrl/cmd + A/C/V/X izinkan
            if (
                (e.ctrlKey || e.metaKey) &&
                ["a", "c", "v", "x"].includes(e.key.toLowerCase())
            )
                return;

            if (allowedKeys.includes(e.key)) return;

            // izinkan angka di keyboard (0-9) dan numpad
            if (/^[0-9]$/.test(e.key)) return;

            // jika bukan, cegah
            e.preventDefault();
        });

        // saat input (termasuk paste), hapus semua karakter non-digit
        input.addEventListener("input", (e) => {
            const cleaned = e.target.value.replace(/\D+/g, "");
            if (e.target.value !== cleaned) e.target.value = cleaned;
        });

        // cegah paste yang bukan angka
        input.addEventListener("paste", (e) => {
            const paste = (e.clipboardData || window.clipboardData).getData(
                "text"
            );
            if (!/^\d+$/.test(paste)) {
                e.preventDefault();
            }
        });
    });
});
