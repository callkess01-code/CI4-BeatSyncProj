<?php

/**
 * Component: cards/event_card.php
 * 
 * Data contract:
 * $event: array with keys:
 *   - id: int
 *   - title: string
 *   - image: string (URL)
 *   - alt: string
 *   - month: string (default: 'OCT')
 *   - day: string (default: '31')
 *   - location: string (default: 'BGC, Philippines')
 */

$event = $event ?? [];
$id = $event['id'] ?? 0;
$title = $event['title'] ?? 'Event Title';
$image = $event['image'] ?? '';
$alt = $event['alt'] ?? $title;
$month = $event['month'] ?? 'OCT';
$day = $event['day'] ?? '31';
$location = $event['location'] ?? 'BGC, Philippines';
?>

<div class="event-card" data-event-id="<?= esc($id) ?>">
    <div class="event-image-wrapper">
        <img src="<?= esc($image) ?>" alt="<?= esc($alt) ?>" />
        <div class="event-overlay"></div>
    </div>
    <div class="event-content">
        <div class="event-date">
            <span class="event-month"><?= esc($month) ?></span>
            <span class="event-day"><?= esc($day) ?></span>
        </div>
        <div class="event-info">
            <h3 class="event-name"><?= esc($title) ?></h3>
            <p class="event-location"><?= esc($location) ?></p>
        </div>
    </div>
</div>

<style>
    .event-card {
        background: linear-gradient(135deg, #1a1a1a 0%, #252525 100%);
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        cursor: pointer;
        position: relative;
        transform-style: preserve-3d;
        box-shadow:
            0 20px 60px rgba(0, 0, 0, 0.5),
            inset 0 1px 0 rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.08);
    }

    .event-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at top left, rgba(255, 64, 87, 0.05) 0%, transparent 50%);
        pointer-events: none;
        z-index: 1;
        border-radius: 16px;
    }

    .event-card:hover {
        box-shadow:
            0 30px 60px rgba(0, 0, 0, 0.7),
            0 15px 25px rgba(0, 0, 0, 0.5),
            0 5px 15px rgba(255, 64, 87, 0.3),
            inset 0 -2px 0 rgba(255, 255, 255, 0.1),
            inset 0 2px 0 rgba(255, 255, 255, 0.05);
        border-color: rgba(255, 64, 87, 0.3);
    }

    .event-card:active {
        transform: translateY(-12px) translateZ(25px) rotateX(3deg) scale(0.98);
        transition: all 0.1s ease;
    }

    .event-image-wrapper {
        position: relative;
        width: 100%;
        height: 250px;
        overflow: hidden;
        z-index: 2;
    }

    .event-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .event-card:hover .event-image-wrapper img {
        transform: scale(1.1);
    }

    .event-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.9), transparent);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 3;
    }

    .event-card:hover .event-overlay {
        opacity: 1;
    }

    .event-content {
        display: flex;
        gap: 16px;
        padding: 24px;
        position: relative;
        z-index: 2;
        background: linear-gradient(to bottom, rgba(10, 10, 10, 0.95), rgba(0, 0, 0, 0.98));
    }

    .event-date {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #2a2a2a, #1f1f1f);
        border-radius: 12px;
        padding: 12px 16px;
        min-width: 70px;
        flex-shrink: 0;
        box-shadow:
            0 4px 8px rgba(0, 0, 0, 0.4),
            inset 0 1px 0 rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .event-month {
        font-size: 14px;
        font-weight: 700;
        color: #ffffff;
        text-transform: uppercase;
        letter-spacing: 1px;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
    }

    .event-day {
        font-family: 'Bebas Neue', Arial, sans-serif;
        font-size: 32px;
        font-weight: 400;
        color: #ffffff;
        line-height: 1;
        text-shadow: 0 2px 6px rgba(0, 0, 0, 0.5);
    }

    .event-info {
        display: flex;
        flex-direction: column;
        gap: 8px;
        flex: 1;
    }

    .event-name {
        font-family: 'Bebas Neue', Arial, sans-serif;
        font-size: 24px;
        font-weight: 400;
        color: #ffffff;
        letter-spacing: 1px;
        line-height: 1.2;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
    }

    .event-location {
        font-size: 14px;
        color: rgba(255, 255, 255, 0.7);
        font-weight: 400;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .event-location::before {
        content: '';
        width: 16px;
        height: 16px;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='rgba(255,255,255,0.7)' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z'%3E%3C/path%3E%3Ccircle cx='12' cy='10' r='3'%3E%3C/circle%3E%3C/svg%3E");
        background-size: contain;
        background-repeat: no-repeat;
        flex-shrink: 0;
    }

    @media (min-width: 1024px) {
        .event-image-wrapper {
            height: 280px;
        }
    }

    @media (max-width: 767px) {
        .event-card:hover {
            transform: translateY(-10px);
        }
    }
</style>