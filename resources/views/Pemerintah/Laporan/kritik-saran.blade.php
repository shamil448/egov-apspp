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
                            <th class="py-4 px-6 text-center text-gray-700 text-lg border-b border-gray-400">Lokasi</th>
                            <th class="py-4 px-6 text-center text-gray-700 text-lg border-b border-gray-400">Tanggal</th>
                            <th class="py-4 px-6 text-center text-gray-700 text-lg border-b border-gray-400">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kritikSaran as $index => $item)
                        <tr class="border-b">
                            <td class="py-4 px-6 text-center text-gray-600">{{ $index + 1 }}</td>
                            <td class="py-4 px-6 text-center text-gray-600">{{ $item->lokasi }}</td>
                            <td class="py-4 px-6 text-center text-gray-600">{{ $item->created_at->format('Y-m-d') }}</td>
                            <td class="py-4 px-6 text-center">
                                <button class="bg-green-500 text-white px-4 py-2 rounded mr-2" onclick="openDetailModal('{{ $item->lokasi }}', '{{ $item->kritik }}', '{{ $item->saran }}', '{{ $item->foto }}', '{{ $item->created_at->format('Y-m-d') }}')">
                                    Detail
                                </button>
                                <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="convertToPDF('{{ $item->lokasi }}', '{{ $item->kritik }}', '{{ $item->saran }}', '{{ $item->foto }}', '{{ $item->created_at->format('Y-m-d') }}')">
                                    Unduh PDF
                                </button>
                            </td>
                        </tr>
                        @endforeach
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
        <p><strong>Lokasi:</strong> <span id="detailLokasi"></span></p>
        <p><strong>Kritik:</strong> <span id="detailKritik"></span></p>
        <p><strong>Saran:</strong> <span id="detailSaran"></span></p>
        <p><strong>Foto:</strong> <span id="detailFoto"></span></p>

        <div class="flex justify-end space-x-4 mt-4">
            <button class="bg-gray-500 text-white px-4 py-2 rounded" onclick="closeDetailModal()">Tutup</button>
            <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="convertToPDFFromModal()">Unduh PDF</button>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
    function openDetailModal(lokasi, kritik, saran, foto, tanggal) {
        document.getElementById('detailLokasi').innerText = lokasi;
        document.getElementById('detailKritik').innerText = kritik;
        document.getElementById('detailSaran').innerText = saran;
        document.getElementById('detailFoto').innerText = foto ? `Foto: ${foto}` : 'Tidak ada foto'; // Display the photo if available
        document.getElementById('detailModal').classList.remove('hidden'); // Show the modal
    }

    function closeDetailModal() {
        document.getElementById('detailModal').classList.add('hidden'); // Hide the modal
    }

    function convertToPDF(lokasi, kritik, saran, foto, tanggal) {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        
        doc.text(`Lokasi: ${lokasi}`, 20, 20);
        doc.text(`Tanggal: ${tanggal}`, 20, 30);
        doc.text(`Kritik: ${kritik}`, 20, 40);
        doc.text(`Saran: ${saran}`, 20, 50);
        doc.text(`Foto: ${foto ? foto : 'Tidak ada foto'}`, 20, 60); // Display photo info if available

        doc.save(`laporan_kritik_saran_${lokasi}_${tanggal}.pdf`);
    }

    function convertToPDFFromModal() {
        const lokasi = document.getElementById('detailLokasi').innerText;
        const kritik = document.getElementById('detailKritik').innerText;
        const saran = document.getElementById('detailSaran').innerText;
        const foto = document.getElementById('detailFoto').innerText;
        const tanggal = document.getElementById('detailTanggal').innerText;

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        doc.text(`Lokasi: ${lokasi}`, 20, 20);
        doc.text(`Tanggal: ${tanggal}`, 20, 30);
        doc.text(`Kritik: ${kritik}`, 20, 40);
        doc.text(`Saran: ${saran}`, 20, 50);
        doc.text(`Foto: ${foto}`, 20, 60);

        doc.save(`laporan_kritik_saran_${lokasi}_${tanggal}.pdf`);
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@include('components.footer')
