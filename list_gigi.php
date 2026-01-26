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
      background: #f3f6fa;
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
    <h2 class="mb-5">Prilaku Hidup Sehat</h2>

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
        impact: "Kurang bergerak meningkatkan risiko obesitas dan penyakit jantung.",
        solution: "Aktivitas fisik adalah setiap gerakan tubuh yang dilakukan oleh otot rangka dan memerlukan energi, seperti berjalan, berolahraga, bekerja, atau melakukan kegiatan sehari-hari, <br> Manfaat aktivitas fisik sangat besar bagi kesehatan, antara lain meningkatkan kekuatan otot dan tulang, menjaga kesehatan jantung dan paru-paru, melancarkan peredaran darah, serta membantu mengontrol berat badan. "

      },
      {
        name: "Konsumsi buah dan sayur",
        done: false,
        impact: "Kekurangan vitamin dan serat dapat menurunkan imunitas tubuh.",
        solution: "Konsumsi buah dan sayur adalah kebiasaan mengonsumsi berbagai jenis buah dan sayuran setiap hari sebagai bagian dari pola makan seimbang. Buah dan sayur mengandung vitamin, mineral, serat, dan antioksidan yang dibutuhkan tubuh untuk menjaga fungsi organ serta meningkatkan daya tahan tubuh. <br> Manfaat konsumsi buah dan sayur sangat penting bagi kesehatan, di antaranya membantu melancarkan pencernaan, menjaga berat badan ideal, menurunkan risiko penyakit tidak menular seperti diabetes, hipertensi, dan penyakit jantung, serta membantu menjaga kesehatan kulit dan meningkatkan imunitas tubuh."
      },
      {
        name: "Cuci tangan dengan benar",
        done: false,
        impact: "Risiko infeksi dan penyakit menular meningkat.",
        solution: "Cuci tangan yang benar adalah tindakan membersihkan tangan menggunakan air mengalir dan sabun dengan langkah yang tepat untuk menghilangkan kuman, bakteri, dan virus penyebab penyakit. Cuci tangan harus dilakukan terutama sebelum makan, setelah dari toilet, setelah beraktivitas, dan setelah menyentuh benda yang kotor <br> Manfaat cuci tangan yang benar sangat penting bagi kesehatan, yaitu mencegah penularan berbagai penyakit seperti diare, infeksi saluran pernapasan, dan penyakit menular lainnya. Kebiasaan cuci tangan juga membantu menjaga kebersihan diri, melindungi keluarga dan lingkungan sekitar, serta menjadi langkah sederhana namun efektif dalam menjaga kesehatan sehari-hari."
      },
      {
        name: "Tidak merokok",
        done: false,
        impact: "Merokok dapat merusak paru-paru dan meningkatkan risiko kanker.",
        solution: "Tidak merokok adalah perilaku hidup sehat dengan menghindari kebiasaan merokok serta paparan asap rokok, baik sebagai perokok aktif maupun pasif. Rokok mengandung zat berbahaya seperti nikotin, tar, dan karbon monoksida yang dapat merusak berbagai organ tubuh dan menurunkan kualitas kesehatan. <br> Manfaat tidak merokok sangat besar, antara lain menjaga kesehatan paru-paru dan jantung, menurunkan risiko penyakit tidak menular seperti kanker, stroke, dan penyakit jantung koroner, serta meningkatkan daya tahan tubuh."
      },
      {
        name: "Cek tekanan darah",
        done: false,
        impact: "Hipertensi bisa tidak terdeteksi dan menyebabkan stroke.",
        solution: "Cek tekanan darah adalah pemeriksaan untuk mengetahui seberapa kuat tekanan darah yang mengalir di pembuluh darah saat jantung memompa darah ke seluruh tubuh. Pemeriksaan ini penting dilakukan secara rutin karena tekanan darah tinggi maupun rendah sering kali tidak menimbulkan gejala. <br> Manfaat cek tekanan darah secara rutin yaitu membantu mendeteksi hipertensi sejak dini, mencegah risiko penyakit jantung, stroke, dan gangguan pembuluh darah, serta membantu memantau kondisi kesehatan secara keseluruhan"
      },
      {
        name: "Cek gula darah",
        done: false,
        impact: "Diabetes dapat berkembang tanpa disadari.",
        solution: "Cek gula darah adalah pemeriksaan untuk mengetahui kadar gula (glukosa) dalam darah sebagai sumber energi utama bagi tubuh. Pemeriksaan ini penting dilakukan secara rutin karena kadar gula darah yang tinggi atau rendah sering kali tidak menimbulkan gejala pada tahap awal. <br> Manfaat cek gula darah secara rutin yaitu membantu mendeteksi diabetes melitus sejak dini, mengontrol kadar gula darah agar tetap normal, serta mencegah terjadinya komplikasi seperti penyakit jantung, gangguan ginjal, dan gangguan saraf"
      }
    ];

    const listEl = document.getElementById("list");
    const infoBox = document.getElementById("infoBox");
    const modal = document.getElementById("modal");
    const modalContent = document.getElementById("modalContent");

    function render() {
      listEl.innerHTML = "";

      const doneCount = activities.filter(a => a.done).length;

      // ===== TAMBAHAN: kondisi awal =====
      if (doneCount === 0) {
        infoBox.innerHTML = `
          <div class="info-empty">
            Anda belum melakukan kegiatan<br>
            apapun dalam list
          </div>
        `;
        infoBox.style.display = "block";
      }
      // =================================

      activities.forEach(act => {
        const btn = document.createElement("button");
        btn.className = "button type1" + (act.done ? " done" : "");
        btn.setAttribute("data-text", act.name);

        btn.onclick = () => {
          if (!act.done) {
            act.done = true;

            localStorage.setItem(
              "activitiesStatus",
              JSON.stringify(activities.map(a => a.done))
            );

            infoBox.innerHTML = `
              <div class="qa">
                <strong>${act.name}</strong><br>
                Solusi: ${act.solution}
              </div>
            `;
            infoBox.style.display = "block";

            render();

            localStorage.setItem("infoBoxContent", infoBox.innerHTML);
            localStorage.setItem("infoBoxVisible", "true");
          }
        };

        listEl.appendChild(btn);
      });
    }

    // ===== TAMBAHAN: ambil status dari localStorage =====
    const savedStatus = JSON.parse(localStorage.getItem("activitiesStatus"));
    if (savedStatus) {
      activities.forEach((a, i) => {
        if (savedStatus[i] !== undefined) {
          a.done = savedStatus[i];
        }
      });
    }

    // ===== TAMBAHAN: restore info box =====
    const savedInfo = localStorage.getItem("infoBoxContent");
    const infoVisible = localStorage.getItem("infoBoxVisible");

    if (savedInfo && infoVisible === "true") {
      infoBox.innerHTML = savedInfo;
      infoBox.style.display = "block";
    }
    // =====================================

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
        bgColor = "#2ecc71";
      } else if (ratio >= 0.5) {
        kategori = "Sehat";
        pesan = "Sudah cukup baik, namun masih perlu ditingkatkan.";
        bgColor = "#27ae60";
      } else {
        kategori = "Kurang Baik untuk Kesehatan";
        pesan = "Masih banyak aktivitas penting yang belum dilakukan.";
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
      localStorage.removeItem("activitiesStatus");
      localStorage.removeItem("infoBoxContent");
      localStorage.removeItem("infoBoxVisible");
    }

    render();
  </script>

</body>

</html>