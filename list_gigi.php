<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Aktivitas Sehat</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    /* === TIDAK DIUBAH === */
    body {
      font-family: Arial, sans-serif;
      background: #f3f6fa;
      padding: 20px;
    }

    .wrapper {
      display: flex;
      gap: 24px;
      justify-content: center;
      align-items: flex-start;
    }

    .container {
      max-width: 420px;
      width: 100%;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .item {
      background: #4a80f0;
      color: white;
      padding: 14px 16px;
      border-radius: 14px;
      margin-bottom: 12px;
      display: flex;
      align-items: center;
    }

    .item.done {
      opacity: 0.6;
      text-decoration: line-through;
    }

    .item input {
      margin-right: 10px;
    }

    button {
      width: 100%;
      padding: 14px;
      border: none;
      border-radius: 14px;
      font-size: 16px;
      cursor: pointer;
      margin-top: 12px;
    }

    .btn-primary {
      background: #4a80f0;
      color: white;
    }

    .btn-reset {
      background: #27ae60;
      color: white;
    }

    .info-box {
      width: 300px;
      background: #8e8e8e;
      color: white;
      padding: 16px;
      border-radius: 16px;
      font-size: 14px;
      display: none;
      margin-top: 52px;
    }

    .qa {
      margin-bottom: 12px;
      padding-bottom: 10px;
      border-bottom: 1px solid rgba(255, 255, 255, .3);
    }

    .qa strong {
      display: block;
      margin-bottom: 4px;
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
      width: 85%;
      max-width: 340px;
      text-align: center;
    }

    .warning {
      background: #fff3cd;
      color: #856404;
      padding: 12px;
      border-radius: 10px;
      text-align: left;
      font-size: 14px;
      margin-top: 10px;
    }

    .warning ul {
      padding-left: 18px;
      margin: 0;
    }

    .close {
      margin-top: 20px;
      background: #e74c3c;
      color: white;
    }
  </style>
</head>

<body>

  <div class="wrapper">
    <div class="container">
      <h2>Tips Gigi Sehat</h2>
      <div id="list"></div>
      <button class="btn-primary" onclick="submitCheck()">Lihat Kesehatan gigi Saya</button>
      <button class="btn-reset" onclick="resetAll()">Buat Baru</button>
    </div>
    <div class="info-box" id="infoBox"></div>
  </div>

  <div class="modal" id="modal">
    <div class="modal-content" id="modalContent"></div>
  </div>

  <script>
    const activities = [{
        name: "Ativitas Fisik",
        done: false,
        impact: "Solusi: Lakukan aktivitas fisik rutin untuk menjaga kebugaran."
      },
      {
        name: "Konsumsi buah dan sayur",
        done: false,
        impact: "Solusi: Perbanyak buah dan sayur untuk daya tahan tubuh."
      },
      {
        name: "Cuci tangan dengan benar",
        done: false,
        impact: "Solusi: Cuci tangan untuk mencegah penyakit menular."
      },
      {
        name: "Tidak merokok",
        done: false,
        impact: "Solusi: Hindari rokok untuk kesehatan paru-paru."
      },
      {
        name: "Cek tekanan darah",
        done: false,
        impact: "Solusi: Cek rutin untuk mencegah hipertensi."
      },
      {
        name: "Cek gula darah",
        done: false,
        impact: "Solusi: Kontrol gula darah untuk cegah diabetes."
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
        const div = document.createElement("div");
        div.className = "item" + (act.done ? " done" : "");
        const cb = document.createElement("input");
        cb.type = "checkbox";
        cb.checked = act.done;
        cb.disabled = act.done;
        cb.onchange = () => {
          act.done = true;
          render();
        };
        div.append(cb, document.createTextNode(act.name));
        listEl.appendChild(div);
      });

      if (notDone.length) {
        notDone.forEach(a => {
          infoBox.innerHTML += `<div class="qa"><strong>${a.name}</strong>${a.impact}</div>`;
        });
        infoBox.style.display = "block";
      }
    }

    /* === SISTEM PENILAIAN BARU === */
    function submitCheck() {
      const total = activities.length;
      const doneCount = activities.filter(a => a.done).length;
      const ratio = doneCount / total;

      let kategori = "",
        pesan = "";

      if (ratio === 1) {
        kategori = "Sangat Sehat";
        pesan = "Semua aktivitas telah dilakukan. Pertahankan gaya hidup sehat 👍";
      } else if (ratio >= 0.5) {
        kategori = "Sehat";
        pesan = "Sudah cukup baik, namun masih perlu ditingkatkan.";
      } else {
        kategori = "Kurang Baik untuk Kesehatan";
        pesan = "Masih banyak aktivitas penting yang belum dilakukan.";
      }

      modalContent.innerHTML = `
    <h3>${kategori}</h3>
    <p>${pesan}</p>
    <div class="warning">
      <strong>Aktivitas yang belum dilakukan:</strong>
      <ul>
        ${activities.filter(a=>!a.done).map(a=>`<li>${a.name}</li>`).join("")}
      </ul>
    </div>
    <button class="close" onclick="closeModal()">Tutup</button>
  `;
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