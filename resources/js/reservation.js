function formatEurosFromCents(cents){
    return (cents / 100).toFixed(2) + "€";
}

function updateUI(){
    const rows = document.querySelectorAll(".reservation-tariff-row");
    let totalCents = 0;

    const lines = [];
    rows.forEach(row => {
        const price = parseInt(row.dataset.price, 10);
        const name = row.querySelector(".reservation-tariff-name").textContent.trim();

        const qtyEl = row.querySelector("[data-qty]");
        const qty = parseInt(qtyEl.textContent, 10);

        // hidden input
        const hidden = row.querySelector('input[type="hidden"]');
        hidden.value = qty;

        // disable minus if 0
        const minusBtn = row.querySelector('[data-action="minus"]');
        minusBtn.disabled = qty <= 0;

        totalCents += qty * price;
        if(qty > 0){
            lines.push(`${qty} - ${name}`);
        }
    });

    document.getElementById("totalValue").textContent = formatEurosFromCents(totalCents);

    const places = document.getElementById("placesLines");
    places.innerHTML = lines.length ? lines.join("<br>") : "0";
}

document.addEventListener("click", (e) => {
    const btn = e.target.closest(".reservation-qty-btn");
    if(!btn) return;

    const row = btn.closest(".reservation-tariff-row");
    const qtyEl = row.querySelector("[data-qty]");
    let qty = parseInt(qtyEl.textContent, 10);

    const action = btn.dataset.action;
    if(action === "minus") qty = Math.max(0, qty - 1);
    if(action === "plus") qty = qty + 1;

    qtyEl.textContent = qty;
    updateUI();
});

// init
updateUI();
