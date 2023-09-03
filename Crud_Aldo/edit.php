<?php
include_once 'Student.php';

$student = Student::show($_GET['id']);

if (isset($_POST['submit'])) {
    $response = Student::update([
        'id'   => $_POST['id'],
        'name' => $_POST['name'],
        'score'  => $_POST['score'],
    ]);

    setcookie('message', $response, time() + 10);
    header("Location: index.php");
}
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
    <div class="bg-slate-500 rounded-lg absolute mt-2 w-screen">
            <form method="POST" action="" class="p-3">
                <input type="hidden" name="id" value="<?=$student['id']?>">
                <div class="">
                    <label class="text-white active:border-red-600" for="name">Nama</label>
                    <input class="text-slate-300 w-full bg-slate-500 border-b-2 border-slate-400 " type="text" name="name" id="name" value="<?=$student['name']?>">
                </div>
                <div class="mb-3">
                    <label class="text-white" for="score">score</label>
                    <input class="text-slate-300 w-full bg-slate-500 border-b-2 border-slate-400" type="number" name="score" id="score" value="<?=$student['score']?>">
                </div>
                <div class="grid grap-3">
                    <button class="p-3 bg-slate-400 shadow-lg  text-white font-semibold rounded-md hover:bg-slate-500 hover:duration-300 " name="submit" type="submit">Kirim</button>
                </div>
            </form>
        </div>
  </nav>
</body>
</html>
