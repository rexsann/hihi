<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Detail Portofolio Mahasiswa - Polibatam</title>
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
.detail-card {
  background: rgba(255,255,255,0.1);
  backdrop-filter: blur(12px);
  border-radius: 20px;
  padding: 30px;
  border: 1px solid rgba(255,255,255,0.2);
  box-shadow: 0 8px 20px rgba(0,0,0,0.2);
  max-width: 900px;
  width: 100%;
}
h1.title {
  text-transform: uppercase;
  text-align: center;
  font-weight: 700;
  font-size: 1.8rem;
  margin-bottom: 25px;
}
.white-box {
  background: white;
  color: black;
  border-radius: 10px;
  padding: 15px 20px;
  margin-bottom: 20px;
}
img, iframe {
  border-radius: 10px;
  width: 100%;
}
.gallery img {
  width: 100%;
  height: 150px;
  object-fit: contain;
  margin-bottom: 10px;
  border-radius: 10px;
}
.btn-edit {
  background-color: #007bff;
  border: none;
  color: white;
  font-weight: 600;
}
.btn-delete {
  background-color: #dc3545;
  border: none;
  color: white;
  font-weight: 600;
}
.btn-back {
  background-color: #ffc107;
  border: none;
  color: black;
  font-weight: 600;
}
</style>
</head>
<body>
<div class="detail-card">
  <h1 id="judul" class="title">Judul Proyek</h1>

  <div class="white-box">
    <p><strong>Nama:</strong> <span id="nama"></span></p>
    <p><strong>NIM:</strong> <span id="nim"></span></p>
    <p><strong>Jurusan:</strong> <span id="jurusan"></span></p>
    <p><strong>Kategori:</strong> <span id="kategori"></span></p>
    <p><strong>Tanggal Upload:</strong> <span id="tanggal"></span></p>
  </div>

  <div class="white-box">
    <p class="fw-bold mb-1">Deskripsi Proyek:</p>
    <p id="deskripsi"></p>
  </div>

  <div class="white-box">
    <h5 class="fw-bold">📁 File Utama:</h5>
    <div id="fileContainer"></div>
  </div>

  <div class="white-box">
    <h5 class="fw-bold">🖼️ Poster:</h5>
    <img id="poster" alt="Poster Portofolio" class="mb-2">
  </div>

  <div class="white-box">
    <h5 class="fw-bold">📷 Galeri Tambahan:</h5>
    <div class="row g-3 gallery" id="galleryContainer"></div>
  </div>

  <div class="white-box">
    <h5 class="fw-bold">🎥 Video YouTube:</h5>
    <div id="videoContainer"></div>
  </div>

  <div class="mt-4 d-flex justify-content-between">
    <button class="btn btn-edit px-4" onclick="goToEdit()">✏️ Edit</button>
    <button class="btn btn-delete px-4" onclick="hapusData()">🗑️ Hapus</button>
    <a href="hasil.php" class="btn btn-back px-4">⬅️ Kembali</a>
  </div>
</div>

<script>
const currentUser = JSON.parse(localStorage.getItem("currentUser"));
if(!currentUser || !currentUser.nim){
  alert("⚠️ Silakan login terlebih dahulu!");
  window.location.href = "login.php";
}

// Ambil data portofolio berdasarkan user yang login
const allPortfolios = JSON.parse(localStorage.getItem("portfolios_" + currentUser.nim)) || [];
const index = parseInt(localStorage.getItem("selectedPortfolio"));
const data = allPortfolios[index];

if(!data){
  document.body.innerHTML = "<h3 class='text-center text-white'>❌ Portofolio tidak ditemukan.</h3>";
} else {
  document.getElementById("judul").textContent = data.judul.toUpperCase();
  document.getElementById("nama").textContent = data.nama;
  document.getElementById("nim").textContent = data.nim;
  document.getElementById("jurusan").textContent = data.jurusan;
  document.getElementById("kategori").textContent = data.kategori;
  document.getElementById("tanggal").textContent = data.tanggal;
  document.getElementById("deskripsi").textContent = data.deskripsi;

  // File utama
  const fileContainer = document.getElementById("fileContainer");
  if(data.file){
    const pdfLink = document.createElement("a");
    pdfLink.href = data.file;
    pdfLink.target = "_blank";
    pdfLink.className = "btn btn-sm btn-outline-primary mt-2";
    pdfLink.textContent = "📄 Lihat / Download File PDF";
    fileContainer.appendChild(pdfLink);
  } else fileContainer.innerHTML = "<p class='text-muted'>Tidak ada file utama.</p>";

  // Poster
  document.getElementById("poster").src = data.poster || "https://via.placeholder.com/400x250?text=No+Poster";

  // Galeri
  const galleryContainer = document.getElementById("galleryContainer");
  if(data.gallery && data.gallery.length > 0){
    data.gallery.forEach(imgURL=>{
      const col = document.createElement("div");
      col.className = "col-md-4";
      const img = document.createElement("img");
      img.src = imgURL;
      col.appendChild(img);
      galleryContainer.appendChild(col);
    });
  } else galleryContainer.innerHTML = "<p class='text-muted'>Tidak ada galeri tambahan.</p>";

  // Video YouTube
  const videoContainer = document.getElementById("videoContainer");
  if(data.youtube){
    let youtubeId = "";
    if(data.youtube.includes("youtu.be/")){
      youtubeId = data.youtube.split("youtu.be/")[1].split(/[?&]/)[0];
    } else if(data.youtube.includes("watch?v=")){
      youtubeId = data.youtube.split("v=")[1].split("&")[0];
    } else if(data.youtube.includes("embed/")){
      youtubeId = data.youtube.split("embed/")[1].split(/[?&]/)[0];
    }
    if(youtubeId){
      videoContainer.innerHTML = `<iframe width="100%" height="315" src="https://www.youtube.com/embed/${youtubeId}" frameborder="0" allowfullscreen></iframe>`;
    } else videoContainer.innerHTML = "<p class='text-muted'>Link YouTube tidak valid.</p>";
  } else videoContainer.innerHTML = "<p class='text-muted'>Tidak ada video YouTube.</p>";
}

function goToEdit(){
  window.location.href = "edit.php";
}

function hapusData(){
  if(confirm("Yakin ingin menghapus portofolio ini?")){
    allPortfolios.splice(index,1);
    localStorage.setItem("portfolios_" + currentUser.nim, JSON.stringify(allPortfolios));
    alert("🗑️ Portofolio berhasil dihapus!");
    window.location.href = "hasil.php";
  }
}
</script>
</body>
</html>
