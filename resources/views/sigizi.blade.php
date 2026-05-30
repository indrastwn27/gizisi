<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SiGizi — Puskesmas Sungai Durian</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600&family=DM+Serif+Display&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
<style>
*{box-sizing:border-box;margin:0;padding:0}
:root{
  --green:#16a37f;--green-dark:#0e7a60;--green-light:#e8f8f3;--green-mid:#b7ead9;
  --amber:#d97706;--amber-light:#fef3c7;
  --red:#dc2626;--red-light:#fee2e2;
  --blue:#2563eb;--blue-light:#eff6ff;
  --bg:#f4f7f5;--surface:#ffffff;--border:#e2ebe7;
  --text:#1a2e25;--text2:#4a6358;--text3:#8aad9f;
  --shadow:0 1px 4px rgba(22,163,127,.08);
  --shadow-md:0 4px 16px rgba(22,163,127,.12);
  --radius:10px;--radius-lg:16px;
}
body{font-family:'Plus Jakarta Sans',sans-serif;background:var(--bg);color:var(--text);font-size:14px;line-height:1.6}
h1,h2,h3{font-family:'DM Serif Display',serif;font-weight:400}
 
/* ── UTILS ── */
.hidden{display:none!important}
.flex{display:flex}.items-center{align-items:center}.justify-between{justify-content:space-between}
.gap-8{gap:8px}.gap-12{gap:12px}.gap-16{gap:16px}
.mt-8{margin-top:8px}.mt-12{margin-top:12px}.mt-16{margin-top:16px}.mt-20{margin-top:20px}
.mb-4{margin-bottom:4px}.mb-8{margin-bottom:8px}.mb-12{margin-bottom:12px}.mb-16{margin-bottom:16px}
.text-sm{font-size:12px}.text-xs{font-size:11px}.text-muted{color:var(--text2)}.fw-500{font-weight:500}
.w-full{width:100%}
.grid-2{display:grid;grid-template-columns:1fr 1fr;gap:14px}
.grid-3{display:grid;grid-template-columns:1fr 1fr 1fr;gap:14px}
.grid-4{display:grid;grid-template-columns:repeat(4,1fr);gap:12px}
.col-span-2{grid-column:span 2}
 
