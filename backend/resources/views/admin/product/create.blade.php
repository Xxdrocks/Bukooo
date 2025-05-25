<style>
    * {
        box-sizing: border-box;
    }

    body {
        font-family: "Poppins", sans-serif;
        background-color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
    }

    .main-page {
        width: 90%;
        max-width: 1200px;
    }

    .logo {
        font-size: 12px;
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .logo img {
        height: 30px;
        margin-right: 10px;
    }

    .container {
        display: flex;
        gap: 60px;
        align-items: flex-start;
        justify-content: space-between;
    }

    .form-section {
        display: flex;
        flex-direction: row;
        background-color: #FFFDF9;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        flex: 1;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-image {
        height: 300px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: 700;
    }

    .form-group input {
        width: 350px;
        background-color: #d9d9d9;
        padding: 10px;
        border: 1px solid #000000;
        border-radius: 8px;
    }

    .form-right {
        margin-left: 60px;
        padding-top: 69px;
    }



    .preview {
        background-color: #f8f8f8;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        width: 300px;
        text-align: center;
    }

    .preview img {
        width: 70%;
        height: 250px;
        border-radius: 10px;
        object-fit: contain;
        margin-bottom: 15px;
    }

    .preview-info h3 {
        font-size: 1.2rem;
        margin-bottom: 5px;
    }

    .preview-info p {
        color: #444;
        font-weight: bold;
    }

    .buttons {
        display: flex;
        justify-content: flex-end;
        margin-top: 20px;
        display: flex;
        gap: 10px;
    }

    .btn {
        padding: 10px 20px;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        font-weight: 500;
    }

    .btn-primary {
        background-color: #4CAF50;
        color: white;
    }

    .btn-draft {
        background-color: #FAD6D6;
        color: #A94442;
    }
</style>

<div class="main-page">
    <div class="logo">
        <img src="{{ asset('assets/logo/bag.png') }}" alt="Logo">
        <h1>Add New Book</h1>
    </div>

    <form action="{{ route('product.create') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <!-- Form Section -->
            <div class="form-section">

                <div class="form-left">
                    <h2>General Information</h2>
                    <div class="form-group">
                        <label for="name">Book Title</label>
                        <input type="text" name="name" id="name" oninput="updatePreview()" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Upload Book Cover</label>
                        <input class="form-image" type="file" id="image" name="image" accept="image/*"
                            onchange="previewImage(event)" required>
                    </div>
                </div>

                <div class="form-right">

                    <div class="form-group">
                        <label for="created_by">Author</label>
                        <input type="text" name="created_by" id="created_by" required>
                    </div>


                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" oninput="updatePreview()" required>
                    </div>

                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" name="category" id="category" required>
                    </div>

                    <div class="form-group">
                        <label for="discount">Discount (Optional)</label>
                        <input type="text" name="discount" id="discount">
                    </div>
                </div>

            </div>

            <!-- Preview Section -->
            <div class="preview">
                <h3>Preview</h3>
                <img id="preview-image" src="{{ asset('assets/default-book.png') }}" alt="Preview">
                <div class="preview-info">
                    <h3 id="preview-title">Book Title</h3>
                    <p id="preview-price">Rp 0</p>
                </div>
            </div>
        </div>
        <div class="buttons">
            <button type="button" class="btn btn-draft">Draft</button>
            <button type="submit" class="btn btn-primary">Add Book</button>
        </div>
    </form>
</div>


<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('preview-image');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    function updatePreview() {
        const title = document.getElementById('name').value;
        const price = document.getElementById('price').value;

        document.getElementById('preview-title').textContent = title || 'Book Title';
        document.getElementById('preview-price').textContent = price ?
            `Rp ${parseInt(price).toLocaleString('id-ID')}` :
            'Rp 0';
    }

    document.getElementById('discount').addEventListener('input', function() {
        if (this.value.trim() !== '') {
            Swal.fire({
                icon: 'info',
                title: 'Diskon belum bisa dipakai',
                text: 'yahaha hayyuk',
                confirmButtonText: 'Oke'
            });
            this.value = '';
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
