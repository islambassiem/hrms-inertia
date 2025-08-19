<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script>
        (function() {
            // ---- Theme ----
            const theme = localStorage.getItem("theme") || "dark";
            const prefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;
            const isDark = theme === "dark" || (theme === "system" && prefersDark);

            if (isDark) {
                document.documentElement.classList.add("dark");
            }
            localStorage.setItem("theme", theme);

            // ---- Language ----
            const lang = localStorage.getItem("locale") || "ar";
            document.documentElement.lang = lang;
            localStorage.setItem("locale", lang);

            // ---- Direction ----
            const dir = lang === "ar" ? "rtl" : "ltr";
            document.documentElement.dir = localStorage.getItem("dir") || dir;
            localStorage.setItem("dir", document.documentElement.dir);
        })();
    </script>

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @routes
    @viteReactRefresh
    @vite(['resources/js/app.tsx', "resources/js/pages/{$page['component']}.tsx"])
    @inertiaHead
</head>

<body class="font-sans antialiased">
    @inertia
</body>

</html>