/* ── BADGE / PILL ── */
.badge{display:inline-flex;align-items:center;gap:4px;font-size:11px;font-weight:500;padding:2px 9px;border-radius:20px}
.badge-green{background:var(--green-light);color:var(--green-dark)}
.badge-amber{background:var(--amber-light);color:#92400e}
.badge-red{background:var(--red-light);color:#991b1b}
.badge-blue{background:var(--blue-light);color:#1e40af}
.badge-gray{background:#f1f5f2;color:var(--text2)}
 
/* ── BUTTON ── */
.btn{display:inline-flex;align-items:center;gap:6px;padding:8px 16px;border-radius:var(--radius);border:1px solid var(--border);background:var(--surface);color:var(--text);font-size:13px;font-weight:500;cursor:pointer;transition:.15s all}
.btn:hover{background:#f0f7f4;border-color:var(--green)}
.btn-primary{background:var(--green);color:#fff;border-color:var(--green)}
.btn-primary:hover{background:var(--green-dark);border-color:var(--green-dark)}
.btn-danger{background:var(--red-light);color:var(--red);border-color:#fca5a5}
.btn-danger:hover{background:#fecaca}
.btn-sm{padding:5px 11px;font-size:12px}
.btn-icon{padding:6px;border-radius:8px}
 
/* ── CARD ── */
.card{background:var(--surface);border:1px solid var(--border);border-radius:var(--radius-lg);padding:20px;box-shadow:var(--shadow)}
.card-title{font-size:15px;font-weight:600;color:var(--text);margin-bottom:14px;display:flex;align-items:center;gap:8px}
.card-title i{font-size:18px;color:var(--green)}
 
/* ── METRIC CARD ── */
.metric{background:var(--surface);border:1px solid var(--border);border-radius:var(--radius-lg);padding:16px 18px;box-shadow:var(--shadow)}
.metric-label{font-size:12px;color:var(--text2);margin-bottom:4px;display:flex;align-items:center;gap:6px}
.metric-label i{font-size:15px}
.metric-val{font-size:26px;font-weight:600;color:var(--text)}
.metric-sub{font-size:11px;color:var(--text3);margin-top:2px}
 
/* ── TABLE ── */
.table-wrap{overflow-x:auto}
table{width:100%;border-collapse:collapse}
th{font-size:12px;font-weight:600;color:var(--text2);padding:10px 12px;text-align:left;border-bottom:2px solid var(--border);white-space:nowrap;background:#f9fdfb}
td{padding:11px 12px;border-bottom:1px solid var(--border);font-size:13px;vertical-align:middle}
tr:last-child td{border-bottom:none}
tr:hover td{background:#f9fdfb}
.table-action{display:flex;gap:6px}
 
/* ── FORM ── */
.form-group{display:flex;flex-direction:column;gap:5px}
.form-group label{font-size:12px;font-weight:500;color:var(--text2)}
.form-group input,.form-group select,.form-group textarea{
  padding:9px 12px;border:1px solid var(--border);border-radius:var(--radius);
  font-size:13px;font-family:inherit;color:var(--text);background:var(--surface);
  outline:none;transition:.15s border-color
}
.form-group input:focus,.form-group select:focus,.form-group textarea:focus{border-color:var(--green);box-shadow:0 0 0 3px rgba(22,163,127,.1)}
.form-group textarea{resize:vertical;min-height:80px}
 
/* ── LOGIN PAGE — Split Screen ── */
#loginPage{
  min-height:100vh;display:flex;
}
/* Sisi kiri: foto + overlay info */
.login-left{
  flex:1.1;position:relative;overflow:hidden;
  background:linear-gradient(160deg,#0e7a60 0%,#16a37f 60%,#1dd9a3 100%);
}
.login-left-bg{
  position:absolute;inset:0;
  background:url('https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=900&q=80') center/cover no-repeat;
  opacity:.35;
}
.login-left-overlay{
  position:absolute;inset:0;
  background:linear-gradient(160deg,rgba(14,122,96,.85) 0%,rgba(22,163,127,.6) 100%);
}
.login-left-content{
  position:relative;z-index:2;
  display:flex;flex-direction:column;justify-content:space-between;
  height:100%;padding:48px 44px;color:#fff;
}
.login-brand {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: -20px;
  margin-left: 0px;
  margin-top: -30px;
}
.login-brand-icon {
  width: 300px;  /* ← lebar */
  height: auto;
  display: flex;
  align-items: center;
}

 
.login-hero{margin:auto 0}
.login-hero-tag{
  display:inline-block;background:rgba(255,255,255,.15);
  border:1px solid rgba(255,255,255,.3);border-radius:20px;
  padding:4px 14px;font-size:12px;font-weight:500;margin-bottom:20px;
  backdrop-filter:blur(4px);
}
.login-hero h1{
  font-family:'DM Serif Display',serif;font-size:40px;line-height:1.2;
  margin-bottom:14px;color:#fff;
}
.login-hero h1 span{color:#a7f3d0}
.login-hero p{font-size:14px;opacity:.85;line-height:1.7;max-width:360px}
 
.login-stats{
  display:grid;grid-template-columns:1fr 1fr;gap:10px;
}
.login-stat{
  background:rgba(255,255,255,.12);border-radius:12px;
  padding:14px 16px;backdrop-filter:blur(4px);
  border:1px solid rgba(255,255,255,.15);
}
.login-stat-val{font-size:22px;font-weight:700;color:#fff}
.login-stat-label{font-size:11px;opacity:.75;margin-top:2px}
 
.login-footer-loc{
  display:flex;align-items:center;gap:8px;font-size:12px;opacity:.7;
  padding-top:16px;border-top:1px solid rgba(255,255,255,.15);margin-top:16px;
}
.login-footer-loc i{font-size:16px}
 
/* Sisi kanan: form */
.login-right{
  width:440px;min-width:380px;
  background:#fff;display:flex;align-items:center;justify-content:center;
  padding:48px 44px;overflow-y:auto;
}
.login-form-wrap{width:100%;max-width:340px}
.login-form-wrap h2{
  font-family:'DM Serif Display',serif;font-size:28px;color:var(--text);margin-bottom:6px;
}
.login-form-wrap > p{font-size:13px;color:var(--text2);margin-bottom:28px}
 
/* Role pilih — card style */
.login-roles-label{font-size:12px;font-weight:600;color:var(--text2);margin-bottom:10px;letter-spacing:.05em;text-transform:uppercase}
.login-roles{display:grid;grid-template-columns:repeat(3,1fr);gap:8px;margin-bottom:22px}
.role-card{
  border:2px solid var(--border);border-radius:12px;
  padding:12px 8px;text-align:center;cursor:pointer;
  transition:.15s all;background:#f9fdfb;
}
.role-card:hover{border-color:var(--green);background:var(--green-light)}
.role-card.active{border-color:var(--green);background:var(--green-light);color:var(--green-dark)}
.role-card i{font-size:22px;display:block;margin-bottom:4px;color:var(--text2)}
.role-card.active i{color:var(--green)}
.role-card span{font-size:12px;font-weight:500;color:var(--text2)}
.role-card.active span{color:var(--green-dark)}
 
.login-role-info{
  background:var(--blue-light);border:1px solid #bfdbfe;border-radius:var(--radius);
  padding:10px 13px;font-size:12px;color:#1e40af;
  display:flex;gap:8px;align-items:flex-start;margin-bottom:16px;
}
.login-role-info i{font-size:16px;flex-shrink:0;margin-top:1px}
 
.login-card h2{font-size:18px;font-weight:600;margin-bottom:18px;color:var(--text);font-family:'Plus Jakarta Sans',sans-serif}
.login-hint{font-size:11px;color:var(--text3);text-align:center;margin-top:12px}
 
/* Legacy (keep for compat) */
.login-wrap{width:380px}
.login-card{background:#fff;border-radius:20px;padding:36px 32px;box-shadow:0 20px 60px rgba(0,0,0,.15)}
.login-logo{text-align:center;margin-bottom:24px}
.login-logo-icon{width:60px;height:60px;background:var(--green-light);border-radius:16px;display:flex;align-items:center;justify-content:center;margin:0 auto 10px;font-size:28px;color:var(--green)}
.login-logo h1{font-size:26px;color:var(--text)}
.login-logo p{font-size:12px;color:var(--text2);margin-top:2px}
.login-role-tabs{display:flex;gap:0;border:1px solid var(--border);border-radius:var(--radius);overflow:hidden;margin-bottom:18px}
.role-tab{flex:1;padding:8px;text-align:center;font-size:12px;font-weight:500;cursor:pointer;color:var(--text2);background:#f9fdfb;border:none;transition:.15s all}
.role-tab.active{background:var(--green);color:#fff}
 
/* ── APP SHELL ── */
#app{display:flex;height:100vh}
.sidebar{width:240px;min-width:240px;background:var(--surface);border-right:1px solid var(--border);display:flex;flex-direction:column;height:100vh;overflow-y:auto}
.sidebar-brand{padding:20px 18px 16px;border-bottom:1px solid var(--border)}
.brand-row{display:flex;align-items:center;gap:10px}
.brand-icon{width:38px;height:38px;background:var(--green);border-radius:10px;display:flex;align-items:center;justify-content:center;color:#fff;font-size:20px}
.brand-name{font-size:15px;font-weight:600;color:var(--text)}
.brand-sub{font-size:10px;color:var(--text2);line-height:1.3}
.sidebar-role{margin:10px 14px;padding:8px 12px;background:var(--green-light);border-radius:8px;font-size:12px;color:var(--green-dark);font-weight:500;display:flex;align-items:center;gap:6px}
.sidebar-role i{font-size:15px}
.nav-section{font-size:10px;font-weight:600;color:var(--text3);padding:10px 18px 4px;letter-spacing:.07em;text-transform:uppercase}
.nav-item{display:flex;align-items:center;gap:10px;padding:10px 18px;font-size:13px;color:var(--text2);cursor:pointer;border-left:3px solid transparent;transition:.15s all}
.nav-item:hover{background:var(--green-light);color:var(--text)}
.nav-item.active{background:var(--green-light);color:var(--green-dark);border-left-color:var(--green);font-weight:500}
.nav-item i{font-size:18px}
.sidebar-footer{margin-top:auto;padding:14px 18px;border-top:1px solid var(--border)}
.logout-btn{display:flex;align-items:center;gap:8px;font-size:13px;color:var(--text2);cursor:pointer;padding:8px 10px;border-radius:8px;transition:.15s}
.logout-btn:hover{background:var(--red-light);color:var(--red)}
 
.main-area{flex:1;display:flex;flex-direction:column;overflow:hidden}
.topbar{background:var(--surface);border-bottom:1px solid var(--border);padding:14px 24px;display:flex;align-items:center;justify-content:space-between;flex-shrink:0}
.topbar-title{font-size:17px;font-weight:600;color:var(--text)}
.topbar-right{display:flex;align-items:center;gap:12px}
.notif-btn{width:36px;height:36px;border-radius:9px;background:var(--bg);border:1px solid var(--border);display:flex;align-items:center;justify-content:center;cursor:pointer;position:relative;font-size:18px;color:var(--text2)}
.notif-dot{position:absolute;top:7px;right:7px;width:7px;height:7px;border-radius:50%;background:var(--red)}
.user-chip{display:flex;align-items:center;gap:8px;padding:6px 12px;background:var(--bg);border:1px solid var(--border);border-radius:20px;cursor:pointer}
.user-avatar{width:26px;height:26px;border-radius:50%;background:var(--green);display:flex;align-items:center;justify-content:center;color:#fff;font-size:11px;font-weight:600}
.user-name{font-size:13px;font-weight:500}
.main-content{flex:1;overflow-y:auto;padding:24px}
 
/* ── SECTIONS ── */
.section{display:none}
.section.active{display:block}
 
/* ── MODAL ── */
.modal-bg{position:fixed;inset:0;background:rgba(0,0,0,.4);z-index:1000;display:flex;align-items:center;justify-content:center;padding:20px}
.modal-bg.hidden{display:none}
.modal{background:#fff;border-radius:var(--radius-lg);padding:28px;width:100%;max-width:560px;max-height:90vh;overflow-y:auto;box-shadow:0 20px 60px rgba(0,0,0,.2)}
.modal-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:20px}
.modal-title{font-size:16px;font-weight:600;color:var(--text)}
.modal-close{width:32px;height:32px;border-radius:8px;border:1px solid var(--border);background:var(--bg);display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:16px;color:var(--text2)}
.modal-close:hover{background:var(--red-light);color:var(--red);border-color:#fca5a5}
.modal-footer{display:flex;gap:10px;justify-content:flex-end;margin-top:20px;padding-top:16px;border-top:1px solid var(--border)}
 
/* ── TOAST ── */
#toast{position:fixed;bottom:24px;right:24px;z-index:9999;display:flex;flex-direction:column;gap:8px}
.toast-item{padding:12px 18px;border-radius:10px;font-size:13px;font-weight:500;box-shadow:var(--shadow-md);animation:slideIn .3s ease;display:flex;align-items:center;gap:8px}
.toast-success{background:var(--green);color:#fff}
.toast-error{background:var(--red);color:#fff}
@keyframes slideIn{from{transform:translateX(60px);opacity:0}to{transform:translateX(0);opacity:1}}
 
/* ── ALERT BOX ── */
.alert{padding:12px 16px;border-radius:var(--radius);font-size:13px;margin-bottom:14px;display:flex;align-items:flex-start;gap:10px}
.alert i{font-size:17px;flex-shrink:0;margin-top:1px}
.alert-warning{background:var(--amber-light);color:#92400e;border:1px solid #fde68a}
.alert-danger{background:var(--red-light);color:#991b1b;border:1px solid #fca5a5}
.alert-info{background:var(--blue-light);color:#1e40af;border:1px solid #bfdbfe}
 
/* ── PROFIL INFO ── */
.info-row{display:flex;padding:9px 0;border-bottom:1px solid var(--border);font-size:13px}
.info-row:last-child{border-bottom:none}
.info-label{width:160px;color:var(--text2);flex-shrink:0}
.info-val{color:var(--text);font-weight:500}
 
/* ── EMPTY STATE ── */
.empty{text-align:center;padding:48px 24px;color:var(--text2)}
.empty i{font-size:48px;color:var(--text3);margin-bottom:12px}
.empty p{font-size:14px;margin-bottom:14px}
 
/* ── SEARCH BAR ── */
.search-row{display:flex;gap:10px;margin-bottom:16px;align-items:center}
.search-input-wrap{position:relative;flex:1}
.search-input-wrap i{position:absolute;left:10px;top:50%;transform:translateY(-50%);font-size:17px;color:var(--text3)}
.search-input-wrap input{width:100%;padding:9px 12px 9px 34px;border:1px solid var(--border);border-radius:var(--radius);font-size:13px;outline:none;font-family:inherit}
.search-input-wrap input:focus{border-color:var(--green)}
 
/* ── CHART (simple CSS bar) ── */
.chart-bar-wrap{display:flex;flex-direction:column;gap:10px}
.chart-bar-item{display:flex;align-items:center;gap:10px;font-size:12px}
.chart-bar-label{width:130px;color:var(--text2);text-align:right;flex-shrink:0}
.chart-bar-track{flex:1;height:10px;background:var(--bg);border-radius:5px;overflow:hidden}
.chart-bar-fill{height:100%;border-radius:5px;transition:width .5s ease}
.chart-bar-val{width:40px;color:var(--text);font-weight:500;text-align:right;flex-shrink:0}
 
/* ── TABS ── */
.tabs{display:flex;gap:0;border-bottom:2px solid var(--border);margin-bottom:18px}
.tab{padding:9px 18px;font-size:13px;font-weight:500;color:var(--text2);cursor:pointer;border-bottom:2px solid transparent;margin-bottom:-2px;transition:.15s}
.tab.active{color:var(--green);border-bottom-color:var(--green)}
.tab:hover{color:var(--text)}
 
/* ── ARTIKEL ── */
.artikel-grid{display:grid;grid-template-columns:1fr 1fr;gap:14px}
.artikel-card{border:1px solid var(--border);border-radius:var(--radius-lg);overflow:hidden;background:var(--surface);cursor:pointer;transition:.15s;display:flex;flex-direction:column}
.artikel-card:hover{border-color:var(--green);box-shadow:var(--shadow-md)}
.artikel-thumb{width:100%;height:150px;object-fit:cover;display:block;flex-shrink:0}
.artikel-thumb-placeholder{width:100%;height:100px;background:linear-gradient(135deg,var(--green-light),var(--green-mid));display:flex;align-items:center;justify-content:center;flex-shrink:0}
.artikel-thumb-placeholder i{font-size:36px;color:var(--green)}
.artikel-card-body{padding:18px 16px;flex:1;display:flex;flex-direction:column}
.artikel-card-delete{position:absolute;top:8px;right:8px;width:26px;height:26px;border-radius:50%;background:rgba(220,38,38,.85);color:#fff;display:flex;align-items:center;justify-content:center;font-size:13px;cursor:pointer;z-index:2;opacity:0;transition:.15s}
.artikel-card:hover .artikel-card-delete{opacity:1}
.artikel-card{position:relative}
.artikel-cat{font-size:10px;padding:2px 9px;border-radius:20px;background:var(--green-light);color:var(--green-dark);font-weight:500;display:inline-block;margin-bottom:8px}
.artikel-title{font-size:14px;font-weight:600;color:var(--text);line-height:1.4;margin-bottom:6px}
.artikel-meta{font-size:12px;color:var(--text2);margin-top:auto;padding-top:6px;display:flex;align-items:center;gap:6px;flex-wrap:wrap}
.artikel-body{font-size:13px;color:var(--text2);line-height:1.7;margin-top:10px}
.artikel-media-badge{display:inline-flex;align-items:center;gap:3px;font-size:10px;padding:2px 7px;border-radius:20px;background:var(--amber-light);color:#92400e;font-weight:500}
.artikel-img-full{width:100%;border-radius:var(--radius);margin-bottom:14px;max-height:320px;object-fit:cover;display:block}
.artikel-video-wrap{position:relative;width:100%;aspect-ratio:16/9;border-radius:var(--radius);overflow:hidden;margin-bottom:14px;background:#000}
.artikel-video-wrap iframe{position:absolute;inset:0;width:100%;height:100%;border:none}
 
/* ── JADWAL ── */
.jadwal-item{display:flex;gap:14px;align-items:flex-start;padding:14px;background:var(--bg);border-radius:var(--radius);border-left:3px solid var(--green);margin-bottom:10px}
.jadwal-date-box{min-width:46px;text-align:center;background:var(--green);color:#fff;border-radius:8px;padding:6px 4px;font-size:12px;font-weight:600;line-height:1.3}
.jadwal-info-title{font-size:13px;font-weight:600;color:var(--text);margin-bottom:2px}
.jadwal-info-meta{font-size:12px;color:var(--text2)}
 
/* ── STUNTING RISK ── */
.risk-card{border-radius:var(--radius-lg);padding:16px;border:1px solid}
.risk-normal{background:#f0fdf4;border-color:#86efac}
.risk-watch{background:var(--amber-light);border-color:#fcd34d}
.risk-stunt{background:var(--red-light);border-color:#fca5a5}
.risk-title{font-size:13px;font-weight:600;margin-bottom:4px}
.risk-val{font-size:28px;font-weight:700}
.risk-sub{font-size:12px;margin-top:4px}
 
/* ── ORTU HOME ── */
.anak-profile-banner{background:linear-gradient(135deg,var(--green),var(--green-dark));border-radius:var(--radius-lg);padding:22px 24px;color:#fff;margin-bottom:18px;position:relative;overflow:hidden}
.anak-profile-banner::after{content:'';position:absolute;right:-20px;top:-20px;width:120px;height:120px;border-radius:50%;background:rgba(255,255,255,.08)}
.ortu-anak-name{font-size:22px;font-family:'DM Serif Display',serif;margin-bottom:4px}
.ortu-anak-meta{font-size:13px;opacity:.85}
.ortu-status{display:inline-block;background:rgba(255,255,255,.2);padding:4px 12px;border-radius:20px;font-size:12px;font-weight:500;margin-top:10px}
.mt-4{margin-top:4px}
.mb-12{margin-bottom:12px}
</style>
</head>
<body>
 
<!-- ══════════ LOGIN PAGE — SPLIT SCREEN ══════════ -->
<div id="loginPage">
  <!-- KIRI: Hero -->
  <div class="login-left">
    <div class="login-left-bg"></div>
    <div class="login-left-overlay"></div>
    <div class="login-left-content">
    <div class="login-brand">
  <div class="login-brand-icon">
    <img src="{{ asset('gizi.png') }}" alt="SIGIZI" style="width:90px;height:auto;">
    <!-- tanpa filter, warna asli -->
  </div>
</div>
      <div class="login-hero">
        <div class="login-hero-tag"><i class="ti ti-shield-check" style="font-size:11px"></i> Aplikasi Monitoring Balita</div>
        <h1>Pantau Tumbuh<br>Kembang <span>Balita</span><br>Lebih Cerdas</h1>
        <p>Sistem Informasi terintegrasi untuk deteksi dini stunting, pemantauan antropometrica, dan laporan gizi berbasis data WHO.</p>
        <div class="login-stats" style="margin-top:28px">
          <div class="login-stat"><div class="login-stat-val" id="statBalita">—</div><div class="login-stat-label">Balita Terdaftar</div></div>
          <div class="login-stat"><div class="login-stat-val" id="statStunting">—</div><div class="login-stat-label">Risiko Stunting</div></div>
          <div class="login-stat"><div class="login-stat-val">8×</div><div class="login-stat-label">Posyandu Aktif</div></div>
          <div class="login-stat"><div class="login-stat-val">3</div><div class="login-stat-label">Peran Pengguna</div></div>
        </div>
      </div>
      <div>
        <div class="login-footer-loc">
          <i class="ti ti-map-pin"></i>
          <span>Puskesmas Sungai Durian — Kab. Kubu Raya, Kalimantan Barat</span>
        </div>
      </div>
    </div>
  </div>
  <!-- KANAN: Form -->
  <div class="login-right">
    <div class="login-form-wrap">
      <h2>Selamat Datang</h2>
      <p>Masuk ke akun <b>SIGIZI</b> Anda untuk memulai pemantauan balita.</p>
      <div class="login-roles-label">Masuk sebagai :</div>
      <div class="login-roles">
        <div class="role-card active" id="roleCard_admin" onclick="setRoleNew('admin')">
          <i class="ti ti-shield-check"></i><span>Admin</span>
        </div>
        <div class="role-card" id="roleCard_bidan" onclick="setRoleNew('bidan')">
          <i class="ti ti-stethoscope"></i><span>Bidan</span>
        </div>
        <div class="role-card" id="roleCard_ortu" onclick="setRoleNew('ortu')">
          <i class="ti ti-users"></i><span>Orang Tua</span>
        </div>
      </div>

      <div class="form-group mb-12">
        <label id="loginUserLabel">Username</label>
        <input type="text" id="loginUser" placeholder="Masukkan username" onkeydown="if(event.key==='Enter')doLogin()" style="padding:11px 14px;font-size:14px">
      </div>
      <div class="form-group mb-28" id="loginPassWrap" style="margin-bottom:24px">
        <label>Kata Sandi</label>
        <input type="password" id="loginPass" placeholder="Masukkan password" onkeydown="if(event.key==='Enter')doLogin()" style="padding:11px 14px;font-size:14px">
      </div>
      <button class="btn btn-primary w-full" onclick="doLogin()" style="justify-content:center;padding:13px;font-size:14px;border-radius:var(--radius);margin-top:8px">
        <i class="ti ti-login"></i> LOGIN
      </button>
      <p id="loginHint" style="color:var(--red);font-size:12px;text-align:center;margin-top:10px;min-height:18px"></p>
      <div style="margin-top:16px;padding-top:14px;border-top:1px solid var(--border);font-size:11px;color:var(--text3);text-align:center">
        Belum punya akun? <a href="#" style="color:var(--green);font-weight:500" onclick="return false">Hubungi Puskesmas</a>
      </div>

    </div>
  </div>
</div>
 
<!-- ══════════ APP SHELL ══════════ -->
<div id="app" class="hidden">
  <!-- SIDEBAR -->
  <div class="sidebar" id="sidebar">
    <div class="sidebar-brand">
      <div class="brand-row">
        <div class="brand-icon"><i class="ti ti-heart-rate-monitor"></i></div>
        <div>
          <div class="brand-name">SiGizi</div>
          <div class="brand-sub">Pkm. Sungai Durian</div>
        </div>
      </div>
    </div>
    <div class="sidebar-role" id="sidebarRole"><i class="ti ti-shield"></i> <span id="roleLabel">Admin</span></div>
    <nav id="navMenu"></nav>
    <div class="sidebar-footer">
      <div class="logout-btn" onclick="doLogout()"><i class="ti ti-logout"></i> Keluar</div>
    </div>
  </div>
 
  <!-- MAIN -->
  <div class="main-area">
    <div class="topbar">
      <div class="topbar-title" id="topbarTitle">Dashboard</div>
      <div class="topbar-right">
        <div class="notif-btn" onclick="showSection('jadwal')" title="Notifikasi"><i class="ti ti-bell"></i><div class="notif-dot"></div></div>
        <div class="user-chip">
          <div class="user-avatar" id="userAvatar">A</div>
          <span class="user-name" id="userName">Admin</span>
        </div>
      </div>
    </div>
    <div class="main-content" id="mainContent">
      <!-- sections injected here -->
    </div>
  </div>
</div>
 
<!-- ══════════ MODALS ══════════ -->
<div class="modal-bg hidden" id="modalBg">
  <div class="modal" id="modalBox"></div>
</div>
 
<!-- TOAST -->
<div id="toast"></div>
<script>
// ═══════════════════════════════════════
// DATA STORE (localStorage)
// ═══════════════════════════════════════
const DB = {
  state: {
    users:      @json($users),
    wilayah:    @json($wilayah),
    posyandu:   @json($posyandu),
    artikel:    @json($artikel),
    jadwal:     @json($jadwal),
    notifikasi: @json($notifikasi),
    anak:       @json($anak),
    pengukuran: @json($pengukuran)
  },
  get(k) { return this.state[k]; },

  _apiSave(endpoint, item) {
    if (!item) return;
    const isNew = !item.id || item.id > 999999 || String(item.id).includes('.');
    if (!isNew) return;

    fetch('/api/' + endpoint, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' }, // tanpa X-CSRF-TOKEN
      body: JSON.stringify(item)
    })
    .then(res => res.json())
    .then(res => {
      if (res.success) {
        item.id = res.data.id;
        console.log('[DB] Tersimpan:', endpoint, res.data);
      } else {
        console.error('[DB] Gagal:', endpoint, res.message, res.error);
      }
    })
    .catch(err => console.error('[DB] Network error:', endpoint, err));
  },

  set(k, v) {
    this.state[k] = v;
    const last = v[v.length - 1];
    const map = {
      anak:       'balita',
      pengukuran: 'pengukuran',
      jadwal:     'jadwal',
      notifikasi: 'notifikasi',
      wilayah:    'wilayah',
      posyandu:   'posyandu',
      users:      'pengguna',
      artikel:    'artikel',
    };
    if (map[k]) this._apiSave(map[k], last);
  },
  init() {}
};
DB.init();
 
// ═══════════════════════════════════════
// AUTH
// ═══════════════════════════════════════
let currentUser = null;
let currentRole = 'admin';
 
// ── NEW ROLE SYSTEM ──
const ROLE_CFG = {
  admin: {
    label:'Username', placeholder:'Masukkan username',
    showPass: true
  },
  bidan: {
    label:'NIP (Nomor Induk Pegawai)', placeholder:'Masukkan NIP Anda',
    showPass: false
  },
  ortu: {
    label:'NIK Ibu (16 digit)', placeholder:'Masukkan 16 digit NIK Ibu',
    showPass: false
  },
};
 
function setRoleNew(r){
  currentRole = r;
  ['admin','bidan','ortu'].forEach(x=>{
    document.getElementById('roleCard_'+x).classList.toggle('active', x===r);
  });
  const cfg = ROLE_CFG[r];
  document.getElementById('loginUserLabel').textContent = cfg.label;
  document.getElementById('loginUser').placeholder = cfg.placeholder;
  document.getElementById('loginUser').value = '';
  document.getElementById('loginPass').value = '';
  document.getElementById('loginHint').textContent = '';
  document.getElementById('loginPassWrap').style.display = cfg.showPass ? '' : 'none';
}
// Backward-compat shim
function setRole(r,el){ setRoleNew(r); }
 
function doLogin(){
  const u = document.getElementById('loginUser').value.trim();
  const p = document.getElementById('loginPass').value.trim();
  const users = DB.get('users');
  let user = null;
  if(currentRole === 'admin'){
    user = users.find(x=>x.username===u && x.password===p && x.role==='admin');
  } else if(currentRole === 'bidan'){
    // Bidan login HANYA pakai NIP (tanpa password)
    user = users.find(x=>x.nip===u && x.role==='bidan');
  } else if(currentRole === 'ortu'){
    // Ortu login HANYA pakai NIK (tanpa password)
    user = users.find(x=>x.nik===u && x.role==='ortu');
  }
  if(!user){
    document.getElementById('loginHint').textContent = 'Data login tidak ditemukan. Periksa kembali.';
    return;
  }
  document.getElementById('loginHint').textContent = '';
  currentUser = user;
  document.getElementById('loginPage').classList.add('hidden');
  document.getElementById('app').classList.remove('hidden');
  // Update live stats
  updateLoginStats();
  initApp();
}
 
function updateLoginStats(){
  const anak = DB.get('anak')||[];
  const ukur = DB.get('pengukuran')||[];
  const latest = {};
  ukur.sort((a,b)=>b.tanggal.localeCompare(a.tanggal)).forEach(u=>{if(!latest[u.idAnak])latest[u.idAnak]=u;});
  const stunt = Object.values(latest).filter(u=>u.status==='Stunting'||u.status==='Stunting Berat').length;
  const el1=document.getElementById('statBalita'), el2=document.getElementById('statStunting');
  if(el1) el1.textContent = anak.length;
  if(el2) el2.textContent = anak.length ? Math.round(stunt/anak.length*100)+'%' : '0%';
}
// Run on page load for stats
document.addEventListener('DOMContentLoaded', updateLoginStats);
 
function doLogout(){
  currentUser = null;
  document.getElementById('app').classList.add('hidden');
  document.getElementById('loginPage').classList.remove('hidden');
  document.getElementById('loginUser').value='';
  document.getElementById('loginPass').value='';
}
 
// ═══════════════════════════════════════
// APP INIT
// ═══════════════════════════════════════
const MENUS = {
  admin:[
    {sec:'dashboard',icon:'ti-layout-dashboard',label:'Dashboard'},
    {sec:'registrasi',icon:'ti-user-plus',label:'Registrasi Anak',group:'Data'},
    {sec:'pengukuran',icon:'ti-ruler-measure',label:'Pengukuran Fisik'},
    {sec:'deteksi',icon:'ti-stethoscope',label:'Deteksi Stunting'},
    {sec:'artikel',icon:'ti-article',label:'Artikel Gizi',group:'Informasi'},
    {sec:'jadwal',icon:'ti-calendar-event',label:'Jadwal & Notifikasi'},
    {sec:'laporan',icon:'ti-chart-bar',label:'Laporan',group:'Manajemen'},
    {sec:'pengguna',icon:'ti-users',label:'Manajemen Pengguna'},
    {sec:'pengaturan',icon:'ti-settings',label:'Pengaturan Wilayah',group:'Pengaturan'},
    {sec:'profil',icon:'ti-user-circle',label:'Profil Saya',group:'Akun'},
  ],
  bidan:[
    {sec:'dashboard',icon:'ti-layout-dashboard',label:'Dashboard'},
    {sec:'registrasi',icon:'ti-user-plus',label:'Registrasi Anak',group:'Data'},
    {sec:'pengukuran',icon:'ti-ruler-measure',label:'Pengukuran Fisik'},
    {sec:'deteksi',icon:'ti-stethoscope',label:'Deteksi Stunting'},
    {sec:'artikel',icon:'ti-article',label:'Artikel Gizi',group:'Informasi'},
    {sec:'jadwal',icon:'ti-calendar-event',label:'Jadwal'},
    {sec:'laporan',icon:'ti-chart-bar',label:'Laporan',group:'Lainnya'},
    {sec:'profil',icon:'ti-user-circle',label:'Profil Saya',group:'Akun'},
  ],
  ortu:[
    {sec:'home_ortu',icon:'ti-home',label:'Beranda'},
    {sec:'perkembangan',icon:'ti-trending-up',label:'Perkembangan Anak'},
    {sec:'artikel',icon:'ti-article',label:'Artikel Gizi'},
    {sec:'jadwal',icon:'ti-calendar-event',label:'Jadwal Posyandu'},
    {sec:'profil',icon:'ti-user-circle',label:'Profil Saya',group:'Akun'},
  ]
};
 
const ROLE_LABELS = {admin:'Administrator',bidan:'Bidan',ortu:'Orang Tua'};
const ROLE_ICONS = {admin:'ti-shield-check',bidan:'ti-heart-handshake',ortu:'ti-users'};
 
function initApp(){
  const r = currentUser.role;
  document.getElementById('roleLabel').textContent = ROLE_LABELS[r];
  document.querySelector('#sidebarRole i').className = 'ti '+ROLE_ICONS[r];
  document.getElementById('userName').textContent = currentUser.nama;
  document.getElementById('userAvatar').textContent = currentUser.nama.charAt(0).toUpperCase();
  buildNav(r);
  const first = MENUS[r][0].sec;
  showSection(first);
}
 
function buildNav(r){
  const nav = document.getElementById('navMenu');
  nav.innerHTML='';
  let lastGroup='';
  MENUS[r].forEach(m=>{
    if(m.group && m.group!==lastGroup){
      nav.insertAdjacentHTML('beforeend',`<div class="nav-section">${m.group}</div>`);
      lastGroup=m.group;
    }
    nav.insertAdjacentHTML('beforeend',
      `<div class="nav-item" id="nav-${m.sec}" onclick="showSection('${m.sec}')">
        <i class="ti ${m.icon}"></i>${m.label}
      </div>`);
  });
}
 
function showSection(sec){
  document.querySelectorAll('.nav-item').forEach(n=>n.classList.remove('active'));
  const navEl = document.getElementById('nav-'+sec);
  if(navEl) navEl.classList.add('active');
  const label = (MENUS[currentUser.role].find(m=>m.sec===sec)||{}).label||sec;
  document.getElementById('topbarTitle').textContent = label;
  renderSection(sec);
}
 
function renderSection(sec){
  const mc = document.getElementById('mainContent');
  mc.innerHTML='';
  const fn = SECTIONS[sec];
  if(fn) mc.innerHTML = fn();
  else mc.innerHTML = `<div class="empty"><i class="ti ti-hammer"></i><p>Halaman <b>${sec}</b> dalam pengembangan.</p></div>`;
  attachHandlers(sec);
}
 
// ═══════════════════════════════════════
// HELPERS
// ═══════════════════════════════════════
function uid(){return Date.now()+Math.floor(Math.random()*1000)}
function fmt(v){return v||'-'}
function fmtDate(d){if(!d)return'-';const dt=new Date(d);return dt.toLocaleDateString('id-ID',{day:'2-digit',month:'short',year:'numeric'})}
function hitungUsia(tgl){
  const now=new Date(),b=new Date(tgl);
  let m=(now.getFullYear()-b.getFullYear())*12+(now.getMonth()-b.getMonth());
  return m<0?0:m;
}
function statusBadge(s){
  const map={Normal:'badge-green','Perlu Pantau':'badge-amber',Stunting:'badge-red','Stunting Berat':'badge-red',Baik:'badge-green'};
  return `<span class="badge ${map[s]||'badge-gray'}">${s}</span>`;
}
 
function showToast(msg,type='success'){
  const t=document.getElementById('toast');
  const el=document.createElement('div');
  el.className=`toast-item toast-${type}`;
  el.innerHTML=`<i class="ti ${type==='success'?'ti-check':'ti-x'}"></i>${msg}`;
  t.appendChild(el);
  setTimeout(()=>el.remove(),3000);
}
 
function openModal(html){
  document.getElementById('modalBox').innerHTML=html;
  document.getElementById('modalBg').classList.remove('hidden');
}
function closeModal(){document.getElementById('modalBg').classList.add('hidden')}
document.getElementById('modalBg').addEventListener('click',e=>{if(e.target===document.getElementById('modalBg'))closeModal()});
 
// ═══════════════════════════════════════
// SECTION RENDERERS
// ═══════════════════════════════════════
const SECTIONS = {};
 
// ──────────────────────────────────────
// DASHBOARD (admin & bidan)
// ──────────────────────────────────────
SECTIONS.dashboard = ()=>{
  const anak = DB.get('anak')||[];
  const ukur = DB.get('pengukuran')||[];
  const latest = {};
  ukur.sort((a,b)=>b.tanggal.localeCompare(a.tanggal)).forEach(u=>{if(!latest[u.idAnak])latest[u.idAnak]=u;});
  const statuses = Object.values(latest).map(u=>u.status);
  const total=anak.length, stunting=statuses.filter(s=>s==='Stunting'||s==='Stunting Berat').length;
  const normal=statuses.filter(s=>s==='Normal').length, pantau=statuses.filter(s=>s==='Perlu Pantau').length;
  const terbaru=ukur.slice(0,5);
  const wilayah=(DB.get('wilayah')||[]).map(w=>w.nama);
  // juga tampung wilayah dari data anak yg mungkin tidak ada di master
  anak.forEach(a=>{if(a.wilayah&&!wilayah.includes(a.wilayah))wilayah.push(a.wilayah);});
  const wMap={};wilayah.forEach(w=>wMap[w]=0);
  anak.forEach(a=>{const u=latest[a.id];if(u&&(u.status==='Stunting'||u.status==='Stunting Berat'))wMap[a.wilayah]=(wMap[a.wilayah]||0)+1;});
  const maxW=Math.max(...Object.values(wMap),1);
  const wBars=wilayah.map(w=>`
    <div class="chart-bar-item">
      <div class="chart-bar-label">${w}</div>
      <div class="chart-bar-track"><div class="chart-bar-fill" style="width:${(wMap[w]/maxW*100)}%;background:${wMap[w]>5?'var(--red)':wMap[w]>2?'var(--amber)':'var(--green)'}"></div></div>
      <div class="chart-bar-val">${wMap[w]}</div>
    </div>`).join('');
 
  const rows=terbaru.map(u=>{
    const a=anak.find(x=>x.id===u.idAnak)||{};
    return `<tr>
      <td>${fmt(a.nama)}</td>
      <td>${hitungUsia(a.tglLahir || a.tgl_lahir)} bln</td>
      <td>${u.bb}</td><td>${u.tb}</td><td>${u.zscore_tbu}</td>
      <td>${statusBadge(u.status)}</td>
      <td>${fmtDate(u.tanggal)}</td>
    </tr>`;
  }).join('');
 
  return `
  <div class="grid-4 mb-16">
    <div class="metric"><div class="metric-label"><i class="ti ti-users"></i>Total Balita</div><div class="metric-val">${total}</div><div class="metric-sub">Terdaftar</div></div>
    <div class="metric"><div class="metric-label"><i class="ti ti-alert-triangle" style="color:var(--red)"></i>Stunting</div><div class="metric-val" style="color:var(--red)">${stunting}</div><div class="metric-sub">${total?Math.round(stunting/total*100):0}% dari total</div></div>
    <div class="metric"><div class="metric-label"><i class="ti ti-eye" style="color:var(--amber)"></i>Perlu Pantau</div><div class="metric-val" style="color:var(--amber)">${pantau}</div><div class="metric-sub">Risiko</div></div>
    <div class="metric"><div class="metric-label"><i class="ti ti-check" style="color:var(--green)"></i>Gizi Baik</div><div class="metric-val" style="color:var(--green)">${normal}</div><div class="metric-sub">${total?Math.round(normal/total*100):0}% dari total</div></div>
  </div>
  <div class="grid-2 mb-16">
    <div class="card"><div class="card-title"><i class="ti ti-map-pin"></i>Sebaran Stunting per Wilayah</div><div class="chart-bar-wrap">${wBars}</div></div>
    <div class="card">
      <div class="card-title"><i class="ti ti-chart-pie"></i>Status Gizi (Terakhir Diukur)</div>
      <div style="display:flex;flex-direction:column;gap:12px;margin-top:4px">
        ${[['Normal',normal,'var(--green)'],['Perlu Pantau',pantau,'var(--amber)'],['Stunting',stunting,'var(--red)']].map(([l,v,c])=>`
          <div style="display:flex;align-items:center;gap:10px">
            <div style="width:12px;height:12px;border-radius:3px;background:${c};flex-shrink:0"></div>
            <div style="flex:1;font-size:13px;color:var(--text2)">${l}</div>
            <div style="font-weight:600;font-size:13px">${v}</div>
            <div style="width:90px;height:8px;background:var(--bg);border-radius:4px;overflow:hidden"><div style="height:100%;width:${total?Math.round(v/total*100):0}%;background:${c};border-radius:4px"></div></div>
            <div style="font-size:12px;color:var(--text2);width:32px;text-align:right">${total?Math.round(v/total*100):0}%</div>
          </div>`).join('')}
      </div>
    </div>
  </div>
  <div class="card"><div class="card-title"><i class="ti ti-clock"></i>Pengukuran Terbaru</div>
  <div class="table-wrap"><table><thead><tr><th>Nama</th><th>Usia</th><th>BB (kg)</th><th>TB (cm)</th><th>Z-Score TB/U</th><th>Status</th><th>Tanggal</th></tr></thead><tbody>${rows||'<tr><td colspan=7 style="text-align:center;color:var(--text2)">Belum ada data</td></tr>'}</tbody></table></div></div>`;
};
 
// ──────────────────────────────────────
// REGISTRASI ANAK
// ──────────────────────────────────────
SECTIONS.registrasi = ()=>{
  const anak = DB.get('anak')||[];
  const rows=anak.map(a=>`<tr>
    <td>${fmt(a.nama)}</td>
    <td>${fmt(a.nik)}</td>
    <td>${a.jenisKelamin==='L'?'Laki-laki':'Perempuan'}</td>
    <td>${fmtDate(a.tglLahir || a.tgl_lahir)} <span class="text-muted">(${hitungUsia(a.tglLahir || a.tgl_lahir)} bln)</span></td>
    <td>${fmt(a.namaIbu)}</td>
    <td>${fmt(a.wilayah)}</td>
    <td>${fmt(a.posyandu)}</td>
    <td><div class="table-action">
      <button class="btn btn-sm btn-icon" title="Detail" onclick="detailAnak(${a.id})"><i class="ti ti-eye"></i></button>
      <button class="btn btn-sm btn-icon" title="Edit" onclick="editAnak(${a.id})"><i class="ti ti-edit"></i></button>
      ${currentUser.role==='admin'?`<button class="btn btn-sm btn-danger btn-icon" title="Hapus" onclick="hapusAnak(${a.id})"><i class="ti ti-trash"></i></button>`:''}
    </div></td>
  </tr>`).join('');
  return `
  <div class="search-row">
    <div class="search-input-wrap"><i class="ti ti-search"></i><input id="searchAnak" placeholder="Cari nama, NIK, wilayah..." oninput="filterAnak()"></div>
    <button class="btn btn-primary" onclick="tambahAnak()"><i class="ti ti-plus"></i>Tambah Anak</button>
  </div>
  <div class="card"><div class="card-title"><i class="ti ti-users"></i>Daftar Balita <span class="badge badge-green">${anak.length} anak</span></div>
  <div class="table-wrap"><table id="tblAnak"><thead><tr><th>Nama</th><th>NIK</th><th>JK</th><th>Tgl Lahir</th><th>Nama Ibu</th><th>Wilayah</th><th>Posyandu</th><th>Aksi</th></tr></thead><tbody>${rows||'<tr><td colspan=8 class="text-muted" style="text-align:center">Belum ada data</td></tr>'}</tbody></table></div></div>`;
};
 
function filterAnak(){
  const q=document.getElementById('searchAnak').value.toLowerCase();
  const anak=DB.get('anak')||[];
  const filtered=anak.filter(a=>(a.nama+a.nik+a.wilayah+a.namaIbu).toLowerCase().includes(q));
  const tbody=document.querySelector('#tblAnak tbody');
  tbody.innerHTML=filtered.map(a=>`<tr>
    <td>${fmt(a.nama)}</td><td>${fmt(a.nik)}</td>
    <td>${a.jenisKelamin==='L'?'Laki-laki':'Perempuan'}</td>
    <td>${fmtDate(a.tglLahir || a.tgl_lahir)} <span class="text-muted">(${hitungUsia(a.tglLahir || a.tgl_lahir)} bln)</span></td>
    <td>${fmt(a.namaIbu)}</td><td>${fmt(a.wilayah)}</td><td>${fmt(a.posyandu)}</td>
    <td><div class="table-action">
      <button class="btn btn-sm btn-icon" onclick="detailAnak(${a.id})"><i class="ti ti-eye"></i></button>
      <button class="btn btn-sm btn-icon" onclick="editAnak(${a.id})"><i class="ti ti-edit"></i></button>
      ${currentUser.role==='admin'?`<button class="btn btn-sm btn-danger btn-icon" onclick="hapusAnak(${a.id})"><i class="ti ti-trash"></i></button>`:''}
    </div></td>
  </tr>`).join('')||'<tr><td colspan=8 style="text-align:center;color:var(--text2)">Tidak ditemukan</td></tr>';
}
 
function formAnak(data={}){
  const wil=(DB.get('wilayah')||[]).map(w=>w.nama);
  const pos=(DB.get('posyandu')||[]).map(p=>p.nama);
  return `
  <div class="form-group"><label>NIK Anak</label><input id="f_nik" value="${data.nik||''}" placeholder="16 digit NIK"></div>
  <div class="grid-2">
    <div class="form-group col-span-2"><label>Nama Lengkap Anak</label><input id="f_nama" value="${data.nama||''}" placeholder="Nama lengkap"></div>
    <div class="form-group"><label>Tanggal Lahir</label><input type="date" id="f_tgl" value="${data.tglLahir || a.tgl_lahir||''}"></div>
    <div class="form-group"><label>Jenis Kelamin</label><select id="f_jk"><option value="L" ${data.jenisKelamin==='L'?'selected':''}>Laki-laki</option><option value="P" ${data.jenisKelamin==='P'?'selected':''}>Perempuan</option></select></div>
    <div class="form-group col-span-2"><label>Nama Ibu</label><input id="f_namaIbu" value="${data.namaIbu||''}" placeholder="Nama ibu kandung"></div>
    <div class="form-group"><label>NIK Ibu</label><input id="f_nikIbu" value="${data.nikIbu||''}" placeholder="NIK ibu"></div>
    <div class="form-group"><label>No. HP</label><input id="f_hp" value="${data.noHP||''}" placeholder="08xxx"></div>
    <div class="form-group col-span-2"><label>Alamat</label><input id="f_alamat" value="${data.alamat||''}" placeholder="Alamat lengkap"></div>
    <div class="form-group"><label>Wilayah</label><select id="f_wil" onchange="filterPosyanduForm()">${wil.length?wil.map(w=>`<option ${data.wilayah===w?'selected':''}>${w}</option>`).join(''):'<option>— Belum ada wilayah —</option>'}</select></div>
    <div class="form-group"><label>Posyandu</label><select id="f_pos">${pos.length?pos.map(p=>`<option ${data.posyandu===p?'selected':''}>${p}</option>`).join(''):'<option>— Belum ada posyandu —</option>'}</select></div>
  </div>`;
}
 
function filterPosyanduForm(){
  const wilVal = document.getElementById('f_wil').value;
  const allPos = DB.get('posyandu')||[];
  const filtered = allPos.filter(p=>!p.wilayah||p.wilayah===wilVal);
  const sel = document.getElementById('f_pos');
  sel.innerHTML = filtered.length
    ? filtered.map(p=>`<option>${p.nama}</option>`).join('')
    : '<option>— Tidak ada posyandu —</option>';
}
 
function tambahAnak(){
  openModal(`<div class="modal-header"><div class="modal-title">Tambah Data Anak</div><div class="modal-close" onclick="closeModal()"><i class="ti ti-x"></i></div></div>
  ${formAnak()}
  <div class="modal-footer"><button class="btn" onclick="closeModal()">Batal</button><button class="btn btn-primary" onclick="simpanAnak()"><i class="ti ti-check"></i>Simpan</button></div>`);
}
 
function editAnak(id){
  const a=DB.get('anak').find(x=>x.id===id);
  openModal(`<div class="modal-header"><div class="modal-title">Edit Data Anak</div><div class="modal-close" onclick="closeModal()"><i class="ti ti-x"></i></div></div>
  ${formAnak(a)}
  <div class="modal-footer"><button class="btn" onclick="closeModal()">Batal</button><button class="btn btn-primary" onclick="updateAnak(${id})"><i class="ti ti-check"></i>Simpan</button></div>`);
}
 
function detailAnak(id){
  const a=DB.get('anak').find(x=>x.id===id);
  const ukur=DB.get('pengukuran').filter(u=>u.idAnak===id).sort((a,b)=>b.tanggal.localeCompare(a.tanggal));
  const last=ukur[0];
  openModal(`<div class="modal-header"><div class="modal-title">Profil — ${a.nama}</div><div class="modal-close" onclick="closeModal()"><i class="ti ti-x"></i></div></div>
  <div class="info-row"><div class="info-label">NIK</div><div class="info-val">${fmt(a.nik)}</div></div>
  <div class="info-row"><div class="info-label">Jenis Kelamin</div><div class="info-val">${a.jenisKelamin==='L'?'Laki-laki':'Perempuan'}</div></div>
  <div class="info-row"><div class="info-label">Tanggal Lahir</div><div class="info-val">${fmtDate(a.tglLahir || a.tgl_lahir)} (${hitungUsia(a.tglLahir || a.tgl_lahir)} bulan)</div></div>
  <div class="info-row"><div class="info-label">Nama Ibu</div><div class="info-val">${fmt(a.namaIbu)}</div></div>
  <div class="info-row"><div class="info-label">No. HP</div><div class="info-val">${fmt(a.noHP)}</div></div>
  <div class="info-row"><div class="info-label">Alamat</div><div class="info-val">${fmt(a.alamat)}</div></div>
  <div class="info-row"><div class="info-label">Wilayah / Posyandu</div><div class="info-val">${fmt(a.wilayah)} / ${fmt(a.posyandu)}</div></div>
  ${last?`<div style="margin-top:14px"><b>Pengukuran Terakhir</b> (${fmtDate(last.tanggal)})</div>
  <div class="info-row"><div class="info-label">BB / TB</div><div class="info-val">${last.bb} kg / ${last.tb} cm</div></div>
  <div class="info-row"><div class="info-label">Z-Score TB/U</div><div class="info-val">${last.zscore_tbu}</div></div>
  <div class="info-row"><div class="info-label">Status Gizi</div><div class="info-val">${statusBadge(last.status)}</div></div>`:'<div class="alert alert-info mt-12"><i class="ti ti-info-circle"></i>Belum ada data pengukuran.</div>'}
  <div class="modal-footer"><button class="btn" onclick="closeModal()">Tutup</button></div>`);
}
 
function getFormAnak(){
  return {nik:document.getElementById('f_nik').value.trim(),nama:document.getElementById('f_nama').value.trim(),
    tglLahir:document.getElementById('f_tgl').value,jenisKelamin:document.getElementById('f_jk').value,
    namaIbu:document.getElementById('f_namaIbu').value.trim(),nikIbu:document.getElementById('f_nikIbu').value.trim(),
    noHP:document.getElementById('f_hp').value.trim(),alamat:document.getElementById('f_alamat').value.trim(),
    wilayah:document.getElementById('f_wil').value,posyandu:document.getElementById('f_pos').value};
}
 
async function simpanAnak(){
  const d = getFormAnak();
  if(!d.nama||!d.tglLahir){showToast('Nama dan tanggal lahir wajib diisi','error');return;}
  
  try {
    // Simpan anak ke database, ambil ID dari MySQL
    const res = await fetch('/api/balita',{
      method:'POST',
      headers:{'Content-Type':'application/json'},
      body: JSON.stringify(d)
    });
    const result = await res.json();
    if(!result.success){showToast('Gagal menyimpan data anak','error');return;}
    
    const anak = DB.get('anak') || [];
    anak.push({...d, id: result.data.id}); // ← pakai ID dari MySQL
    DB.set('anak', anak);

    // Auto-buat akun ortu
    if(d.nikIbu){
      const users = DB.get('users') || [];
      const existingOrtu = users.find(u=>u.nik===d.nikIbu&&u.role==='ortu');
      if(!existingOrtu){
        // Simpan akun ortu ke database
        const resOrtu = await fetch('/api/pengguna',{
          method:'POST',
          headers:{'Content-Type':'application/json'},
          body: JSON.stringify({username:d.nikIbu,password:d.nikIbu,role:'ortu',nama:d.namaIbu||'Orang Tua',nik:d.nikIbu,noHP:d.noHP||''})
        });
        const resultOrtu = await resOrtu.json();
        users.push({id:resultOrtu.data.id,username:d.nikIbu,password:d.nikIbu,role:'ortu',nama:d.namaIbu||'Orang Tua',nik:d.nikIbu,noHP:d.noHP||''});
        DB.set('pengguna', users);
        showToast(`Anak disimpan & akun orang tua dibuat (NIK: ${d.nikIbu})`,'success');
      } else {
        showToast('Data anak berhasil disimpan (akun ortu sudah ada)','success');
      }
    } else {
      showToast('Data anak berhasil disimpan','success');
    }
  } catch(e){
    showToast('Gagal menyimpan','error');
    return;
  }

  closeModal();renderSection('registrasi');
}
async function updateAnak(id){
  const d=getFormAnak();if(!d.nama){showToast('Nama wajib diisi','error');return;}
  await fetch(`/api/balita/${id}`,{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify(d)});
  DB.set('anak',(DB.get('anak')||[]).map(a=>a.id==id?{...a,...d}:a));
  closeModal();showToast('Data berhasil diperbarui');renderSection('registrasi');
}
async function hapusAnak(id){
  if(!confirm('Hapus data anak ini?'))return;
  await fetch(`/api/balita/${id}/delete`,{method:'POST'});
  DB.set('anak',(DB.get('anak')||[]).filter(a=>a.id!=id));
  DB.set('pengukuran',(DB.get('pengukuran')||[]).filter(u=>u.idAnak!=id));
  showToast('Data dihapus');renderSection('registrasi');
}
 
// ──────────────────────────────────────
// PENGUKURAN FISIK
// ──────────────────────────────────────
SECTIONS.pengukuran = ()=>{
  const ukur=DB.get('pengukuran')||[];
  const anak=DB.get('anak')||[];
  const rows=ukur.sort((a,b)=>b.tanggal.localeCompare(a.tanggal)).map(u=>{
    const a=anak.find(x=>x.id===u.idAnak)||{};
    return `<tr>
      <td>${fmtDate(u.tanggal)}</td>
      <td>${fmt(a.nama)}</td>
      <td>${hitungUsia(a.tglLahir || a.tgl_lahir)} bln</td>
      <td>${u.bb}</td><td>${u.tb}</td><td>${u.lk||'-'}</td><td>${u.lla||'-'}</td>
      <td>${u.zscore_bbu}</td><td>${u.zscore_tbu}</td>
      <td>${statusBadge(u.status)}</td>
      <td>${fmt(u.catatan)}</td>
      <td><div class="table-action">
        <button class="btn btn-sm btn-icon" onclick="editUkur(${u.id})"><i class="ti ti-edit"></i></button>
        <button class="btn btn-sm btn-danger btn-icon" onclick="hapusUkur(${u.id})"><i class="ti ti-trash"></i></button>
      </div></td>
    </tr>`;}).join('');
  return `
  <div class="search-row">
    <div class="search-input-wrap"><i class="ti ti-search"></i><input placeholder="Cari nama anak..."></div>
    <button class="btn btn-primary" onclick="tambahUkur()"><i class="ti ti-plus"></i>Input Pengukuran</button>
  </div>
  <div class="alert alert-info mb-12"><i class="ti ti-info-circle"></i>Z-score dihitung otomatis berdasarkan standar WHO. Status: Normal (>-2SD), Perlu Pantau (-2 s/d -3SD), Stunting (&lt;-3SD untuk TB/U).</div>
  <div class="card"><div class="card-title"><i class="ti ti-ruler-measure"></i>Riwayat Pengukuran <span class="badge badge-green">${ukur.length} data</span></div>
  <div class="table-wrap"><table><thead><tr><th>Tanggal</th><th>Nama Anak</th><th>Usia</th><th>BB (kg)</th><th>TB (cm)</th><th>LK (cm)</th><th>LLA (cm)</th><th>Z BB/U</th><th>Z TB/U</th><th>Status</th><th>Catatan</th><th>Aksi</th></tr></thead><tbody>${rows||'<tr><td colspan=12 style="text-align:center;color:var(--text2)">Belum ada data</td></tr>'}</tbody></table></div></div>`;
};
 
// ── WHO TB/U & BB/U tables (simplified, key months, L & P) ──
const WHO_TBU = {
  L:{0:[49.9,1.9,3.8,5.7],3:[61.4,2.0,4.0,6.0],6:[67.6,2.1,4.2,6.3],9:[72.3,2.3,4.6,6.9],12:[75.7,2.6,5.2,7.8],15:[79.1,2.7,5.4,8.1],18:[82.3,2.8,5.6,8.4],24:[87.8,3.0,6.0,9.0],30:[91.9,3.2,6.4,9.6],36:[96.1,3.4,6.8,10.2],42:[99.9,3.5,7.0,10.5],48:[103.3,3.6,7.2,10.8],54:[106.4,3.7,7.4,11.1],60:[109.4,3.8,7.6,11.4]},
  P:{0:[49.1,1.9,3.8,5.7],3:[59.8,2.0,4.0,6.0],6:[65.7,2.1,4.2,6.3],9:[70.1,2.3,4.6,6.9],12:[74.0,2.5,5.0,7.5],15:[77.5,2.7,5.4,8.1],18:[80.7,2.8,5.6,8.4],24:[86.4,3.0,6.0,9.0],30:[90.8,3.2,6.4,9.6],36:[95.1,3.4,6.8,10.2],42:[98.7,3.5,7.0,10.5],48:[102.7,3.6,7.2,10.8],54:[106.2,3.7,7.4,11.1],60:[109.4,3.8,7.6,11.4]}
};
const WHO_BBU = {
  L:{0:[3.3,0.4,0.8,1.2],3:[6.4,0.7,1.4,2.1],6:[7.9,0.9,1.8,2.7],9:[9.2,1.0,2.0,3.0],12:[10.2,1.1,2.2,3.3],18:[11.3,1.2,2.4,3.6],24:[12.2,1.3,2.6,3.9],36:[14.3,1.5,3.0,4.5],48:[16.3,1.8,3.6,5.4],60:[18.3,2.0,4.0,6.0]},
  P:{0:[3.2,0.4,0.8,1.2],3:[5.8,0.7,1.4,2.1],6:[7.3,0.9,1.8,2.7],9:[8.5,1.0,2.0,3.0],12:[9.6,1.1,2.2,3.3],18:[10.8,1.2,2.4,3.6],24:[11.5,1.3,2.6,3.9],36:[13.9,1.5,3.0,4.5],48:[15.9,1.8,3.6,5.4],60:[17.7,2.0,4.0,6.0]}
};
function interpolateWHO(table,jk,usia){
  const keys=Object.keys(table[jk]).map(Number).sort((a,b)=>a-b);
  let lo=keys[0],hi=keys[keys.length-1];
  for(let i=0;i<keys.length-1;i++){if(usia>=keys[i]&&usia<=keys[i+1]){lo=keys[i];hi=keys[i+1];break;}}
  if(usia<=lo)return table[jk][lo];if(usia>=hi)return table[jk][hi];
  const t=(usia-lo)/(hi-lo);return table[jk][lo].map((v,i)=>v+t*(table[jk][hi][i]-v));
}
function hitungZScore(val,median,s1,s2,s3){
  const diff=val-median;
  if(diff>=0)return +(diff/s1).toFixed(2);
  if(diff>=-s2)return +(diff/s1).toFixed(2);
  if(diff>=-s3)return +((diff+s1)/s2).toFixed(2);
  return +((diff+s1+s2)/s3).toFixed(2);
}
function autoHitungZScore(){
  const idAnak=parseInt(document.getElementById('u_idAnak').value);
  const tgl=document.getElementById('u_tgl').value;
  const bb=parseFloat(document.getElementById('u_bb').value);
  const tb=parseFloat(document.getElementById('u_tb').value);
  if(!idAnak||!tgl||!tb){showToast('Isi TB dan pilih anak dahulu','error');return;}
  const anak=DB.get('anak').find(a=>a.id===idAnak);if(!anak)return;
  const usia=hitungUsia(anak.tglLahir);
  const jk=anak.jenisKelamin==='L'?'L':'P';
  const [mT,s1T,s2T,s3T]=interpolateWHO(WHO_TBU,jk,usia);
  const zTbu=hitungZScore(tb,mT,s1T,s2T,s3T);
  document.getElementById('u_ztbu').value=zTbu;
  if(bb){const [mB,s1B,s2B,s3B]=interpolateWHO(WHO_BBU,jk,usia);document.getElementById('u_zbbu').value=hitungZScore(bb,mB,s1B,s2B,s3B);}
  let status='Normal';
  if(zTbu<-3)status='Stunting Berat';
  else if(zTbu<-2)status='Stunting';
  else if(zTbu<-1)status='Perlu Pantau';
  document.getElementById('u_status').value=status;
  showToast('Z-Score dihitung otomatis: TB/U = '+zTbu);
}
function formUkur(data={},anak=[]){
  return `
  <div class="form-group"><label>Pilih Anak</label><select id="u_idAnak">${anak.map(a=>`<option value="${a.id}" ${data.idAnak===a.id?'selected':''}>${a.nama} (${hitungUsia(a.tglLahir || a.tgl_lahir)} bln)</option>`).join('')}</select></div>
  <div class="form-group"><label>Tanggal Pengukuran</label><input type="date" id="u_tgl" value="${data.tanggal||new Date().toISOString().split('T')[0]}"></div>
  <div class="grid-2">
    <div class="form-group"><label>Berat Badan (kg)</label><input type="number" id="u_bb" step="0.1" value="${data.bb||''}" placeholder="0.0"></div>
    <div class="form-group"><label>Tinggi Badan (cm)</label><input type="number" id="u_tb" step="0.1" value="${data.tb||''}" placeholder="0.0"></div>
    <div class="form-group"><label>Lingkar Kepala (cm)</label><input type="number" id="u_lk" step="0.1" value="${data.lk||''}" placeholder="0.0"></div>
    <div class="form-group"><label>Lingkar Lengan Atas (cm)</label><input type="number" id="u_lla" step="0.1" value="${data.lla||''}" placeholder="0.0"></div>
    <div class="form-group"><label>Z-Score BB/U</label><input type="number" id="u_zbbu" step="0.01" value="${data.zscore_bbu||''}" placeholder="Otomatis / manual"></div>
    <div class="form-group"><label>Z-Score TB/U</label><input type="number" id="u_ztbu" step="0.01" value="${data.zscore_tbu||''}" placeholder="Otomatis / manual"></div>
  </div>
  <button type="button" class="btn btn-primary w-full mb-12" onclick="autoHitungZScore()" style="justify-content:center"><i class="ti ti-calculator"></i> Hitung Z-Score Otomatis (Standar WHO)</button>
  <div class="form-group"><label>Status Gizi</label><select id="u_status"><option ${data.status==='Normal'?'selected':''}>Normal</option><option ${data.status==='Perlu Pantau'?'selected':''}>Perlu Pantau</option><option ${data.status==='Stunting'?'selected':''}>Stunting</option><option ${data.status==='Stunting Berat'?'selected':''}>Stunting Berat</option></select></div>
  <div class="form-group"><label>Catatan</label><textarea id="u_cat">${data.catatan||''}</textarea></div>`;
}
 
function getFormUkur(){
  return {idAnak:parseInt(document.getElementById('u_idAnak').value),tanggal:document.getElementById('u_tgl').value,
    bb:parseFloat(document.getElementById('u_bb').value)||0,tb:parseFloat(document.getElementById('u_tb').value)||0,
    lk:parseFloat(document.getElementById('u_lk').value)||0,lla:parseFloat(document.getElementById('u_lla').value)||0,
    zscore_bbu:parseFloat(document.getElementById('u_zbbu').value)||0,zscore_tbu:parseFloat(document.getElementById('u_ztbu').value)||0,
    status:document.getElementById('u_status').value,catatan:document.getElementById('u_cat').value};
}
 
function tambahUkur(){
  const anak=DB.get('anak')||[];
  openModal(`<div class="modal-header"><div class="modal-title">Input Pengukuran Fisik</div><div class="modal-close" onclick="closeModal()"><i class="ti ti-x"></i></div></div>
  ${formUkur({},anak)}
  <div class="modal-footer"><button class="btn" onclick="closeModal()">Batal</button><button class="btn btn-primary" onclick="simpanUkur()"><i class="ti ti-check"></i>Simpan</button></div>`);
}
function editUkur(id){
  const u=DB.get('pengukuran').find(x=>x.id===id),anak=DB.get('anak')||[];
  openModal(`<div class="modal-header"><div class="modal-title">Edit Pengukuran</div><div class="modal-close" onclick="closeModal()"><i class="ti ti-x"></i></div></div>
  ${formUkur(u,anak)}
  <div class="modal-footer"><button class="btn" onclick="closeModal()">Batal</button><button class="btn btn-primary" onclick="updateUkur(${id})"><i class="ti ti-check"></i>Simpan</button></div>`);
}
function simpanUkur(){
  const d=getFormUkur();if(!d.idAnak||!d.tanggal){showToast('Pilih anak dan tanggal','error');return;}
  const ukur=DB.get('pengukuran');ukur.push({...d,id:uid()});DB.set('pengukuran',ukur);
  closeModal();showToast('Pengukuran berhasil disimpan');renderSection('pengukuran');
}
async function updateUkur(id){
  const d=getFormUkur();
  await fetch(`/api/pengukuran/${id}`,{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify(d)});
  DB.set('pengukuran',(DB.get('pengukuran')||[]).map(u=>u.id==id?{...u,...d}:u));
  closeModal();showToast('Data diperbarui');renderSection('pengukuran');
}
async function hapusUkur(id){
  if(!confirm('Hapus data pengukuran ini?'))return;
  await fetch(`/api/pengukuran/${id}/delete`,{method:'POST'});
  DB.set('pengukuran',(DB.get('pengukuran')||[]).filter(u=>u.id!=id));
  showToast('Data dihapus');renderSection('pengukuran');
}
 
// ──────────────────────────────────────
// DETEKSI STUNTING
// ──────────────────────────────────────
SECTIONS.deteksi = ()=>{
  const anak=DB.get('anak')||[];
  const ukur=DB.get('pengukuran')||[];
  const latest={};
  ukur.sort((a,b)=>b.tanggal.localeCompare(a.tanggal)).forEach(u=>{if(!latest[u.idAnak])latest[u.idAnak]=u;});
  const stunt=anak.filter(a=>latest[a.id]&&(latest[a.id].status==='Stunting'||latest[a.id].status==='Stunting Berat'));
  const pantau=anak.filter(a=>latest[a.id]&&latest[a.id].status==='Perlu Pantau');
  const normal=anak.filter(a=>latest[a.id]&&latest[a.id].status==='Normal');
  const rows=(s,cls)=>s.map(a=>{const u=latest[a.id];return `<tr>
    <td>${fmt(a.nama)}</td><td>${hitungUsia(a.tglLahir || a.tgl_lahir)} bln</td><td>${a.jenisKelamin==='L'?'L':'P'}</td>
    <td>${u.tb} cm</td><td class="${cls}">${u.zscore_tbu}</td>
    <td>${statusBadge(u.status)}</td><td>${fmt(a.wilayah)}</td>
    <td>${fmtDate(u.tanggal)}</td>
    <td><button class="btn btn-sm" onclick="detailAnak(${a.id})"><i class="ti ti-eye"></i>Detail</button></td>
  </tr>`;}).join('');
  return `
  <div class="grid-3 mb-16">
    <div class="risk-card risk-stunt"><div class="risk-title" style="color:#991b1b">Stunting</div><div class="risk-val" style="color:var(--red)">${stunt.length}</div><div class="risk-sub" style="color:#991b1b">Z-Score TB/U &lt; -2 SD</div></div>
    <div class="risk-card risk-watch"><div class="risk-title" style="color:#92400e">Perlu Dipantau</div><div class="risk-val" style="color:var(--amber)">${pantau.length}</div><div class="risk-sub" style="color:#92400e">Z-Score -1 s/d -2 SD</div></div>
    <div class="risk-card risk-normal"><div class="risk-title" style="color:#166534">Normal</div><div class="risk-val" style="color:var(--green)">${normal.length}</div><div class="risk-sub" style="color:#166534">Z-Score &gt; -1 SD</div></div>
  </div>
  <div class="card mb-16">
    <div class="alert alert-warning" style="margin-bottom:0"><i class="ti ti-alert-triangle"></i><div><b>Perhatian:</b> Terdapat <b>${stunt.length} balita terdeteksi stunting</b> yang memerlukan tindak lanjut segera. Silakan koordinasi dengan dokter dan tim gizi puskesmas.</div></div>
  </div>
  <div class="card">
    <div class="tabs">
      <div class="tab active" onclick="switchDeteksiTab('stunting',this)">Stunting (${stunt.length})</div>
      <div class="tab" onclick="switchDeteksiTab('pantau',this)">Perlu Pantau (${pantau.length})</div>
      <div class="tab" onclick="switchDeteksiTab('normal',this)">Normal (${normal.length})</div>
    </div>
    <div id="deteksiTabContent">
      <div class="table-wrap"><table><thead><tr><th>Nama</th><th>Usia</th><th>JK</th><th>TB</th><th>Z TB/U</th><th>Status</th><th>Wilayah</th><th>Ukur Terakhir</th><th>Aksi</th></tr></thead>
      <tbody id="deteksiBody">${rows(stunt,'')}</tbody></table></div>
    </div>
  </div>`;
};
 
function switchDeteksiTab(tab,el){
  document.querySelectorAll('.tab').forEach(t=>t.classList.remove('active'));
  el.classList.add('active');
  const anak=DB.get('anak')||[];const ukur=DB.get('pengukuran')||[];
  const latest={};ukur.sort((a,b)=>b.tanggal.localeCompare(a.tanggal)).forEach(u=>{if(!latest[u.idAnak])latest[u.idAnak]=u;});
  const filterMap={stunting:['Stunting','Stunting Berat'],pantau:['Perlu Pantau'],normal:['Normal']};
  const filtered=anak.filter(a=>latest[a.id]&&filterMap[tab].includes(latest[a.id].status));
  document.getElementById('deteksiBody').innerHTML=filtered.map(a=>{const u=latest[a.id];return `<tr>
    <td>${fmt(a.nama)}</td><td>${hitungUsia(a.tglLahir || a.tgl_lahir)} bln</td><td>${a.jenisKelamin==='L'?'L':'P'}</td>
    <td>${u.tb} cm</td><td>${u.zscore_tbu}</td><td>${statusBadge(u.status)}</td>
    <td>${fmt(a.wilayah)}</td><td>${fmtDate(u.tanggal)}</td>
    <td><button class="btn btn-sm" onclick="detailAnak(${a.id})"><i class="ti ti-eye"></i>Detail</button></td>
  </tr>`;}).join('')||'<tr><td colspan=9 style="text-align:center;color:var(--text2)">Tidak ada data</td></tr>';
}
 
// ──────────────────────────────────────
// ARTIKEL
// ──────────────────────────────────────
SECTIONS.artikel = ()=>{
  const art=DB.get('artikel')||[];
  const canEdit = currentUser.role==='admin'||currentUser.role==='bidan';
  const cards=art.map(a=>{
    const thumb = a.foto
      ? `<img class="artikel-thumb" src="${a.foto}" alt="${a.judul}" onerror="this.style.display='none'">`
      : `<div class="artikel-thumb-placeholder"><i class="ti ti-article"></i></div>`;
    const mediaBadge = a.videoUrl ? `<span class="artikel-media-badge"><i class="ti ti-player-play" style="font-size:10px"></i> Video</span>` : '';
    return `
    <div class="artikel-card" onclick="bacaArtikel(${a.id})">
      ${canEdit ? `<div class="artikel-card-delete" onclick="event.stopPropagation();hapusArtikel(${a.id})" title="Hapus"><i class="ti ti-x" style="font-size:12px"></i></div>` : ''}
      ${thumb}
      <div class="artikel-card-body">
        <div><span class="artikel-cat">${a.kategori}</span>${mediaBadge ? ' '+mediaBadge : ''}</div>
        <div class="artikel-title">${a.judul}</div>
        <div class="artikel-meta"><i class="ti ti-user" style="font-size:13px"></i> ${a.penulis} · ${fmtDate(a.tanggal)}</div>
      </div>
    </div>`;}).join('');
  return `
  <div class="search-row">
    <div class="search-input-wrap"><i class="ti ti-search"></i><input placeholder="Cari artikel..."></div>
    ${canEdit?`<button class="btn btn-primary" onclick="tambahArtikel()"><i class="ti ti-plus"></i>Tulis Artikel</button>`:''}
  </div>
  <div class="artikel-grid">${cards||'<div class="empty"><i class="ti ti-article"></i><p>Belum ada artikel.</p></div>'}</div>`;
};
 
function bacaArtikel(id){
  const a=DB.get('artikel').find(x=>x.id===id);
  const canEdit=currentUser.role==='admin'||currentUser.role==='bidan';
  const fotoHtml = a.foto ? `<img class="artikel-img-full" src="${a.foto}" alt="${a.judul}" onerror="this.style.display='none'">` : '';
  const videoHtml = a.videoUrl ? `
    <div style="margin-bottom:4px;font-size:12px;font-weight:600;color:var(--text2);display:flex;align-items:center;gap:6px"><i class="ti ti-player-play" style="color:var(--amber)"></i> Video Edukasi</div>
    <div class="artikel-video-wrap"><iframe src="${a.videoUrl}" allowfullscreen allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe></div>` : '';
  openModal(`<div class="modal-header"><div class="modal-title">${a.judul}</div><div class="modal-close" onclick="closeModal()"><i class="ti ti-x"></i></div></div>
  <div style="margin-bottom:10px"><span class="badge badge-green">${a.kategori}</span></div>
  <div class="artikel-meta mb-12"><i class="ti ti-user" style="font-size:13px"></i> ${a.penulis} · ${fmtDate(a.tanggal)}</div>
  ${fotoHtml}
  ${videoHtml}
  <div class="artikel-body">${a.isi}</div>
  <div class="modal-footer">${canEdit?`<button class="btn" onclick="editArtikel(${a.id})"><i class="ti ti-edit"></i>Edit</button><button class="btn btn-danger" onclick="hapusArtikel(${a.id})"><i class="ti ti-trash"></i>Hapus</button>`:''}
  <button class="btn btn-primary" onclick="closeModal()">Tutup</button></div>`);
}
 
function formArtikel(data={}){
  return `
  <div class="form-group"><label>Judul Artikel</label><input id="a_judul" value="${data.judul||''}" placeholder="Judul..."></div>
  <div class="grid-2">
    <div class="form-group"><label>Kategori</label><select id="a_kat">${['Stunting','Gizi','Tumbuh Kembang','Ibu Hamil','MPASI'].map(k=>`<option ${data.kategori===k?'selected':''}>${k}</option>`).join('')}</select></div>
    <div class="form-group"><label>Penulis</label><input id="a_penulis" value="${data.penulis||currentUser.nama}" placeholder="Nama penulis"></div>
    <div class="form-group"><label>Tanggal</label><input type="date" id="a_tgl" value="${data.tanggal||new Date().toISOString().split('T')[0]}"></div>
  </div>
  <div class="form-group">
    <label><i class="ti ti-photo" style="font-size:13px;vertical-align:middle"></i> Foto / Gambar Artikel <span style="font-weight:400;color:var(--text3)">(wajib ada)</span></label>
    <div style="display:flex;flex-direction:column;gap:8px">
      <input id="a_foto" value="${data.foto||''}" placeholder="Tempel link gambar dari internet (https://...)" style="border-radius:var(--radius);padding:9px 12px;border:1px solid var(--border);font-size:13px;font-family:inherit;outline:none">
      <div style="display:flex;align-items:center;gap:8px;font-size:12px;color:var(--text2)"><span>— atau —</span></div>
      <label style="display:flex;align-items:center;gap:8px;cursor:pointer;padding:9px 12px;border:1px dashed var(--green);border-radius:var(--radius);background:var(--green-light);color:var(--green-dark);font-size:13px">
        <i class="ti ti-upload"></i> Upload foto dari laptop
        <input type="file" id="a_foto_file" accept="image/*" style="display:none" onchange="previewFotoArtikel(this)">
      </label>
    </div>
    <div id="a_foto_preview" style="margin-top:6px">${data.foto?`<img src="${data.foto}" style="width:100%;max-height:140px;object-fit:cover;border-radius:var(--radius)" onerror="this.style.display='none'">`:''}  </div>
  </div>
  <div class="form-group">
    <label><i class="ti ti-brand-youtube" style="font-size:13px;vertical-align:middle;color:#e00"></i> Video YouTube <span style="font-weight:400;color:var(--text3)">(opsional)</span></label>
    <input id="a_video" value="${data.videoUrl||''}" placeholder="Tempel link YouTube, contoh: https://youtu.be/xxxx atau https://www.youtube.com/watch?v=xxxx">
  </div>
  <div class="form-group"><label>Isi Artikel</label><textarea id="a_isi" style="min-height:140px">${data.isi||''}</textarea></div>`;
}
 
function previewFotoArtikel(input){
  const file=input.files[0];if(!file)return;
  const reader=new FileReader();
  reader.onload=e=>{
    document.getElementById('a_foto').value='';
    document.getElementById('a_foto_preview').innerHTML=`<img src="${e.target.result}" style="width:100%;max-height:140px;object-fit:cover;border-radius:var(--radius)" data-base64="${e.target.result}">`;
  };
  reader.readAsDataURL(file);
}
function toYoutubeEmbed(url){
  if(!url)return'';
  // Already embed
  if(url.includes('youtube.com/embed/'))return url;
  // youtu.be/ID
  let m=url.match(/youtu\.be\/([^?&]+)/);
  if(m)return`https://www.youtube.com/embed/${m[1]}`;
  // youtube.com/watch?v=ID
  m=url.match(/[?&]v=([^&]+)/);
  if(m)return`https://www.youtube.com/embed/${m[1]}`;
  return url;
}
 
function tambahArtikel(){
  openModal(`<div class="modal-header"><div class="modal-title">Tulis Artikel Baru</div><div class="modal-close" onclick="closeModal()"><i class="ti ti-x"></i></div></div>
  ${formArtikel()}
  <div class="modal-footer"><button class="btn" onclick="closeModal()">Batal</button><button class="btn btn-primary" onclick="simpanArtikel()"><i class="ti ti-check"></i>Publish</button></div>`);
}
async function updateArtikel(id){
  const d=getFormArtikel();
  await fetch(`/api/artikel/${id}`,{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify(d)});
  DB.set('artikel',(DB.get('artikel')||[]).map(a=>a.id==id?{...a,...d}:a));
  closeModal();showToast('Artikel diperbarui');renderSection('artikel');
}
function getFormArtikel(){
  // Foto: prioritaskan file upload (base64), lalu URL
  let foto=document.getElementById('a_foto').value.trim();
  const imgEl=document.querySelector('#a_foto_preview img[data-base64]');
  if(imgEl)foto=imgEl.getAttribute('data-base64');
  const rawVideo=document.getElementById('a_video').value.trim();
  return{judul:document.getElementById('a_judul').value.trim(),kategori:document.getElementById('a_kat').value,penulis:document.getElementById('a_penulis').value.trim(),tanggal:document.getElementById('a_tgl').value,foto,videoUrl:toYoutubeEmbed(rawVideo),isi:document.getElementById('a_isi').value.trim()};
}
function simpanArtikel(){
  const d=getFormArtikel();if(!d.judul||!d.isi){showToast('Judul dan isi wajib diisi','error');return;}
  const art=DB.get('artikel');art.push({...d,id:uid()});DB.set('artikel',art);
  closeModal();showToast('Artikel berhasil dipublish');renderSection('artikel');
}
function updateArtikel(id){
  const d=getFormArtikel();
  DB.set('artikel',DB.get('artikel').map(a=>a.id===id?{...a,...d}:a));
  closeModal();showToast('Artikel diperbarui');renderSection('artikel');
}
async function hapusArtikel(id){
  if(!confirm('Hapus artikel ini?'))return;
  await fetch(`/api/artikel/${id}/delete`,{method:'POST'});
  DB.set('artikel',(DB.get('artikel')||[]).filter(a=>a.id!=id));
  closeModal();showToast('Artikel dihapus');renderSection('artikel');
}
 
// ──────────────────────────────────────
// JADWAL & NOTIFIKASI (per-posyandu)
// ──────────────────────────────────────

function getPosyanduOrtu(){
  if(currentUser.role !== 'ortu') return null;
  const anak = DB.get('anak') || [];
  const nikOrtu = currentUser.nik || currentUser.username;
  const anakku = anak.find(x => (x.nikIbu || x.nik_ibu) === nikOrtu);
  return anakku ? anakku.posyandu : null;
}

function hariMenuju(tgl){
  const today=new Date(); today.setHours(0,0,0,0);
  const target=new Date(tgl); target.setHours(0,0,0,0);
  return Math.round((target-today)/(1000*60*60*24));
}

function reminderBadge(tgl, published){
  if(!published) return `<span class="badge badge-gray"><i class="ti ti-eye-off" style="font-size:11px"></i> Draft</span>`;
  const h=hariMenuju(tgl);
  if(h<0) return `<span class="badge badge-gray">Selesai</span>`;
  if(h===0) return `<span class="badge badge-red"><i class="ti ti-bell-ringing" style="font-size:11px"></i> Hari ini!</span>`;
  if(h<=3) return `<span class="badge badge-red"><i class="ti ti-alarm" style="font-size:11px"></i> ${h} hari lagi</span>`;
  if(h<=7) return `<span class="badge badge-amber"><i class="ti ti-clock" style="font-size:11px"></i> ${h} hari lagi</span>`;
  return `<span class="badge badge-green"><i class="ti ti-calendar" style="font-size:11px"></i> ${h} hari lagi</span>`;
}

SECTIONS.jadwal = ()=>{
  let jdwl=DB.get('jadwal')||[];
  const canEdit=currentUser.role==='admin'||currentUser.role==='bidan';
  const isOrtu=currentUser.role==='ortu';
  const posyanduKu=getPosyanduOrtu();

  if(isOrtu){
    jdwl=jdwl.filter(j=>(j.posyandu===posyanduKu)&&j.published===true);
  }

  const sorted=[...jdwl].sort((a,b)=>a.tanggal.localeCompare(b.tanggal));

  const reminderItems=sorted.filter(j=>{const h=hariMenuju(j.tanggal);return h>=0&&h<=3;});
  const reminderBanner = isOrtu && reminderItems.length>0 ? `
  <div class="alert alert-warning mb-16" style="border-radius:var(--radius-lg);padding:14px 16px">
    <i class="ti ti-bell-ringing" style="font-size:20px"></i>
    <div>
      <div style="font-weight:600;margin-bottom:4px">Pengingat Jadwal Posyandu</div>
      ${reminderItems.map(j=>{
        const h=hariMenuju(j.tanggal);
        const label=h===0?'<b>Hari ini!</b>':`<b>${h} hari lagi</b>`;
        return `<div style="font-size:12px;margin-top:2px">· ${j.judul} — ${label} · ${j.waktu} · ${j.posyandu}</div>`;
      }).join('')}
    </div>
  </div>` : '';

  const infoBanner = isOrtu ? `
  <div class="alert alert-info mb-16" style="padding:10px 14px;font-size:12px">
    <i class="ti ti-building-community"></i>
    Menampilkan jadwal untuk posyandu: <b>${posyanduKu||'—'}</b>
  </div>` : '';

  const allPos=[...new Set((DB.get('jadwal')||[]).map(j=>j.posyandu).filter(Boolean))];
  const filterBar = canEdit ? `
  <div class="search-row mb-16">
    <select id="filterPosJdwl" onchange="renderSection('jadwal')" style="padding:8px 12px;border:1px solid var(--border);border-radius:var(--radius);font-size:13px;font-family:inherit;background:#fff;color:var(--text);outline:none">
      <option value="">— Semua Posyandu —</option>
      ${allPos.map(p=>`<option value="${p}">${p}</option>`).join('')}
    </select>
    <div style="flex:1"></div>
    <button class="btn btn-primary" onclick="tambahJadwal()"><i class="ti ti-plus"></i>Tambah Jadwal</button>
  </div>` : '';

  let tampil=sorted;
  if(canEdit){
    const filterEl=document.getElementById('filterPosJdwl');
    const filterVal=filterEl?filterEl.value:'';
    if(filterVal) tampil=sorted.filter(j=>j.posyandu===filterVal);
  }

  const drafts = canEdit ? tampil.filter(j=>!j.published) : [];
  const published = canEdit ? tampil.filter(j=>j.published) : tampil;

  function renderItem(j){
    const d=new Date(j.tanggal),day=d.getDate(),mon=d.toLocaleDateString('id-ID',{month:'short'});
    const h=hariMenuju(j.tanggal);
    const borderColor=!j.published?'#d1d5db':h<0?'#d1d5db':h<=3?'var(--red)':h<=7?'var(--amber)':'var(--green)';
    return `<div class="jadwal-item" style="border-left-color:${borderColor};${!j.published?'opacity:.8':''}">
      <div class="jadwal-date-box" style="background:${!j.published?'#9ca3af':borderColor}">${day}<br>${mon}</div>
      <div style="flex:1;min-width:0">
        <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:4px">
          <div class="jadwal-info-title" style="margin:0">${j.judul}</div>
          ${reminderBadge(j.tanggal, j.published)}
        </div>
        <div class="jadwal-info-meta"><i class="ti ti-clock" style="font-size:13px"></i> ${j.waktu} &nbsp;·&nbsp; <i class="ti ti-building-community" style="font-size:13px"></i> ${j.posyandu||'-'}</div>
        <div class="jadwal-info-meta mt-4"><i class="ti ti-user" style="font-size:13px"></i> ${j.petugas||'-'}</div>
        ${j.keterangan?`<div class="jadwal-info-meta mt-4" style="font-style:italic">${j.keterangan}</div>`:''}
      </div>
      ${canEdit?`<div style="display:flex;flex-direction:column;gap:5px;flex-shrink:0;align-items:flex-end">
        ${!j.published
          ?`<button class="btn btn-sm btn-primary" onclick="publishJadwal(${j.id})" style="white-space:nowrap"><i class="ti ti-send"></i>Luncurkan</button>`
          :`<button class="btn btn-sm" onclick="unpublishJadwal(${j.id})" style="white-space:nowrap;font-size:11px;color:var(--text3)"><i class="ti ti-eye-off"></i>Tarik</button>`
        }
        <div style="display:flex;gap:5px">
          <button class="btn btn-sm btn-icon" onclick="editJadwal(${j.id})" title="Edit"><i class="ti ti-edit"></i></button>
          <button class="btn btn-sm btn-danger btn-icon" onclick="hapusJadwal(${j.id})" title="Hapus"><i class="ti ti-trash"></i></button>
        </div>
      </div>`:''}
    </div>`;
  }

  const draftSection = drafts.length>0 ? `
  <div class="card mb-14">
    <div class="card-title" style="color:var(--text2)"><i class="ti ti-pencil"></i>Draft <span class="badge badge-gray">${drafts.length}</span></div>
    <div style="font-size:12px;color:var(--text3);margin-bottom:12px">Jadwal berikut belum diluncurkan — orang tua belum dapat melihatnya.</div>
    ${drafts.map(j=>renderItem(j)).join('')}
  </div>` : '';

  const publishedSection = `
  <div class="card">
    <div class="card-title"><i class="ti ti-calendar-event"></i>Jadwal Aktif <span class="badge badge-green">${published.length}</span></div>
    ${published.length?published.map(j=>renderItem(j)).join(''):'<div class="empty" style="padding:24px"><i class="ti ti-calendar-x"></i><p>Belum ada jadwal yang diluncurkan.</p></div>'}
  </div>`;

  return reminderBanner + infoBanner + filterBar + draftSection + publishedSection;
};

function publishJadwal(id) {
  const jdwl = DB.get('jadwal').map(j => j.id == id  // ← pakai == bukan ===
    ? { ...j, published: true, publishedAt: new Date().toISOString() }
    : j
  );
  DB.set('jadwal', jdwl);

  const j = jdwl.find(x => x.id == id); // ← pakai == bukan ===
  
  if (!j) { // ← tambah pengecekan
    showToast('Jadwal tidak ditemukan');
    return;
  }

  showToast(`Jadwal diluncurkan ke posyandu ${j.posyandu || '-'}`);
  renderSection('jadwal');
  updateNotifDot();
}
function unpublishJadwal(id){
  DB.set('jadwal',DB.get('jadwal').map(j=>j.id===id?{...j,published:false}:j));
  showToast('Jadwal ditarik ke draft');
  renderSection('jadwal');
  updateNotifDot();
}

function updateNotifDot(){
  const posyanduKu=getPosyanduOrtu();
  const jdwl=DB.get('jadwal')||[];
  let ada=false;
  if(currentUser.role==='ortu'){
    ada=jdwl.some(j=>j.posyandu===posyanduKu&&j.published&&hariMenuju(j.tanggal)>=0&&hariMenuju(j.tanggal)<=7);
  } else {
    ada=jdwl.some(j=>!j.published);
  }
  const dot=document.querySelector('.notif-dot');
  if(dot) dot.style.display=ada?'block':'none';
}

function formJadwal(data={}){
  const pos=(DB.get('posyandu')||[]);
  const posOpts=pos.map(p=>`<option value="${p.nama}" ${data.posyandu===p.nama?'selected':''}>${p.nama}${p.wilayah?' — '+p.wilayah:''}</option>`).join('');
  return `
  <div class="form-group"><label>Nama Kegiatan</label><input id="j_judul" value="${data.judul||''}" placeholder="Contoh: Posyandu Rutin Mei 2026..."></div>
  <div class="grid-2">
    <div class="form-group"><label>Tanggal</label><input type="date" id="j_tgl" value="${data.tanggal||''}"></div>
    <div class="form-group"><label>Waktu</label><input id="j_waktu" value="${data.waktu||''}" placeholder="08:00 – 11:00"></div>
    <div class="form-group col-span-2">
      <label>Posyandu <span style="font-weight:400;color:var(--text3)">(notifikasi hanya dikirim ke orang tua di posyandu ini)</span></label>
      <select id="j_pos"><option value="">— Pilih Posyandu —</option>${posOpts}</select>
    </div>
    <div class="form-group"><label>Petugas</label><input id="j_pet" value="${data.petugas||''}" placeholder="Nama petugas"></div>
  </div>
  <div class="form-group"><label>Keterangan</label><textarea id="j_ket">${data.keterangan||''}</textarea></div>
  <div class="alert alert-info mt-8" style="padding:9px 12px;font-size:12px">
    <i class="ti ti-info-circle"></i>
    Jadwal akan tersimpan sebagai <b>Draft</b> dulu. Tekan <b>Luncurkan</b> agar orang tua bisa melihatnya.
  </div>`;
}
function getFormJadwal(){
  const posNama=document.getElementById('j_pos').value.trim();
  const posData=(DB.get('posyandu')||[]).find(p=>p.nama===posNama)||{};
  return{judul:document.getElementById('j_judul').value.trim(),tanggal:document.getElementById('j_tgl').value,waktu:document.getElementById('j_waktu').value.trim(),posyandu:posNama,lokasi:posData.nama||posNama,wilayah:posData.wilayah||'',petugas:document.getElementById('j_pet').value.trim(),keterangan:document.getElementById('j_ket').value.trim(),published:false};
}
function tambahJadwal(){openModal(`<div class="modal-header"><div class="modal-title"><i class="ti ti-calendar-plus" style="color:var(--green)"></i> Tambah Jadwal</div><div class="modal-close" onclick="closeModal()"><i class="ti ti-x"></i></div></div>${formJadwal()}<div class="modal-footer"><button class="btn" onclick="closeModal()">Batal</button><button class="btn btn-primary" onclick="simpanJadwal()"><i class="ti ti-check"></i>Simpan sebagai Draft</button></div>`);}
function editJadwal(id){const j=DB.get('jadwal').find(x=>x.id===id);openModal(`<div class="modal-header"><div class="modal-title">Edit Jadwal</div><div class="modal-close" onclick="closeModal()"><i class="ti ti-x"></i></div></div>${formJadwal(j)}<div class="modal-footer"><button class="btn" onclick="closeModal()">Batal</button><button class="btn btn-primary" onclick="updateJadwal(${id})"><i class="ti ti-check"></i>Simpan</button></div>`);}
function simpanJadwal(){const d=getFormJadwal();if(!d.judul||!d.tanggal){showToast('Nama dan tanggal wajib diisi','error');return;}if(!d.posyandu){showToast('Pilih posyandu terlebih dahulu','error');return;}const jdwl=DB.get('jadwal');jdwl.push({...d,id:uid()});DB.set('jadwal',jdwl);closeModal();showToast('Jadwal disimpan sebagai draft');renderSection('jadwal');}
async function updateJadwal(id){
  const d=getFormJadwal();
  const old=DB.get('jadwal').find(j=>j.id==id);
  await fetch(`/api/jadwal/${id}`,{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({...d,published:old.published})});
  DB.set('jadwal',(DB.get('jadwal')||[]).map(j=>j.id==id?{...j,...d,published:old.published}:j));
  closeModal();showToast('Jadwal diperbarui');renderSection('jadwal');
}
async function hapusJadwal(id){
  if(!confirm('Hapus jadwal ini?'))return;
  await fetch(`/api/jadwal/${id}/delete`,{method:'POST'});
  DB.set('jadwal',(DB.get('jadwal')||[]).filter(j=>j.id!=id));
  showToast('Jadwal dihapus');renderSection('jadwal');
}
 
// ──────────────────────────────────────
// LAPORAN
// ──────────────────────────────────────
SECTIONS.laporan = ()=>{
  const anak=DB.get('anak')||[];const ukur=DB.get('pengukuran')||[];
  const latest={};ukur.sort((a,b)=>b.tanggal.localeCompare(a.tanggal)).forEach(u=>{if(!latest[u.idAnak])latest[u.idAnak]=u;});
  const statuses=Object.values(latest).map(u=>u.status);
  const total=anak.length,stunt=statuses.filter(s=>s==='Stunting'||s==='Stunting Berat').length;
  const pantau=statuses.filter(s=>s==='Perlu Pantau').length,normal=statuses.filter(s=>s==='Normal').length;
  const wilMaster=(DB.get('wilayah')||[]).map(w=>w.nama);
  // sertakan wilayah dari data anak yg ada
  anak.forEach(a=>{if(a.wilayah&&!wilMaster.includes(a.wilayah))wilMaster.push(a.wilayah);});
  const wData=wilMaster.map(w=>{
    const anakW=anak.filter(a=>a.wilayah===w);
    const stuntW=anakW.filter(a=>latest[a.id]&&(latest[a.id].status==='Stunting'||latest[a.id].status==='Stunting Berat')).length;
    return{w,total:anakW.length,stunt:stuntW,pct:anakW.length?Math.round(stuntW/anakW.length*100):0};
  });
  const maxS=Math.max(...wData.map(d=>d.stunt),1);
  return `
  <div class="grid-4 mb-16">
    <div class="metric"><div class="metric-label">Total Balita</div><div class="metric-val">${total}</div></div>
    <div class="metric"><div class="metric-label" style="color:var(--red)">Stunting</div><div class="metric-val" style="color:var(--red)">${stunt} (${total?Math.round(stunt/total*100):0}%)</div></div>
    <div class="metric"><div class="metric-label" style="color:var(--amber)">Perlu Pantau</div><div class="metric-val" style="color:var(--amber)">${pantau}</div></div>
    <div class="metric"><div class="metric-label" style="color:var(--green)">Normal</div><div class="metric-val" style="color:var(--green)">${normal}</div></div>
  </div>
  <div class="grid-2">
    <div class="card"><div class="card-title"><i class="ti ti-chart-bar"></i>Prevalensi Stunting per Wilayah</div>
    <div class="chart-bar-wrap">${wData.map(d=>`<div class="chart-bar-item">
      <div class="chart-bar-label">${d.w}</div>
      <div class="chart-bar-track"><div class="chart-bar-fill" style="width:${d.stunt/maxS*100}%;background:${d.pct>20?'var(--red)':d.pct>10?'var(--amber)':'var(--green)'}"></div></div>
      <div class="chart-bar-val">${d.stunt}/${d.total}</div>
    </div>`).join('')}</div></div>
    <div class="card"><div class="card-title"><i class="ti ti-table"></i>Rekap per Wilayah</div>
    <table><thead><tr><th>Wilayah</th><th>Total Balita</th><th>Stunting</th><th>Prevalensi</th></tr></thead>
    <tbody>${wData.map(d=>`<tr><td>${d.w}</td><td>${d.total}</td><td><span class="badge ${d.stunt>0?'badge-red':'badge-green'}">${d.stunt}</span></td><td>${d.pct}%</td></tr>`).join('')}</tbody>
    </table></div>
  </div>
  <div class="card mt-16"><div class="card-title"><i class="ti ti-list"></i>Rekap Lengkap — Semua Pengukuran</div>
  <div class="table-wrap"><table><thead><tr><th>Nama Anak</th><th>Usia</th><th>Wilayah</th><th>BB</th><th>TB</th><th>Z TB/U</th><th>Status</th><th>Tgl Ukur</th></tr></thead>
  <tbody>${anak.map(a=>{const u=latest[a.id];if(!u)return'';return`<tr><td>${a.nama}</td><td>${hitungUsia(a.tglLahir || a.tgl_lahir)} bln</td><td>${a.wilayah}</td><td>${u.bb}</td><td>${u.tb}</td><td>${u.zscore_tbu}</td><td>${statusBadge(u.status)}</td><td>${fmtDate(u.tanggal)}</td></tr>`;}).join('')}</tbody>
  </table></div></div>`;
};
 
// ──────────────────────────────────────
// MANAJEMEN PENGGUNA (admin only)
// ──────────────────────────────────────
SECTIONS.pengguna = ()=>{
  if(currentUser.role!=='admin')return`<div class="empty"><i class="ti ti-lock"></i><p>Akses ditolak.</p></div>`;
  const users=DB.get('users')||[];
  const rows=users.map(u=>`<tr>
    <td>${u.nama}</td>
    <td><span class="badge ${u.role==='admin'?'badge-blue':u.role==='bidan'?'badge-green':'badge-gray'}">${ROLE_LABELS[u.role]||u.role}</span></td>
    <td style="font-family:monospace;font-size:12px">${u.role==='ortu'?`<span class="badge badge-gray">NIK: ${u.nik||'-'}</span>`:u.role==='bidan'?`<span class="badge badge-green">NIP: ${u.nip||'-'}</span>`:`<span class="badge badge-blue">user: ${u.username||'-'}</span>`}</td>
    <td style="color:var(--text3);font-size:12px">${u.role==='ortu'?'Login: NIK saja':u.role==='bidan'?'Login: NIP saja (tanpa password)':'Login: username + password'}</td>
    <td><div class="table-action">
      <button class="btn btn-sm btn-icon" title="Edit" onclick="editUser(${u.id})"><i class="ti ti-edit"></i></button>
      ${u.id!==currentUser.id?`<button class="btn btn-sm btn-danger btn-icon" title="Hapus" onclick="hapusUser(${u.id})"><i class="ti ti-trash"></i></button>`:''}
    </div></td>
  </tr>`).join('');
  const ortuCount=users.filter(u=>u.role==='ortu').length;
  return `
  <div class="alert alert-info mb-16"><i class="ti ti-info-circle"></i><div><b>Sistem Login:</b> <b>Bidan</b> login hanya dengan <b>NIP</b> (tanpa password) — admin cukup input NIP bidan. <b>Orang Tua</b> login hanya dengan <b>NIK Ibu</b> — akun dibuat <i>otomatis</i> saat bidan mendaftarkan anak, atau tambahkan manual di sini.</div></div>
  <div class="search-row" style="justify-content:flex-end;gap:10px">
    <button class="btn" onclick="tambahUser('bidan')"><i class="ti ti-user-plus"></i>Tambah Bidan</button>
    <button class="btn btn-primary" onclick="tambahUser('ortu')"><i class="ti ti-user-plus"></i>Buat Akun Orang Tua</button>
  </div>
  <div class="grid-2 mb-16" style="margin-bottom:14px">
    <div class="metric"><div class="metric-label"><i class="ti ti-users"></i>Total Akun</div><div class="metric-val">${users.length}</div></div>
    <div class="metric"><div class="metric-label"><i class="ti ti-users"></i>Akun Orang Tua</div><div class="metric-val">${ortuCount}</div><div class="metric-sub">dari total akun</div></div>
  </div>
  <div class="card"><div class="card-title"><i class="ti ti-users"></i>Daftar Pengguna</div>
  <div class="table-wrap"><table><thead><tr><th>Nama</th><th>Role</th><th>Identitas Login</th><th>Metode Login</th><th>Aksi</th></tr></thead><tbody>${rows}</tbody></table></div></div>`;
};
 
function formUser(data={}, defaultRole='admin'){
  const role = data.role || defaultRole;
  const isOrtu = role==='ortu';
  const isBidan = role==='bidan';
  const anak = DB.get('anak')||[];
  return `
  <div class="form-group"><label>Nama Lengkap</label><input id="p_nama" value="${data.nama||''}" placeholder="Nama lengkap"></div>
  <div class="grid-2">
    <div class="form-group"><label>Role</label><select id="p_role" onchange="toggleOrtuFields()">
      <option value="admin" ${role==='admin'?'selected':''}>Admin</option>
      <option value="bidan" ${role==='bidan'?'selected':''}>Bidan</option>
      <option value="ortu" ${role==='ortu'?'selected':''}>Orang Tua</option>
    </select></div>
    <div class="form-group" id="p_nip_wrap" ${isOrtu?'style="display:none"':''}>
      <label>NIP <span style="color:var(--text3);font-size:11px">(digunakan untuk login)</span></label>
      <input id="p_nip" value="${data.nip||''}" placeholder="Nomor Induk Pegawai">
    </div>
  </div>
  <div id="p_bidan_info" ${!isBidan?'style="display:none"':''}>
    <div class="alert alert-info" style="margin-bottom:12px"><i class="ti ti-info-circle"></i>Bidan login hanya menggunakan <b>NIP</b> — tanpa password. Cukup input NIP bidan di bawah.</div>
  </div>
  <div id="p_admin_fields" ${(isOrtu||isBidan)?'style="display:none"':''}>
    <div class="grid-2">
      <div class="form-group"><label>Username</label><input id="p_user" value="${data.username||''}" placeholder="Username unik"></div>
      <div class="form-group"><label>Password ${data.id?'(kosong = tidak ubah)':''}</label><input type="password" id="p_pass_admin" placeholder="Buat password"></div>
    </div>
  </div>
  <div id="p_ortu_fields" ${!isOrtu?'style="display:none"':''}>
    <div class="alert alert-info" style="margin-bottom:12px"><i class="ti ti-info-circle"></i>Orang tua login hanya menggunakan <b>NIK</b> — tanpa password. Akun dibuat otomatis saat bidan mendaftarkan anak. Tambahkan manual di sini jika diperlukan.</div>
    <div class="grid-2">
      <div class="form-group col-span-2"><label>NIK Ibu (16 digit) <span style="color:var(--text3);font-size:11px">(digunakan untuk login)</span></label><input id="p_nik" value="${data.nik||''}" placeholder="Contoh: 6101234567890001" maxlength="16"></div>
    </div>
    ${anak.length?`<div class="form-group"><label>Pilih Anak yang Dihubungkan (opsional)</label><select id="p_idAnak">
      <option value="">— Pilih anak —</option>
      ${anak.map(a=>`<option value="${a.id}" ${data.idAnak==a.id?'selected':''}>${a.nama} (NIK Ibu: ${a.nikIbu||'-'})</option>`).join('')}
    </select></div>`:'<div class="alert alert-warning" style="margin-bottom:0"><i class="ti ti-alert-triangle"></i>Belum ada data anak. Daftarkan anak terlebih dahulu.</div>'}
  </div>`;
}
 
function toggleOrtuFields(){
  const role=document.getElementById('p_role').value;
  const isOrtu=role==='ortu';
  const isBidan=role==='bidan';
  const isAdmin=role==='admin';
  document.getElementById('p_ortu_fields').style.display=isOrtu?'block':'none';
  document.getElementById('p_nip_wrap').style.display=isOrtu?'none':'block';
  document.getElementById('p_bidan_info').style.display=isBidan?'block':'none';
  document.getElementById('p_admin_fields').style.display=isAdmin?'block':'none';
}
 
function tambahUser(defaultRole='admin'){
  openModal(`<div class="modal-header"><div class="modal-title">Tambah Pengguna</div><div class="modal-close" onclick="closeModal()"><i class="ti ti-x"></i></div></div>
  ${formUser({},defaultRole)}
  <div class="modal-footer"><button class="btn" onclick="closeModal()">Batal</button><button class="btn btn-primary" onclick="simpanUser()"><i class="ti ti-check"></i>Simpan</button></div>`);
}
function editUser(id){
  const u=DB.get('users').find(x=>x.id===id);
  openModal(`<div class="modal-header"><div class="modal-title">Edit Pengguna</div><div class="modal-close" onclick="closeModal()"><i class="ti ti-x"></i></div></div>
  ${formUser(u,u.role)}
  <div class="modal-footer"><button class="btn" onclick="closeModal()">Batal</button><button class="btn btn-primary" onclick="updateUser(${id})"><i class="ti ti-check"></i>Simpan</button></div>`);
}
function getFormUser(){
  const role=document.getElementById('p_role').value;
  const d={nama:document.getElementById('p_nama').value.trim(),role};
  if(role==='ortu'){
    d.nik=document.getElementById('p_nik').value.trim();
    d.username=d.nik; // username = NIK untuk ortu
    d.password=d.nik; // password = NIK untuk ortu (login tanpa password)
    const idAnakEl=document.getElementById('p_idAnak');
    if(idAnakEl&&idAnakEl.value)d.idAnak=parseInt(idAnakEl.value);
    if(d.idAnak){const anak=DB.get('anak').find(a=>a.id===d.idAnak);if(anak)d.nik=anak.nikIbu||d.nik;}
  } else if(role==='bidan'){
    d.nip=document.getElementById('p_nip').value.trim();
    d.username=d.nip; // username = NIP untuk bidan
    d.password=d.nip; // password disimpan = NIP (tidak dipakai untuk login, hanya internal)
  } else {
    // admin
    const userEl=document.getElementById('p_user');
    const passEl=document.getElementById('p_pass_admin');
    d.username=userEl?userEl.value.trim():'';
    d.password=passEl?passEl.value:'';
    d.nip=document.getElementById('p_nip').value.trim();
  }
  return d;
}
async function simpanUser(){
  const d = getFormUser();
  if(!d.nama){showToast('Nama wajib diisi','error');return;}
  if(d.role==='ortu'&&!d.nik){showToast('NIK Ibu wajib diisi untuk akun orang tua','error');return;}
  if(d.role==='bidan'&&!d.nip){showToast('NIP wajib diisi untuk akun bidan','error');return;}
  if(d.role==='admin'&&(!d.username||!d.password)){showToast('Username dan password wajib diisi untuk admin','error');return;}
  
  const users = DB.get('users') || []; // ← ganti 'users' → 'pengguna'
  if(d.role==='ortu'&&users.find(u=>u.nik===d.nik&&u.role==='ortu')){showToast('Akun dengan NIK ini sudah ada','error');return;}
  if(d.role==='bidan'&&users.find(u=>u.nip===d.nip&&u.role==='bidan')){showToast('Akun dengan NIP ini sudah ada','error');return;}
  if(d.role==='admin'&&users.find(u=>u.username===d.username)){showToast('Username sudah digunakan','error');return;}

  try {
    const res = await fetch('/api/pengguna',{
      method:'POST',
      headers:{'Content-Type':'application/json'},
      body: JSON.stringify(d)
    });
    const result = await res.json();
    if(!result.success){ showToast('Gagal menyimpan ke server','error'); return; }
    
    // Pakai ID dari MySQL bukan uid()
    users.push({...d, id: result.data.id});
    DB.set('pengguna', users);
  } catch(e){
    showToast('Gagal menyimpan ke server','error');
    return;
  }

  closeModal();
  if(d.role==='bidan') showToast(`Akun bidan dibuat. Login cukup dengan NIP: ${d.nip}`,'success');
  else if(d.role==='ortu') showToast(`Akun orang tua dibuat. Login cukup dengan NIK: ${d.nik}`,'success');
  else showToast('Akun berhasil dibuat','success');
  renderSection('pengguna');
}

async function hapusUser(id){
  if(!confirm('Hapus akun pengguna ini?')) return;
  
  try {
    const res = await fetch(`/api/pengguna/${id}/delete`, { method: 'POST' });
    if(!res.ok){ showToast('Gagal menghapus dari server', 'error'); return; }
  } catch(e) {
    showToast('Gagal menghapus dari server', 'error');
    return;
  }

  // Update local state
  const users = DB.get('users') || [];
  DB.set('pengguna', users.filter(u => u.id != id));
  
  showToast('Pengguna dihapus');
  renderSection('pengguna'); // ← render dari local state yang sudah diupdate
}
// ──────────────────────────────────────
// PENGATURAN WILAYAH & POSYANDU (admin only)
// ──────────────────────────────────────
SECTIONS.pengaturan = ()=>{
  if(currentUser.role!=='admin')return`<div class="empty"><i class="ti ti-lock"></i><p>Akses ditolak.</p></div>`;
  const wil=DB.get('wilayah')||[];
  const pos=DB.get('posyandu')||[];
  const wilRows=wil.map(w=>`<tr>
    <td>${w.nama}</td>
    <td>${pos.filter(p=>p.wilayah===w.nama).length} posyandu</td>
    <td><div class="table-action">
      <button class="btn btn-sm btn-icon" onclick="editWilayah(${w.id})"><i class="ti ti-edit"></i></button>
      <button class="btn btn-sm btn-danger btn-icon" onclick="hapusWilayah(${w.id})"><i class="ti ti-trash"></i></button>
    </div></td>
  </tr>`).join('');
  const posRows=pos.map(p=>`<tr>
    <td>${p.nama}</td>
    <td><span class="badge badge-gray">${p.wilayah||'-'}</span></td>
    <td><div class="table-action">
      <button class="btn btn-sm btn-icon" onclick="editPosyandu(${p.id})"><i class="ti ti-edit"></i></button>
      <button class="btn btn-sm btn-danger btn-icon" onclick="hapusPosyandu(${p.id})"><i class="ti ti-trash"></i></button>
    </div></td>
  </tr>`).join('');
  return `
  <div class="grid-2">
    <div class="card">
      <div class="card-title" style="justify-content:space-between"><span><i class="ti ti-map-pin"></i>Daftar Wilayah <span class="badge badge-green">${wil.length}</span></span>
        <button class="btn btn-primary btn-sm" onclick="tambahWilayah()"><i class="ti ti-plus"></i>Tambah</button>
      </div>
      <div class="table-wrap"><table><thead><tr><th>Nama Wilayah</th><th>Posyandu</th><th>Aksi</th></tr></thead>
      <tbody>${wilRows||'<tr><td colspan=3 style="text-align:center;color:var(--text2)">Belum ada wilayah</td></tr>'}</tbody></table></div>
    </div>
    <div class="card">
      <div class="card-title" style="justify-content:space-between"><span><i class="ti ti-building-hospital"></i>Daftar Posyandu <span class="badge badge-green">${pos.length}</span></span>
        <button class="btn btn-primary btn-sm" onclick="tambahPosyandu()"><i class="ti ti-plus"></i>Tambah</button>
      </div>
      <div class="table-wrap"><table><thead><tr><th>Nama Posyandu</th><th>Wilayah</th><th>Aksi</th></tr></thead>
      <tbody>${posRows||'<tr><td colspan=3 style="text-align:center;color:var(--text2)">Belum ada posyandu</td></tr>'}</tbody></table></div>
    </div>
  </div>
  <div class="alert alert-info mt-16"><i class="ti ti-info-circle"></i>Perubahan wilayah & posyandu akan langsung berpengaruh pada form registrasi anak baru. Data anak yang sudah ada tidak berubah.</div>`;
};
 
function formWilayah(data={}){
  return `<div class="form-group"><label>Nama Wilayah</label><input id="w_nama" value="${data.nama||''}" placeholder="Contoh: Sungai Durian"></div>`;
}
function tambahWilayah(){openModal(`<div class="modal-header"><div class="modal-title">Tambah Wilayah</div><div class="modal-close" onclick="closeModal()"><i class="ti ti-x"></i></div></div>${formWilayah()}<div class="modal-footer"><button class="btn" onclick="closeModal()">Batal</button><button class="btn btn-primary" onclick="simpanWilayah()"><i class="ti ti-check"></i>Simpan</button></div>`);}
function editWilayah(id){const w=DB.get('wilayah').find(x=>x.id===id);openModal(`<div class="modal-header"><div class="modal-title">Edit Wilayah</div><div class="modal-close" onclick="closeModal()"><i class="ti ti-x"></i></div></div>${formWilayah(w)}<div class="modal-footer"><button class="btn" onclick="closeModal()">Batal</button><button class="btn btn-primary" onclick="updateWilayah(${id})"><i class="ti ti-check"></i>Simpan</button></div>`);}
function simpanWilayah(){const nama=document.getElementById('w_nama').value.trim();if(!nama){showToast('Nama wilayah wajib diisi','error');return;}const wil=DB.get('wilayah');wil.push({id:uid(),nama});DB.set('wilayah',wil);closeModal();showToast('Wilayah ditambahkan');renderSection('pengaturan');}
async function updateWilayah(id){
  const nama=document.getElementById('w_nama').value.trim();
  if(!nama){showToast('Nama wilayah wajib diisi','error');return;}
  await fetch(`/api/wilayah/${id}`,{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({nama})});
  DB.set('wilayah',(DB.get('wilayah')||[]).map(w=>w.id==id?{...w,nama}:w));
  closeModal();showToast('Wilayah diperbarui');renderSection('pengaturan');
}
async function hapusWilayah(id){
  const w=DB.get('wilayah').find(x=>x.id==id);
  const pos=DB.get('posyandu')||[];
  if(pos.some(p=>p.wilayah===w.nama)){showToast('Hapus posyandu di wilayah ini terlebih dahulu','error');return;}
  if(!confirm(`Hapus wilayah "${w.nama}"?`))return;
  await fetch(`/api/wilayah/${id}/delete`,{method:'POST'});
  DB.set('wilayah',(DB.get('wilayah')||[]).filter(x=>x.id!=id));
  showToast('Wilayah dihapus');renderSection('pengaturan');
}
 
function formPosyandu(data={}){
  const wil=(DB.get('wilayah')||[]).map(w=>w.nama);
  return `
  <div class="form-group"><label>Nama Posyandu</label><input id="ps_nama" value="${data.nama||''}" placeholder="Contoh: Posyandu Melati"></div>
  <div class="form-group"><label>Wilayah</label><select id="ps_wil">
    <option value="">— Pilih Wilayah —</option>
    ${wil.map(w=>`<option ${data.wilayah===w?'selected':''}>${w}</option>`).join('')}
  </select></div>`;
}
function tambahPosyandu(){if(!(DB.get('wilayah')||[]).length){showToast('Tambahkan wilayah terlebih dahulu','error');return;}openModal(`<div class="modal-header"><div class="modal-title">Tambah Posyandu</div><div class="modal-close" onclick="closeModal()"><i class="ti ti-x"></i></div></div>${formPosyandu()}<div class="modal-footer"><button class="btn" onclick="closeModal()">Batal</button><button class="btn btn-primary" onclick="simpanPosyandu()"><i class="ti ti-check"></i>Simpan</button></div>`);}
function editPosyandu(id){const p=DB.get('posyandu').find(x=>x.id===id);openModal(`<div class="modal-header"><div class="modal-title">Edit Posyandu</div><div class="modal-close" onclick="closeModal()"><i class="ti ti-x"></i></div></div>${formPosyandu(p)}<div class="modal-footer"><button class="btn" onclick="closeModal()">Batal</button><button class="btn btn-primary" onclick="updatePosyandu(${id})"><i class="ti ti-check"></i>Simpan</button></div>`);}
function getPosyanduForm(){return{nama:document.getElementById('ps_nama').value.trim(),wilayah:document.getElementById('ps_wil').value};}
function simpanPosyandu(){const d=getPosyanduForm();if(!d.nama){showToast('Nama posyandu wajib diisi','error');return;}const pos=DB.get('posyandu');pos.push({...d,id:uid()});DB.set('posyandu',pos);closeModal();showToast('Posyandu ditambahkan');renderSection('pengaturan');}
async function updatePosyandu(id){
  const d=getPosyanduForm();if(!d.nama){showToast('Nama posyandu wajib diisi','error');return;}
  await fetch(`/api/posyandu/${id}`,{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify(d)});
  DB.set('posyandu',(DB.get('posyandu')||[]).map(p=>p.id==id?{...p,...d}:p));
  closeModal();showToast('Posyandu diperbarui');renderSection('pengaturan');
}
async function hapusPosyandu(id){
  const p=DB.get('posyandu').find(x=>x.id==id);
  if(!confirm(`Hapus posyandu "${p.nama}"?`))return;
  await fetch(`/api/posyandu/${id}/delete`,{method:'POST'});
  DB.set('posyandu',(DB.get('posyandu')||[]).filter(x=>x.id!=id));
  showToast('Posyandu dihapus');renderSection('pengaturan');
}
// ──────────────────────────────────────
// HOME ORTU
// ──────────────────────────────────────
SECTIONS.home_ortu = ()=>{
  const anak=DB.get('anak')||[];
  const nikOrtu = currentUser.nik || currentUser.username;
const a = anak.find(x => (x.nikIbu || x.nik_ibu) === nikOrtu);
if(!a) return `<div class="empty"><i class="ti ti-baby"></i><p>Belum ada data anak terdaftar untuk akun Anda.</p></div>`;
  const ukur=DB.get('pengukuran').filter(u=>u.idAnak===a.id).sort((x,y)=>y.tanggal.localeCompare(x.tanggal));
  const last=ukur[0];
  const jadwal=(DB.get('jadwal')||[]).filter(j=>j.published===true&&j.posyandu===a.posyandu&&hariMenuju(j.tanggal)>=0).sort((x,y)=>x.tanggal.localeCompare(y.tanggal)).slice(0,2);
  const jItems=jadwal.length?jadwal.map(j=>{const d=new Date(j.tanggal),day=d.getDate(),mon=d.toLocaleDateString('id-ID',{month:'short'});return`<div class="jadwal-item"><div class="jadwal-date-box">${day}<br>${mon}</div><div><div class="jadwal-info-title">${j.judul}</div><div class="jadwal-info-meta">${j.waktu} · ${j.posyandu}</div></div></div>`;}).join(''):`<div class="empty" style="padding:16px"><i class="ti ti-calendar-x"></i><p style="font-size:12px">Belum ada jadwal dari posyandu Anda.</p></div>`;
  return `
  <div class="anak-profile-banner">
    <div class="ortu-anak-name">${a.nama}</div>
    <div class="ortu-anak-meta"><i class="ti ti-cake"></i> ${fmtDate(a.tglLahir || a.tgl_lahir)} · ${hitungUsia(a.tglLahir || a.tgl_lahir)} bulan · ${a.jenisKelamin==='L'?'Laki-laki':'Perempuan'}</div>
    <div class="ortu-anak-meta mt-8"><i class="ti ti-map-pin"></i> ${a.wilayah} · ${a.posyandu}</div>
    ${last?`<div class="ortu-status">${last.status}</div>`:''}
  </div>
  <div class="grid-2 mb-16">
    <div class="card">${last?`
      <div class="card-title"><i class="ti ti-ruler-measure"></i>Pengukuran Terakhir <span class="text-sm text-muted">${fmtDate(last.tanggal)}</span></div>
      <div class="info-row"><div class="info-label">Berat Badan</div><div class="info-val">${last.bb} kg</div></div>
      <div class="info-row"><div class="info-label">Tinggi Badan</div><div class="info-val">${last.tb} cm</div></div>
      <div class="info-row"><div class="info-label">Z-Score TB/U</div><div class="info-val">${last.zscore_tbu}</div></div>
      <div class="info-row"><div class="info-label">Status Gizi</div><div class="info-val">${statusBadge(last.status)}</div></div>
      ${last.catatan?`<div class="info-row"><div class="info-label">Catatan Bidan</div><div class="info-val">${last.catatan}</div></div>`:''}
    `:`<div class="empty" style="padding:20px"><i class="ti ti-ruler-measure"></i><p>Belum ada data pengukuran.</p></div>`}</div>
    <div class="card"><div class="card-title"><i class="ti ti-calendar-event"></i>Jadwal Posyandu Terdekat</div>${jItems}</div>
  </div>
  <div class="alert alert-info"><i class="ti ti-info-circle"></i>Jika ada pertanyaan tentang tumbuh kembang anak Anda, silakan hubungi bidan puskesmas di ${a.posyandu}.</div>`;
};
 
// ──────────────────────────────────────
// PERKEMBANGAN (ortu)
// ──────────────────────────────────────
SECTIONS.perkembangan = ()=>{
  const anak=DB.get('anak')||[];
  const nikOrtu = currentUser.nik || currentUser.username;
const a = anak.find(x => (x.nikIbu || x.nik_ibu) === nikOrtu);
  if(!a)return`<div class="empty"><i class="ti ti-baby"></i><p>Data tidak ditemukan.</p></div>`;
  const ukur=DB.get('pengukuran').filter(u=>u.idAnak===a.id).sort((x,y)=>x.tanggal.localeCompare(y.tanggal));
  const rows=ukur.map(u=>`<tr><td>${fmtDate(u.tanggal)}</td><td>${u.bb} kg</td><td>${u.tb} cm</td><td>${u.lk||'-'}</td><td>${u.lla||'-'}</td><td>${u.zscore_tbu}</td><td>${statusBadge(u.status)}</td><td>${u.catatan||'-'}</td></tr>`).join('');
  return `
  <div class="card mb-16"><div class="card-title"><i class="ti ti-trending-up"></i>Riwayat Perkembangan — ${a.nama}</div>
  <div class="table-wrap"><table><thead><tr><th>Tanggal</th><th>BB</th><th>TB</th><th>LK</th><th>LLA</th><th>Z TB/U</th><th>Status</th><th>Catatan</th></tr></thead>
  <tbody>${rows||'<tr><td colspan=8 style="text-align:center;color:var(--text2)">Belum ada data pengukuran</td></tr>'}</tbody></table></div></div>
  <div class="alert alert-info"><i class="ti ti-info-circle"></i>Data pengukuran diinput oleh bidan pada setiap kegiatan posyandu. Bawa Buku KIA saat posyandu.</div>`;
};
 
// ──────────────────────────────────────
// PROFIL PENGGUNA
// ──────────────────────────────────────
SECTIONS.profil = ()=>{
  const u=currentUser;
  const avatarSrc=u.fotoProfil?`<img src="${u.fotoProfil}" style="width:60px;height:60px;border-radius:50%;object-fit:cover;border:2px solid var(--green)">`:`<div style="width:60px;height:60px;border-radius:50%;background:var(--green);display:flex;align-items:center;justify-content:center;color:#fff;font-size:26px;font-weight:700;flex-shrink:0">${u.nama.charAt(0).toUpperCase()}</div>`;
  const avatarBig=u.fotoProfil?`<img id="profilAvatarBig" src="${u.fotoProfil}" style="width:80px;height:80px;border-radius:50%;object-fit:cover;border:3px solid var(--green)">`:`<div id="profilAvatarBig" style="width:80px;height:80px;border-radius:50%;background:var(--green);display:flex;align-items:center;justify-content:center;color:#fff;font-size:34px;font-weight:700">${u.nama.charAt(0).toUpperCase()}</div>`;
  return `
  <div class="grid-2">
    <div class="card">
      <div class="card-title"><i class="ti ti-user-circle"></i>Informasi Akun</div>
      <div style="display:flex;align-items:center;gap:16px;margin-bottom:18px">
        ${avatarSrc}
        <div><div style="font-size:17px;font-weight:600">${u.nama}</div><div class="text-muted text-sm">${ROLE_LABELS[u.role]||u.role}</div></div>
      </div>
      <div class="info-row"><div class="info-label">Identitas Login</div><div class="info-val">
        ${u.role==='ortu'?`<span class="badge badge-gray">NIK: ${u.nik||'-'}</span>`:u.role==='bidan'?`<span class="badge badge-green">NIP: ${u.nip||'-'}</span>`:`<span class="badge badge-blue">Username: ${u.username||'-'}</span>`}
      </div></div>
      <div class="info-row"><div class="info-label">Metode Login</div><div class="info-val text-muted" style="font-size:12px">${u.role==='ortu'?'NIK saja (tanpa password)':u.role==='bidan'?'NIP saja (tanpa password)':'Username + Password'}</div></div>
    </div>
    <div class="card">
      <div class="card-title"><i class="ti ti-edit"></i>Edit Profil</div>
      <div style="display:flex;flex-direction:column;align-items:center;gap:10px;margin-bottom:18px">
        ${avatarBig}
        <label style="cursor:pointer;display:flex;align-items:center;gap:6px;padding:6px 14px;border:1px solid var(--border);border-radius:var(--radius);font-size:12px;color:var(--text2);background:var(--bg)">
          <i class="ti ti-camera"></i> Ubah Foto Profil
          <input type="file" accept="image/*" style="display:none" onchange="uploadFotoProfil(this)">
        </label>
        ${u.fotoProfil?`<button class="btn btn-sm btn-danger" onclick="hapusFotoProfil()"><i class="ti ti-trash"></i> Hapus Foto</button>`:''}
      </div>
      <div class="form-group mb-12"><label>Nama Lengkap</label><input id="pr_nama" value="${u.nama}" placeholder="Nama lengkap"></div>
      ${u.role==='admin'?`<div class="form-group mb-12"><label>Username</label><input id="pr_user" value="${u.username||''}" placeholder="Username"></div>`:''}
      <div class="form-group mb-16"><label>${u.role==='bidan'?'NIP':'NIK'}</label><input id="pr_nip" value="${u.nip||u.nik||''}" placeholder="${u.role==='bidan'?'NIP':'NIK'}"></div>
      <button class="btn btn-primary w-full" onclick="simpanProfil()" style="justify-content:center"><i class="ti ti-check"></i>Simpan Perubahan</button>
    </div>
  </div>`;
};
 
function uploadFotoProfil(input){
  const file=input.files[0];if(!file)return;
  const reader=new FileReader();
  reader.onload=e=>{
    const src=e.target.result;
    currentUser.fotoProfil=src;
    const users=DB.get('users').map(u=>u.id===currentUser.id?{...u,fotoProfil:src}:u);
    DB.set('users',users);
    // Update avatar di topbar
    const av=document.getElementById('userAvatar');
    if(av)av.innerHTML=`<img src="${src}" style="width:26px;height:26px;border-radius:50%;object-fit:cover">`;
    showToast('Foto profil diperbarui');
    renderSection('profil');
  };
  reader.readAsDataURL(file);
}
 
function hapusFotoProfil(){
  if(!confirm('Hapus foto profil?'))return;
  currentUser.fotoProfil='';
  const users=DB.get('users').map(u=>u.id===currentUser.id?{...u,fotoProfil:''}:u);
  DB.set('users',users);
  const av=document.getElementById('userAvatar');
  if(av)av.textContent=currentUser.nama.charAt(0).toUpperCase();
  showToast('Foto profil dihapus');
  renderSection('profil');
}
 
function simpanProfil(){
  const nama=document.getElementById('pr_nama').value.trim();
  const usernameEl=document.getElementById('pr_user');
  const username=usernameEl?usernameEl.value.trim():(currentUser.username||'');
  const nip=document.getElementById('pr_nip').value.trim();
  if(!nama){showToast('Nama wajib diisi','error');return;}
  const users=DB.get('users').map(u=>{
    if(u.id!==currentUser.id)return u;
    return {...u,nama,username,nip};
  });
  DB.set('users',users);
  currentUser={...currentUser,nama,username,nip};
  document.getElementById('userName').textContent=nama;
  document.getElementById('userAvatar').textContent=nama.charAt(0).toUpperCase();
  showToast('Profil berhasil diperbarui');
  renderSection('profil');
}
 
// ──────────────────────────────────────
// GRAFIK PERKEMBANGAN (SVG Chart)
// ──────────────────────────────────────
function buatGrafikSVG(ukurList, field, label, color, unit){
  if(ukurList.length<2)return`<div class="empty" style="padding:20px"><i class="ti ti-chart-line"></i><p>Butuh minimal 2 data pengukuran untuk menampilkan grafik.</p></div>`;
  const W=480,H=160,padL=40,padR=10,padT=14,padB=30;
  const vals=ukurList.map(u=>u[field]);
  const minV=Math.min(...vals)*0.97, maxV=Math.max(...vals)*1.03;
  const xScale=(i)=>padL+(i/(ukurList.length-1))*(W-padL-padR);
  const yScale=(v)=>padT+(1-(v-minV)/(maxV-minV))*(H-padT-padB);
  const pts=ukurList.map((u,i)=>`${xScale(i)},${yScale(u[field])}`).join(' ');
  const dots=ukurList.map((u,i)=>`<circle cx="${xScale(i)}" cy="${yScale(u[field])}" r="4" fill="${color}" stroke="#fff" stroke-width="2"><title>${fmtDate(u.tanggal)}: ${u[field]} ${unit}</title></circle>`).join('');
  const xLabels=ukurList.map((u,i)=>`<text x="${xScale(i)}" y="${H-4}" text-anchor="middle" font-size="10" fill="#8aad9f">${fmtDate(u.tanggal).slice(0,6)}</text>`).join('');
  const yLabels=[minV,(minV+maxV)/2,maxV].map((v,i)=>{const y=yScale(v);return`<text x="${padL-4}" y="${y+4}" text-anchor="end" font-size="10" fill="#8aad9f">${v.toFixed(1)}</text><line x1="${padL}" y1="${y}" x2="${W-padR}" y2="${y}" stroke="#e2ebe7" stroke-dasharray="3,3"/>`;}).join('');
  return`<svg viewBox="0 0 ${W} ${H}" style="width:100%;height:auto;overflow:visible">
    ${yLabels}
    <polyline points="${pts}" fill="none" stroke="${color}" stroke-width="2.5" stroke-linejoin="round"/>
    <polyline points="${pts}" fill="${color}" fill-opacity="0.08" stroke="none"/>
    ${dots}
    ${xLabels}
    <text x="${padL}" y="11" font-size="11" font-weight="600" fill="${color}">${label} (${unit})</text>
  </svg>`;
}
 
// Override SECTIONS.perkembangan untuk tambah grafik
SECTIONS.perkembangan = ()=>{
  const anak=DB.get('anak')||[];
 const nikOrtu = currentUser.nik || currentUser.username;
const a = anak.find(x => x.nikIbu === nikOrtu);
  if(!a)return`<div class="empty"><i class="ti ti-baby"></i><p>Data tidak ditemukan.</p></div>`;
  const ukur=DB.get('pengukuran').filter(u=>u.idAnak===a.id).sort((x,y)=>x.tanggal.localeCompare(y.tanggal));
  const rows=ukur.map(u=>`<tr><td>${fmtDate(u.tanggal)}</td><td>${u.bb} kg</td><td>${u.tb} cm</td><td>${u.lk||'-'}</td><td>${u.lla||'-'}</td><td>${u.zscore_tbu}</td><td>${statusBadge(u.status)}</td><td>${u.catatan||'-'}</td></tr>`).join('');
  return `
  <div class="grid-2 mb-16">
    <div class="card"><div class="card-title"><i class="ti ti-trending-up"></i>Grafik Berat Badan</div>${buatGrafikSVG(ukur,'bb','Berat Badan','#16a37f','kg')}</div>
    <div class="card"><div class="card-title"><i class="ti ti-trending-up"></i>Grafik Tinggi Badan</div>${buatGrafikSVG(ukur,'tb','Tinggi Badan','#2563eb','cm')}</div>
  </div>
  <div class="card mb-16"><div class="card-title"><i class="ti ti-table"></i>Riwayat Perkembangan — ${a.nama}</div>
  <div class="table-wrap"><table><thead><tr><th>Tanggal</th><th>BB</th><th>TB</th><th>LK</th><th>LLA</th><th>Z TB/U</th><th>Status</th><th>Catatan</th></tr></thead>
  <tbody>${rows||'<tr><td colspan=8 style="text-align:center;color:var(--text2)">Belum ada data pengukuran</td></tr>'}</tbody></table></div></div>
  <div class="alert alert-info"><i class="ti ti-info-circle"></i>Data pengukuran diinput oleh bidan pada setiap kegiatan posyandu. Bawa Buku KIA saat posyandu.</div>`;
};
 
// ──────────────────────────────────────
// GRAFIK di DETAIL ANAK (untuk admin/bidan)
// ──────────────────────────────────────
function grafikAnak(id){
  const a=DB.get('anak').find(x=>x.id===id);
  const ukur=DB.get('pengukuran').filter(u=>u.idAnak===id).sort((x,y)=>x.tanggal.localeCompare(y.tanggal));
  openModal(`<div class="modal-header"><div class="modal-title"><i class="ti ti-chart-line" style="color:var(--green)"></i> Grafik — ${a.nama}</div><div class="modal-close" onclick="closeModal()"><i class="ti ti-x"></i></div></div>
  <div class="mb-12"><div class="card-title" style="margin-bottom:8px"><i class="ti ti-trending-up"></i>Berat Badan (kg)</div>${buatGrafikSVG(ukur,'bb','Berat Badan','#16a37f','kg')}</div>
  <div class="mb-12"><div class="card-title" style="margin-bottom:8px"><i class="ti ti-trending-up"></i>Tinggi Badan (cm)</div>${buatGrafikSVG(ukur,'tb','Tinggi Badan','#2563eb','cm')}</div>
  <div class="mb-12"><div class="card-title" style="margin-bottom:8px"><i class="ti ti-trending-up"></i>Z-Score TB/U</div>${buatGrafikSVG(ukur,'zscore_tbu','Z-Score TB/U','#d97706','SD')}</div>
  <div class="modal-footer"><button class="btn btn-primary" onclick="closeModal()">Tutup</button></div>`);
}
 
// ──────────────────────────────────────
// UNDUH LAPORAN CSV
// ──────────────────────────────────────
function unduhLaporan(){
  const anak=DB.get('anak')||[];
  const ukur=DB.get('pengukuran')||[];
  const latest={};ukur.sort((a,b)=>b.tanggal.localeCompare(a.tanggal)).forEach(u=>{if(!latest[u.idAnak])latest[u.idAnak]=u;});
  const header='Nama Anak,JK,Usia (bln),Wilayah,Posyandu,BB (kg),TB (cm),Z TB/U,Status,Tgl Ukur';
  const rows=anak.map(a=>{const u=latest[a.id];return[a.nama,a.jenisKelamin,hitungUsia(a.tglLahir || a.tgl_lahir),a.wilayah,a.posyandu,u?u.bb:'',u?u.tb:'',u?u.zscore_tbu:'',u?u.status:'',u?u.tanggal:''].join(',');});
  const csv=[header,...rows].join('\n');
  const blob=new Blob([csv],{type:'text/csv;charset=utf-8;'});
  const url=URL.createObjectURL(blob);
  const a=document.createElement('a');a.href=url;a.download=`Laporan_SiGizi_${new Date().toISOString().slice(0,10)}.csv`;document.body.appendChild(a);a.click();document.body.removeChild(a);URL.revokeObjectURL(url);
  showToast('File CSV berhasil diunduh');
}
 
// ──────────────────────────────────────
// PRINT / EXPORT LAPORAN
// ──────────────────────────────────────
function printLaporan(){
  const anak=DB.get('anak')||[];
  const ukur=DB.get('pengukuran')||[];
  const latest={};ukur.sort((a,b)=>b.tanggal.localeCompare(a.tanggal)).forEach(u=>{if(!latest[u.idAnak])latest[u.idAnak]=u;});
  const tanggal=new Date().toLocaleDateString('id-ID',{day:'2-digit',month:'long',year:'numeric'});
  const rows=anak.map(a=>{const u=latest[a.id];return`<tr><td>${a.nama}</td><td>${a.jenisKelamin==='L'?'L':'P'}</td><td>${hitungUsia(a.tglLahir || a.tgl_lahir)} bln</td><td>${a.wilayah}</td><td>${u?u.bb+' kg':'-'}</td><td>${u?u.tb+' cm':'-'}</td><td>${u?u.zscore_tbu:'-'}</td><td>${u?u.status:'-'}</td></tr>`;}).join('');
  const stunt=Object.values(latest).filter(u=>u.status==='Stunting'||u.status==='Stunting Berat').length;
  const win=window.open('','_blank');
  win.document.write(`<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Laporan SiGizi</title>
  <style>body{font-family:Arial,sans-serif;margin:24px;font-size:12px;color:#222}h1{font-size:18px;margin-bottom:2px}h2{font-size:13px;margin-bottom:16px;color:#555;font-weight:normal}
  table{width:100%;border-collapse:collapse;margin-top:16px}th{background:#16a37f;color:#fff;padding:7px 9px;text-align:left;font-size:11px}td{padding:6px 9px;border-bottom:1px solid #ddd;font-size:11px}tr:last-child td{border-bottom:none}
  .meta{display:flex;gap:32px;margin-bottom:16px;padding:10px;background:#f4f7f5;border-radius:6px}.meta-item{font-size:12px}.meta-val{font-size:18px;font-weight:700;color:#16a37f}
  @media print{button{display:none}}</style></head><body>
  <h1>LAPORAN REKAP GIZI BALITA</h1><h2>Puskesmas Sungai Durian — Dicetak: ${tanggal}</h2>
  <div class="meta">
    <div class="meta-item"><div>Total Balita</div><div class="meta-val">${anak.length}</div></div>
    <div class="meta-item"><div>Stunting</div><div class="meta-val" style="color:#dc2626">${stunt}</div></div>
    <div class="meta-item"><div>Prevalensi</div><div class="meta-val">${anak.length?Math.round(stunt/anak.length*100):0}%</div></div>
  </div>
  <button onclick="window.print()" style="padding:8px 16px;background:#16a37f;color:#fff;border:none;border-radius:6px;cursor:pointer;font-size:13px;margin-bottom:10px">🖨️ Cetak / Simpan PDF</button>
  <table><thead><tr><th>Nama Anak</th><th>JK</th><th>Usia</th><th>Wilayah</th><th>BB</th><th>TB</th><th>Z TB/U</th><th>Status</th></tr></thead><tbody>${rows}</tbody></table>
  </body></html>`);
  win.document.close();
}
 
// Override SECTIONS.laporan to add print button
const _oldLaporan = SECTIONS.laporan;
SECTIONS.laporan = ()=>{
  const base = _oldLaporan();
  return `<div class="search-row" style="justify-content:flex-end;margin-bottom:16px;gap:8px">
    <button class="btn" onclick="unduhLaporan()"><i class="ti ti-download"></i> Unduh CSV</button>
    <button class="btn btn-primary" onclick="printLaporan()"><i class="ti ti-printer"></i> Cetak / PDF</button>
  </div>`+base;
};
 
// Override detailAnak to add grafik button
const _oldDetailAnak = detailAnak;
function detailAnak(id){
  const a=DB.get('anak').find(x=>x.id===id);
  const ukur=DB.get('pengukuran').filter(u=>u.idAnak===id).sort((a,b)=>b.tanggal.localeCompare(a.tanggal));
  const last=ukur[0];
  openModal(`<div class="modal-header"><div class="modal-title">Profil — ${a.nama}</div><div class="modal-close" onclick="closeModal()"><i class="ti ti-x"></i></div></div>
  <div class="info-row"><div class="info-label">NIK</div><div class="info-val">${fmt(a.nik)}</div></div>
  <div class="info-row"><div class="info-label">Jenis Kelamin</div><div class="info-val">${a.jenisKelamin==='L'?'Laki-laki':'Perempuan'}</div></div>
  <div class="info-row"><div class="info-label">Tanggal Lahir</div><div class="info-val">${fmtDate(a.tglLahir || a.tgl_lahir)} (${hitungUsia(a.tglLahir || a.tgl_lahir)} bulan)</div></div>
  <div class="info-row"><div class="info-label">Nama Ibu</div><div class="info-val">${fmt(a.namaIbu)}</div></div>
  <div class="info-row"><div class="info-label">No. HP</div><div class="info-val">${fmt(a.noHP)}</div></div>
  <div class="info-row"><div class="info-label">Alamat</div><div class="info-val">${fmt(a.alamat)}</div></div>
  <div class="info-row"><div class="info-label">Wilayah / Posyandu</div><div class="info-val">${fmt(a.wilayah)} / ${fmt(a.posyandu)}</div></div>
  ${last?`<div style="margin-top:14px"><b>Pengukuran Terakhir</b> (${fmtDate(last.tanggal)})</div>
  <div class="info-row"><div class="info-label">BB / TB</div><div class="info-val">${last.bb} kg / ${last.tb} cm</div></div>
  <div class="info-row"><div class="info-label">Z-Score TB/U</div><div class="info-val">${last.zscore_tbu}</div></div>
  <div class="info-row"><div class="info-label">Status Gizi</div><div class="info-val">${statusBadge(last.status)}</div></div>`:'<div class="alert alert-info mt-12"><i class="ti ti-info-circle"></i>Belum ada data pengukuran.</div>'}
  <div class="modal-footer"><button class="btn" onclick="grafikAnak(${id})" style="gap:6px"><i class="ti ti-chart-line"></i>Lihat Grafik</button><button class="btn btn-primary" onclick="closeModal()">Tutup</button></div>`);
}
 
// ──────────────────────────────────────
// ATTACH HANDLERS
// ──────────────────────────────────────
function attachHandlers(sec){
  // nothing special needed beyond inline handlers
}
</script>
</body>
</html>