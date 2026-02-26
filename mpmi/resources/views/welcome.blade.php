<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>L-126</title>

    <style>
        /* ===== A4 EXACT SIZE ===== */
        @page {
            size: A4;
            margin: 12mm;
        }

        body {
            font-family: "Times New Roman", serif;
            font-size: 11.5px;
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            /* penting untuk presisi */
        }

        td {
            border: 1px solid #000;
            padding: 3px 4px;
            vertical-align: middle;
            word-wrap: break-word;
        }

        .center {
            text-align: center;
        }

        .bold {
            font-weight: bold;
        }

        .small {
            font-size: 10px;
        }

        .right {
            text-align: right;
        }

        .photo-box {
            width: 130px;
            height: 170px;
            border: 1px solid #000;
            margin: auto;
        }

        .checkbox {
            display: inline-block;
            width: 11px;
            height: 11px;
            border: 1px solid #000;
            margin: 0 4px;
            vertical-align: middle;
        }

        .checkbox.checked::after {
            content: "✓";
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div style="width: 210mm; padding: 20px;">
        <h4 style="text-align: center;">CONSTRUCTION WORKER<br>
            營造工</h4>
        <h5>認證公司：PT. INDONESIA MAPAN PERKASA</h5>
        <table>

            <!-- ===== HEADER ===== -->
            <tr>
                <td colspan="7" class="bold">
                    個人資料 / Personal Data &nbsp;&nbsp; 00-00-2025
                </td>
                <td colspan="1" class="bold center">L-126</td>
            </tr>

            <!-- ===== BASIC INFO ROW ===== -->
            <tr>
                <!-- <td colspan="2" class="bold center">L-126</td>
            <td colspan="4"></td> -->
                <td class="bold">姓名<br><span class="small">Name</span></td>
                <td colspan="5">AHMAD YUNAN</td>
                <td colspan="2" rowspan="11" class="center">
                    <div class="photo-box"></div>
                </td>
            </tr>
            <tr>
                <td class="bold">性別<br><span class="small">Gender</span></td>
                <td>MALE / 男</td>
                <td class="bold">國籍<br><span class="small">Nationality</span></td>
                <td colspan="3">INDONESIA / 印尼</td>
            </tr>

            <tr>
                <td class="bold">生日<br><span class="small">Date of Birth</span></td>
                <td>07-01-1998</td>
                <td class="bold">年齡<br><span class="small">Age</span></td>
                <td colspan="3">28 TH</td>
            </tr>

            <tr>
                <td class="bold">身高<br><span class="small">Height</span></td>
                <td>165 CM</td>
                <td class="bold">體重<br><span class="small">Weight</span></td>
                <td colspan="3">50 KG</td>
            </tr>

            <tr>
                <td class="bold">出生地點<br><span class="small">Place of Birth</span></td>
                <td>TANAK EMBANG</td>
                <td class="bold">婚姻狀況<br><span class="small">Marital Status</span></td>
                <td colspan="3">
                    <span class="checkbox"></span> MARRIED 結婚<br>
                    <span class="checkbox"></span> SINGLE 未婚<br>
                    <span class="checkbox"></span> DIVORCE 離婚<br>
                </td>
            </tr>
            <tr>
                <td class="bold">宗教<br><span class="small">Religion</span></td>
                <td>ISLAM 回教</td>
                <td class="bold">教育程度<br><span class="small">Education</span></td>
                <td colspan="3">
                    <span class="checkbox"></span> SD 國小<br>
                    <span class="checkbox"></span> SMP 國中<br>
                    <span class="checkbox"></span> SMA 高中<br>
                    <span class="checkbox checked"></span> SMK 高職
                </td>
            </tr>

            <tr>
                <td class="bold">地址<br><span class="small">Address</span></td>
                <td colspan="5">
                    TANAK EMBANG LAUK RT 001 RW 001 DESA SELEBUNG KEC BATUKLIANG LOMBOK TENGAH
                </td>
            </tr>

            <!-- ===== EMERGENCY ===== -->
            <tr>
                <td rowspan="4" class="bold">
                    緊急聯絡人 / Emergency Contact
                </td>
            </tr>

            <tr>
                <td class="bold">姓名<br><span class="small">Name</span></td>
                <td colspan="4">ALUH NURLINDASARI</td>
            </tr>
            <tr>
                <td class="bold">地址<br><span class="small">Address</span></td>
                <td colspan="4">TANAK EMBANG LAUK RT OO1 RW 001DESA SELEBUNG KEC BATUKLIANG LOMBOK TENGAH</td>
            </tr>
            <tr>
                <td class="bold">連絡電話<br><span class="small">Phone Number</span></td>
                <td colspan="4">087835192874</td>
            </tr>

            <tr>
                <td class="bold">色盲<br><span class="small">Colour Blindness</span></td>
                <td>
                    <span class="checkbox"></span> Yes<br>
                    <span class="checkbox"></span> No
                </td>
                <td class="bold">眼鏡<br><span class="small">Glasses</span></td>
                <td>
                    <span class="checkbox"></span> Yes<br>
                    <span class="checkbox"></span> No
                </td>
                <td class="bold">護照<br><span class="small">Passport</span></td>
                <td>
                    <span class="checkbox"></span> Yes<br>
                    <span class="checkbox"></span> No
                </td>
                <td class="bold">醫療<br><span class="small">Medical</span></td>
                <td>
                    <span class="checkbox"></span> Yes<br>
                    <span class="checkbox"></span> No
                </td>
            </tr>
        </table>
        <br>

        <table>
            <!-- ===== FAMILY ===== -->
            <tr>
                <td colspan="24" class="bold">
                    家庭資料 / Family Data
                </td>
            </tr>

            <tr>
                <td colspan="3" class="bold"><span class="small">父親姓名</span><br><span class="small">Father's Name</span></td>
                <td colspan="9">SALIMAN</td>
                <td colspan="3" class="bold"><span class="small">配偶姓名</span><br><span class="small">Wife</span></td>
                <td colspan="9">ALUH NURLINDASARI</td>
            </tr>

            <tr>
                <td colspan="3" class="bold"><span class="small">母親姓名</span><br><span class="small">Mother's Name</span></td>
                <td colspan="9">SAHLUM</td>
                <td colspan="3" class="bold"><span class="small">子女人數</span><br><span class="small">No. of Children</span></td>
                <td></td>
                <td colspan="3" class="bold"><span class="small">男孩</span><br><span class="small">Son</span></td>
                <td></td>
                <td colspan="3" class="bold"><span class="small">女孩</span><br><span class="small">Daughter</span></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" class="bold"><span class="small">語文</span><br><span class="small">Language</span></td>
                <td colspan="21"><span class="checkbox"></span> 中文 Mandarin&nbsp;&nbsp;
                    <span class="checkbox"></span> 台語Taiwanese&nbsp;&nbsp;
                    <span class="checkbox"></span> 英文English&nbsp;&nbsp;
                    <span class="checkbox"></span> 印尼文Indonesian&nbsp;&nbsp;
                    <span class="checkbox"></span> 其他語文others
                </td>
            </tr>

        </table>
        <br>
        <table>
            <!-- ===== WORK EXPERIENCE ===== -->
            <tr>
                <td colspan="8" class="bold">
                    工作經驗 / Working Experience
                </td>
            </tr>

            <tr class="center bold">
                <td>國家<br><span class="small">Country</span></td>
                <td>職務<br><span class="small">Position</span></td>
                <td colspan="3">工作內容<br><span class="small">Working Content</span></td>
                <td colspan="3">受雇期間<br><span class="small">Employment Times</span></td>
            </tr>

            <tr>
                <td>MALAYSIA</td>
                <td>KONSTRUKSI</td>
                <td colspan="3">IKAT BESI</td>
                <td colspan="3">2018-2022</td>
            </tr>

            <tr>
                <td>INDONESIA</td>
                <td>KONSTRUKSI</td>
                <td colspan="3">IKAT BESI / SUSUN BATA / LAS</td>
                <td colspan="3">2024-2025</td>
            </tr>
        </table>
        <br>
        <table>
            <tr>

                <td colspan="8" class="center bold">
                    面試評價 / Interview Appraisal
                </td>
            </tr>
            <tr>
                <td colspan="8">
                    PASPOR BERLAKU 護照有效期 2026</td>
            </tr>

        </table>
        <br>
    </div>

</body>

</html>
