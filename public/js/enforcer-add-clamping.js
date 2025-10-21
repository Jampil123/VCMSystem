document.addEventListener("DOMContentLoaded", () => {
    const takePhotoBtn = document.getElementById('takePhotoBtn');
    const photoInput = document.getElementById('photo');
    const preview = document.getElementById('preview');
    const form = document.getElementById('clampingForm');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    photoInput.style.display = "none";

    // Open camera
    takePhotoBtn.addEventListener('click', () => {
        photoInput.click();
    });

    // Preview the photo
    photoInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            preview.style.display = 'none';
        }
    });

    // ✅ Popup helper
    function showPopup(message, id = null) {
        const popup = document.getElementById("successPopup");
        const popupMessage = document.getElementById("popupMessage");
        popupMessage.innerHTML = `
            <p>${message}</p>
            ${id ? `<button id="printReceiptBtn" class="btn btn-print">🖨️ Print Receipt</button>` : ""}
        `;
        popup.style.display = "flex";

        if (id) {
            // Print button handler
            document.getElementById("printReceiptBtn").addEventListener("click", () => {
                window.open(`/clampings/receipt/${id}`, "_blank");
            });
        }

        // Auto close popup after delay
        setTimeout(() => {
            popup.style.display = "none";
            window.location.href = "/enforcer/dashboard";
        }, 4000);
    }

    // ✅ Form submission
    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(form);

        try {
            const response = await fetch(window.clampingsRoute, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': csrfToken },
                body: formData,
                credentials: 'include'
            });

            let result;
            try {
                result = await response.json();
            } catch {
                result = { success: response.ok, message: "Clamping added successfully!" };
            }

            if (result.success) {
                // ✅ Show success popup with print receipt option
                showPopup(result.message || "Clamping added successfully!", result.id);
            } else {
                showPopup(result.message || "Failed to add clamping record.");
            }

        } catch (error) {
            console.error(error);
            showPopup("An error occurred while submitting the form.");
        }
    });
});
