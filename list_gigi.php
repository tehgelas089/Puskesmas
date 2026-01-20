<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Aktivitas Sehat</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f3f6fa;
      padding: 20px;
    }

    .container {
      max-width: 420px;
      margin: auto;
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

    /* MODAL */
    .modal {
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.4);
      display: none;
      align-items: center;
      justify-content: center;
    }

    .modal-content {
      background: white;
      padding: 24px;
      border-radius: 16px;
      width: 80%;
      max-width: 300px;
      text-align: center;
    }

    .score {
      font-size: 32px;
      font-weight: bold;
      color: #4a80f0;
    }

    .close {
      margin-top: 20px;
      background: #e74c3c;
      color: white;
    }
  </style>
</head>

<body>

  <div class="container">
    <h2>tips gigi sehat</h2>

    <div id="list"></div>

    <button class="btn-primary" onclick="showModal()">Lihat Kesehatan gigi Saya</button>
    <button class="btn-reset" onclick="resetAll()">Buat Baru</button>
  </div>

  <!-- MODAL -->
  <div class="modal" id="modal">
    <div class="modal-content">
      <h3>Nilai Kesehatan</h3>
      <div class="score"><span id="score">0</span>%</div>
      <button class="close" onclick="closeModal()">Tutup</button>
    </div>
  </div>

  <script>
    const activities = [{
        name: "gosok gigi",
        value: 40,
        done: false
      },
      {
        name: "kurangi gula",
        value: 20,
        done: false
      },
      {
        name: "Obat Kumur",
        value: 10,
        done: false
      },
      {
        name: " benang gigi",
        value: 30,
        done: false
      }
    ];

    const listEl = document.getElementById("list");
    const scoreEl = document.getElementById("score");
    const modal = document.getElementById("modal");

    // LOAD DATA
    const saved = JSON.parse(localStorage.getItem("activities"));
    if (saved) {
      saved.forEach((a, i) => activities[i].done = a.done);
    }

    // RENDER
    function render() {
      listEl.innerHTML = "";
      let total = 0;
      let completed = true;

      activities.forEach(act => {
        if (act.done) total += act.value;
        if (!act.done) completed = false;

        const div = document.createElement("div");
        div.className = "item" + (act.done ? " done" : "");

        const checkbox = document.createElement("input");
        checkbox.type = "checkbox";
        checkbox.checked = act.done;
        checkbox.disabled = act.done; // terkunci

        checkbox.addEventListener("change", () => {
          act.done = true;
          save();
          render();
        });

        div.appendChild(checkbox);
        div.appendChild(document.createTextNode(`${act.name} (${act.value}%)`));
        listEl.appendChild(div);
      });

      scoreEl.innerText = total;

      if (completed) showModal();
    }

    function save() {
      localStorage.setItem("activities", JSON.stringify(activities));
    }

    // MODAL
    function showModal() {
      modal.style.display = "flex";
    }

    function closeModal() {
      modal.style.display = "none";
    }

    // RESET MANUAL
    function resetAll() {
      if (confirm("Mulai aktivitas baru?")) {
        activities.forEach(act => act.done = false);
        localStorage.removeItem("activities");
        closeModal();
        render();
      }
    }

    render();
  </script>

</body>

</html>