const tombolCari = document.querySelector('.tombol-cari');
const cari = document.querySelector('.cari');
const container = document.querySelector('.container');

// hilangkan tombol cari
tombolCari.style.display = 'none';

// event ketika menuliskan di cari
cari.addEventListener('keyup', () => {
  // ajax
  // xmlhttprequest

  // membuat object xhr
  // const xhr = new XMLHttpRequest();

  // cek ajax / xhr sudah siap
  // xhr.onreadystatechange = () => {
  //   if (xhr.readyState == 4 && xhr.status == 200) {
  //     container.innerHTML = xhr.responseText;
  //   }
  // };

  // siapkan ajaxnya

  // ambil data dari file menggunakan get
  // xhr.open('get', 'ajax/ajax_cari.php?cari=' + cari.value);
  // kirim ajax ke document
  // xhr.send();

  // Metode fetch
  fetch('ajax/ajax_cari.php?cari=' + cari.value)
    .then((response) => response.text())
    .then((respone) => (container.innerHTML = respone));
});

// priview Image untuk tambah dan ubah
function priviewImage() {
  const gambar = document.querySelector('.gambar');
  const imgPriview = document.querySelector('.img-priview');
  const oFReader = new FileReader();

  oFReader.readAsDataURL(gambar.files[0]);
  oFReader.onload = function (oFREvent) {
    imgPriview.src = oFREvent.target.result;
  };
}
