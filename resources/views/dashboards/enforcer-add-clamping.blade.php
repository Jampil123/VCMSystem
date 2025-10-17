<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Clamping</title>

  <link rel="stylesheet" href="/../../styles/enforcer-add-clamping.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  
</head>
<body>

  <div class="container">
    <div class="top-bar">
      <i class="fa-solid fa-arrow-left" id="backBtn"></i>
      <h2>Add Clamping</h2>
    </div>

    <form id="clampingForm" action="{{ route('clampings') }}" method="POST" enctype="multipart/form-data">
  @csrf

  <label for="plate">Plate Number</label>
  <input type="text" id="plate" name="plate_no" placeholder="Enter plate number" required>

  <label for="vehicle">Vehicle Type</label>
  <input type="text" id="vehicle" name="vehicle_type" placeholder="Enter vehicle type" required>

  <label for="location">Location</label>
  <input type="text" id="location" name="location" placeholder="Enter clamping location" required>

  <label for="reason">Reason</label>
  <textarea id="reason" name="reason" placeholder="Enter reason for clamping" required></textarea>

  <label for="fine">Fine Amount</label>
  <div class="icon-input">
    <input type="number" id="fine" name="fine_amount" placeholder="Enter fine amount" required>
    <i class="fa-solid fa-peso-sign"></i>
  </div>

  <label for="photo">Photo</label>
   <div class="photo-section">
      <button type="button" id="takePhotoBtn" style="position: relative; overflow: hidden;">
        <i class="fa-solid fa-camera"></i> Take Photo
        <input type="file" id="photo" name="photo" accept="image/*" capture="environment" style="position: absolute; left: 0; top: 0; width: 100%; height: 100%; opacity: 0; cursor: pointer;">
      </button>
      <img id="preview" alt="Photo Preview" style="display:none; width:100%; border-radius:10px;">
    </div>


  <button type="submit">ADD CLAMPING</button>
</form>

    <script>
    document.getElementById('backBtn').addEventListener('click', function() {
      window.location.href = '/enforcers'; 
    });
  </script>
  <script>
document.getElementById('takePhotoBtn').addEventListener('click', () => {
    document.getElementById('photo').click();
});

// preview the photo
document.getElementById('photo').addEventListener('change', (event) => {
    const file = event.target.files[0];
    const preview = document.getElementById('preview');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    } else {
        preview.style.display = 'none';
    }
});

  // Handle form submission
  document.getElementById('clampingForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    try {
      const response = await fetch("{{ route('clampings') }}", {
        method: 'POST',
        body: formData,
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        credentials: 'include'
      });

      const result = await response.json();

      if (result.success) {
        alert(result.message);
        window.location.href = "/enforcers"; // redirect to dashboard
      } else {
        alert("Failed to add clamping record.");
      }
    } catch (error) {
      console.error(error);
      alert("An error occurred while submitting the form.");
    }
  });
</script>

  </div>

</body>
</html>

