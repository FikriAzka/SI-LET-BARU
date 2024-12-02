<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="styleJadwal.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.1.0/main.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.1.0/main.min.js"></script>

    <!-- Font Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar-start">
        <div class="logo-header">
            <a class="logo-silet">
                <img src="./assets/silet_logo.png" alt="logo" />
            </a>
            <div class="logo-text">
                <span><p>SI-LET</p></span>
                <p class="logo-subtitle">Sistem Informasi & Laporan Edukasi Terintegrasi</p>
            </div>
        </div>
        <div>
            <a href="#profile" class="navbar-home">Dashboard</a>
        </div>
        <div>
            <a class="user-logo"><img src="./assets/user.png" alt="user-logo" /></a>
            <a href="#" class="menu-button" type="button">
                <img src="./assets/menu-bar.png" alt="menu-button" />
            </a>
        </div>
    </nav>

    <!-- Kalender Start -->
    <div class="calendar-container">
        <div id='calendar'></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: [
                    {
                        title: 'Acara 1',
                        start: '2024-10-30'
                    },
                    {
                        title: 'Acara 2',
                        start: '2024-10-31',
                        end: '2024-11-02'
                    },
                    {
                        title: 'Acara 3',
                        start: '2024-11-05T12:00:00',
                        allDay: false
                    }
                ]
            });
            calendar.render();
        });
    </script>
</body>
</html>
