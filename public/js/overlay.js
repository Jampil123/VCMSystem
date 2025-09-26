document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("clampingForm");
    const overlay = document.getElementById("submitOverlay");
    const overlayMsg = document.getElementById("overlayMessage");
    const overlaySub = document.getElementById("overlaySub");

    if (form) {
        form.addEventListener("submit", async (e) => {
            e.preventDefault(); // prevent default form submit
            overlay.classList.remove("hidden");
            overlayMsg.textContent = "Saving...";
            overlaySub.textContent = "";

            const formData = new FormData(form);

            try {
                const response = await fetch(form.action, {
                    method: "POST",
                    body: formData
                });
                const data = await response.json();

                if (data.success) {
                    overlayMsg.textContent = "✅ Clamping added successfully!";
                    overlaySub.textContent = "Redirecting to dashboard...";
                    setTimeout(() => {
                        window.location.href = "/api/clampings"; 
                    }, 2000);
                } else {
                    overlayMsg.textContent = "⚠️ Failed to save.";
                    overlaySub.textContent = data.message || "";
                    setTimeout(() => overlay.classList.add("hidden"), 2000);
                }
            } catch (error) {
                overlayMsg.textContent = "❌ Error occurred.";
                overlaySub.textContent = error.message;
                setTimeout(() => overlay.classList.add("hidden"), 2000);
            }
        });
    }
});
