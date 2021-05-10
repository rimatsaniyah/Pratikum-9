<?php  
    // memulai session
    session_start();
    include('koneksiform.php'); 
    require 'vendor/autoload.php'; 

    //menggunakan namespace dari PhpSpreadsheet
    use PhpOffice\PhpSpreadsheet\Spreadsheet; 
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx; 

    //membuat objek bernama $spreadsheet dan class spreadsheet
    $spreadsheet = new Spreadsheet(); 
    //membuat variabel $sheet untuk activesheet di file excel
    $sheet = $spreadsheet -> getActiveSheet(); 

    //Mengisi cell pada file excel
    $sheet -> setCellValue('A1','No. ');
    $sheet -> setCellValue('B1','Jenis Pendaftaran');
    $sheet -> setCellValue('C1','Tanggal Masuk');
    $sheet -> setCellValue('D1','Nomor Ujian');
    $sheet -> setCellValue('E1','PAUD');
    $sheet -> setCellValue('F1','TK');
    $sheet -> setCellValue('G1','SKHUN');
    $sheet -> setCellValue('H1','Ijazah');
    $sheet -> setCellValue('I1','Hobi ');
    $sheet -> setCellValue('J1','Cita-cita');
    $sheet -> setCellValue('K1','Nama Lengkap');
    $sheet -> setCellValue('L1','Jenis Kelamin');
    $sheet -> setCellValue('M1','NISN Sekarang');
    $sheet -> setCellValue('N1','NIK');
    $sheet -> setCellValue('O1','Tempat Lahir');
    $sheet -> setCellValue('P1','Tanggal Lahir');
    $sheet -> setCellValue('Q1','Agama');
    $sheet -> setCellValue('R1','Berkebutuhan Khusus');
    $sheet -> setCellValue('S1','Alamat');
    $sheet -> setCellValue('T1','RT');
    $sheet -> setCellValue('U1','RW');
    $sheet -> setCellValue('V1','Dusun');
    $sheet -> setCellValue('W1','Kelurahan');
    $sheet -> setCellValue('X1','Kecamatan');
    $sheet -> setCellValue('Y1','Kode Pos');
    $sheet -> setCellValue('Z1','Tempat Tinggal');
    $sheet -> setCellValue('AA1','Transportasi');
    $sheet -> setCellValue('AB1','Nomor HP');
    $sheet -> setCellValue('AC1','Nomor Telp');
    $sheet -> setCellValue('AD1','Email');
    $sheet -> setCellValue('AE1','KPS');
    $sheet -> setCellValue('AF1','No KPS');
    $sheet -> setCellValue('AG1','Kewarganegaraan');
    $sheet -> setCellValue('AH1','Negara');

    //membuat variabel query untuk menyimpan eksekusi query ke database untuk menampilkan isi tabel tb_siswa
    $i = 2; 
    $query = mysqli_query($koneksi, "SELECT *FROM pendaftaran"); 
    $no = 1; 
    //membuat perulangan dengan variabel $row
    while ($row = mysqli_fetch_array($query)) { 

    //Mengisi cell  excel berisi data dalam database
    $sheet -> setCellValue('A'.$i, $row['id']);
    $sheet -> setCellValue('B'.$i, $row['jenis_pendaftaran']);
    $sheet -> setCellValue('C'.$i, $row['tgl_msk']);
    $sheet -> setCellValue('D'.$i, $row['nis']);
    $sheet -> setCellValue('E'.$i, $row['no_ujian']);
    $sheet -> setCellValue('F'.$i, $row['paud']);
    $sheet -> setCellValue('G'.$i, $row['tk']);
    $sheet -> setCellValue('H'.$i, $row['skhun']);
    $sheet -> setCellValue('I'.$i, $row['ijazah']);
    $sheet -> setCellValue('J'.$i, $row['hobi']);
    $sheet -> setCellValue('K'.$i, $row['cita2']);
    $sheet -> setCellValue('L'.$i, $row['nama']);
    $sheet -> setCellValue('M'.$i, $row['jenis_kelamin']);
    $sheet -> setCellValue('N'.$i, $row['nisn_sekarang']);
    $sheet -> setCellValue('O'.$i, $row['nik']);
    $sheet -> setCellValue('P'.$i, $row['tempat_lahir']);
    $sheet -> setCellValue('Q'.$i, $row['tanggal_lahir']);
    $sheet -> setCellValue('R'.$i, $row['agama']);
    $sheet -> setCellValue('S'.$i, $row['berkebutuhan']);
    $sheet -> setCellValue('T'.$i, $row['alamat']);
    $sheet -> setCellValue('U'.$i, $row['rt']);
    $sheet -> setCellValue('V'.$i, $row['rw']);
    $sheet -> setCellValue('W'.$i, $row['dusun']);
    $sheet -> setCellValue('X'.$i, $row['kelurahan']);
    $sheet -> setCellValue('Y'.$i, $row['kecamatan']);
    $sheet -> setCellValue('Z'.$i, $row['kode_pos']);
    $sheet -> setCellValue('AA'.$i, $row['tempat_tinggal']);
    $sheet -> setCellValue('AB'.$i, $row['transportasi']);
    $sheet -> setCellValue('AC'.$i, $row['no_hp']);
    $sheet -> setCellValue('AD'.$i, $row['no_telepon']);
    $sheet -> setCellValue('AE'.$i, $row['email']);
    $sheet -> setCellValue('AF'.$i, $row['kps']);
    $sheet -> setCellValue('AG'.$i, $row['no_kps']);
    $sheet -> setCellValue('AH'.$i, $row['kewarganegaraan']);
    $sheet -> setCellValue('AI'.$i, $row['negara']);
    $i++;
    }

    //mengatur border file excel
    $styleArray = [
                'borders' => [
                    'allBorders'=>[
                        'borderStyle'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],

            ];
        
    $i =$i -1; 
    $sheet->getStyle('A1:AI'.$i)->applyFromArray($styleArray);

    $writer = new Xlsx($spreadsheet); 
    $writer->save('Data Pendaftaran Siswa.xlsx'); 

?>