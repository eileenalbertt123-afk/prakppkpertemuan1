<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f5f7fb;
            color: #1f2937;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 240px;
            background: #ffffff;
            border-right: 1px solid #e5e7eb;
            padding: 28px 20px;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 40px;
            color: #2563eb;
        }

        .menu-title {
            font-size: 12px;
            color: #9ca3af;
            margin-bottom: 12px;
            text-transform: uppercase;
        }

        .menu {
            display: block;
            padding: 12px 14px;
            border-radius: 10px;
            background: #eff6ff;
            color: #2563eb;
            font-weight: bold;
        }

        /* Main */
        .main {
            flex: 1;
            padding: 32px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 6px;
        }

        .header p {
            color: #6b7280;
        }

        .profile {
            background: white;
            padding: 10px 16px;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
        }

        /* Cards */
        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            padding: 24px;
            border-radius: 16px;
            border: 1px solid #e5e7eb;
        }

        .card-title {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 12px;
        }

        .card-number {
            font-size: 32px;
            font-weight: bold;
        }

        .total {
            color: #2563eb;
        }

        .pending {
            color: #d97706;
        }

        .completed {
            color: #16a34a;
        }

        /* Task section */
        .task-section {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 24px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .section-header h2 {
            font-size: 20px;
        }

        .filter {
            display: flex;
            gap: 10px;
        }

        select {
            padding: 9px 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: white;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            font-size: 13px;
            color: #6b7280;
            padding: 14px;
            border-bottom: 1px solid #e5e7eb;
        }

        td {
            padding: 16px 14px;
            border-bottom: 1px solid #f0f0f0;
        }

        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .high {
            background: #fee2e2;
            color: #dc2626;
        }

        .medium {
            background: #fef3c7;
            color: #d97706;
        }

        .low {
            background: #dcfce7;
            color: #16a34a;
        }

        .status-pending {
            background: #fef3c7;
            color: #d97706;
        }

        .status-completed {
            background: #dcfce7;
            color: #16a34a;
        }

        .empty {
            text-align: center;
            padding: 50px 20px;
            color: #9ca3af;
        }

        @media (max-width: 800px) {
            .sidebar {
                display: none;
            }

            .main {
                padding: 20px;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .task-section {
                overflow-x: auto;
            }
        }
    </style>
</head>

<body>

<div class="layout">

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="logo">TaskFlow</div>

        <div class="menu-title">Menu</div>

        <div class="menu">
            Dashboard
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main">

        <div class="header">
            <div>
                <h1>Dashboard</h1>
                <p>Ringkasan tugas kamu hari ini.</p>
            </div>

            <div class="profile">
                👤 User
            </div>
        </div>

        <!-- Summary Cards -->
        <div class="cards">

            <div class="card">
                <div class="card-title">Total Task</div>
                <div class="card-number total">
                    {{ $totalTasks }}
                </div>
            </div>

            <div class="card">
                <div class="card-title">Task Pending</div>
                <div class="card-number pending">
                    {{ $pendingTasks }}
                </div>
            </div>

            <div class="card">
                <div class="card-title">Task Selesai</div>
                <div class="card-number completed">
                    {{ $completedTasks }}
                </div>
            </div>

        </div>

        <!-- Task List -->
        <section class="task-section">

            <div class="section-header">
                <h2>Daftar Task</h2>

                <div class="filter">
                    <select>
                        <option>Semua Priority</option>
                        <option>High</option>
                        <option>Medium</option>
                        <option>Low</option>
                    </select>

                    <select>
                        <option>Deadline Terdekat</option>
                        <option>Deadline Terjauh</option>
                    </select>
                </div>
            </div>

            @if ($tasks->count() > 0)

                <table>
                    <thead>
                        <tr>
                            <th>Task</th>
                            <th>Priority</th>
                            <th>Deadline</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>
                                    <strong>{{ $task->title }}</strong>
                                </td>

                                <td>
                                    <span class="badge {{ $task->priority }}">
                                        {{ ucfirst($task->priority) }}
                                    </span>
                                </td>

                                <td>
                                    {{ $task->deadline ?? '-' }}
                                </td>

                                <td>
                                    <span class="badge status-{{ $task->status }}">
                                        {{ ucfirst($task->status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            @else

                <div class="empty">
                    <h3>Belum ada task</h3>
                    <p>Task yang kamu buat akan muncul di sini.</p>
                </div>

            @endif

        </section>

    </main>

</div>

</body>
</html>