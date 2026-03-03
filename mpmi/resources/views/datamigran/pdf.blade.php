<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Data Migran</title>
    <style>
        @font-face {
            font-family: 'NotoSansTC';
            /* font-style: normal;
            font-weight: normal; */
            src: url("{{ storage_path('fonts/NotoSansTC-Regular.ttf') }}") format("truetype");
        }

        @page {
            size: A4;
            margin: 12mm;
        }

        body {
            font-family: 'NotoSansTC', sans-serif;
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
            width: 165px;
            height: 235px;
            /* border: 1px solid #000; */
            margin: auto;
            text-align: center;
        }

        .photo-box img {
            max-width: 100%;
            max-height: 100%;
        }

        .checkbox {
            display: inline-block;
            /* jangan pakai flex */
            width: 11px;
            height: 11px;
            border: 1px solid #000;
            text-align: center;
            line-height: 10px;
            /* harus hampir sama dengan height */
            vertical-align: middle;
            /* ini penting */
            margin-right: 4px;
            font-size: 9px;
        }

        .checkbox.checked {
            font-weight: bold;
        }

        .checkbox.checked::before {
            content: "✓";
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>

    <!-- <div style="width: 210mm; padding: 20px;"> -->
    <div>
        <h4 style="text-align: center;">{{ $dataMigran->paketKerja->biodata }}</h4>
        <h5>認證公司：PT. INDONESIA MAPAN PERKASA</h5>
        <table>

            <!-- ===== HEADER ===== -->
            <tr>
                <td colspan="6" class="bold" style="background-color: aqua;">
                    個人資料 / Personal Data &nbsp;&nbsp; {{ \Carbon\Carbon::parse($dataMigran->created_at)->format('d-m-Y') }}
                </td>
                <td colspan="2" class="bold center" style="background-color: yellow;color: red;">{{ $dataMigran->paketKerja->kode }}-{{ str_pad($dataMigran->id, 3,'0', STR_PAD_LEFT) }}</td>
            </tr>

            <!-- ===== BASIC INFO ROW ===== -->
            <tr>
                <!-- <td colspan="2" class="bold center">L-126</td>
            <td colspan="4"></td> -->
                <td class="bold">姓名<br><span class="small">Name</span></td>
                <td colspan="5">{{ $dataMigran->nama }}</td>
                <td colspan="2" rowspan="10" class="center">
                    @php
                    $pasFoto = $dataMigran->dokumen->where('jenis', 'pas_foto')->first();
                    @endphp

                    @if($pasFoto)
                    <div class="photo-box">
                        <img src="{{ public_path('storage/' . $pasFoto->file_path) }}">
                    </div>
                    @endif
                </td>
            </tr>
            <tr>
                <td class="bold">性別<br><span class="small">Gender</span></td>
                <td>{{ $dataMigran->gender }}</td>
                <td class="bold">國籍<br><span class="small">Nationality</span></td>
                <td colspan="3">INDONESIA / 印尼</td>
            </tr>

            <tr>
                <td class="bold">生日<br><span class="small">Date of Birth</span></td>
                <td>{{ \Carbon\Carbon::parse($dataMigran->tgl_lahir)->format('d-m-Y') }}</td>
                <td class="bold">年齡<br><span class="small">Age</span></td>
                <td colspan="3">{{ \Carbon\Carbon::parse($dataMigran->tgl_lahir)->age }} TH</td>
            </tr>

            <tr>
                <td class="bold">身高<br><span class="small">Height</span></td>
                <td>{{ $dataMigran->tinggibadan }} CM</td>
                <td class="bold">體重<br><span class="small">Weight</span></td>
                <td colspan="3">{{ $dataMigran->beratbadan }} KG</td>
            </tr>

            <tr>
                <td class="bold">出生地點<br><span class="small">Place of Birth</span></td>
                <td>{{ $dataMigran->tempat_lahir }}</td>
                <td class="bold">婚姻狀況<br><span class="small">Marital Status</span></td>
                <td colspan="3">
                    <span class="checkbox {{ $dataMigran->status_pernikahan == 'Menikah' ?  'checked' : '' }}"></span> MARRIED 結婚<br>
                    <span class="checkbox {{ $dataMigran->status_pernikahan == 'Belum Menikah' ? 'checked' : '' }}"></span> SINGLE 未婚<br>
                    <span class="checkbox {{ $dataMigran->status_pernikahan == 'Cerai' ? 'checked' : '' }}"></span> DIVORCE 離婚<br>
                </td>
            </tr>
            <tr>
                <td class="bold">宗教<br><span class="small">Religion</span></td>
                <td>{{ $dataMigran->agama }}</td>
                <td class="bold">教育程度<br><span class="small">Education</span></td>
                <td colspan="3">
                    <span class="checkbox {{ $dataMigran->pendidikan == 'SD' ? 'checked' : '' }}"></span> SD 國小<br>
                    <span class="checkbox {{ $dataMigran->pendidikan == 'SMP' ? 'checked' : '' }}"></span> SMP 國中<br>
                    <span class="checkbox {{ $dataMigran->pendidikan == 'SMA' ? 'checked' : '' }}"></span> SMA 高中<br>
                    <span class="checkbox {{ $dataMigran->pendidikan == 'SMK' ? 'checked' : '' }}"></span> SMK 高職
                </td>
            </tr>

            <tr>
                <td class="bold">地址<br><span class="small">Address</span></td>
                <td colspan="5">
                    {{ $dataMigran->alamat }}
                </td>
            </tr>

            <!-- ===== EMERGENCY ===== -->
            <!-- <tr>
                <td rowspan="4" class="bold">
                    緊急聯絡人 / Emergency Contact
                </td>
            </tr>

            <tr>
                <td class="bold">姓名<br><span class="small">Name</span></td>
                <td colspan="4">{{ $dataMigran->nama_kontak_darurat }}</td>
            </tr>
            <tr>
                <td class="bold">地址<br><span class="small">Address</span></td>
                <td colspan="4">{{ $dataMigran->alamat }}</td>
            </tr>
            <tr>
                <td class="bold">連絡電話<br><span class="small">Phone Number</span></td>
                <td colspan="4">{{ $dataMigran->nomor_kontak_darurat }}</td>
            </tr> -->
            <tr>
                <td rowspan="3" class="bold">
                    緊急聯絡人 / Emergency Contact
                </td>
                <td class="bold">姓名<br><span class="small">Name</span></td>
                <td colspan="4">{{ $dataMigran->nama_kontak_darurat }}</td>
            </tr>

            <tr>
                <td class="bold">地址<br><span class="small">Address</span></td>
                <td colspan="4">{{ $dataMigran->alamat }}</td>
            </tr>

            <tr>
                <td class="bold">連絡電話<br><span class="small">Phone Number</span></td>
                <td colspan="4">{{ $dataMigran->nomor_kontak_darurat }}</td>
            </tr>

            <tr>
                <td class="bold">色盲<br><span class="small">Colour Blindness</span></td>
                <td>
                    <span class="checkbox"></span> Yes<br>
                    <span class="checkbox"></span> No
                </td>
                <td class="bold">眼鏡<br><span class="small">Glasses</span></td>
                <td>
                    <span class="checkbox {{ $dataMigran->glasses ? 'checked' : '' }}"></span> Yes<br>
                    <span class="checkbox {{ !$dataMigran->glasses ? 'checked' : '' }}"></span> No
                </td>
                <td class="bold">護照<br><span class="small">Passport</span></td>
                <td>
                    <span class="checkbox {{ $dataMigran->call_visa ? 'checked' : '' }}"></span> Yes<br>
                    <span class="checkbox {{ !$dataMigran->call_visa ? 'checked' : '' }}"></span> No
                </td>
                <td class="bold">醫療<br><span class="small">Medical</span></td>
                <td>
                    <span class="checkbox {{ $dataMigran->medical ? 'checked' : '' }}"></span> Yes<br>
                    <span class="checkbox {{ !$dataMigran->call_visa ? 'checked' : '' }}"></span> No
                </td>
            </tr>
        </table>
        <br>

        <table>
            <!-- ===== FAMILY ===== -->
            <tr>
                <td colspan="24" class="bold" style="background-color: aqua;">
                    家庭資料 / Family Data
                </td>
            </tr>

            <tr>
                <td colspan="3" class="bold"><span class="small">父親姓名</span><br><span class="small">Father's Name</span></td>
                <td colspan="9">{{ $dataMigran->nama_ayah }}</td>
                <td colspan="3" class="bold"><span class="small">配偶姓名</span><br><span class="small">Wife</span></td>
                <td colspan="9">{{ $dataMigran->nama_partner }}</td>
            </tr>

            <tr>
                <td colspan="3" class="bold"><span class="small">母親姓名</span><br><span class="small">Mother's Name</span></td>
                <td colspan="9">{{ $dataMigran->nama_ibu }}</td>
                <td colspan="3" class="bold"><span class="small">子女人數</span><br><span class="small">No. of Children</span></td>
                <td>{{ $dataMigran->son }}</td>
                <td colspan="3" class="bold"><span class="small">男孩</span><br><span class="small">Son</span></td>
                <td></td>
                <td colspan="3" class="bold"><span class="small">女孩</span><br><span class="small">Daughter</span></td>
                <td>{{ $dataMigran->daughter }}</td>
            </tr>
            <tr>
                <td colspan="3" class="bold"><span class="small">語文</span><br><span class="small">Language</span></td>
                <td colspan="21"><span class="checkbox {{ in_array('mandarin', $dataMigran->bahasa ?? []) ? 'checked' : '' }}"></span> 中文 Mandarin&nbsp;&nbsp;
                    <span class="checkbox {{ in_array('taiwanese', $dataMigran->bahasa ?? []) ? 'checked' : '' }}"></span> 台語Taiwanese&nbsp;&nbsp;
                    <span class="checkbox {{ in_array('english', $dataMigran->bahasa ?? []) ? 'checked' : '' }}"></span> 英文English&nbsp;&nbsp;
                    <span class="checkbox {{ in_array('indonesian', $dataMigran->bahasa ?? []) ? 'checked' : '' }}"></span> 印尼文Indonesian&nbsp;&nbsp;
                    <span class="checkbox {{ in_array('others', $dataMigran->bahasa ?? []) ? 'checked' : '' }}"></span> 其他語文others
                </td>
            </tr>

        </table>
        <br>
        <table>
            <!-- ===== WORK EXPERIENCE ===== -->
            <tr>
                <td colspan="8" class="bold" style="background-color: aqua;">
                    工作經驗 / Working Experience
                </td>
            </tr>

            <tr class="center bold">
                <td>國家<br><span class="small">Country</span></td>
                <td>職務<br><span class="small">Position</span></td>
                <td colspan="3">工作內容<br><span class="small">Working Content</span></td>
                <td colspan="3">受雇期間<br><span class="small">Employment Times</span></td>
            </tr>
            @foreach($dataMigran->pengalaman as $migran)
            <tr>
                <td>{{ $migran->negara }}</td>
                <td>{{ $migran->posisi }}</td>
                <td colspan="3">{{ $migran->working_content }}</td>
                <td colspan="3">{{ $migran->mulai }}-{{ $migran->selesai }}</td>
            </tr>
            @endforeach

            <!-- <tr>
                    <td>INDONESIA</td>
                    <td>KONSTRUKSI</td>
                    <td colspan="3">IKAT BESI / SUSUN BATA / LAS</td>
                    <td colspan="3">2024-2025</td>
                </tr> -->
        </table>
        <br>
        <table>
            <tr>

                <td colspan="8" class="center bold" style="background-color: aqua;">
                    面試評價 / Interview Appraisal
                </td>
            </tr>
            <tr>
                <td colspan="8">
                    PASPOR BERLAKU 護照有效期 {{ \Carbon\Carbon::parse($dataMigran->tgl_berakhir_passport)->year }}</td>
            </tr>

        </table>
        <br>
    </div>

</body>

</html>
