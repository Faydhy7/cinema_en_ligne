document.addEventListener('DOMContentLoaded', function () {

    // On récupère les éléments utiles
    const tariffs = document.querySelector('.reservation-tariffs');
    const placesLines = document.getElementById('placesLines');
    const totalValue = document.getElementById('totalValue');

    // Sécurité : si un élément manque, on stop
    if (!tariffs || !placesLines || !totalValue) return;

    function euros(cents) {
        // Convertit des centimes en texte "xx.xx€"
        return (cents / 100).toFixed(2) + '€';
    }

    function refresh() {
        // Met à jour : inputs hidden, bouton -, lignes récap, total
        let total = 0;
        const lines = [];

        tariffs.querySelectorAll('.reservation-tariff-row').forEach(function (row) {
            const price = parseInt(row.dataset.price || '0', 10);
            const name = row.querySelector('.reservation-tariff-name')?.textContent.trim() || 'Tarif';
            const qtyEl = row.querySelector('[data-qty]') || row.querySelector('.reservation-qty');
            const hidden = row.querySelector('input[type="hidden"]');
            const minus = row.querySelector('.reservation-qty-btn[data-action="minus"]');

            if (!qtyEl) return;

            const qty = parseInt(qtyEl.textContent || '0', 10) || 0;

            if (hidden) hidden.value = qty;
            if (minus) minus.disabled = qty <= 0;

            total += qty * price;
            if (qty > 0) lines.push(qty + ' - ' + name);
        });

        placesLines.innerHTML = lines.length ? lines.join('<br>') : '0';
        totalValue.textContent = euros(total);
    }

    document.addEventListener('click', function (event) {
        // On capte les clics sur +/-
        const btn = event.target.closest('.reservation-qty-btn');
        if (!btn) return;

        const row = btn.closest('.reservation-tariff-row');
        if (!row) return;

        const qtyEl = row.querySelector('[data-qty]') || row.querySelector('.reservation-qty');
        if (!qtyEl) return;

        let qty = parseInt(qtyEl.textContent || '0', 10) || 0;

        if (btn.dataset.action === 'minus') qty = Math.max(0, qty - 1);
        if (btn.dataset.action === 'plus') qty = qty + 1;

        qtyEl.textContent = qty;
        refresh();
    });

    // Init
    refresh();
});
