# DevTZ Software Studio — Enterprise Portfolio Platform

<div align="center">

```
  ██████╗  ███████╗ ██╗   ██╗ ████████╗ ███████╗
  ██╔══██╗ ██╔════╝ ██║   ██║ ╚══██╔══╝ ╚══███╔╝
  ██║  ██║ █████╗   ██║   ██║    ██║      ███╔╝ 
  ██║  ██║ ██╔══╝   ╚██╗ ██╔╝    ██║     ███╔╝  
  ██████╔╝ ███████╗  ╚████╔╝     ██║    ███████╗
  ╚═════╝  ╚══════╝   ╚═══╝      ╚═╝    ╚══════╝
```

**Next-Gen Software Engineering Studio Portfolio Built with Laravel 12 & Tailored Cyber Aesthetics**

[![Laravel 12](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel)](https://laravel.com)
[![PHP 8.4](https://img.shields.io/badge/PHP-8.4-777BB4?style=for-the-badge&logo=php)](https://php.net)
[![Tailwind CSS v4](https://img.shields.io/badge/Tailwind-v4-38B2AC?style=for-the-badge&logo=tailwind-css)](https://tailwindcss.com)
[![Alpine.js](https://img.shields.io/badge/Alpine.js-3.x-8BC0D0?style=for-the-badge&logo=alpine.js)](https://alpinejs.dev)
[![GitHub Remote](https://img.shields.io/badge/Repository-beastcodes27%2Fdevtz--port-F5FF67?style=for-the-badge&logo=github&color=1C2459)](https://github.com/beastcodes27/devtz-port.git)

</div>

---

## 🎨 Dual-Theme Design Architecture

DevTZ features a custom cyber-minimalist design system with instant runtime theme switching and persistent state.

| Theme | Primary Background | Accent Highlight | Contrast Surfaces / Text |
| :--- | :--- | :--- | :--- |
| **Light Theme** | `#FFFFFF` (Crisp White) / `#F8FAFC` | `#F5FF67` (Lemon Glitch) | `#1C2459` (Blueberry Void for ultra-sharp typography) |
| **Dark Theme** | `#1C2459` (Blueberry Void) / `#12173B` | `#F5FF67` (Lemon Glitch Neon) | `#FFFFFF` / `#171E4A` / `#2E3A82` |

---

## ⚡ Key Modules & Features

1. **Cyber Hero & Dynamic Telemetry**:
   - Live availability radar indicator ("DevTZ Core Engine — Available for Q2/Q3 Projects").
   - Live simulated pipeline benchmark terminal (`composer create-project devtz/enterprise-core`).
   - High-contrast call-to-actions with smooth hover lift.

2. **Full-Stack Engineering Services**:
   - Custom Web Applications (Laravel 12, Octane, Vue 3, React)
   - Cloud Infrastructure & Microservices (AWS, Kubernetes, Terraform)
   - Cross-Platform Mobile Applications (Flutter, React Native)
   - Applied AI & Automation Systems (LLM Agents, Enterprise RAG, PgVector)
   - High-Throughput API Development & Integrations
   - DevOps, CI/CD & Security Hardening

3. **Filterable Case Studies Showcase**:
   - Instant domain filtering by **All**, **Web Apps**, **Mobile**, **Cloud & DevOps**, **AI & Data**.
   - Interactive full-screen case study modal with architecture breakdown, challenge vs. solution analysis, metrics, and live demo links.

4. **Battle-Tested Technology Matrix**:
   - Tabbed ecosystem view across Backend & Runtimes, Frontend & Mobile, Databases & Caching, Cloud & Containers, and AI & Automation.

5. **Interactive Project Cost & Scope Estimator**:
   - Real-time instant quotation calculator with dynamic sliders, platform choices, scale tiers, and module selections.
   - One-click transfer to pre-populate the contact form with custom quotation details.

6. **Interactive Developer CLI Terminal (Easter Egg)**:
   - Accessible via navigation header or shortcut `Ctrl + K` / `⌘K`.
   - Supported commands: `help`, `about`, `services`, `projects`, `stack`, `quote`, `hire`, `theme dark`, `theme light`, `clear`, `exit`.

7. **Project Inquiry & Dispatch System**:
   - Validated Laravel form with database persistence in SQLite.
   - Flash notification alerts and automatic audit tracking.

8. **Engineering Radar Newsletter**:
   - Subscription pipeline for technical architectural deep dives.

---

## 🚀 Quickstart Guide

### Prerequisites
- PHP `>= 8.2` (PHP 8.4 recommended)
- Composer `>= 2.0`
- SQLite or MySQL / PostgreSQL

### 1. Clone & Install
```bash
git clone https://github.com/beastcodes27/devtz-port.git
cd devtz-port
composer install
```

### 2. Environment & Database Setup
```bash
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
```

### 3. Run Development Server
```bash
php artisan serve
```
Visit `http://localhost:8000` to explore the DevTZ portfolio.

### 4. Run Automated Tests
```bash
php artisan test
```

---

## 📋 45 Atomic Commits Map

```
01. chore: initialize repository and git configuration
02. chore: scaffold fresh laravel project structure
03. chore: configure sqlite database and environment defaults
04. build: install and configure tailwind css with custom theme palette
05. style: define blueberry void and lemon glitch theme color tokens
06. feat: create base application layout and html head meta tags
07. feat: implement theme switcher state and alpine.js persistence
08. feat: create reusable navigation bar component with responsive mobile drawer
09. feat: implement footer component with newsletter subscription and status indicator
10. feat: design hero section with cyber glitch accent and live status badge
11. feat: create tech stack marquee ticker component
12. feat: create database migration for services table
13. feat: create service model with slug and icon attributes
14. feat: seed comprehensive devtz software services data
15. feat: build services grid component with interactive hover cards
16. feat: create database migration for portfolio projects table
17. feat: create project model and category relationships
18. feat: create database migration for project case study metrics
19. feat: seed realistic devtz software portfolio projects and case studies
20. feat: implement portfolio section with alpine.js category filtering
21. feat: create interactive project case study detail modal
22. feat: create database migration for company statistics and metrics
23. feat: create about devtz section with engineering metrics counters
24. feat: build interactive tech stack matrix with categorized tabs
25. feat: create database migration for client testimonials table
26. feat: create testimonial model and seed client reviews
27. feat: implement testimonials showcase with interactive review cards
28. feat: create database migration for blog articles and tags
29. feat: create article model and seed engineering insights
30. feat: build blog articles section with reading time and tag filters
31. feat: create blog post reader modal component
32. feat: build interactive project cost and scope estimator widget
33. feat: create database migration for contact inquiries table
34. feat: create contact inquiry model and validation rules
35. feat: implement contact controller with store method and flash messaging
36. feat: build interactive contact and quotation inquiry form
37. feat: create database migration for newsletter subscriptions
38. feat: implement newsletter controller and api endpoint
39. feat: create interactive devtz developer cli terminal easter egg
40. feat: implement sound and micro-interaction animations
41. style: refine light theme contrast, buttons, and lemon glitch badges
42. style: polish dark blueberry void neon glows and responsive layouts
43. test: add feature tests for contact form and portfolio endpoints
44. docs: create comprehensive readme with screenshots and documentation
45. chore: finalize production build assets and git remote setup
```

---

## 🛡️ License

Engineered with precision by **DevTZ Software Studio**. Open-source under the MIT License.
