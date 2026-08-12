<style>
    .timeline-container {
        padding: 10px 20px;
        max-width: 500px;
    }

    .timeline-row {
        display: flex;
        /* Increased height to make the connection line visible */
        min-height: 90px;
    }

    /* THE VISUAL COLUMN (Icon + Line) */
    .timeline-visual {
        width: 40px;
        display: flex;
        flex-direction: column;
        align-items: center;
        flex-shrink: 0;
        margin-right: 20px;
    }

    .timeline-icon-box {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background-color: #fff;
        border: 2px solid #e9ecef;
        /* Default Border */
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 2;
        /* Sits on top of the line */
        font-size: 1rem;
        color: #adb5bd;
        transition: all 0.4s ease;
    }

    /* THE CONNECTION LINE */
    .timeline-line {
        width: 3px;
        /* Slightly thicker for better visibility */
        background-color: #e9ecef;
        /* Default Pending Grey */
        flex-grow: 1;
        /* Automatically stretches to the next row */
        z-index: 1;
        margin-top: -2px;
        /* Overlap icon slightly for a seamless joint */
        margin-bottom: -2px;
    }

    /* Remove line from the last row */
    .timeline-row:last-child .timeline-line {
        display: none;
    }

    /* --- DYNAMIC STATUS COLOURS --- */

    /* DONE (Green): The step and the line leading out of it are green */
    .timeline-row.done .timeline-icon-box {
        background-color: #4CAF50 !important;
        border-color: #4CAF50 !important;
        color: #fff !important;
    }

    .timeline-row.done .timeline-line {
        background-color: #4CAF50 !important;
    }

    .timeline-row.done .status-title {
        color: #4CAF50;
    }

    /* ACTIVE (Pink/Purple): The current step is highlighted */
    .timeline-row.active .timeline-icon-box {
        background-color: #cb0c9f !important;
        border-color: #cb0c9f !important;
        color: #fff !important;
        box-shadow: 0 0 12px rgba(203, 12, 159, 0.4);
        animation: pulse-active 2s infinite;
    }

    .timeline-row.active .status-title {
        color: #cb0c9f !important;
        font-weight: 800;
        transform: scale(1.02);
        transition: 0.3s;
    }

    /* The line leading away from an active step stays grey until that step is finished */
    .timeline-row.active .timeline-line {
        background-color: #e9ecef;
    }

    /* PENDING (Default) */
    .timeline-row.pending .timeline-icon-box {
        border-style: dashed;
        /* Visual cue that it's upcoming */
    }

    /* CANCELLED (Red) */
    .timeline-row.cancelled .timeline-icon-box {
        background-color: #f44336 !important;
        border-color: #f44336 !important;
        color: #fff !important;
    }

    .timeline-row.cancelled .status-title {
        color: #f44336;
    }

    /* TEXT CONTENT BOX */
    .timeline-content {
        padding-top: 5px;
        flex-grow: 1;
    }

    .status-title {
        margin-bottom: 2px;
        font-size: 0.9rem;
        font-weight: 700;
        color: #344767;
    }

    .status-subtitle {
        font-size: 0.75rem;
        color: #6c757d;
    }

    @keyframes pulse-active {
        0% {
            transform: scale(1);
            box-shadow: 0 0 0 0 rgba(203, 12, 159, 0.4);
        }

        70% {
            transform: scale(1.08);
            box-shadow: 0 0 0 10px rgba(203, 12, 159, 0);
        }

        100% {
            transform: scale(1);
            box-shadow: 0 0 0 0 rgba(203, 12, 159, 0);
        }
    }
