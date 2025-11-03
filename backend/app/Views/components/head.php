<?php

/**
 * components/head.php
 * Renders a full <head> block with default CDN includes and accepts
 * dynamic page title and optional extras.
 *
 * Usage:
 * <?= view('components/head', ['title' => 'Page title']) ?>
 */

$title = $title ?? 'BeatSync - Ultimate EDM Events & Music Festivals';
?>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue:wght@400&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- Global base styles -->
    <style>
        :root {
            --primary-red: #ff4057;
            --primary-red-hover: #e63946;
            --bg-dark: #181818;
            --bg-dark-lighter: #111111;
            --text-light: #ffffff;
            --text-gray: rgba(255, 255, 255, 0.8);
        }

        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', Arial, sans-serif;
            background-color: var(--bg-dark);
            color: var(--text-light);
            line-height: 1.6;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        /* Typography */
        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: 'Bebas Neue', Arial, sans-serif;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-dark-lighter);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-red);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-red-hover);
        }

        /* Utility classes */
        .text-primary {
            color: var(--primary-red);
        }

        .bg-primary {
            background-color: var(--primary-red);
        }

        .bg-dark {
            background-color: var(--bg-dark);
        }

        .bg-dark-lighter {
            background-color: var(--bg-dark-lighter);
        }
    </style>
</head>