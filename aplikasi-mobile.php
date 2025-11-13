<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kategori: Aplikasi Mobile - Portofolio Mahasiswa Polibatam</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body { font-family:'Poppins',sans-serif;background:linear-gradient(135deg,#2b1055,#7597de);color:white;min-height:100vh;}
    .card{background:rgba(255,255,255,0.1);backdrop-filter:blur(10px);border:1px solid rgba(255,255,255,0.2);color:white;}
    .card:hover{transform:translateY(-5px);}
    .card-title{color:#ffcc70;font-weight:600;}
    .btn-detail{background:#007bff;border:none;color:white;font-weight:600;}
    .btn-back{background:#ffc107;color:black;font-weight:600;}
    .card-img-top{max-height:200px;object-fit:contain;border-radius:8px;background:rgba(255,255,255,0.1);}
  </style>
</head>
<body>
  <div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <a href="home.php" class="btn btn-back">⬅️ Kembali</a>
      <h3 class="fw-bold text-center flex-grow-1">📱 Kategori: Aplikasi Mobile</h3>
    </div>
    <div id="portfolioList" class="row g-4"></div>
  </div>

  <script>
    const allPortfolios=JSON.parse(localStorage.getItem("allPortfolios"))||[];
    const container=document.getElementById("portfolioList");
    const filtered=allPortfolios.map((p,i)=>({...p,index:i})).filter(p=>p.kategori==="Aplikasi Mobile");

    if(filtered.length===0){
      container.innerHTML=`<p class="text-center fs-5">Belum ada portofolio di kategori ini.</p>`;
    }else{
      filtered.forEach(p=>{
        const col=document.createElement("div");
        col.className="col-md-6 col-lg-4 d-flex";
        col.innerHTML=`
        <div class="card w-100 shadow-sm p-3">
          <img src="${p.poster||'https://via.placeholder.com/400x200?text=No+Poster'}" class="card-img-top mb-3">
          <div class="card-body">
            <h5 class="card-title">${p.judul}</h5>
            <p class="mb-1"><strong>Nama:</strong> ${p.nama}</p>
            <p><small class="text-light">📅 ${p.tanggal}</small></p>
            <button class="btn btn-detail w-100 mt-3" onclick="lihatDetail(${p.index})">Detail</button>
          </div>
        </div>`;
        container.appendChild(col);
      });
    }
    function lihatDetail(index){localStorage.setItem("selectedPortfolio",index);window.location.href="detail.php";}
  </script>
</body>
</html>
