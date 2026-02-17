<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Aktivitas Sehat</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      font-family: Arial, sans-serif;
      background: #D3DAD9;
      padding: 20px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .button {
      height: 50px;
      width: 100%;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      position: relative;
      overflow: hidden;
      transition: all 0.5s ease-in-out;
      margin-bottom: 12px;
    }

    .button:hover {
      box-shadow: none;
    }

    .type1::after {
      content: "Selesai ✓";
      height: 50px;
      width: 100%;
      background-color: #27ae60;
      color: #fff;
      position: absolute;
      top: 0;
      left: 0;
      transform: translateY(50px);
      font-size: 1rem;
      font-weight: 600;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.5s ease-in-out;
    }

    .type1::before {
      content: attr(data-text);
      height: 50px;
      width: 100%;
      background-color: #4a80f0;
      color: #fff;
      position: absolute;
      top: 0;
      left: 0;
      transform: translateY(0);
      font-size: 1rem;
      font-weight: 600;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.5s ease-in-out;
      text-align: center;
      padding: 0 10px;
    }

    .button.done::after {
      transform: translateY(0) scale(1.2);
    }

    .button.done::before {
      transform: translateY(-50px) scale(0) rotate(120deg);
    }

    .button.done {
      opacity: 0.7;
      pointer-events: none;
    }

    button.btn-primary {
      background: #4a80f0;
      color: white;
      width: 100%;
      padding: 14px;
      border-radius: 14px;
      margin-top: 12px;
      border: none;
    }

    .btn-reset {
      background: #27ae60;
      color: white;
      width: 100%;
      padding: 14px;
      border-radius: 14px;
      margin-top: 12px;
      border: none;
    }

    .info-box {
      background: #71C9CE;
      color: white;
      padding: 16px;
      border-radius: 16px;
      font-size: 14px;
      display: none;
    }

    /* ===== TAMBAHAN (TANPA MENGUBAH YANG LAIN) ===== */
    .info-empty {
      border: 2px solid red;
      border-radius: 12px;
      padding: 40px 20px;
      text-align: center;
      background: white;
      color: red;
      font-size: 14px;
    }

    /* ============================================= */

    /* .qa {
      margin-bottom: 12px;
      padding-bottom: 10px;
      border-bottom: 1px solid rgba(255, 255, 255, .3);
    } */

    .modal {
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, .4);
      display: none;
      align-items: center;
      justify-content: center;
    }

    .modal-content {
      background: white;
      padding: 24px;
      border-radius: 16px;
      width: 100%;
      max-width: 500px;
      text-align: center;
    }

    .warning {
      background: white;
      color: #856404;
      padding: 12px;
      border-radius: 10px;
      text-align: left;
      font-size: 14px;
      margin-top: 10px;
    }

    .close {
      margin-top: 20px;
      background: #57564F;
      color: white;
      width: 100%;
      padding: 12px;
      border-radius: 12px;
      border: none;
    }
  </style>
</head>

