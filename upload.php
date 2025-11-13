<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Upload Portofolio Mahasiswa - Polibatam</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<style>
body { font-family:'Poppins',sans-serif; background:linear-gradient(135deg,#2b1055,#7597de); color:white; min-height:100vh; display:flex; flex-direction:column; }
.card { background: rgba(255,255,255,0.1); backdrop-filter: blur(15px); border-radius: 15px; padding: 20px; }
.btn-back { background-color: #ffc107; color: black; font-weight:600; }
.btn-back:hover { background-color: #e0a800; }
</style>
</head>
<body>

<div class="container py-5 flex-grow-1">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <a href="hasil.php" class="btn btn-back">⬅️ Kembali</a>
    <h2 class="text-center flex-grow-1 fw-bold m-0">📤 Upload Portofolio</h2>
    <div style="width: 80px;"></div>
  </div>

  <div class="card shadow-lg p-4">
    <form id="portfolioForm">
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Nama</label>
          <input type="text" class="form-control" id="nama" readonly>
        </div>
        <div class="col-md-6">
          <label class="form-label">NIM</label>
          <input type="text" class="form-control" id="nim" readonly>
        </div>
      </div>

      <div class="row g-3 mt-2">
        <div class="col-md-6">
          <label class="form-label">Judul Proyek</label>
          <input type="text" class="form-control" id="judul" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Kategori</label>
          <select class="form-select" id="kategori" required>
            <option value="">Pilih Kategori</option>
          </select>
        </div>
      </div>

      <div class="mt-3">
        <label class="form-label">Deskripsi</label>
        <textarea class="form-control" id="deskripsi" rows="4" required></textarea>
      </div>

      <div class="mt-3">
        <label class="form-label">File Utama (PDF)</label>
        <input type="file" class="form-control" id="fileUtama" accept=".pdf">
      </div>

      <div class="mt-3">
        <label class="form-label">Poster / Thumbnail</label>
        <input type="file" class="form-control" id="poster" accept="image/*">
      </div>

      <div class="mt-3">
        <label class="form-label">Link Video YouTube (opsional)</label>
        <input type="url" class="form-control" id="youtube" placeholder="https://www.youtube.com/watch?v=xxxxxx">
      </div>

      <div class="mt-3">
        <label class="form-label">Gallery Tambahan (opsional)</label>
        <input type="file" class="form-control" id="gallery" accept="image/*" multiple>
      </div>

      <div class="mt-4 text-center">
        <button type="submit" class="btn btn-primary w-100 fw-bold">Upload / Simpan</button>
      </div>
    </form>
  </div>
</div>

<script>
const currentUser = JSON.parse(localStorage.getItem("currentUser"));
if(!currentUser || !currentUser.nim){
  alert("⚠️ Silakan login terlebih dahulu!");
  window.location.href = "login.php";
}
document.getElementById("nama").value = currentUser.nama;
document.getElementById("nim").value = currentUser.nim;

const kategoriMap = {
  "Teknik Informatika": ["Aplikasi Web","Aplikasi Mobile","IoT","Artificial Intelligence"],
  "Teknik Mesin": ["Mesin Motor","Mesin Mobil"],
  "Teknik Elektro": ["IoT Project","Robotika"],
  "Manajemen Bisnis": ["Business Plan","Digital Marketing"]
};

const kategoriSelect = document.getElementById("kategori");
if(kategoriMap[currentUser.jurusan]){
  kategoriMap[currentUser.jurusan].forEach(k => {
    const opt = document.createElement("option");
    opt.value = k;
    opt.textContent = k;
    kategoriSelect.appendChild(opt);
  });
}

document.getElementById("portfolioForm").addEventListener("submit", async (e)=>{
  e.preventDefault();

  const readFile = (file) => new Promise(resolve=>{
    const reader = new FileReader();
    reader.onload = e => resolve(e.target.result);
    reader.readAsDataURL(file);
  });

  const posterFile = document.getElementById("poster").files[0];
  const fileUtama = document.getElementById("fileUtama").files[0];
  const galleryFiles = document.getElementById("gallery").files;
  const galleryURLs = galleryFiles.length ? await Promise.all(Array.from(galleryFiles).map(readFile)) : [];

  const newPortfolio = {
    nama: currentUser.nama,
    nim: currentUser.nim,
    jurusan: currentUser.jurusan,
    judul: document.getElementById("judul").value,
    kategori: document.getElementById("kategori").value,
    deskripsi: document.getElementById("deskripsi").value,
    file: fileUtama ? await readFile(fileUtama) : "",
    poster: posterFile ? await readFile(posterFile) : "",
    youtube: document.getElementById("youtube").value.trim(),
    gallery: galleryURLs,
    tanggal: new Date().toLocaleString()
  };

  // Simpan ke user-specific
  let portfolios = JSON.parse(localStorage.getItem("portfolios_" + currentUser.nim)) || [];
  portfolios.push(newPortfolio);
  localStorage.setItem("portfolios_" + currentUser.nim, JSON.stringify(portfolios));

  // Simpan ke global agar muncul di kategori
  let allPortfolios = JSON.parse(localStorage.getItem("allPortfolios")) || [];
  allPortfolios.push(newPortfolio);
  localStorage.setItem("allPortfolios", JSON.stringify(allPortfolios));

  alert("✅ Portofolio berhasil diunggah!");
  window.location.href = "hasil.php";
});
</script>
</body>
</html>
