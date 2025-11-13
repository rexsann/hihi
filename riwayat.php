<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Riwayat Penilaian Dosen - Polibatam</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<style>
body {
  font-family: 'Poppins', sans-serif;
  background: linear-gradient(135deg, #2b1055, #7597de);
  color: #fff;
  min-height: 100vh;
  margin: 0;
  padding: 40px 20px;
}
.container {
  max-width: 1100px;
  margin: auto;
  background: rgba(255,255,255,0.08);
  backdrop-filter: blur(15px);
  border-radius: 20px;
  padding: 35px 40px;
  box-shadow: 0 8px 25px rgba(0,0,0,0.2);
}
h2 {
  text-align: center;
  font-weight: 700;
  margin-bottom: 25px;
}
.search-bar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 25px;
  flex-wrap: wrap;
  gap: 10px;
}
.search-bar input, .search-bar select {
  padding: 10px 15px;
  border-radius: 10px;
  border: none;
  outline: none;
  background: rgba(255,255,255,0.2);
  color: #fff;
  font-family: 'Poppins';
  width: 48%;
  appearance: none;
  -webkit-appearance: none;
}
.search-bar select option {
  background: #2b1055;
  color: #fff;
}
.search-bar input::placeholder {
  color: rgba(255,255,255,0.8);
}
table {
  width: 100%;
  border-collapse: collapse;
  border-radius: 12px;
  overflow: hidden;
  background: rgba(255,255,255,0.15);
}
th, td {
  padding: 14px 16px;
  text-align: left;
  border-top: 1px solid rgba(255,255,255,0.1);
}
thead {
  background: rgba(255,255,255,0.2);
}
th {
  font-weight: 600;
  color: #e0e8ff;
}
td {
  color: #fff;
}
.status {
  padding: 5px 12px;
  border-radius: 10px;
  font-weight: 600;
  font-size: 13px;
  background: rgba(0, 255, 170, 0.2);
  color: #00ffb7;
}
.btn-detail, .btn-hapus, .btn-kembali {
  border: none;
  padding: 8px 14px;
  border-radius: 10px;
  font-weight: 600;
  cursor: pointer;
  transition: 0.3s;
  color: #fff;
}
.btn-detail { background: linear-gradient(90deg, #00bfff, #007bff); }
.btn-hapus { background: linear-gradient(90deg, #ff5f6d, #ff3c3c); }
.btn-kembali { background: linear-gradient(90deg, #06d6a0, #1b9aaa); }
.btn-detail:hover, .btn-hapus:hover, .btn-kembali:hover {
  transform: scale(1.05);
  opacity: 0.9;
}
.actions {
  display: flex;
  justify-content: center;
  margin-top: 25px;
}
footer {
  text-align: center;
  font-size: 0.9em;
  color: #cce7ff;
  margin-top: 50px;
}
.modal {
  display: none;
  position: fixed;
  top: 0; left: 0; width: 100%; height: 100%;
  background: rgba(0,0,0,0.6);
  justify-content: center;
  align-items: center;
  z-index: 999;
}
.modal-content {
  background: rgba(255,255,255,0.1);
  backdrop-filter: blur(15px);
  border-radius: 15px;
  padding: 30px;
  text-align: center;
  box-shadow: 0 0 20px rgba(255,255,255,0.2);
}
.modal button {
  margin: 10px;
  border: none;
  padding: 8px 15px;
  border-radius: 8px;
  cursor: pointer;
  font-weight: 600;
}
#confirmYes { background: #ff4b4b; color: #fff; }
#confirmNo { background: #ccc; color: #000; }

/* Toast Notification */
.toast {
  position: fixed;
  bottom: 30px;
  right: 30px;
  background: rgba(0, 255, 170, 0.9);
  color: #000;
  padding: 12px 20px;
  border-radius: 12px;
  font-weight: 600;
  box-shadow: 0 4px 15px rgba(0,0,0,0.3);
  opacity: 0;
  transform: translateY(20px);
  transition: all 0.4s ease;
  z-index: 1000;
}
.toast.show {
  opacity: 1;
  transform: translateY(0);
}
</style>
</head>
<body>
<div class="container">
  <h2>Riwayat Penilaian Dosen</h2>

  <div class="search-bar">
    <input type="text" id="searchInput" placeholder="🔍 Cari berdasarkan Nama, NIM, atau Kategori...">
    <select id="filterKategori">
      <option value="">Semua Kategori</option>
      <option value="Aplikasi Web">Aplikasi Web</option>
      <option value="Aplikasi Mobile">Aplikasi Mobile</option>
      <option value="Aplikasi IoT">Aplikasi IoT</option>
      <option value="Artificial Intelligence">Artificial Intelligence</option>
    </select>
  </div>

  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Mahasiswa</th>
        <th>NIM</th>
        <th>Kategori</th>
        <th>Judul Karya</th>
        <th>Total Nilai</th>
        <th>Status</th>
        <th>Tanggal Penilaian</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody id="tabelRiwayat"></tbody>
  </table>

  <div class="actions">
    <button class="btn-kembali" onclick="kembali()">⬅️ Kembali ke Home</button>
  </div>
</div>

<!-- Modal Konfirmasi -->
<div class="modal" id="modalConfirm">
  <div class="modal-content">
    <p>Yakin ingin menghapus penilaian ini?</p>
    <button id="confirmYes">Ya</button>
    <button id="confirmNo">Tidak</button>
  </div>
</div>

<!-- Toast Notification -->
<div id="toast" class="toast">Penilaian berhasil dihapus dan disinkronkan ✅</div>

<footer>© 2025 Polibatam Creative Lab — Riwayat Penilaian</footer>

<script>
const tabelRiwayat = document.getElementById("tabelRiwayat");
let allPenilaian = JSON.parse(localStorage.getItem("allPenilaian")) || [];
let allPortfolios = JSON.parse(localStorage.getItem("allPortfolios")) || [];
let deleteIndex = null;

// 🔍 Render tabel (kategori fix)
function renderTabel(filterText = "", kategori = "") {
  tabelRiwayat.innerHTML = "";
  const filtered = allPenilaian.filter(p => {
    const dataPorto = allPortfolios.find(x => x.nim === p.nim && x.judul === p.judul);
    const kategoriPorto = dataPorto ? (dataPorto.kategori || "Lainnya") : (p.kategori || "Lainnya");

    const matchText =
      p.nama.toLowerCase().includes(filterText.toLowerCase()) ||
      (p.nim && p.nim.toLowerCase().includes(filterText.toLowerCase())) ||
      (kategoriPorto && kategoriPorto.toLowerCase().includes(filterText.toLowerCase()));

    const matchKategori =
      kategori === "" || kategoriPorto.toLowerCase() === kategori.toLowerCase();

    return matchText && matchKategori;
  });

  if (filtered.length === 0) {
    tabelRiwayat.innerHTML = `<tr><td colspan="9" style="text-align:center;">Data tidak ditemukan</td></tr>`;
    return;
  }

  filtered.forEach((p, index) => {
    const dataPorto = allPortfolios.find(x => x.nim === p.nim && x.judul === p.judul);
    const kategoriPorto = dataPorto ? (dataPorto.kategori || "Lainnya") : (p.kategori || "Lainnya");

    tabelRiwayat.innerHTML += `
      <tr>
        <td>${index + 1}</td>
        <td>${p.nama}</td>
        <td>${p.nim || '-'}</td>
        <td>${kategoriPorto}</td>
        <td>${p.judul}</td>
        <td>${p.total}</td>
        <td><span class="status">Dipublikasikan</span></td>
        <td>${p.date}</td>
        <td>
          <button class="btn-detail" onclick="lihatDetail(${index})">Detail</button>
          <button class="btn-hapus" onclick="konfirmasiHapus(${index})">Hapus</button>
        </td>
      </tr>
    `;
  });
}

// 🔍 Event search & filter
document.getElementById("searchInput").addEventListener("input", e => {
  renderTabel(e.target.value, document.getElementById("filterKategori").value);
});
document.getElementById("filterKategori").addEventListener("change", e => {
  renderTabel(document.getElementById("searchInput").value, e.target.value);
});

// 🧾 Detail
function lihatDetail(index) {
  const penilaian = allPenilaian[index];
  const portfolioIndex = allPortfolios.findIndex(
    x => x.nim === penilaian.nim && x.judul === penilaian.judul
  );
  if (portfolioIndex >= 0) {
    localStorage.setItem("selectedPortfolio", portfolioIndex);
    window.location.href = "detail.html";
  } else {
    alert("⚠️ Portofolio mahasiswa tidak ditemukan.");
  }
}

// 🗑️ Konfirmasi hapus
function konfirmasiHapus(index) {
  deleteIndex = index;
  document.getElementById("modalConfirm").style.display = "flex";
}
document.getElementById("confirmYes").onclick = () => {
  hapusPenilaian(deleteIndex);
  document.getElementById("modalConfirm").style.display = "none";
};
document.getElementById("confirmNo").onclick = () => {
  document.getElementById("modalConfirm").style.display = "none";
};

// ❌ Hapus data + sinkronisasi
function hapusPenilaian(index) {
  const penilaian = allPenilaian[index];

  // Hapus dari array utama
  allPenilaian.splice(index, 1);
  localStorage.setItem("allPenilaian", JSON.stringify(allPenilaian));

  // Hapus juga nilai individual (sinkron ke detail.html)
  if (penilaian && penilaian.nim && penilaian.judul) {
    const nilaiKey = `penilaian_${penilaian.judul.replace(/\s+/g, "_")}_${penilaian.nim}`;
    localStorage.removeItem(nilaiKey);
  }

  renderTabel(document.getElementById("searchInput").value, document.getElementById("filterKategori").value);
  showToast("✅ Penilaian berhasil dihapus dan disinkronkan!");
}

// 🔔 Toast Notification
function showToast(message) {
  const toast = document.getElementById("toast");
  toast.textContent = message;
  toast.classList.add("show");
  setTimeout(() => {
    toast.classList.remove("show");
  }, 3000);
}

// 🔙 Kembali
function kembali() {
  window.location.href = "home.php";
}

renderTabel();
</script>
</body>
</html>
