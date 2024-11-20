document.addEventListener("DOMContentLoaded", () => {
    const withdrawalOptions = document.querySelectorAll('input[name="withdrawal-method"]');
    const paypalForm = document.getElementById("paypal-form");
    const danaForm = document.getElementById("dana-form");

    withdrawalOptions.forEach((option) => {
        option.addEventListener("change", (event) => {
            if (event.target.value === "paypal") {
                paypalForm.classList.remove("hidden");
                danaForm.classList.add("hidden");
            } else if (event.target.value === "dana") {
                danaForm.classList.remove("hidden");
                paypalForm.classList.add("hidden");
            }
        });
    });
});
