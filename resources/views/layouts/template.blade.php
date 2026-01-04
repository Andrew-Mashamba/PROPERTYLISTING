<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'Laravel'))</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">
    {{-- Tailwind (expect your Laravel build to compile resources/css/app.css) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Alpine.js is included by Livewire, no need to load separately --}}
    <style>
      /* Container and utility classes */
      .container { width: 100%; max-width: 1200px; margin: 0 auto; padding: 0 1.5rem; }
      .shadow-card { box-shadow: var(--card-shadow); }
      
      /* Ensure Lucide icons display */
      .lucide {
        display: inline-block;
        width: 1em;
        height: 1em;
        vertical-align: middle;
        font-style: normal;
        font-variant: normal;
        text-rendering: auto;
        line-height: 1;
      }
      
      /* Fallback for footer visibility */
      footer.bg-foreground {
        background-color: hsl(220 20% 15%) !important;
        color: hsl(0 0% 100%) !important;
      }
      
      footer .text-background {
        color: hsl(0 0% 100%) !important;
      }
      
      footer .bg-background\/10 {
        background-color: rgba(255, 255, 255, 0.1) !important;
      }
      
      footer .border-background\/10 {
        border-color: rgba(255, 255, 255, 0.1) !important;
      }
    </style>
    @livewireStyles
</head>
<body class="bg-background text-foreground antialiased">
    @yield('content')
    @livewireScripts
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        // Initialize Lucide icons after page load
        document.addEventListener('DOMContentLoaded', function() {
            lucide.createIcons();
        });
        // Re-initialize after Livewire updates
        document.addEventListener('livewire:load', function() {
            lucide.createIcons();
        });
        document.addEventListener('livewire:update', function() {
            lucide.createIcons();
        });
    </script>
    @yield('scripts')
</body>
</html>

