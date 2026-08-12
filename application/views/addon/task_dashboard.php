<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Task Dashboard Pro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --p: #6b5b95;
            --p2: #9b8fc4;
            --bg: #faf8f6;
            --txt: #1f2933;
            --muted: #6b7280;
            --sh1: 0 8px 30px rgba(0, 0, 0, .06);
            --pending: #ff4757;
            --started: #ffa502;
            --completed: #2ed573;
            --urgent: #ff6b6b;
            --b: #ebe7e1;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Montserrat, sans-serif;
            background: radial-gradient(circle at top right, #f7cac955, transparent 45%), linear-gradient(135deg, var(--bg), #f0ebe4);
            padding: 2rem;
            color: var(--txt);
            min-height: 100vh;
        }

        .container {
            max-width: 1100px;
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
            }
        }

        header {
            text-align: center;
            margin-bottom: 4rem;
        }

        h1 {
            font-family: "Playfair Display", serif;
            font-size: 3rem;
            color: var(--p);
            margin-bottom: 0.5rem;
        }

        .subtitle {
            letter-spacing: 4px;
            color: var(--muted);
            font-size: 0.8rem;
            font-weight: 600;
        }

        /* Navigation Links */
        .stat-link {
            text-decoration: none;
            color: inherit;
            display: block;
            transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .stat-link:hover {
            transform: translateY(-8px);
        }

        .stat-link:active {
            transform: scale(0.96);
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .stat-card {
            background: white;
            border-radius: 24px;
            padding: 2rem;
            box-shadow: var(--sh1);
            text-align: center;
            border: 1px solid rgba(0, 0, 0, 0.03);
            height: 100%;
        }

        .stat-card small {
            display: block;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 700;
            color: var(--muted);
            margin-bottom: 0.5rem;
            font-size: 0.7rem;
        }

        .stat-value {
            font-size: 2.8rem;
            font-weight: 700;
            font-family: "Playfair Display", serif;
        }

        .val-total {
            color: var(--p);
        }

        .val-pending {
            color: var(--pending);
        }

        .val-started {
            color: var(--started);
        }

        .val-completed {
            color: var(--completed);
        }

        /* Premium Urgent Section */
        .premium-urgent-hero {
            background: linear-gradient(135deg, #1f2933 0%, #323f4b 100%);
            border-radius: 35px;
            padding: 3.5rem;
            color: white;
            position: relative;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
        }

        .hero-text h2 {
            font-family: "Playfair Display", serif;
            font-size: 2.2rem;
            margin: 10px 0;
            color: #fff;
        }

        .hero-text p {
            color: #9aa5b1;
            font-size: 1rem;
            max-width: 400px;
            line-height: 1.6;
        }

        .tag {
            background: rgba(255, 107, 107, 0.15);
            color: #ff8787;
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            border: 1px solid rgba(255, 107, 107, 0.2);
        }

        .urgent-counter-box {
            background: rgba(255, 255, 255, 0.03);
            padding: 2.5rem 4rem;
            border-radius: 30px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(12px);
            text-align: center;
            transition: 0.3s;
        }

        .urgent-counter-box:hover {
            background: rgba(255, 255, 255, 0.07);
            border-color: var(--urgent);
        }

        .big-num {
            font-size: 5rem;
            font-weight: 700;
            color: var(--urgent);
            line-height: 1;
            font-family: "Playfair Display", serif;
            text-shadow: 0 0 25px rgba(255, 107, 107, 0.3);
        }

        .counter-label {
            margin-top: 10px;
            font-size: 0.75rem;
            letter-spacing: 3px;
            color: #cbd5e0;
            text-transform: uppercase;
        }

        /* Floating Button */
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
        }

        .fab:hover {
            transform: translateY(-5px) rotate(90deg);
        }

        /* Modal Styling */
        .modal {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .45);
            backdrop-filter: blur(6px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1001;
        }

        .modal.active {
            display: flex;
        }

        .modal-card {
            width: 100%;
            max-width: 500px;
            background: #fff;
            padding: 2.5rem;
            border-radius: 30px;
            box-shadow: 0 40px 100px rgba(0, 0, 0, .3);
            animation: modalIn .4s ease;
        }

        @keyframes modalIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: none;
            }
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 1rem;
            border-radius: 14px;
            border: 1px solid var(--b);
            background: #fdfdfc;
            margin-bottom: 1rem;
            font-family: inherit;
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 1rem;
        }

        .btn-save {
            background: var(--p);
            color: white;
            border: 0;
            padding: 0.8rem 1.5rem;
            border-radius: 12px;
            cursor: pointer;
            font-weight: 600;
        }

        .btn-cancel {
            background: #f3f4f6;
            color: #374151;
            border: 0;
            padding: 0.8rem 1.5rem;
            border-radius: 12px;
            cursor: pointer;
        }

        @media(max-width: 768px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .premium-urgent-hero {
                flex-direction: column;
                text-align: center;
            }

            .hero-text {
                margin-bottom: 2rem;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <header>
            <h1>Task Insights</h1>
            <div class="subtitle">REAL-TIME EXECUTION DASHBOARD</div>
        </header>

        <div class="stats-grid">
            <a href="<?= base_url('home/tasks?status=all') ?>" class="stat-link">
                <div class="stat-card">
                    <small>Total Tasks</small>
                    <div class="stat-value val-total"><?= $count_all ?></div>
                </div>
            </a>

            <a href="<?= base_url('home/tasks?status=0') ?>" class="stat-link">
                <div class="stat-card">
                    <small>Pending</small>
                    <div class="stat-value val-pending"><?= $count_pending ?></div>
                </div>
            </a>

            <a href="<?= base_url('home/tasks?status=2') ?>" class="stat-link">
                <div class="stat-card">
                    <small>Completed</small>
                    <div class="stat-value val-completed"><?= $count_completed ?></div>
                </div>
            </a>
        </div>

        <div class="premium-urgent-hero">
            <div class="hero-text">
                <span class="tag">Priority Alert</span>
                <h2>Critical Deadlines</h2>
                <p>Tasks requiring immediate action within the next 24-hour window.</p>
                <a href="<?= base_url('home/tasks?status=all&sort=due_date&status=1') ?>" style="color: #ff8787; text-decoration: none; font-weight: 600; font-size: 0.9rem; margin-top: 15px; display: inline-block;">View Priority Schedule →</a>
            </div>

            <a href="<?= base_url('home/tasks?status=all&sort=due_date&status=1') ?>" class="stat-link">
                <div class="urgent-counter-box">
                    <div class="big-num"><?= $count_urgent ?></div>
                    <div class="counter-label">Urgent Tasks</div>
                </div>
            </a>
        </div>
    </div>

    <button class="fab" id="addTaskBtn" title="Add New Task">＋</button>

    <div class="modal" id="taskModal">
        <div class="modal-card">
            <h2 style="font-family:'Playfair Display'; margin-bottom: 1.5rem; color: var(--p);">Create New Task</h2>
            <form method="post" action="<?= base_url('home/save_task') ?>">
                <input name="task_name" placeholder="Task Title" required>
                <textarea name="description" placeholder="Task Details" rows="3"></textarea>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <input type="date" name="due_date" value="<?= date('Y-m-d') ?>" min="<?= date('Y-m-d') ?>" value="<?= date('Y-m-d') ?>" required>
                    <select name="priority">
                        <option value="0">Low Priority</option>
                        <option value="1" selected>Medium Priority</option>
                        <option value="2">High Priority</option>
                    </select>
                </div>
                <div class="modal-actions">
                    <button type="button" class="btn-cancel" id="closeModal">Discard</button>
                    <button type="submit" class="btn-save">Confirm Task</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const modal = document.getElementById("taskModal");
        const addBtn = document.getElementById("addTaskBtn");
        const closeBtn = document.getElementById("closeModal");

        addBtn.onclick = () => modal.classList.add("active");
        closeBtn.onclick = () => modal.classList.remove("active");

        // Close modal if clicking outside the card
        window.onclick = e => {
            if (e.target === modal) modal.classList.remove("active");
        };
    </script>

</body>

</html>