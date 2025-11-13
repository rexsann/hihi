<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daftar Portofolio Saya - Polibatam</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
body{font-family:'Poppins',sans-serif; background:linear-gradient(135deg,#2b1055,#7597de); color:white; min-height:100vh; padding-top:100px;}
.navbar-custom{position:fixed;top:0;width:100%;background:rgba(255,255,255,0.1);backdrop-filter:blur(12px);border-bottom:1px solid rgba(255,255,255,0.2);z-index:1000;padding:10px 30px;}
.navbar-custom img{height:55px;border-radius:10px;}
.btn{font-weight:600;border-radius:10px;}
.btn-back{background-color:#ffc107;color:black;border:none;}
.btn-upload{background-color:#17a2b8;color:white;border:none;}
.card{background:rgba(255,255,255,0.1);backdrop-filter:blur(10px);border:1px solid rgba(255,255,255,0.2);border-radius:20px;box-shadow:0 8px 20px rgba(0,0,0,0.2);color:white;transition:transform 0.2s ease;}
.card:hover{transform:translateY(-5px);}
.card img{width:100%;height:200px;object-fit:contain;background-color:rgba(255,255,255,0.1);border-radius:10px;padding:5px;}
.btn-detail{background-color:#17a2b8;color:white;font-weight:600;border:none;}
.btn-detail:hover{background-color:#0d6efd;}
h2.title{text-align:center;font-weight:700;margin-bottom:25px;}
.form-select{background:rgba(255,255,255,0.2);color:white;border:none;border-radius:10px;padding:8px 12px;}
.form-select option{color:black;}
</style>
</head>
<body>

<nav class="navbar-custom d-flex justify-content-between align-items-center flex-wrap">
<div class="d-flex align-items-center gap-3 mb-2 mb-md-0">
<img src="download-removebg-preview.png" alt="Logo Polibatam">
<h4 class="m-0 fw-bold">Polibatam Portofolio</h4>
</div>

<div class="d-flex align-items-center gap-3">
<select id="kategoriSelect" class="form-select" onchange="filterKategori(this.value)">
<option value="semua">🌐 Semua Kategori</option>
</select>
<a href="home.php" class="btn btn-back">⬅️ Beranda</a>
<a href="upload.php" class="btn btn-upload">➕ Upload</a>
</div>
</nav>

<div class="container">
<h2 class="title mt-4">📚 Daftar Portofolio Saya</h2>
<div id="portfolioList" class="row g-4"></div>
</div>

<script>
const currentUser = JSON.parse(localStorage.getItem("currentUser"));
if(!currentUser){ alert("⚠️ Silakan login!"); window.location.href="login.php"; }
let allPortfolios = JSON.parse(localStorage.getItem("portfolios_" + currentUser.nim)) || [];
let currentFilter='semua';

const kategoriSelect = document.getElementById("kategoriSelect");
// Isi dropdown kategori otomatis
if(allPortfolios.length>0){
  const kategoriSet = new Set(allPortfolios.map(p=>p.kategori));
  kategoriSelect.innerHTML='<option value="semua">🌐 Semua Kategori</option>';
  kategoriSet.forEach(k=>{ const opt=document.createElement("option"); opt.value=k; opt.textContent=k; kategoriSelect.appendChild(opt); });
}

const list = document.getElementById("portfolioList");

function renderList(){
  list.innerHTML="";
  const filtered = currentFilter==='semua' ? allPortfolios : allPortfolios.filter(p=>p.kategori===currentFilter);
  if(filtered.length===0){ list.innerHTML=`<p class="text-center">Tidak ada portofolio.</p>`; return; }
  filtered.forEach((p,i)=>{
    const col=document.createElement("div"); col.classList.add("col-md-4");
    col.innerHTML=`<div class="card h-100 p-3 d-flex flex-column">
      <img src="${p.poster || 'https://via.placeholder.com/400x200?text=No+Poster'}" class="mb-3" alt="Poster Portofolio">
      <h5 class="fw-bold text-white">${p.judul}</h5>
      <p class="m-0"><strong>${p.nama}</strong> (${p.nim})</p>
      <p class="text-light small mb-2">${p.kategori}</p>
      <div class="mt-auto">
        <button class="btn btn-detail w-100" onclick="lihatDetail(${i})">🔍 Detail</button>
      </div></div>`;
    list.appendChild(col);
  });
}

function filterKategori(k){ currentFilter=k; renderList(); }
function lihatDetail(i){ localStorage.setItem("selectedPortfolio",i); window.location.href="detail_hasil.php"; }

renderList();
</script>

</body>
</html>
