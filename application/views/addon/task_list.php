<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Task Archives | Premium Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --p: #6b5b95;
            --p2: #9b8fc4;
            --u: #ff6b6b;
            --bg: #faf8f6;
            --txt: #1f2933;
            --muted: #6b7280;
            --sh1: 0 8px 30px rgba(0, 0, 0, .06);
        }

        body {
            font-family: Montserrat, sans-serif;
            background: linear-gradient(135deg, var(--bg), #f0ebe4);
            color: var(--txt);
            margin: 0;
            padding: 2rem;
            min-height: 100vh;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            animation: fade .6s ease;
        }

        @keyframes fade {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            font-family: "Playfair Display", serif;
            font-size: 2.8rem;
            color: var(--p);
            margin-bottom: 0.5rem;
        }

        .back-link {
            text-decoration: none;
            color: var(--muted);
            font-size: 0.85rem;
            font-weight: 700;
            display: inline-block;
            margin-bottom: 2rem;
            transition: 0.3s;
            letter-spacing: 1px;
        }

        .back-link:hover {
            color: var(--p);
            transform: translateX(-5px);
        }

        /* Modern Filter Bar */
        .toolbar {
            display: grid;
            grid-template-columns: 1fr 0.5fr 0.5fr 0.5fr 0.5fr;
            gap: 15px;
            margin-bottom: 2.5rem;
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(10px);
            padding: 1.2rem;
            border-radius: 20px;
            border: 1px solid white;
            box-shadow: var(--sh1);
        }

        .toolbar input,
        .toolbar select {
            padding: 12px 15px;
            border-radius: 12px;
            border: 1px solid rgba(107, 91, 149, 0.2);
            font-family: inherit;
            outline: none;
            background: white;
            color: var(--txt);
        }

        /* Task Row Design */
        .task-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        /* Updated Grid for 4 Columns */
        .task-card {
            background: white;
            border-radius: 18px;
            padding: 1.2rem 2rem;
            display: grid;
            grid-template-columns: 1.5fr 120px 120px 140px;
            /* Added a column */
            align-items: center;
            box-shadow: var(--sh1);
            transition: all 0.3s ease;
            border: 1px solid transparent;
            gap: 10px;
        }

        /* Priority & Status Color Logic */
        .priority-2 {
            background: #fee2e2;
            color: #fc0303;
        }

        /* High - Red */
        .priority-1 {
            background: #fff7ed;
            color: #cff10c;
        }

        /* Medium - Orange */
        .priority-0 {
            background: #ecfdf5;
            color: #0deee3;
        }

        /* Low - Green */
        /* Dropdown Badge Styling */
        .badge-select {
            padding: 6px 12px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            border: 1px solid transparent;
            cursor: pointer;
            outline: none;
            appearance: none;
            /* Removes default browser arrow */
            -webkit-appearance: none;
            transition: all 0.3s ease;
            text-align: center;
        }

        /* Status Colors */
        .stat-0 {
            background: #fee2e2;
            color: #b91c1c;
            border-color: #fecaca;
        }

        /* Started - Orange */
        .stat-1 {
            background: #dcfce7;
            color: #166534;
            border-color: #bbf7d0;
        }

        /* Completed - Green */

        .badge-select:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .badge-select:focus {
            border-color: var(--p);
        }

        .status-text {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--p);
            text-align: center;
        }

        /* Completed - Green */
        @media(max-width: 768px) {
            .task-card {
                grid-template-columns: 1fr;
                /* Stack on mobile */
                text-align: center;
            }
        }

        .task-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.08);
        }

        /* 24 Hour Urgency Style */
        .urgent-card {
            border-left: 6px solid var(--u);
            background: linear-gradient(to right, #fff8f8, #fff);
        }

        .urgent-alert {
            color: var(--u);
            font-size: 0.7rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            gap: 4px;
            margin-bottom: 4px;
        }

        .task-card h3 {
            font-family: "Playfair Display", serif;
            font-size: 1.25rem;
            margin: 0;
        }

        .task-card p {
            color: var(--muted);
            font-size: 0.85rem;
            margin: 4px 0 0 0;
        }

        /* Badges */
        .badge {
            padding: 6px 14px;
            border-radius: 30px;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            text-align: center;
            letter-spacing: 0.5px;
        }

        .high {
            background: #fee2e2;
            color: #b91c1c;
        }

        .medium {
            background: #fff7ed;
            color: #c2410c;
        }

        .low {
            background: #ecfdf5;
            color: #047857;
        }

        .due-date {
            font-weight: 600;
            color: var(--p);
            font-size: 0.9rem;
            text-align: right;
        }

        @media(max-width: 768px) {
            .toolbar {
                grid-template-columns: 1fr;
            }

            .task-card {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 15px;
            }

            .due-date {
                text-align: center;
            }
        }

        .fab {
            position: fixed;
            bottom: 40px;
            right: 40px;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            font-size: 2.2rem;
            background: linear-gradient(135deg, var(--p), var(--p2));
            color: #fff;
            border: 0;
            cursor: pointer;
            box-shadow: 0 20px 40px rgba(107, 91, 149, .45);
            transition: .3s;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }

        .fab:hover {
            transform: translateY(-5px) rotate(90deg);
            color: white;
        }

        #toast-container {
            position: fixed;
            top: 30px;
            right: 30px;
            z-index: 9999;
        }

        .toast {
            background: white;
            padding: 16px 25px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 10px;
            border-left: 5px solid var(--p);
            /* Premium Purple Accent */
            animation: slideIn 0.4s ease forwards;
        }

        .toast.error {
            border-left-color: #ff4757;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <a href="<?= base_url('home/task_dashboard') ?>" class="back-link">← DASHBOARD</a>

        <header style="margin-bottom: 2rem;">
            <h1>Your Task Library</h1>
            <p style="color: var(--muted);">Managing and tracking your progress across all projects.</p>
        </header>

        <form class="toolbar" action="<?= base_url('home/tasks') ?>" method="GET">
            <input type="text" name="search" value="<?= htmlspecialchars($filters['search'] ?? '') ?>" placeholder="Search tasks...">

            <input type="date" name="due_date" value="<?= htmlspecialchars($filters['due_date'] ?? '') ?>" onchange="this.form.submit()">

            <select name="status" onchange="this.form.submit()">
                <?php $s = $filters['status'] ?? '0'; // Default to '0' (Pending) 
                ?>
                <option value="all" <?= $s == 'all' ? 'selected' : '' ?>>View All</option>
                <option value="0" <?= $s == '0' ? 'selected' : '' ?>>Pending</option>
                <option value="1" <?= $s == '1' ? 'selected' : '' ?>>Completed</option>
            </select>

            <select name="priority" onchange="this.form.submit()">
                <?php $p = $filters['priority'] ?? 'all'; ?>
                <option value="all" <?= $p == 'all' ? 'selected' : '' ?>>All Priorities</option>
                <option value="2" <?= $p == '2' ? 'selected' : '' ?>>High</option>
                <option value="1" <?= $p == '1' ? 'selected' : '' ?>>Medium</option>
                <option value="0" <?= $p == '0' ? 'selected' : '' ?>>Low</option>
            </select>

            <select name="sort" onchange="this.form.submit()">
                <?php $sort = $filters['sort'] ?? 'due_date'; ?>
                <option value="due_date" <?= $sort == 'due_date' ? 'selected' : '' ?>>Sort: Due Date</option>
                <option value="task" <?= $sort == 'task' ? 'selected' : '' ?>>Sort: A-Z</option>
                <option value="priority" <?= $sort == 'priority' ? 'selected' : '' ?>>Sort: Priority</option>
            </select>
        </form>
        <div class="task-list">
            <?php foreach ($tasks as $t):
                // --- Mapping Logic ---
                $status_map = [0 => 'Pending', 1 => 'Started', 2 => 'Completed'];
                $status_text = $status_map[$t['task_status']] ?? 'Unknown';

                $priority_map = [0 => 'Low', 1 => 'Medium', 2 => 'High'];
                $priority_text = $priority_map[$t['priority']] ?? 'Normal';

                // --- Urgency Logic (24 Hours) ---

                $due_time = strtotime($t['due_date']);
                $now = time();
                $diff = $due_time - $now;
                $is_urgent = ($t['task_status'] != 2 && $diff <= 86400);

                $opacity = ($t['task_status'] == 2) ? 'opacity: 0.6;' : '';
            ?>
                <div class="task-card <?= $is_urgent ? 'urgent-card' : '' ?>" style="<?= $opacity ?>">

                    <div class="task-details">
                        <?php if ($is_urgent): ?>
                            <div class="urgent-alert"><span>⚠️</span> DUE SOON</div>
                        <?php endif; ?>
                        <h3 style="<?= ($t['task_status'] == 3) ? 'text-decoration: line-through;' : '' ?>">
                            <?= htmlspecialchars($t['task']) ?>
                        </h3>
                        <p><?= htmlspecialchars($t['description']) ?></p>
                    </div>

                    <div class="status-container">
                        <select class="status-dropdown badge-select stat-<?= $t['task_status'] ?>"
                            onchange="updateTaskStatus(<?= $t['id'] ?>, this)">
                            <option value="0" <?= $t['task_status'] == 0 ? 'selected' : '' ?>>Pending</option>
                            <option value="1" <?= $t['task_status'] == 1 ? 'selected' : '' ?>>Completed</option>
                        </select>
                    </div>

                    <div style="text-align: center;">
                        <span class="badge priority-<?= $t['priority'] ?>">
                            <?= $priority_text ?>
                        </span>
                    </div>

                    <div class="due-date">
                        <div style="font-size: 0.7rem; color: var(--muted); font-weight: 400;">Deadline</div>
                        <?= date('M d, Y', $due_time) ?>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <a href="<?= base_url('home/create_task') ?>" class="fab" title="Add New Task">＋</a>
    <script>
        function updateTaskStatus(taskId, element) {
            const newStatus = element.value;
            console.log("New Status:", newStatus);
            console.log("Task ID:", taskId);
            // Update the class immediately for instant visual feedback
            element.className = `status-dropdown badge-select stat-${newStatus}`;

            // Send data to PHP Controller
            fetch('<?= base_url("home/update_task_status") ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `id=${taskId}&status=${newStatus}`
                })
                .then(response => response.json())
                .then(data => {
                    console.log("Response Data:", data);
                    if (data.success) {
                        // 1. Create a Premium Toast Notification
                        showToast("Task updated successfully!", "success");

                        // 2. Reload the page after 1 second to show the updated filter/order
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    } else {
                        showToast("Failed to update status.", "error");
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        function showToast(message, type = "success") {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            toast.className = `toast ${type}`;

            const icon = type === "success" ? "✅" : "⚠️";

            toast.innerHTML = `<span>${icon}</span> <strong>${message}</strong>`;
            container.appendChild(toast);

            // Auto remove after 3 seconds if page doesn't reload
            setTimeout(() => {
                toast.style.opacity = '0';
                setTimeout(() => toast.remove(), 500);
            }, 3000);
        }
    </script>
    <div id="toast-container"></div>
</body>

</html>