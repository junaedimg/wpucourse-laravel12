<!DOCTYPE html>
{{-- <html class="h-full bg-gray-900"> --}}
<html class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
</head>

<body class="h-full">
    <!-- Include this script tag or install `@tailwindplus/elements` via npm: -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script> -->
    <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-900">
  <body class="h-full">
  ```
-->
    <div class="min-h-full">
        <x-navbar />

        <x-header :title="$title" />

        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 text-slate-900">
                {{ $slot }}
            </div>
        </main>

    </div>

</body>
@vite('resources/js/app.js')

</html>
