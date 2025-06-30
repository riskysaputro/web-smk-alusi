<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <style>
        .status-box {
            padding: 15px;
            border-radius: 5px;
            font-weight: bold;
            color: white;
        }

        .accepted {
            background-color: #38a169;
            /* green */
        }

        .rejected {
            background-color: #e53e3e;
            /* red */
        }
    </style>
</head>

<body>
    <h2>Halo {{ $student->name }},</h2>

    <p>Status pendaftaran Anda telah diperbarui:</p>

    <div class="status-box {{ $student->status === 'accepted' ? 'accepted' : 'rejected' }}">
        Status: {{ strtoupper($student->status) }}
    </div>

    <br>

    @if ($student->status === 'accepted')
        <p>Selamat! Anda diterima di sekolah kami. Kami tunggu kehadiran Anda saat daftar ulang 🎉</p>
    @else
        <p>Mohon maaf, Anda belum diterima. Semangat terus ya, masa depan masih panjang!</p>
    @endif

    <p>Terima kasih,<br>SMK Alusi</p>
</body>

</html>
