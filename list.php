<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Aktivitas Sehat</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      font-family: Arial, sans-serif;
      background: #626161;
      padding: 20px;
    }

    .activity-card {
      background: linear-gradient(135deg, #4a80f0, #6a9cff);
      color: white;
      padding: 18px;
      border-radius: 18px;
      display: flex;
      align-items: center;
      cursor: pointer;
      transition: 0.2s;
      height: 100%;
    }

    .activity-card:hover {
      transform: scale(1.02);
    }

    .activity-card.done {
      opacity: 0.6;
      text-decoration: line-through;
    }

    .activity-card input {
      margin-right: 12px;
      pointer-events: none;
    }

    .btn-primary {
      background: #4a80f0;
      border: none;
      border-radius: 14px;
      padding: 14px;
    }

    .btn-reset {
      background: #27ae60;
      /* border: none; */
      border-radius: 14px;
      padding: 14px;
    }

    .btn-reset:hover {
      background-color: green;
    }

    .modal-content {
      border-radius: 18px;
      text-align: center;
      padding: 24px;
    }

    .score {
      font-size: 36px;
      font-weight: bold;
      color: #4a80f0;
    }
  </style>
</head>

<body>

  <!-- CONTAINER FLUID -->
  <div class="container-fluid">
    <div class="row justify-content-center">

      <!-- WRAPPER RESPONSIVE -->
      <div class="col-12 col-md-10 col-lg-8 col-xl-6">

        <h3 class="text-center mb-4 text-white fw-bold">Aktivitas Sehat</h3>

        <!-- LIST GRID -->
        <div class="row g-3" id="list"></div>

        <div class="row mt-4">
          <div class="col-12 col-md-6 mb-2">
            <button class="btn btn-primary w-100" onclick="showModal()">
              Lihat Kesehatan Saya
            </button>
          </div>
          <div class="col-12 col-md-6">
            <button class="btn btn-reset w-100 text-white" onclick="resetAll()">
              Buat Baru
            </button>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- MODAL -->
  <div class="modal fade" id="modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <h5>Nilai Kesehatan</h5>
        <div class="score"><span id="score">0</span>%</div>
        <button class="btn btn-danger mt-3" onclick="closeModal()">Tutup</button>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    const activities = [{
        name: "Olahraga",
        value: 30,
        done: false
      },
      {
        name: "Sarapan",
        value: 20,
        done: false
      },
      {
        name: "Mandi",
        value: 10,
        done: false
      },
      {
        name: "Minum Air",
        value: 40,
        done: false
      }
    ];

    const listEl = document.getElementById("list");
    const scoreEl = document.getElementById("score");
    const modalEl = new bootstrap.Modal(document.getElementById("modal"));

    const saved = JSON.parse(localStorage.getItem("activities"));
    if (saved) saved.forEach((a, i) => activities[i].done = a.done);

    function render() {
      listEl.innerHTML = "";
      let total = 0;
      let completed = true;

      activities.forEach(act => {
        if (act.done) total += act.value;
        if (!act.done) completed = false;

        const col = document.createElement("div");
        col.className = "col-12 col-md-6";

        const card = document.createElement("div");
        card.className = "activity-card" + (act.done ? " done" : "");

        const checkbox = document.createElement("input");
        checkbox.type = "checkbox";
        checkbox.checked = act.done;
        checkbox.disabled = act.done;

        card.appendChild(checkbox);
        card.appendChild(document.createTextNode(`${act.name} (${act.value}%)`));

        card.addEventListener("click", () => {
          if (!act.done) {
            act.done = true;
            save();
            render();
          }
        });

        col.appendChild(card);
        listEl.appendChild(col);
      });

      scoreEl.innerText = total;
      if (completed) showModal();
    }

    function save() {
      localStorage.setItem("activities", JSON.stringify(activities));
    }

    function showModal() {
      modalEl.show();
    }

    function closeModal() {
      modalEl.hide();
    }

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