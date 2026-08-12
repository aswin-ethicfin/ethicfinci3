<!-- Add this button somewhere above -->
<!-- <button class="btn btn-success mb-3 ms-3" onclick="downloadPDF()">Download as PDF</button> -->
<div class="d-flex justify-content-end gap-2 mb-3 me-3">
    <button class="btn btn-primary" onclick="printPage()">Print</button>
</div>
<!-- Wrap the full content inside this div -->
<div id="download-area">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4 overflow-hidden" style="border-radius: 10px;">
                    <!-- Header Image with slight downward shift -->
                    <img src="https://accounts.ethicfin.com/uploads/profile/hdr-4bc3807859a83d4d73f3302a5922195e.jpg"
                        alt="Header Image"
                        style="width: 100%; height: 120px; object-fit: cover; 
                           border-top-left-radius: 10px; border-top-right-radius: 10px;
                           margin-top: 10px;">

                    <div class="card-body px-0 pb-2 ps-5 pe-5" style="background-color: #ffffff;">
                        <div style="width: 100%; margin: 0 auto; padding: 30px; font-family: Arial, sans-serif;">
                            <div style="text-align: center; margin-top: 20px;">
                                <img src="<?= $image_url ?>" alt="Lab Report Image"
                                    style="max-width: 100%; height: auto; max-height: auto; border-radius: 10px; ">
                            </div>
                        </div>
                    </div>

                    <!-- Footer Image -->
                    <img src="https://accounts.ethicfin.com/uploads/profile/ft-e7b635035d04512c60c8e1d1e600b6a9.png"
                        alt="Footer Image"
                        style="width: 100%; height: 120px; object-fit: cover; 
                           border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function downloadPDF() {
        const element = document.getElementById('download-area');

        // Ensure all images are fully loaded
        const images = element.querySelectorAll('img');
        const imagePromises = Array.from(images).map(img => {
            if (!img.complete) {
                return new Promise(resolve => {
                    img.onload = img.onerror = resolve;
                });
            }
            return Promise.resolve();
        });

        Promise.all(imagePromises).then(() => {
            html2pdf().set({
                margin: 0,
                filename: 'full-page.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2,
                    useCORS: true
                },
                jsPDF: {
                    unit: 'in',
                    format: 'a4',
                    orientation: 'portrait'
                }
            }).from(element).save();
        });
    }

    function printPage() {
        const content = document.getElementById('download-area').innerHTML;
        const printWindow = window.open('', '_blank');

        printWindow.document.open();
        printWindow.document.write(`
            <html>
            <head>
                <title>Print Page</title>
                <style>
                    body {
                        margin: 0;
                        padding: 0;
                        font-family: Arial, sans-serif;
                    }
                    img {
                        max-width: 100%;
                        height: auto;
                    }
                    .card {
                        border-radius: 10px;
                        overflow: hidden;
                    }
                </style>
            </head>
            <body onload="window.print(); window.close();">
                ${content}
            </body>
            </html>
        `);
        printWindow.document.close();
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>