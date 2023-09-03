<?php
    include_once 'Student.php';

    $students = Student::index();

    if (isset($_POST['submit'])) {
        $response = Student::create([
            'name' => $_POST['name'],
            'score'  => $_POST['score'],
        ]);

        setcookie('message', $response, time() + 10);
        header("Location: index.php");
    }

    if (isset($_POST['delete'])) {
        $response = Student::delete($_POST['id']);
    
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
        <div class="flex">
        <div class="basis-4/12 p-5 bg-gray-200">
            <h1 class="font-bold text-xl text-center">INPUT NILAI</h1>
            <div class="justify-center align-middle">
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input id="name" type="text" name="name"class="w-full p-1 rounded-xl shadow-xl">
                </div>
                <div class="mb-3">
                    <label for="score">Score</label>
                    <input id="score" type="number" name="score" class="w-full p-1 rounded-xl shadow-xl ">
                </div>
                    <button class="w-full bg-blue-500 hover:bg-blue-800 duration-300 text-white p-1.5 rounded-xl" name="submit">SUBMIT</button>
                </form>
        </div>
    </div>
    <div class="bg-gray-200 w-full m-4 shadow-xl rounded-lg">
        <div class="basis-8/12">
            <h1 class="font-bold text-xl text-center p-3">Tabel Nilai</h1>
            <table class=" w-11/12 m-auto text-center">
                
            <thead class="border border-grey-1000 bg-white">
                <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama</th>
                <th scope="col">Nilai</th>
                <th scope="col">aksi</th>
                </tr>
            </thead>
            <tbody class="border border-grey-1000 bg-gray-500 text-white">
            <?php foreach($students as $key => $dataS):?>
                <tr>
                    <td><?= $key + 1?></td>
                    <td><?= $dataS['name']?></td>
                    <td><?= $dataS['score']?></td>
                <td>
                    <button class="bg-red-500 rounded-lg m-2 text-white p-0.5"><a href="view.php?id=<?= $dataS['id']?>"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    </a></button>
                    <span class="font-bold">/</span>
                    <button class="bg-green-500 rounded-lg m-2 text-white p-0.5">
                        <a href="edit.php?id=<?= $dataS['id']?>">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                        </a>
                    </button>
                    <span class="font-bold">/</span>
                    <form action="" method="POST" class="inline">
                        <input type="hidden" name="id" value="<?= $dataS['id']?>">
                        <button type="submit" name="delete" class="bg-red-500 rounded-lg m-2 text-white p-0.5">
                            <a href="Student.php">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                            </a>
                        </button>
                    </form>
                </td>
                </tr>
                <?php endforeach ?>
             
            </tbody>
        </table>
    </div>
        </div>
    </div>
    <div class="bg-gray-400 p-2">
       <span class="text-white text-center"><p>Copyright@SMKN 10 JAKARTA TIMUR</p></span>
    </div>
</body>
</html>