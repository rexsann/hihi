<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Portofolio Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f5f7fa;
      font-family: 'Poppins', sans-serif;
    }
    .poster {
      width: 100%;
      max-height: 300px;
      object-fit: cover;
      border-radius: 10px;
    }
    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>
  <div class="container py-4">
    <a href="hasil.html" class="btn btn-secondary mb-3">⬅️ Kembali</a>
    <div id="detailContainer"></div>
  </div>

  <script>
  const detailContainer = document.getElementById("detailContainer");
  const data = JSON.parse(localStorage.getItem("selectedPortfolio"));

  if (!data) {
    detailContainer.innerHTML = `<p class="text-muted text-center">Data portofolio tidak ditemukan.</p>`;
  } else {
    detailContainer.innerHTML = `
      <div class="card p-4">
        ${data.poster ? `<img src="${data.poster}" class="poster mb-3" alt="Poster">` : ""}
        <h3 class="fw-bold">${data.judul}</h3>
        <p><strong>Nama:</strong> ${data.nama} (${data.nim})</p>
        <p><strong>Kategori:</strong> ${data.kategori}</p>
        <p><strong>Deskripsi:</strong><br>${data.deskripsi}</p>
        ${data.youtube ? `<p><a href="${data.youtube}" target="_blank" class="btn btn-danger">🎥 Lihat Video YouTube</a></p>` : ""}
        ${data.file ? `<p><a href="${data.file}" target="_blank" class="btn btn-secondary">📄 Lihat File Portofolio</a></p>` : ""}
        <p class="text-muted text-end"><small>Diunggah pada: ${data.tanggal}</small></p>
      </div>
    `;
  }
  </script>
</body>
</html>
