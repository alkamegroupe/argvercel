<?php
// Directory to save the uploaded image
$uploadDir = 'uploads/';

// Handle the image upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $response = ['success' => false];

    // Generate a random file name and get the file extension
    $fileName = $_FILES['image']['name'];
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    $randomName = uniqid('img_', true) . '.' . $fileExtension;

    // Set the target file path
    $targetFile = $uploadDir . $randomName;

    // Try to move the uploaded file to the target directory
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        // Success: prepare the response
        $response['success'] = true;
        $response['filename'] = $randomName;
        $response['url'] = $_SERVER['HTTP_HOST'] . '/' . $targetFile;  // Construct the URL of the uploaded file
    } else {
        // Error: failed to upload
        $response['error'] = 'Failed to upload image.';
    }

    // Return the response as JSON
    echo json_encode($response);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drag and Drop Image Upload</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .upload-area {
            width: 100%;
            max-width: 500px;
            height: 200px;
            border: 2px dashed #aaa;
            border-radius: 8px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #aaa;
            text-align: center;
            font-size: 18px;
            cursor: pointer;
            margin-bottom: 20px;
        }
        .upload-area.dragover {
            border-color: #000;
            background-color: #f0f0f0;
        }
        input[type="file"] {
            display: none;
        }
        .output {
            margin-top: 20px;
        }
        .copy-btn { margin-top: 10px; cursor: pointer; }
    </style>
</head>
<body>

<h2>Upload an Image (Drag and Drop)</h2>

<!-- Drag and Drop Area -->
<div class="upload-area" id="drop-area">
    <span>Drag and drop your image here</span>
    <input type="file" id="file-input" name="image" accept="image/*">
</div>

<!-- Output container for displaying uploaded image and URL -->
<div id="output" class="output"></div>

<script>
    // DOM Elements
    const dropArea = document.getElementById('drop-area');
    const fileInput = document.getElementById('file-input');
    const output = document.getElementById('output');  // Reference the output container

    // Add dragover event to highlight the drop area
    dropArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        dropArea.classList.add('dragover');
    });

    // Remove highlight when dragging ends
    dropArea.addEventListener('dragleave', function(e) {
        dropArea.classList.remove('dragover');
    });

    // Handle the dropped file
    dropArea.addEventListener('drop', function(e) {
        e.preventDefault();
        dropArea.classList.remove('dragover');
        
        // Get the file
        const file = e.dataTransfer.files[0];
        if (file) {
            fileInput.files = e.dataTransfer.files;
            uploadFile(file);
        }
    });

    // Trigger file input when drop area is clicked
    dropArea.addEventListener('click', function() {
        fileInput.click();
    });

    // Handle file input change
    fileInput.addEventListener('change', function() {
        const file = fileInput.files[0];
        if (file) {
            uploadFile(file);
        }
    });

    // Function to upload the file
    function uploadFile(file) {
        const formData = new FormData();
        formData.append('image', file);

        const xhr = new XMLHttpRequest();
        xhr.open('POST', '', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Parse the JSON response
                try {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        const uploadedImageURL = response.url;
                        const uploadedFileName = response.filename;

                        // Ensure the output element exists before modifying it
                        if (output) {
                            output.innerHTML = `
                                <h3>Image uploaded successfully!</h3>
                                <img src="uploads/${uploadedFileName}" alt="Uploaded Image" width="300"><br><br>
                                <input type="text" id="imageLink" value="http://${uploadedImageURL}" readonly>
                                <button class="copy-btn" onclick="copyLink()">Copy Link</button>
                            `;
                        }
                    } else {
                        alert('Failed to upload image');
                    }
                } catch (error) {
                    alert('Error parsing response: ' + error);
                }
            } else {
                alert('Failed to upload image');
            }
        };
        xhr.send(formData);
    }

    // Function to copy the image link to clipboard
    function copyLink() {
        var copyText = document.getElementById("imageLink");
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices
        document.execCommand("copy");
        alert("Link copied to clipboard!");
    }
</script>

</body>
</html>
