<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hasil Upload Portofolio - Polibatam</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #eef2f7;
      font-family: 'Poppins', sans-serif;
    }
    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      transition: transform 0.2s ease;
    }
    .card:hover {
      transform: translateY(-5px);
    }
    .poster {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-radius: 10px;
    }
  </style>
</head>
<body>
  <div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="fw-bold">📚 Daftar Portofolio Mahasiswa</h2>
      <a href="upload.php" class="btn btn-primary">⬆️ Upload Baru</a>
    </div>
    <div id="portfolioList" class="row g-4"></div>
  </div>

  <script>
  const container = document.getElementById("portfolioList");
  const data = JSON.parse(localStorage.getItem("allPortfolios")) || [];

  if (data.length === 0) {
    container.innerHTML = `<p class="text-center text-muted">Belum ada portofolio diunggah.</p>`;
  } else {
    data.reverse().forEach((item, index) => {
      const card = document.createElement("div");
      card.className = "col-md-4";
      card.innerHTML = `
        <div class="card p-3 h-100">
          ${item.poster ? `<img src="${item.poster}" class="poster mb-3" alt="Poster">` : ""}
          <h5 class="fw-bold">${item.judul}</h5>
          <p class="mb-1"><strong>${item.nama}</strong> (${item.nim})</p>
          <p class="text-muted small mb-1">${item.kategori}</p>
          <p class="small">${item.deskripsi}</p>
          ${item.youtube ? `<a href="${item.youtube}" target="_blank" class="btn btn-sm btn-danger mb-2">🎥 Lihat Video</a><br>` : ""}
          ${item.file ? `<a href="${item.file}" target="_blank" class="btn btn-sm btn-secondary mb-2">📄 Lihat File</a><br>` : ""}
          <button class="btn btn-sm btn-info" onclick="lihatDetail(${index})">🔍 Detail</button>
          <p class="text-end text-muted small mt-2">${item.tanggal}</p>
        </div>
      `;
      container.appendChild(card);
    });
  }

  function lihatDetail(index) {
    const data = JSON.parse(localStorage.getItem("allPortfolios")) || [];
    const selected = data[data.length - 1 - index]; // karena data di-reverse
    localStorage.setItem("selectedPortfolio", JSON.stringify(selected));
    window.location.href = "detail.php";
  }
  </script>
</body>
</html>
