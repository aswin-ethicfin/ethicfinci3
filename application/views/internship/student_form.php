<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Transaction Table</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }
        th, td {
            border: 1px solid black;
            text-align: center;
            padding: 6px;
        }
        th {
            background-color: #f2f2f2;
        }
        .opening-balance {
            text-align: left;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Date</th>
                <th>Due Days</th>
                <th>Reference</th>
                <th>Account</th>
                <th>Description</th>
                <th>Debit</th>
                <th>Credit</th>
                <th>Balance</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="9" class="opening-balance">Opening Balance <span style="float:right;">0.00</span></td>
            </tr>
            <tr>
                <td>1</td>
                <td>19-May-2025</td>
                <td></td>
                <td>RCPT/23/1063</td>
                <td>CASH IN HAND</td>
                <td></td>
                <td>0.00</td>
                <td>30,820.00</td>
                <td>-30,820.00</td>
            </tr>
            <tr>
                <td>2</td>
                <td>21-May-2025</td>
                <td>0</td>
                <td>1001-10029</td>
                <td>Sale</td>
                <td>PO-1049</td>
                <td>30,820.00</td>
                <td>0.00</td>
                <td>0.00</td>
            </tr>
            <tr>
                <td>3</td>
                <td>02-Jun-2025</td>
                <td>9</td>
                <td>1001-10032</td>
                <td>Sale</td>
                <td>PO#1052</td>
                <td>2,415.00</td>
                <td>0.00</td>
                <td>2,415.00</td>
            </tr>
            <tr>
                <td>4</td>
                <td>02-Jun-2025</td>
                <td></td>
                <td>RCPT/23/1067</td>
                <td>ALINMA BANK</td>
                <td></td>
                <td>0.00</td>
                <td>2,415.00</td>
                <td>0.00</td>
            </tr>
        </tbody>
    </table>

</body>
</html>
