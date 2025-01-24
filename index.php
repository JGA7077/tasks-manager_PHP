<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task Manager</title>
  <link rel="stylesheet" href="css/output.css">
</head>

<body>
  <!--
    Heads up! 👋

    Plugins:
      - @tailwindcss/forms
  -->
  <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-lg text-center">
      <h1 class="text-2xl font-bold sm:text-3xl text-gray-50">Task Manager</h1>

      <p class="mt-4 text-gray-50">
        An PHP way to use Tasks
      </p>
    </div>

    <form action="#" class="mx-auto mb-0 mt-8 max-w-md space-y-4">
      <div>
        <label for="title" class="sr-only">Title</label>

        <div class="relative">
          <input
            type="title"
            class="w-full rounded-lg border-[#243c5a] p-4 pe-12 text-sm shadow-sm bg-gray-300"
            placeholder="Enter title" />
          </span>
        </div>
      </div>

      <div>
        <label for="description" class="sr-only">Description</label>

        <div class="relative">
          <input
            type="description"
            class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm bg-gray-300"
            placeholder="Enter description" />
        </div>
      </div>

      <div class="flex items-center justify-between">
        <button
          type="submit"
          class="inline-block w-full rounded-lg bg-blue-800 cursor-pointer hover:bg-indigo-600 px-5 py-3 text-sm font-medium text-white">
          Create task
        </button>
      </div>
    </form>
  </div>
  <?php

  ?>

  <div class="mx-auto px-5 max-w-7xl">
    <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 sm:grid-cols-2 lg:gap-8">
      <a href="#" class="block bg-amber-200">
        <h3 class="mt-4 text-lg font-bold text-gray-900 sm:text-xl">Lorem, ipsum dolor.</h3>
    
        <p class="mt-2 max-w-sm text-gray-700">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni reiciendis sequi ipsam incidunt.
        </p>
      </a>

      <a href="#" class="block bg-amber-200">
        <h3 class="mt-4 text-lg font-bold text-gray-900 sm:text-xl">Lorem, ipsum dolor.</h3>
    
        <p class="mt-2 max-w-sm text-gray-700">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni reiciendis sequi ipsam incidunt.
        </p>
      </a>
    </div>
  </div>


  <footer>
    <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
      <div class="items-center">
        <div class="flex justify-center text-teal-600 sm:justify-start">
        </div>

        <p class="mt-4 text-center text-sm text-gray-50 lg:mt-0 lg:text-right">
          UI components from <a class="underline" href="https://www.hyperui.dev">hyperui</a>
        </p>
        <p class="mt-4 text-center text-sm text-gray-50 lg:mt-0 lg:text-right">
          Created by <a class="underline" href="https://github.com/JGA7077">João Gabriel</a>
        </p>
      </div>
    </div>
  </footer>

</body>

</html>