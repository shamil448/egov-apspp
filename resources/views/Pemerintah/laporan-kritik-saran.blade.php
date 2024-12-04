@include('components.PemerintahDashboard')

<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <h2 class="text-2xl font-bold text-center mb-4">LAPORAN KRITIK DAN SARAN</h2>

        <!-- Tabel Laporan -->
        <div class="mt-6">
            <div class="overflow-x-auto bg-white shadow-lg rounded-lg border border-gray-200 p-4">
                <table class="w-full table-auto border-collapse">
                    <thead class="bg-gray-300">
                        <tr>
                            <th class="py-4 px-6 text-center text-gray-700 text-lg border-b border-gray-400">No</th>
                            <th class="py-4 px-6 text-center text-gray-700 text-lg border-b border-gray-400">Nama</th>
                            <th class="py-4 px-6 text-center text-gray-700 text-lg border-b border-gray-400">Tanggal</th>
                            <th class="py-4 px-6 text-center text-gray-700 text-lg border-b border-gray-400">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="py-4 px-6 text-center text-gray-600">1</td>
                            <td class="py-4 px-6 text-center text-gray-600">Budi</td>
                            <td class="py-4 px-6 text-center text-gray-600">2024-12-01</td>
                            <td class="py-4 px-6 text-center">
                                <button class="bg-green-500 text-white px-4 py-2 rounded mr-2" onclick="openDetailModal('Budi', '2024-12-01')">
                                    Detail
                                </button>
                                <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="convertToPDF('Budi', '2024-12-01')">
                                    Unduh PDF
                                </button>
                            </td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-4 px-6 text-center text-gray-600">2</td>
                            <td class="py-4 px-6 text-center text-gray-600">Tono</td>
                            <td class="py-4 px-6 text-center text-gray-600">2024-12-02</td>
                            <td class="py-4 px-6 text-center">
                                <button class="bg-green-500 text-white px-4 py-2 rounded mr-2" onclick="openDetailModal('Tono', '2024-12-02')">
                                    Detail
                                </button>
                                <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="convertToPDF('Tono', '2024-12-02')">
                                    Unduh PDF
                                </button>
                            </td>
                        </tr>
                        <!-- Tambah baris lainnya sesuai kebutuhan -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- Modal Detail -->
<div id="detailModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg w-1/2 p-6 space-y-4">
        <h3 class="text-xl font-bold">Detail Kritik dan Saran</h3>
        <p><strong>Nama:</strong> <span id="detailNama"></span></p>
        <p><strong>Tanggal:</strong> <span id="detailTanggal"></span></p>
        <p><strong>Tingkat Kepuasan:</strong> <span id="detailKepuasan"></span></p>
        <p><strong>Kritik:</strong> <span id="detailKritik"></span></p>
        <p><strong>Saran:</strong> <span id="detailSaran"></span></p>
        
        <div class="flex justify-end space-x-4 mt-4">
            <button class="bg-gray-500 text-white px-4 py-2 rounded" onclick="closeDetailModal()">Tutup</button>
            <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="convertToPDFFromModal()">Unduh PDF</button> <!-- Tombol unduh PDF di modal -->
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
    function openDetailModal(nama, tanggal) {
        document.getElementById('detailNama').innerText = nama; // Isi nama di modal
        document.getElementById('detailTanggal').innerText = tanggal; // Isi tanggal di modal
        document.getElementById('detailKepuasan').innerText = "4"; // Contoh data tingkat kepuasan
        document.getElementById('detailKritik').innerText = "Perlu jadwal pengangkutan sampah yang lebih konsisten.";
        document.getElementById('detailSaran').innerText = "Jadwal pengangkutan perlu dibuat lebih teratur.";
        document.getElementById('detailModal').classList.remove('hidden'); // Tampilkan modal
    }

    function closeDetailModal() {
        document.getElementById('detailModal').classList.add('hidden'); // Sembunyikan modal
    }

    function convertToPDF(nama, tanggal) {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        
        // Menyusun konten PDF
        doc.text(`Nama: ${nama}`, 20, 20);
        doc.text(`Tanggal: ${tanggal}`, 20, 30);
        doc.text(`Tingkat Kepuasan: 4`, 20, 40); // Contoh tingkat kepuasan
        doc.text(`Kritik: Perlu jadwal pengangkutan sampah yang lebih konsisten.`, 20, 50);
        doc.text(`Saran: Jadwal pengangkutan perlu dibuat lebih teratur.`, 20, 60);
        
        // Mengunduh PDF
        doc.save(`laporan_kritik_saran_${nama}_${tanggal}.pdf`);
    }

    function convertToPDFFromModal() {
        const nama = document.getElementById('detailNama').innerText;
        const tanggal = document.getElementById('detailTanggal').innerText;
        const kepuasan = document.getElementById('detailKepuasan').innerText;
        const kritik = document.getElementById('detailKritik').innerText;
        const saran = document.getElementById('detailSaran').innerText;

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        // Menyusun konten PDF
        doc.text(`Nama: ${nama}`, 20, 20);
        doc.text(`Tanggal: ${tanggal}`, 20, 30);
        doc.text(`Tingkat Kepuasan: ${kepuasan}`, 20, 40);
        doc.text(`Kritik: ${kritik}`, 20, 50);
        doc.text(`Saran: ${saran}`, 20, 60);

        // Mengunduh PDF
        doc.save(`laporan_kritik_saran_${nama}_${tanggal}.pdf`);
    }
</script>

@include('components.footer')
