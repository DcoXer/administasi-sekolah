<script>
document.addEventListener("DOMContentLoaded", function() {

    // ==================== ROLE: KEPALA MADRASAH ====================
    @if(Auth::user()->hasRole('kepala_madrasah'))
    const mutasiCtx = document.getElementById('mutasiChart');
    if (mutasiCtx) {
        new Chart(mutasiCtx, {
            type: 'bar',
            data: {
                labels: ['Menunggu', 'Disetujui', 'Ditolak'],
                datasets: [{
                    data: [
                        {{ $totalMutasiMenunggu ?? 0 }},
                        {{ $totalMutasiDisetujui ?? 0 }},
                        {{ $totalMutasiDitolak ?? 0 }}
                    ],
                    backgroundColor: ['#facc15', '#16a34a', '#dc2626'],
                    borderRadius: 5,
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '65%',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: '#374151',
                            font: { size: 14, weight: '500' },
                            padding: 15
                        }
                    },
                    tooltip: {
                        backgroundColor: '#1f2937',
                        titleColor: '#f9fafb',
                        bodyColor: '#f9fafb'
                    }
                },
                scales: {
                    x: {
                        barThickness: 20,
                        maxBarThickness: 30,
                        categoryBarPercentage: 0.5,
                        barPercentage: 0.5
                    },
                    y: {
                        beginAtZero: true
                    }
                },
                animation: {
                    animateRotate: false,
                    animateScale: false,
                    duration: 1400,
                    easing: 'easeInOutQuart'
                }
            }
        });
    }
    @endif

    // ==================== ROLE: STAFF KEUANGAN ====================
    @if(Auth::user()->hasRole('staff_keuangan'))
    const duCtx = document.getElementById('duChart');
    if (duCtx) {
        new Chart(duCtx, {
            type: 'bar',
            data: {
                labels: @json($duChart->pluck('status') ?? []),
                datasets: [{
                    label: 'Jumlah Siswa',
                    data: @json($duChart->pluck('nominal') ?? []),
                    backgroundColor: 'rgba(52, 211, 153, 0.6)',
                    borderColor: '#34d399',
                    borderWidth: 1,
                    borderRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                animation: { duration: 1200, easing: 'easeOutBounce' },
                plugins: {
                    legend: { labels: { color: '#065f46' } }
                },
                scales: { y: { beginAtZero: true } }
            }
        });
    }

    const sppCtx = document.getElementById('sppChart');
    if (sppCtx) {
        new Chart(sppCtx, {
            type: 'bar',
            data: {
                labels: @json($sppLabels ?? []),
                datasets: [{
                    label: 'SPP',
                    data: @json($sppData ?? []),
                    borderColor: '#3b82f6',
                    backgroundColor: '#3b82f6',
                    tension: 0.4,
                    fill: false,
                    borderWidth: 3,
                    pointStyle: 'circle',
                    pointRadius: 6,
                    pointHoverRadius: 8,
                    pointBackgroundColor: '#3b82f6'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                animation: { duration: 1500, easing: 'easeInOutQuart' },
                plugins: {
                    legend: { labels: { color: '#1e3a8a' } }
                },
                scales: { y: { beginAtZero: true } }
            }
        });
    }
    @endif

    // ==================== ROLE: OPERATOR ====================
    @if(Auth::user()->hasRole('operator'))
    const siswaCtx = document.getElementById('siswaChart');
    if (siswaCtx) {
        new Chart(siswaCtx, {
            type: 'bar',
            data: {
                labels: @json(array_keys($jumlahSiswa ?? [])),
                datasets: [{
                    label: 'Jumlah Siswa',
                    data: @json(array_values($jumlahSiswa ?? [])),
                    fill: true,
                    backgroundColor: 'rgba(99, 102, 241, 0.3)',
                    borderColor: '#6366f1',
                    borderWidth: 3,
                    tension: 0.3,
                    pointRadius: 5,
                    pointHoverRadius: 8,
                    pointBackgroundColor: '#6366f1'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                animation: { duration: 1800, easing: 'easeInOutCubic' },
                plugins: { legend: { labels: { color: '#312e81' } } }
            }
        });
    }

    const guruCtx = document.getElementById('guruChart');
    if (guruCtx) {
        new Chart(guruCtx, {
            type: 'doughnut',
            data: {
                labels: @json(array_keys($jumlahGuru ?? [])),
                datasets: [{
                    label: 'Jumlah Guru',
                    data: @json(array_values($jumlahGuru ?? [])),
                    backgroundColor: [
                        '#3b82f6', '#10b981', '#f59e0b', '#ef4444',
                        '#8b5cf6', '#ec4899', '#14b8a6'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                animation: { animateScale: true, animateRotate: true, duration: 1500, easing: 'easeOutElastic' },
                plugins: { legend: { position: 'bottom' } }
            }
        });
    }
    @endif

});
</script>
