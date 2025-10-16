<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Clamping</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background: #f6f7fb;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }

    .container {
      background: #fff;
      width: 100%;
      max-width: 400px;
      border-radius: 20px;
      padding: 25px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    .top-bar {
      display: flex;
      align-items: center;
      margin-bottom: 25px;
    }

    .top-bar i {
      font-size: 1.2rem;
      color: #333;
      cursor: pointer;
      margin-right: 10px;
    }

    .top-bar h2 {
      font-size: 1.1rem;
      font-weight: 600;
    }

    label {
      display: block;
      font-size: 0.85rem;
      color: #555;
      margin-bottom: 5px;
      font-weight: 500;
    }

    input, select, textarea {
      width: 100%;
      padding: 12px;
      border: 1.5px solid #ddd;
      border-radius: 12px;
      margin-bottom: 18px;
      font-size: 0.9rem;
      transition: 0.3s;
      outline: none;
    }

    input:focus, select:focus, textarea:focus {
      border-color: #2b58ff;
      box-shadow: 0 0 0 3px rgba(43, 88, 255, 0.1);
    }

    textarea {
      resize: none;
      height: 80px;
    }

    button {
      width: 100%;
      background: #2b58ff;
      color: #fff;
      border: none;
      padding: 14px;
      border-radius: 12px;
      font-weight: 600;
      font-size: 1rem;
      cursor: pointer;
      transition: 0.3s;
    }

    button:hover {
      background: #1f47d6;
    }

    .icon-input {
      position: relative;
    }

    .icon-input input {
      padding-right: 35px;
    }


    .icon-input i {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      color: #999;
      font-size: 1rem;
    }

    #takePhotoBtn {
    background: linear-gradient(90deg, #0059ff, #0a84ff);
    border: none;
    color: #fff;
    padding: 10px 15px;
    border-radius: 10px;
    font-size: 14px;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 35px;
  }

  #takePhotoBtn i {
    font-size: 16px;
  }

  #preview {
    width: 100%;
    max-height: 180px;
    object-fit: cover;
    border-radius: 10px;
    display: none;
    border: 1px solid #ddd;
  }
  </style>
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
        <!-- Hidden file input inside button -->
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