</style>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-12 col-md-6 mx-auto">
            <div class="card shadow-lg border-radius-xl">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3"><?= $pagetitle ?> : <?= $job['job_number'] ?></h6>
                        </div>

                    </div>
                </div>
                <div class="card-body p-4">
                    <?php

                    // 1. Data Sanitization

                    $jobStatus   = (int)$job['job_status'];
                    $approveStatus = isset($job['approval_status']) ? (int)$job['approval_status'] : null;
                    $payStatus   = (int)$job['is_paid'];
                    $progressStatus = isset($job['progress_status']) ? (int)$job['progress_status'] : -1;


                    /* ========= QUOTATION ========= */
                    if ($approveStatus === null) {
                        $quoteLabel = 'Quotation Not Created';
                        $quoteSub   = 'Create quotation';
                    } elseif ($approveStatus == 10) {
                        $quoteLabel = 'Quotation Given';
                        $quoteSub   = 'Waiting for customer approval';
                    } elseif ($approveStatus == 11) {
                        $quoteLabel = 'Quotation Approved';
                        $quoteSub   = 'Approved - ready to proceed';
                    } else {
                        $quoteLabel = 'Quotation Rejected';
                        $quoteSub   = 'Cancelled / Rejected by customer';
                    }


                    /* ========= PAYMENT ========= */
                    if ($payStatus == 0) {
                        $paySub = '<span class="text-danger">Not Paid</span>';
                    } elseif ($payStatus == 1) {
                        $paySub = '<span class="text-warning">Advance Paid</span>';
                    } else {
                        $paySub = '<span class="text-success">Paid in Full</span>';
                    }


                    /* ========= SPARE PARTS ========= */
                    if ($progressStatus == 10) {
                        $spareLabel = 'Items Repaired';
                    } elseif ($progressStatus == 11) {
                        $spareLabel = 'Items Replaced';
                    } elseif ($progressStatus == 12) {
                        $spareLabel = 'Repaired & Replaced';
                    } else {
                        $spareLabel = 'Maintenance Pending';
                    }


                    /* ========= FINAL SETTLEMENT ========= */
                    if ($jobStatus >= 5 && $payStatus < 2) {
                        $finalSub = '<span class="text-danger">Payment Pending After Completion</span>';
                    } elseif ($jobStatus >= 5 && $payStatus == 2) {
                        $finalSub = '<span class="text-success">Final Payment Settled</span>';
                    } else {
                        $finalSub = '<span class="text-muted">Settlement After Completion</span>';
                    }


                    /* ========= FLOW ========= */
                    $flow = [

                        'received' => [
                            'label' => 'Job Received',
                            'icon'  => 'fa-star',
                            'is_done' => true,
                            'sub' => "Job: {$job['job_name']}"
                        ],

                        'quotation' => [
                            'label' => $quoteLabel,
                            'icon' => 'fa-file-invoice',
                            'is_done' => ($approveStatus !== null),
                            'sub' => $quoteSub
                        ],

                        'payment' => [
                            'label' => 'Payment Status',
                            'icon'  => 'fa-hand-holding-usd',
                            'is_done' => ($approveStatus == 11),
                            'sub' => $paySub
                        ],

                        'started' => [
                            'label' => 'Job Started',
                            'icon'  => 'fa-tools',
                            'is_done' => ($jobStatus >= 4),
                            'sub' => 'Technician started work'
                        ],

                        'spareparts' => [
                            'label' => $spareLabel,
                            'icon' => 'fa-cog',
                            'is_done' => ($progressStatus >= 10),
                            'sub' => ($progressStatus >= 10) ? 'Technical action recorded' : 'Awaiting technician update'
                        ],

                        'completed' => [
                            'label' => 'Job Completed',
                            'icon'  => 'fa-check-double',
                            'is_done' => ($jobStatus >= 5),
                            'sub' => 'Work finished & tested'
                        ],

                        'final_pay' => [
                            'label' => 'Final Settlement',
                            'icon'  => 'fa-money-bill-wave',
                            'is_done' => ($jobStatus >= 5 && $payStatus == 2),
                            'sub' => $finalSub
                        ],

                        'delivered' => [
                            'label' => 'Delivered',
                            'icon'  => 'fa-shipping-fast',
                            'is_done' => ($jobStatus == 8 && $payStatus == 2),
                            'sub' => ($jobStatus == 8) ? 'Handed over to customer' : 'Ready after settlement'
                        ]
                    ];


                    // --- STOP FLOW IF QUOTATION IS CANCELLED ---
                    if ($approveStatus == 10 || $approveStatus == 12) {
                        // Only show Received and a "Cancelled" version of Quotation
                        $flow = array_intersect_key($flow, array_flip(['received', 'quotation']));
                        $flow['quotation']['label'] = ($approveStatus == 10) ? 'Quotation Given' : 'Quotation Cancelled';
                        $flow['quotation']['icon'] = 'fa-times-circle';
                        $flow['quotation']['is_done'] = false; // Makes it red/active so you see the "Stop"
                    }

                    // Determine the active step (first one not done)
                    $activeKey = null;
                    foreach ($flow as $key => $data) {
                        if (!$data['is_done']) {
                            $activeKey = $key;
                            break;
                        }
                    }

                    // Identify the active step (the first one that is NOT done)

                    ?>

                    <div class="timeline-container">
                        <?php foreach ($flow as $key => $data):
                            $isDone = $data['is_done'];
                            $isActive = ($key === $activeKey);
                            $stateClass = $isDone ? 'done' : ($isActive ? 'active' : 'pending');
                        ?>
                            <div class="timeline-row <?= $stateClass ?>">
                                <div class="timeline-visual">
                                    <div class="timeline-icon-box">
                                        <i class="fas <?= $data['icon'] ?>"></i>
                                    </div>
                                    <div class="timeline-line"></div>
                                </div>

                                <div class="timeline-content">
                                    <h6 class="status-title"><?= $data['label'] ?></h6>
                                    <p class="status-subtitle">
                                        <?php
                                        if ($isActive) echo "Action Required on This Step";
                                        elseif ($isDone) echo isset($data['sub']) ? $data['sub'] : "Step completed";
                                        else echo "Waiting for previous steps";
                                        ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>