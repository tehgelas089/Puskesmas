<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex justify-content-center align-items-center min-vh-100 ">

  <!-- PERUBAHAN: method & action -->
  <form class="form_container" method="POST" action="proses.php">

    <div class="logo_container"></div>

    <div class="title_container">
      <p class="title">Login untuk masuk</p>
      <span class="subtitle">Get started with our app, just create an account and enjoy the experience.</span>
    </div>

    <div class="input_container">
      <label class="input_label">Nama</label>
      <svg class="input_icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        class="bi bi-person-square" viewBox="0 0 16 16">
        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
        <path
          d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
      </svg>

      <!-- PERUBAHAN: name -->
      <input name="nama" placeholder="Nama pengguna" type="text" class="input_field">
    </div>

    <div class="input_container">
      <label class="input_label">Password</label>
      <svg class="input_icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        class="bi bi-lock" viewBox="0 0 16 16">
        <path fill-rule="evenodd"
          d="M8 0a4 4 0 0 1 4 4v2.05a2.5 2.5 0 0 1 2 2.45v5a2.5 2.5 0 0 1-2.5 2.5h-7A2.5 2.5 0 0 1 2 13.5v-5a2.5 2.5 0 0 1 2-2.45V4a4 4 0 0 1 4-4M4.5 7A1.5 1.5 0 0 0 3 8.5v5A1.5 1.5 0 0 0 4.5 15h7a1.5 1.5 0 0 0 1.5-1.5v-5A1.5 1.5 0 0 0 11.5 7zM8 1a3 3 0 0 0-3 3v2h6V4a3 3 0 0 0-3-3" />
      </svg>

      <!-- PERUBAHAN: name -->
      <input name="password" placeholder="Password" type="password" class="input_field">
    </div>

    <!-- PERUBAHAN: BUTTON ADMIN BENAR -->
    <button type="submit" class="sign-in_btn">
      <span>Login Admin</span>
    </button>


    <div class="separator">
      <hr class="line">
      <span>Atau</span>
      <hr class="line">
    </div>

    <!-- PERUBAHAN: BUTTON USER LANGSUNG MASUK -->
    <a href="home.html" class="sign-in_apl d-flex justify-content-center align-items-center">
      <span>Lanjutkan sebagai pengguna</span>
    </a>

  </form>

  <style>
    body {
      background-color: #212121;
    }

    .form_container {
      width: 100%;
      max-width: 360px;
      display: flex;
      flex-direction: column;
      gap: 15px;
      padding: 40px;
      background-color: #ffffff;
      box-shadow: 0px 20px 40px rgba(0, 0, 0, 0.15);
      border-radius: 11px;
      font-family: "Inter", sans-serif;
    }

    .logo_container {
      width: 80px;
      height: 80px;
      border-radius: 11px;
      border: 1px solid #F7F7F8;
      margin: auto;
    }

    .title_container {
      text-align: center;
    }

    .title {
      font-size: 1.25rem;
      font-weight: 700;
      margin: 0;
    }

    .subtitle {
      font-size: 0.75rem;
      color: #8B8E98;
    }

    .input_container {
      position: relative;
      display: flex;
      flex-direction: column;
      gap: 5px;
    }

    .input_label {
      font-size: 0.75rem;
      color: #8B8E98;
      font-weight: 600;
    }

    .input_icon {
      position: absolute;
      left: 12px;
      bottom: 11px;
      width: 16px;
      height: 16px;
      color: #8B8E98;
    }

    .input_field {
      height: 40px;
      padding-left: 40px;
      border-radius: 7px;
      border: 1px solid #e5e5e5;
      outline: none;
      transition: 0.3s;
    }

    .input_field:focus {
      box-shadow: 0 0 0 2px #242424;
      border-color: transparent;
    }

    .sign-in_btn,
    .sign-in_apl {
      height: 40px;
      border-radius: 7px;
      border: none;
      cursor: pointer;
      color: #fff;
      text-decoration: none;
    }

    .sign-in_btn {
      background: #115DFC;
    }

    .sign-in_apl {
      background: #212121;
    }

    .separator {
      display: flex;
      align-items: center;
      gap: 15px;
      color: #8B8E98;
      font-size: 0.75rem;
    }

    .line {
      flex: 1;
      height: 5px;
      background: black;
      border: none;
    }
  </style>

</body>

</html>