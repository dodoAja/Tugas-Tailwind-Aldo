<?php

include_once 'Student.php';

$id = $_GET['id'];
$student = Student::show($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <nav class="relative flex w-full flex-wrap items-center justify-between bg-gray-50 py-2 text-neutral-500 shadow-lg hover:text-neutral-700 focus:text-neutral-700 dark:bg-neutral-600 lg:py-4">
    <div class="flex w-full flex-wrap items-center justify-between px-3">
      <div class="ml-2">
        <a class="text-xl text-neutral-800 dark:text-neutral-200" href="#">DODOS</a>
      </div>
      <div class="mr-6">
        <a class="text-lg" href=""><img class="w-10" src="smkn.jpeg" alt=""></a>
      </div>
    </div>
  </nav>

  <div class="flex bg-slate-300 rounded-xl p-3 "> 
        <div class="basis-1/5">
            <p class="font-bold">Nama:</p>
            <p class="font-bold">Score:</p>
        </div>
        <div class="basis-4/5">
            <p><?= $student['name'] ?></p>
            <p><?= $student['score'] ?></p>
        </div>
    </div>
    <a href="index.php">
        <div class="bg-gray-400  w-full p-5 text-center text-xl font-bold text-white hover:bg-gray-500 shadow-xl ">
            Kembali
        </div>
    </a>
</body>
</html>