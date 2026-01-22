<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>pencegahaan penyakit tidak menular</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f3f6fa;
      padding: 20px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    /* ================= BUTTON LIST ================= */
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

    /* HOVER DIMATIKAN */
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

    /* ANIMASI AKTIF SETELAH DI KLIK */
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

    /* =============================================== */

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
      background: #8e8e8e;
      color: white;
      padding: 16px;
      border-radius: 16px;
      font-size: 14px;
      display: none;
    }

    .qa {
      margin-bottom: 12px;
      padding-bottom: 10px;
      border-bottom: 1px solid rgba(255, 255, 255, .3);
    }

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

    .close:hover {
      background-color: #44444E;
    }
  </style>
</head>

<body>

  <div class="container">
    <h2 class="mb-5">Pencegahaan penyakit tidak menular</h2>

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
    const activities = [{
        name: "Aktivitas Fisik",
        done: false,
        impact: "Otot dan jantung melemah.",
        solution: "Luangkan waktu olahraga minimal 30 menit/hari."
      },
      {
        name: "Jaga pola makan sehat",
        done: false,
        impact: "Daya tahan tubuh menurun.",
        solution: "Pilih menu gizi seimbang."
      },
      {
        name: "Jaga berat badan ideal",
        done: false,
        impact: "Beban kerja jantung meningkat.",
        solution: "Seimbangkan pola makan dan aktivitas fisik."
      },
      {
        name: "Hindari rokok dan alkohol",
        done: false,
        impact: "Risiko kanker paru dan Kerusakan hati dan organ tubuh lainnya.",
        solution: "Hindari dan jauhi rokok dan alkohol."
      },
      {
        name: "Istirahan yang cukup",
        done: false,
        impact: "Konsentrasi menurun.",
        solution: "Atur waktu kerja dan istirahat."
      },
      {
        name: "Cek kesehatan berkala",
        done: false,
        impact: "Penyakit tidak terdeteksi sejak dini.",
        solution: "Lakukan pemeriksaan meski merasa sehat."
      }
    ];

    const listEl = document.getElementById("list");
    const infoBox = document.getElementById("infoBox");
    const modal = document.getElementById("modal");
    const modalContent = document.getElementById("modalContent");

    function render() {
      listEl.innerHTML = "";
      infoBox.innerHTML = "";
      const notDone = [];

      activities.forEach(act => {
        if (!act.done) notDone.push(act);

        const btn = document.createElement("button");
        btn.className = "button type1" + (act.done ? " done" : "");
        btn.setAttribute("data-text", act.name);

        btn.onclick = () => {
          if (!act.done) {
            act.done = true;
            render();
          }
        };

        listEl.appendChild(btn);
      });

      if (notDone.length) {
        notDone.forEach(a => {
          infoBox.innerHTML += `
            <div class="qa">
              <strong>${a.name}</strong><br>
              Solusi: ${a.solution}
            </div>`;
        });
        infoBox.style.display = "block";
      }
    }

    function submitCheck() {
      const total = activities.length;
      const doneCount = activities.filter(a => a.done).length;
      const ratio = doneCount / total;

      let kategori = "",
        pesan = "",
        bgColor = "";

      if (ratio === 1) {
        kategori = "Sangat Sehat";
        pesan = "Bagus! Semua aktivitas telah dilakukan.";
        bgColor = "#2ecc71"; // hijau cerah
      } else if (ratio >= 0.5) {
        kategori = "Sehat";
        pesan = "Sudah cukup baik, namun masih perlu ditingkatkan.";
        bgColor = "#27ae60"; // hijau
      } else {
        kategori = "Kurang Baik untuk Kesehatan";
        pesan = "Masih banyak aktivitas penting yang belum dilakukan.";
        bgColor = "#e74c3c"; // merah
      }

      modalContent.innerHTML = `
    <h3>${kategori}</h3>
    <p>${pesan}</p>
    <div class="warning">
      <strong>Dampak jika tidak melakukan:</strong>
      <ul>
        ${activities.filter(a => !a.done).map(a =>
          `<li><strong>${a.name}:</strong> ${a.impact}</li>`
        ).join("")}
      </ul>
    </div>
    <button class="close" onclick="closeModal()">Tutup</button>
  `;

      /* TAMBAHAN AMAN (TIDAK MERUBAH STRUKTUR) */
      modalContent.style.background = bgColor;
      modalContent.style.color = "white";

      modal.style.display = "flex";
    }


    function closeModal() {
      modal.style.display = "none";
    }

    function resetAll() {
      activities.forEach(a => a.done = false);
      closeModal();
      render();
    }

    render();
  </script>

</body>

</html>