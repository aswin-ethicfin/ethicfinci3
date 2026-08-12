<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>New Task | Premium Manager</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --p: #6b5b95;
      --p2: #9b8fc4;
      --bg: #faf8f6;
      --txt: #1f2933;
      --muted: #6b7280;
      --b: #ebe7e1;
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

    /* New Top Left Navigation Styling */

    .top-left-nav:hover {
      color: var(--p);
      transform: translateX(-5px);
    }

    .nav-arrow {
      font-size: 1.2rem;
      line-height: 1;
    }

    body {
      font-family: Montserrat, sans-serif;
      background: radial-gradient(circle at top right, #f7cac955, transparent 45%), linear-gradient(135deg, var(--bg), #f0ebe4);
      margin: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }

    .create-card {
      width: 100%;
      max-width: 600px;
      background: white;
      padding: 3.5rem;
      border-radius: 40px;
      box-shadow: 0 40px 100px rgba(0, 0, 0, 0.08);
      animation: slideUp 0.6s ease;
    }

    @keyframes slideUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }

      to {
        opacity: 1;
        transform: 0;
      }
    }

    h1 {
      font-family: "Playfair Display", serif;
      font-size: 2.5rem;
      color: var(--p);
      margin-bottom: 0.5rem;
    }

    p.subtitle {
      color: var(--muted);
      margin-bottom: 2.5rem;
      font-size: 0.9rem;
    }

    label {
      display: block;
      font-weight: 700;
      font-size: 0.75rem;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: var(--muted);
      margin-bottom: 8px;
      margin-left: 5px;
    }

    input,
    textarea,
    select {
      width: 100%;
      padding: 1.2rem;
      border-radius: 18px;
      border: 1px solid var(--b);
      background: #fdfdfc;
      margin-bottom: 1.5rem;
      font-family: inherit;
      font-size: 1rem;
      transition: 0.3s;
    }

    input:focus,
    textarea:focus,
    select:focus {
      outline: none;
      border-color: var(--p2);
      box-shadow: 0 0 0 4px rgba(155, 143, 196, 0.1);
    }

    .row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 1.5rem;
    }

    .btn-group {
      display: flex;
      gap: 1rem;
      margin-top: 1rem;
    }

    .btn-main {
      flex: 2;
      background: linear-gradient(135deg, var(--p), var(--p2));
      color: white;
      border: none;
      padding: 1.2rem;
      border-radius: 18px;
      font-weight: 700;
      cursor: pointer;
      transition: 0.3s;
      box-shadow: 0 10px 20px rgba(107, 91, 149, 0.2);
    }

    .btn-cancel {
      flex: 1;
      background: #f3f4f6;
      color: var(--muted);
      border: none;
      padding: 1.2rem;
      border-radius: 18px;
      font-weight: 600;
      text-decoration: none;
      text-align: center;
      cursor: pointer;
    }

    .btn-main:hover {
      transform: translateY(-3px);
      box-shadow: 0 15px 30px rgba(107, 91, 149, 0.3);
    }
  </style>
</head>


<body>
  <div class="create-card">
    <a href="<?= base_url('home/tasks') ?>" class="back-link">
      <span class="nav-arrow">←</span>
      <span class="nav-text">Back to Library</span>
    </a>
    <h1>New Objective</h1>
    <p class="subtitle">Draft your next task and set its priority level.</p>

    <form method="post" action="<?= base_url('home/save_task') ?>">
      <label>Task Title</label>
      <input type="text" name="task_name" placeholder="What needs to be done?" required>

      <label>Description</label>
      <textarea name="description" placeholder="Add some context or notes..." rows="4"></textarea>

      <div class="row">
        <div>
          <label>Timeline</label>
          <input type="date" name="due_date" id="due_date" min="<?= date('Y-m-d') ?>" value="<?= date('Y-m-d') ?>" required>
        </div>
        <div>
          <label>Priority</label>
          <select name="priority">
            <option value="0">Low (Green)</option>
            <option value="1" selected>Medium (Orange)</option>
            <option value="2">High (Red)</option>
          </select>
        </div>
      </div>

      <div class="btn-group">
        <a href="<?= base_url('home/tasks') ?>" class="btn-cancel">Back</a>
        <button type="submit" class="btn-main">Create Task</button>
      </div>
    </form>
  </div>
  <script>
    document.querySelector('form').onsubmit = function(e) {
      const selectedDate = new Date(document.getElementById('due_date').value);
      const today = new Date();
      today.setHours(0, 0, 0, 0); // Reset time to compare only dates

      if (selectedDate < today) {
        alert("The deadline cannot be in the past. Please select a valid date.");
        e.preventDefault(); // Stop form submission
        return false;
      }
    };
  </script>
</body>

</html>