<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Portofolio Mahasiswa - Polibatam</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #2b1055, #7597de);
      color: white;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: start;
      padding: 40px 10px;
    }
    .upload-card {
      background: rgba(255,255,255,0.1);
      backdrop-filter: blur(12px);
      border-radius: 20px;
      padding: 30px;
      border: 1px solid rgba(255,255,255,0.2);
      box-shadow: 0 8px 20px rgba(0,0,0,0.2);
      max-width: 800px;
      width: 100%;
    }
    label {
      font-weight: 600;
      color: #fff;
    }
    input, textarea, select {
      border-radius: 10px !important;
    }
    .btn-save {
      background-color: #28a745;
      border: none;
      font-weight: 600;
    }
    .btn-back {
      background-color: #ffc107;
      border: none;
      font-weight: 600;
      color: black;
    }
  </style>
</head>
<body>
  <div class="upload-card">
    <h2 class="fw-bold text-center mb-4">✏️ Edit Portofolio Mahasiswa</h2>

    <form id="editForm">
      <div class="mb-3">
        <label for="judul">Judul Proyek</label>
        <input type="text" id="judul" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="nama">Nama</label>
        <input type="text" id="nama" class="form-control" readonly>
      </div>

      <div class="mb-3">
        <label for="nim">NIM</label>
        <input type="text" id="nim" class="form-control" readonly>
      </div>

      <div class="mb-3">
        <label for="jurusan">Jurusan</label>
        <input type="text" id="jurusan" class="form-control" readonly>
      </div>

      <div class="mb-3">
        <label for="kategori">Kategori</label>
        <select id="kategori" class="form-select" required>
          <option value="Aplikasi Web">Aplikasi Web</option>
          <option value="Aplikasi Mobile">Aplikasi Mobile</option>
          <option value="Aplikasi IoT">Aplikasi IoT</option>
          <option value="Artificial Intelligence">Artificial Intelligence</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="deskripsi">Deskripsi Proyek</label>
        <textarea id="deskripsi" class="form-control" rows="4" required></textarea>
      </div>

      <div class="mb-3">
        <label for="file">File Utama (PDF)</label>
        <input type="file" id="file" class="form-control" accept=".pdf">
      </div>

      <div class="mb-3">
        <label for="poster">Poster Proyek (Gambar)</label>
        <input type="file" id="poster" class="form-control" accept="image/*">
      </div>

      <div class="mb-3">
        <label for="gallery">Galeri Tambahan (Beberapa Gambar)</label>
        <input type="file" id="gallery" class="form-control" multiple accept="image/*">
      </div>

      <div class="mb-3">
        <label for="youtube">Link Video YouTube</label>
        <input type="url" id="youtube" class="form-control" placeholder="https://www.youtube.com/watch?v=...">
      </div>

      <div class="text-center mt-4">
        <button type="submit" class="btn btn-save px-4 py-2 text-white">💾 Simpan Perubahan</button>
        <a href="detail_hasil.php" class="btn btn-back px-4 py-2 ms-2">⬅️ Kembali</a>
      </div>
    </form>
  </div>

  <script>
  const currentUser = JSON.parse(localStorage.getItem("currentUser"));
  if(!currentUser || !currentUser.nim){
    alert("⚠️ Silakan login terlebih dahulu!");
    window.location.href = "login.php";
  }

  // Ambil data sesuai user yang login
  const allPortfolios = JSON.parse(localStorage.getItem("portfolios_" + currentUser.nim)) || [];
  const index = parseInt(localStorage.getItem("selectedPortfolio"));
  const data = allPortfolios[index];

  // === TAMPILKAN DATA KE FORM ===
  if (data) {
    document.getElementById("judul").value = data.judul;
    document.getElementById("nama").value = data.nama;
    document.getElementById("nim").value = data.nim;
    document.getElementById("jurusan").value = data.jurusan;
    document.getElementById("kategori").value = data.kategori;
    document.getElementById("deskripsi").value = data.deskripsi;
    document.getElementById("youtube").value = data.youtube || "";
  }

  // === FUNGSI SIMPAN PERUBAHAN ===
  document.getElementById("editForm").addEventListener("submit", function(e) {
    e.preventDefault();

    const readerPromises = [];
    const updatedData = { ...data };

    updatedData.judul = document.getElementById("judul").value;
    updatedData.kategori = document.getElementById("kategori").value;
    updatedData.deskripsi = document.getElementById("deskripsi").value;
    updatedData.youtube = document.getElementById("youtube").value;

    // === FILE PDF ===
    const fileInput = document.getElementById("file");
    if (fileInput.files[0]) {
      const fileReader = new FileReader();
      readerPromises.push(new Promise(resolve => {
        fileReader.onload = e => {
          updatedData.file = e.target.result;
          resolve();
        };
        fileReader.readAsDataURL(fileInput.files[0]);
      }));
    }

    // === POSTER ===
    const posterInput = document.getElementById("poster");
    if (posterInput.files[0]) {
      const posterReader = new FileReader();
      readerPromises.push(new Promise(resolve => {
        posterReader.onload = e => {
          updatedData.poster = e.target.result;
          resolve();
        };
        posterReader.readAsDataURL(posterInput.files[0]);
      }));
    }

    // === GALERI ===
    const galleryInput = document.getElementById("gallery");
    if (galleryInput.files.length > 0) {
      updatedData.gallery = [];
      for (let file of galleryInput.files) {
        const imgReader = new FileReader();
        readerPromises.push(new Promise(resolve => {
          imgReader.onload = e => {
            updatedData.gallery.push(e.target.result);
            resolve();
          };
          imgReader.readAsDataURL(file);
        }));
      }
    }

    Promise.all(readerPromises).then(() => {
      allPortfolios[index] = updatedData;
      localStorage.setItem("portfolios_" + currentUser.nim, JSON.stringify(allPortfolios));
      alert("✅ Portofolio berhasil diperbarui!");
      window.location.href = "detail_hasil.php";
    });
  });
</script>

</body>
</html>
