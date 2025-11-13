<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Detail Portofolio - Publik</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
body {
  font-family: 'Poppins', sans-serif;
  background: linear-gradient(135deg, #2b1055, #7597de);
  color: white;
  min-height: 100vh;
  padding: 20px 10px;
}
.detail-card {
  background: rgba(255,255,255,0.1);
  backdrop-filter: blur(12px);
  border-radius: 20px;
  padding: 25px;
  border: 1px solid rgba(255,255,255,0.2);
  box-shadow: 0 8px 20px rgba(0,0,0,0.2);
  max-width: 900px;
  width: 100%;
  margin: auto;
}
h1.title {
  text-transform: uppercase;
  text-align: center;
  font-weight: 700;
  font-size: 1.6rem;
  margin-bottom: 20px;
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
.video-wrapper {
  position: relative;
  width: 100%;
  padding-bottom: 56.25%;
  margin-bottom: 15px;
}
.video-wrapper iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
.btn-back {
  background-color: #ffc107;
  border: none;
  color: black;
  font-weight: 600;
  width: 100%;
  max-width: 200px;
}
.comment-box {
  background: rgba(255,255,255,0.15);
  border-radius: 10px;
  padding: 15px;
  margin-top: 20px;
}
.comment-item {
  background: rgba(255,255,255,0.9);
  color: black;
  padding: 10px;
  border-radius: 8px;
  margin-top: 10px;
}
.comment-item .name {
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
    <div id="videoContainer" class="video-wrapper"></div>
  </div>

  <!-- 🧾 PENILAIAN -->
  <div id="penilaianSection" class="white-box" style="display:none;">
    <h5 class="fw-bold mb-3">🧾 Form Penilaian Dosen</h5>

    <div id="formPenilaian">
      <div class="row g-2">
        <div class="col-md-6">
          <label class="form-label fw-bold">Nilai Presentasi</label>
          <input type="number" id="nilaiPresentasi" class="form-control" min="0" max="100">
        </div>
        <div class="col-md-6">
          <label class="form-label fw-bold">Nilai Inovasi</label>
          <input type="number" id="nilaiInovasi" class="form-control" min="0" max="100">
        </div>
        <div class="col-md-6 mt-2">
          <label class="form-label fw-bold">Nilai Kreativitas</label>
          <input type="number" id="nilaiKreativitas" class="form-control" min="0" max="100">
        </div>
        <div class="col-md-6 mt-2">
          <label class="form-label fw-bold">Nilai Tata Kelola</label>
          <input type="number" id="nilaiTataKelola" class="form-control" min="0" max="100">
        </div>
      </div>
      <button id="simpanNilai" class="btn btn-success w-100 mt-3 fw-bold">💾 Simpan Nilai</button>
    </div>

    <div id="hasilPenilaian" class="mt-3"></div>
  </div>

  <!-- 💬 KOMENTAR -->
  <div class="white-box comment-box">
    <h5 class="fw-bold mb-3">💬 Kolom Komentar</h5>
    <textarea id="commentText" class="form-control mb-2" rows="3" placeholder="Tulis komentar..."></textarea>
    <button class="btn btn-warning w-100 fw-bold" id="submitComment">Kirim Komentar</button>
    <div id="commentList" class="mt-3"></div>
  </div>

  <div class="mt-4 text-center">
    <a href="Teknik Informatika.php" class="btn btn-back px-4">⬅️ Kembali</a>
  </div>
</div>

<script>
const allPortfolios = JSON.parse(localStorage.getItem("allPortfolios")) || [];
const index = parseInt(localStorage.getItem("selectedPortfolio"));
const data = allPortfolios[index];

if(!data){
  document.body.innerHTML = "<h3 class='text-center text-white'>❌ Portofolio tidak ditemukan.</h3>";
} else {
  document.getElementById("judul").textContent = data.judul.toUpperCase();
  document.getElementById("nama").textContent = data.nama;
  document.getElementById("nim").textContent = data.nim || "-";
  document.getElementById("jurusan").textContent = data.jurusan || "-";
  document.getElementById("kategori").textContent = data.kategori;
  document.getElementById("tanggal").textContent = data.tanggal;
  document.getElementById("deskripsi").textContent = data.deskripsi;

  const fileContainer = document.getElementById("fileContainer");
  if(data.file){
    const pdfLink = document.createElement("a");
    pdfLink.href = data.file;
    pdfLink.target = "_blank";
    pdfLink.className = "btn btn-sm btn-outline-primary mt-2";
    pdfLink.textContent = "📄 Lihat / Download File PDF";
    fileContainer.appendChild(pdfLink);
  } else fileContainer.innerHTML = "<p class='text-muted'>Tidak ada file utama.</p>";

  document.getElementById("poster").src = data.poster || "https://via.placeholder.com/400x250?text=No+Poster";

  const galleryContainer = document.getElementById("galleryContainer");
  if(data.gallery && data.gallery.length > 0){
    data.gallery.forEach(imgURL=>{
      const col = document.createElement("div");
      col.className = "col-12 col-sm-6 col-md-4";
      const img = document.createElement("img");
      img.src = imgURL;
      col.appendChild(img);
      galleryContainer.appendChild(col);
    });
  } else galleryContainer.innerHTML = "<p class='text-muted'>Tidak ada galeri tambahan.</p>";

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
      videoContainer.innerHTML = `<iframe src="https://www.youtube.com/embed/${youtubeId}" frameborder="0" allowfullscreen></iframe>`;
    } else videoContainer.innerHTML = "<p class='text-muted'>Link YouTube tidak valid.</p>";
  } else videoContainer.innerHTML = "<p class='text-muted'>Tidak ada video YouTube.</p>";
}

/* ===== Penilaian Dosen ===== */
const isDosen = JSON.parse(localStorage.getItem("isDosen"));
const penilaianSection = document.getElementById("penilaianSection");
const hasilPenilaian = document.getElementById("hasilPenilaian");
const formPenilaian = document.getElementById("formPenilaian");
const nilaiKey = `penilaian_${(data?.judul || "unknown").replace(/\s+/g, "_")}_${data?.nim || "anon"}`;
const existing = JSON.parse(localStorage.getItem(nilaiKey));

if(isDosen){
  penilaianSection.style.display = "block";
  if(existing){
    tampilkanHasil(existing);
    // isi form dengan nilai lama
    document.getElementById("nilaiPresentasi").value = existing.p;
    document.getElementById("nilaiInovasi").value = existing.i;
    document.getElementById("nilaiKreativitas").value = existing.k;
    document.getElementById("nilaiTataKelola").value = existing.t;
  }
} else if(existing){
  penilaianSection.style.display = "block";
  formPenilaian.style.display = "none";
  tampilkanHasil(existing);
}

document.getElementById("simpanNilai").addEventListener("click", ()=>{
  const p = parseFloat(document.getElementById("nilaiPresentasi").value)||0;
  const i = parseFloat(document.getElementById("nilaiInovasi").value)||0;
  const k = parseFloat(document.getElementById("nilaiKreativitas").value)||0;
  const t = parseFloat(document.getElementById("nilaiTataKelola").value)||0;
  const total = ((p+i+k+t)/4).toFixed(2);

  const hasil = {
    nama: data.nama,
    nim: data.nim,
    judul: data.judul,
    kategori: data.kategori,
    p,i,k,t,total,
    date: new Date().toLocaleString("id-ID")
  };

  localStorage.setItem(nilaiKey, JSON.stringify(hasil));

  // update global riwayat, otomatis edit jika sudah ada
  const allPenilaian = JSON.parse(localStorage.getItem("allPenilaian")) || [];
  const existIndex = allPenilaian.findIndex(x => x.nim === data.nim && x.judul === data.judul);
  if (existIndex >= 0) allPenilaian[existIndex] = hasil;
  else allPenilaian.push(hasil);
  localStorage.setItem("allPenilaian", JSON.stringify(allPenilaian));

  tampilkanHasil(hasil);
});

function tampilkanHasil(d){
  hasilPenilaian.innerHTML = `
    <div class='mt-3 p-2 bg-light rounded'>
      <p><strong>Presentasi:</strong> ${d.p}</p>
      <p><strong>Inovasi:</strong> ${d.i}</p>
      <p><strong>Kreativitas:</strong> ${d.k}</p>
      <p><strong>Tata Kelola:</strong> ${d.t}</p>
      <hr>
      <h6 class='fw-bold'>Total Nilai: ${d.total}</h6>
      <small class='text-muted'>Dinilai pada: ${d.date}</small>
    </div>`;
}

/* ===== Komentar ===== */
const commentKey = `comments_${(data?.judul || "unknown").replace(/\s+/g, "_")}_${data?.nim || "anon"}`;
let comments = JSON.parse(localStorage.getItem(commentKey)) || [];
const commentList = document.getElementById("commentList");

function renderComments() {
  commentList.innerHTML = comments.length
    ? comments.map(c => `
      <div class="comment-item">
        <div class="name">${c.name}</div>
        <div class="text">${c.text}</div>
        <small class="text-muted">${c.date}</small>
      </div>
    `).join('')
    : "<p class='text-light'>Belum ada komentar.</p>";
}
renderComments();

document.getElementById("submitComment").addEventListener("click", () => {
  const text = document.getElementById("commentText").value.trim();
  if(!text) return alert("Komentar tidak boleh kosong!");
  const newComment = { name: "Pengunjung", text, date: new Date().toLocaleString("id-ID") };
  comments.unshift(newComment);
  localStorage.setItem(commentKey, JSON.stringify(comments));
  document.getElementById("commentText").value = "";
  renderComments();
});
</script>
</body>
</html>
