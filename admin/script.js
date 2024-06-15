    function checkFileCount(input) {
        // Mendapatkan jumlah file yang dipilih oleh pengguna
        const fileCount = input.files.length;

        // Batasi jumlah file yang dapat dipilih menjadi 2
        if (fileCount > 1) {
            alert("maksimal satu gambar!");
            input.value = ''; // Membersihkan input file
        }
    }

    function logout(){
        window.location.href = 'logout.php';
    }

    function hapusCard(cardId) {
    var cardDeck = document.getElementById(cardId);
    if (cardDeck) {
        cardDeck.remove();
    } else {
        console.log("Elemen dengan ID " + cardId + " tidak ditemukan.");
    }
    }

    const selectStatus = document.getElementsByName('statuss');
    const statusButton = document.getElementById('statusButton');

    selectStatus.addEventListener('change', function () {
        const selectedValue = this.value;
        if (selectedValue === 'Available') {
            statusButton.className = 'btn btn-success btn-sm';
        } else if (selectedValue === 'Out of Stock') {
            statusButton.className = 'btn btn-danger btn-sm';
        } else {
            statusButton.className = 'default-button';
        }
    });

        // Dapatkan elemen select dan div yang akan diubah kelasnya
    var statusDropdown = document.getElementById("statusDropdown");
    var itemStatus = document.getElementById("itemStatus");

    // Tambahkan event listener untuk mendengarkan perubahan pada dropdown
    statusDropdown.addEventListener("change", function() {
    // Dapatkan nilai yang dipilih oleh pengguna
    var selectedValue = statusDropdown.value;

    // Hapus semua kelas yang mungkin ada pada elemen itemStatus
    itemStatus.className = "";

    // Tambahkan kelas berdasarkan nilai yang dipilih
    if (selectedValue === "Out of Stock") {
        itemStatus.classList.add("btn btn-danger btn-sm");
    } else if (selectedValue === "Available") {
        itemStatus.classList.add("btn btn-success btn-sm");
    }
    });







