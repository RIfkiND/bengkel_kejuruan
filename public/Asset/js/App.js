document.addEventListener("DOMContentLoaded", function () {
    // Dapatkan elemen gambar pengguna dan dropdown
    var userImage = document.getElementById("userImage");
    var changeUserImageDropdown = document.getElementById("changeUserImageDropdown");

    // Temukan tautan "Change Picture Profile" berdasarkan ID
    var changePictureLink = document.getElementById("changeUserImage");

    // Tambahkan event listener klik ke tautan
    changePictureLink.addEventListener("click", function () {
        // Cek apakah gambar pengguna sudah diubah
        var isImageChanged = userImage.src.includes("UserImage2.png");

        // Ubah sumber gambar pengguna berdasarkan status saat ini
        userImage.src = isImageChanged ? "/Asset/images/UserImage1.png" : "/Asset/images/UserImage2.png";
    });

    // Tambahkan event listener klik ke dropdown untuk mereset gambar pengguna
    changeUserImageDropdown.addEventListener("click", function () {
        // Reset sumber gambar pengguna ke foto awal
        userImage.src = "/Asset/images/UserImage1.png";
    });
});

const enlargeImages = document.querySelectorAll('.enlarge-image');

  // Tambahkan event listener untuk setiap elemen
  enlargeImages.forEach(image => {
    image.addEventListener('click', () => {
      // Buka gambar yang diperbesar saat gambar diklik
      window.open(image.href, '_blank');
    });
  });



