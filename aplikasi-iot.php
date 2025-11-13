<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kategori Portofolio - Polibatam</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
  font-family: 'Poppins', sans-serif;
  background: linear-gradient(135deg, #2b1055, #7597de);
  color: white;
  min-height: 100vh;
  padding-top: 50px;
}
.card {
  background: rgba(255,255,255,0.1);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255,255,255,0.2);
  border-radius: 15px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.2);
  transition: transform 0.2s ease;
  color: white;
}
.card:hover { transform: translateY(-5px); }
.card img {
  width: 100%;
  height: 200px;
  object-fit: contain;
  border-radius: 10px;
  background-color: rgba(255,255,255,0.1);
}
.btn-detail {
  background-color: #17a2b8;
  color: white;
  border: none;
  font-weight: 600;
}
.btn-detail:hover { background-color: #0d6efd; }
.btn-back {
  background-color: #ffc107;
  color: black;
  border: none;
  font-weight: 600;
}
</style>
</head>
<body>
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <a href="Teknik Informatika.php" class="btn btn-back">⬅️ Kembali</a>
    <h3 id="judulKategori" class="text-center flex-grow-1">🌐 Kategori</h3>
  </div>

  <div id="portfolioList" class="row g-4"></div>
</div>

<script>
const allPortfolios = JSON.parse(localStorage.getItem("allPortfolios")) || [];
const container = document.getElementById("portfolioList");

// Ambil kategori dari URL (contoh: kategori.html?kategori=Artificial%20Intelligence)
const params = new URLSearchParams(window.location.search);
const kategoriDipilih = params.get("kategori") || "IoT";

// Set judul kategori di halaman
document.getElementById("judulKategori").textContent = `🌐 Kategori: ${kategoriDipilih}`;

// Filter portofolio berdasarkan kategori
const filtered = allPortfolios
  .map((p, index) => ({...p, index}))
  .filter(p => p.kategori === kategoriDipilih);

if (filtered.length === 0) {
  container.innerHTML = `<p class="text-center fs-5">Belum ada portofolio untuk kategori ${kategoriDipilih}.</p>`;
} else {
  filtered.forEach(p => {
    const col = document.createElement("div");
    col.className = "col-md-6 col-lg-4 d-flex";
    col.innerHTML = `
      <div class="card w-100 p-3 d-flex flex-column">
        <img src="${p.poster || 'https://via.placeholder.com/400x200?text=No+Poster'}" alt="Poster">
        <h5 class="mt-3">${p.judul}</h5>
        <p class="mb-1"><strong>${p.nama}</strong> (${p.nim})</p>
        <p class="mb-2">${p.kategori}</p>
        <button class="btn btn-detail mt-auto w-100" onclick="lihatDetail(${p.index})">Detail</button>
      </div>`;
    container.appendChild(col);
  });
}

function lihatDetail(index) {
  localStorage.setItem("selectedPortfolio", index);
  window.location.href = "detail.php";
}
</script>
</body>
</html>
