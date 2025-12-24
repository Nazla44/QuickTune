<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php"); // Jika belum login, tendang balik
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickTune Admin - Premium Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --main-color: #FF49C1;
            --second-color: #44113E;
            --sidebar-bg: #2D0B29;
            --bg-body: #f8f9fa;
            --white: #FFFFFF;
            --room-red: linear-gradient(135deg, #FF6B6B, #EE5253);
            --room-yellow: linear-gradient(135deg, #FF9F43, #F39C12);
            --room-green: linear-gradient(135deg, #2ECC71, #10AC84);
            --room-purple: linear-gradient(135deg, #9b59b6, #8e44ad);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }
        body { background-color: var(--bg-body); color: #2d3436; }

        .dashboard-container { display: flex; min-height: 100vh; }
/* --- SIDEBAR (Sesuai Desain Awal) --- */
.sidebar {
    width: 260px;
    background: linear-gradient(180deg, var(--second-color) 0%, var(--sidebar-bg) 100%);
    color: var(--white);
    display: flex;
    flex-direction: column;
    position: fixed;
    height: 100vh;
    z-index: 100;
}

.logo {
    padding: 30px 20px;
    text-align: center;
    font-size: 1.6rem;
    font-weight: 800;
    color: var(--main-color);
    border-bottom: 1px solid rgba(255,255,255,0.1);
}

.nav-menu { flex-grow: 1; padding: 20px 0; }
.nav-item { list-style: none; }
.nav-item a {
    display: flex; align-items: center;
    padding: 15px 25px; color: rgba(255,255,255,0.7);
    text-decoration: none; transition: 0.3s;
}
.nav-item.active a {
    color: var(--white);
    background: rgba(255,255,255,0.1);
    border-left: 4px solid var(--main-color);
}
.nav-item i { margin-right: 15px; width: 20px; }
.sidebar-footer {
    padding: 20px; background: rgba(0,0,0,0.2);
    text-align: center; font-size: 0.85rem;
}


        /* --- MAIN CONTENT --- */
        .main-content { margin-left: 260px; flex-grow: 1; padding: 40px; width: calc(100% - 260px); }
        .section-header { margin-bottom: 35px; }
        .section-header h2 { font-size: 1.8rem; font-weight: 700; display: flex; align-items: center; gap: 12px; }
        .header-divider { display: block; width: 60px; height: 4px; background: var(--main-color); border-radius: 10px; margin: 12px 0; }

        /* --- ROOM CARDS --- */
        .room-status-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 20px; }
        .room-link { text-decoration: none; color: inherit; }
        .room-card {
            padding: 25px; border-radius: 20px; color: white; min-height: 160px;
            display: flex; flex-direction: column; transition: 0.3s; position: relative;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        }
        .room-card:hover { transform: translateY(-5px); }
        .room-title { font-size: 1.4rem; font-weight: 800; margin-bottom: 10px; display: flex; justify-content: space-between; align-items: center;}
        .status-badge { font-size: 0.7rem; background: rgba(255,255,255,0.2); padding: 4px 10px; border-radius: 20px; text-transform: uppercase; }
        
        .card-red { background: var(--room-red); }
        .card-yellow { background: var(--room-yellow); }
        .card-green { background: var(--room-green); }
        .card-purple { background: var(--room-purple); }

        /* POS Style */
        .pos-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 30px; margin-top: 20px; }
        .bill-card, .report-card { background: #fff; padding: 20px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .pos-left select, .pos-left input { width: 100%; padding: 12px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 8px; }
        .btn-pay { width: 100%; padding: 15px; background: var(--main-color); color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: bold; }

        /* RESPONSIVE */
        @media (max-width: 992px) {
            .sidebar { width: 80px; }
            .sidebar .logo, .sidebar-footer, .nav-item span { display: none; }
            .main-content { margin-left: 80px; width: calc(100% - 80px); }
            .nav-item i { margin-right: 0; }
        }
    </style>
</head>
<body>

<div class="dashboard-container">
    <aside class="sidebar">
        <div class="logo">QuickTune</div>
        <nav class="nav-menu">
            <ul>
                <li class="nav-item active" id="nav-room">
                    <a href="javascript:void(0)" onclick="showRoom()">
                        <i class="fas fa-th-large"></i> <span>Room Management</span>
                    </a>
                </li>
                <li class="nav-item" id="nav-pos">
                    <a href="posindex.html" onclick="showPOS()">
                        <i class="fas fa-cash-register"></i> <span>POS & Laporan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pricing&promo.html">
                        <i class="fas fa-tags"></i> <span>Pricing & Promo</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="sidebar-footer">
            <i class="fas fa-user-circle"></i><br>Kasir Shift Sore
        </div>
    </aside>

    <main class="main-content">
        
        <section id="roomManagement">
            <header class="section-header">
                <h2><i class="fas fa-door-open" style="color: var(--main-color)"></i> Room Management</h2>
                <span class="header-divider"></span>
                <p class="subtitle">Pantau dan kelola ketersediaan ruangan secara real-time.</p>
            </header>

            <div class="room-status-grid">
    <a href="detailroomadmin.html?type=Bronze" class="room-link">
        <div class="room-card card-red">
            <div class="room-title">Bronze Room<span class="status-badge">8 Rooms</span></div>
            <p>Klik untuk kelola</p>
            <p>Status: Aktif</p>
        </div>
    </a>

    <a href="detailroomadmin.html?type=Silver" class="room-link">
        <div class="room-card card-yellow">
            <div class="room-title">Silver Room <span class="status-badge">4 Rooms</span></div>
            <p>Klik untuk kelola</p>
            <p>Status: Aktif</p>
        </div>
    </a>

    <a href="detailroomadmin.html?type=Gold" class="room-link">
        <div class="room-card card-green">
            <div class="room-title">Gold Room<span class="status-badge">Available</span></div>
            <p>Klik untuk kelola</p>
            <p>Status: Aktif</p>
        </div>
    </a>

    <a href="detailroomadmin.html?type=Platinum" class="room-link">
        <div class="room-card card-purple">
            <div class="room-title">Platinum Room<span class="status-badge">Booked</span></div>
            <p>Klik untuk kelola</p>
            <p>Status: Aktif</p>
        </div>
    </a>
</div>
            </div>
        </section>

        <section id="posSection" style="display:none;">
            <header class="section-header">
                <h2><i class="fas fa-cash-register" style="color: var(--main-color)"></i> POS & Transaksi</h2>
                <span class="header-divider"></span>
                <p class="subtitle">Modul transaksi & laporan kasir otomatis.</p>
            </header>

            <div class="pos-grid">
                <div class="pos-left">
                    <div class="bill-card">
                        <label>Pilih Ruangan Aktif</label>
                        <select>
                            <option>Bronze - B01 (In Use)</option>
                            <option>Silver - S01 (Cleaning)</option>
                        </select>
                        <input type="text" placeholder="Cari Menu F&B...">
                        <hr style="margin: 15px 0;">
                        <p>Total Ruangan: <b>Rp 120.000</b></p>
                        <p>Total F&B: <b>Rp 45.000</b></p>
                        <h3 style="color: var(--main-color); margin-top: 10px;">TOTAL: Rp 165.000</h3>
                        <br>
                        <button class="btn-pay">PROSES PEMBAYARAN</button>
                    </div>
                </div>
                <div class="pos-right">
                    <div class="report-card">
                        <h3>Laporan Shift</h3>
                        <br>
                        <p>Total Transaksi: 12</p>
                        <p>Total Cash: Rp 500k</p>
                        <p>Total QRIS: Rp 800k</p>
                        <hr style="margin: 10px 0;">
                        <h4>Grand Total: Rp 1.300.000</h4>
                    </div>
                </div>
            </div>
        </section>

    </main>
</div>

<script>
    function showPOS() {
        document.getElementById('roomManagement').style.display = 'none';
        document.getElementById('posSection').style.display = 'block';
        
        document.getElementById('nav-room').classList.remove('active');
        document.getElementById('nav-pos').classList.add('active');
    }

    function showRoom() {
        document.getElementById('posSection').style.display = 'none';
        document.getElementById('roomManagement').style.display = 'block';
        
        document.getElementById('nav-pos').classList.remove('active');
        document.getElementById('nav-room').classList.add('active');
    }
</script>

</body>
</html>