<?php
use App\Models\User;
use App\Models\Student;

echo "Deleting parent users...\n";
$deletedCount = User::where('role', 'parent')->delete();
echo "Deleted $deletedCount users.\n";

echo "Updating student names...\n";
$maleNames = ['Ahmad Syarif', 'Budi Santoso', 'Candra Wijaya', 'Dedi Kurniawan', 'Eko Prasetyo', 'Fajar Ramadhan', 'Guntur Wibowo', 'Hendra Kusuma', 'Iwan Setiawan', 'Joko Susilo'];
$femaleNames = ['Siti Aminah', 'Ani Lestari', 'Citra Dewi', 'Dian Permata', 'Eka Putri', 'Fitri Handayani', 'Gita Sari', 'Hana Pertiwi', 'Indah Puspita', 'Julianti'];

$students = Student::all();
$mIndex = 0; 
$fIndex = 0;

foreach ($students as $student) {
    if ($student->gender == 'Laki-laki') {
        $newName = $maleNames[$mIndex % count($maleNames)];
        $mIndex++;
    } else {
        $newName = $femaleNames[$fIndex % count($femaleNames)];
        $fIndex++;
    }
    
    $oldName = $student->name;
    $student->update([
        'name' => $newName,
        'parent_name' => 'Wali ' . $newName
    ]);
    echo "Updated Student #$student->id: $oldName -> $newName\n";
}

echo "Done!\n";
