function tambah() {
  // Panggil Elemen anggota-nya
  var anggota = document.getElementById("examanggota");

  // Panggil Elemen Button-nya
  var btn = document.getElementById("exambutton");

  // Panggil Elemen Close-nya, untuk mensimulasikan efek tutup
  var span = document.getElementsByClassName("close")[0];

  // Saat Pengguna Menekan Button, Lakukan Pemanggilan anggota
  btn.onclick = function () {
    anggota.style.display = "block";
  };

  // Saat Pengguna Menekan Tombol X (close), simulasikan efek tutup
  span.addEventListener("click", function () {
    anggota.style.display = "none";
  });

  // Saat Pengguna menekan sesuatu, diluar dari anggota, simulasikan efek tutup
  window.onclick = function (event) {
    if (event.target == anggota) {
      anggota.style.display = "none";
    }
  };

  var btnn = document.getElementById("closed");

  btnn.onclick = function () {
    anggota.style.display = "none";
  };
}

function close() {}