<body>

  <div class="container">
    <h2 class="mb-5">Pencegahaan Penyakit tidak menular</h2>

    <div class="row justify-content-center g-4">
      <div class="col-lg-5 col-12">
        <div id="list"></div>
        <button class="btn-primary" onclick="submitCheck()">Lihat Kesehatan</button>
        <button class="btn-reset" onclick="resetAll()">Buat Baru</button>
      </div>

      <div class="col-lg-4 col-12">
        <div class="info-box" id="infoBox"></div>
      </div>
    </div>

    <div class="modal" id="modal">
      <div class="modal-content" id="modalContent"></div>
    </div>
  </div>

  <script>
    /* ===== KEY KHUSUS UNTUK LIST WO ===== */
    const STORAGE_KEY_STATUS = "activitiesStatus_wo";
    const STORAGE_KEY_INFO = "infoBoxContent_wo";
    const STORAGE_KEY_VISIBLE = "infoBoxVisible_wo";
    /* ================================== */

    const activities = [{
        name: "Jogging atau Lari Ringan",
        done: false,
        impact: "kebiasaan mengonsumsi makanan yang mengandung karbohidrat, protein, lemak, vitamin, dan mineral sesuai kebutuhan tubuh, sehingga dapat menjaga fungsi organ dan mencegah berbagai penyakit tidak menular.",
        solution: "Aktivitas fisik ringan dengan melangkahkan kaki secara teratur bermanfaat Melatih jantung dan paru-paru, meningkatkan daya tahan tubuh."
      },
      {
        name: "Bersepeda",
        done: false,
        impact: "Kekurangan vitamin dan serat dapat menurunkan imunitas tubuh.",
        solution: "tetap memenuhi kebutuhan gizi seperti karbohidrat, protein, lemak sehat, vitamin, dan mineral."
      },
      {
        name: "Senam atau Aerobik",
        done: false,
        impact: "Risiko infeksi dan penyakit menular meningkat.",
        solution: "Gerakan tubuh teratur yang diiringi musik atau hitungan tertentu. Bermanfaat Meningkatkan kebugaran, kelenturan tubuh, dan menjaga berat badan ideal."
      },
      {
        name: "Minum Air Putih yang cukup",
        done: false,
        impact: "Merokok dapat merusak paru-paru dan meningkatkan risiko kanker.",
        solution: "Membantu metabolisme, melancarkan pencernaan, dan mengurangi rasa lapar. minimal kebutuhan air putih orang dewasa adalah ±2 liter per hari atau sekitar 8 gelas (1 gelas ±250 ml)."
      },
      {
        name: "Peregangan",
        done: false,
        impact: "Diabetes dapat berkembang tanpa disadari.",
        solution: "Gerakan untuk meregangkan otot sebelum atau sesudah aktivitas.Bermanfaat Mencegah cedera, mengurangi kaku otot, dan menjaga kelenturan tubuh"
      }
    ];

    const listEl = document.getElementById("list");
    const infoBox = document.getElementById("infoBox");
    const modal = document.getElementById("modal");
    const modalContent = document.getElementById("modalContent");

    function render() {
      listEl.innerHTML = "";

      const doneCount = activities.filter(a => a.done).length;

      if (doneCount === 0) {
        infoBox.innerHTML = `
        <div class="info-empty">
          Anda belum melakukan kegiatan<br>
          apapun dalam list
        </div>
      `;
        infoBox.style.display = "block";
      }

      activities.forEach(act => {
        const btn = document.createElement("button");
        btn.className = "button type1" + (act.done ? " done" : "");
        btn.setAttribute("data-text", act.name);

        btn.onclick = () => {
          if (!act.done) {
            act.done = true;

            localStorage.setItem(
              STORAGE_KEY_STATUS,
              JSON.stringify(activities.map(a => a.done))
            );

            infoBox.innerHTML = `
            <div class="qa">
              <strong>${act.name}</strong><br>
              ${act.solution}
            </div>
          `;
            infoBox.style.display = "block";

            localStorage.setItem(STORAGE_KEY_INFO, infoBox.innerHTML);
            localStorage.setItem(STORAGE_KEY_VISIBLE, "true");

            render();
          }
        };

        listEl.appendChild(btn);
      });
    }

    /* ===== RESTORE STATUS ===== */
    const savedStatus = JSON.parse(localStorage.getItem(STORAGE_KEY_STATUS));
    if (savedStatus) {
      activities.forEach((a, i) => {
        if (savedStatus[i] !== undefined) {
          a.done = savedStatus[i];
        }
      });
    }

    /* ===== RESTORE INFO BOX ===== */
    const savedInfo = localStorage.getItem(STORAGE_KEY_INFO);
    const infoVisible = localStorage.getItem(STORAGE_KEY_VISIBLE);

    if (savedInfo && infoVisible === "true") {
      infoBox.innerHTML = savedInfo;
      infoBox.style.display = "block";
    }

    function submitCheck() {
      const total = activities.length;
      const doneCount = activities.filter(a => a.done).length;

      let kategori = "",
        pesan = "",
        bgColor = "";

      if (doneCount === total) {
        kategori = "Sehat";
        pesan = "Mantap! Semua aktivitas telah dilakukan dengan baik.";
        bgColor = "#2ecc71";
      } else {
        kategori = "Kurang Sehat";
        pesan = "Masih ada aktivitas penting yang belum dilakukan.";
        bgColor = "#e74c3c";
      }

      modalContent.innerHTML = `
      <h3>${kategori}</h3>
      <p>${pesan}</p>
      <div class="warning">
        <strong>Dampak jika tidak dilakukan:</strong>
        <ul>
          ${activities.filter(a => !a.done).map(a =>
            `<li><strong>${a.name}:</strong> ${a.impact}</li>`
          ).join("")}
        </ul>
      </div>
      <button class="close" onclick="closeModal()">Tutup</button>
    `;

      modalContent.style.background = bgColor;
      modalContent.style.color = "white";
      modal.style.display = "flex";
    }

    function closeModal() {
      modal.style.display = "none";
    }

    function resetAll() {
      activities.forEach(a => a.done = false);
      infoBox.style.display = "none";
      closeModal();
      render();
      localStorage.removeItem(STORAGE_KEY_STATUS);
      localStorage.removeItem(STORAGE_KEY_INFO);
      localStorage.removeItem(STORAGE_KEY_VISIBLE);
    }

    render();
  </script>

</body>

</html>